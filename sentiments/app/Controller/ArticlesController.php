<?php

class ArticlesController extends AppController {

	private static $parseRegex = '/<h1 class="headline">([^>]*)<\/h1>.*<cite class="[^"]*">By <span class="[^"]*">([^<]*)<\/span> \| <span class="[^"]*"><a href="[^"]*"\s*>[^<]*<\/a><\/span>[^<]*<abbr title="[^"]*">([^<]*)<\/abbr><\/cite>.*<div class="yom-mod yom-art-content\\s*"><div class="bd">(.*?)<\/div><\/div><script>var t_art_body = new Date\(\).getTime\(\);<\/script>\s*<div[^>]*>\\s*<h4>Related Quotes:<\/h4>/ms';
	private static $HEADLINE_INDEX = 1;
	private static $AUTHOR_INDEX = 2;
	private static $TIME_INDEX = 3;
	private static $CONTENT_INDEX = 4;

	private static $PARAGRAPH_COUNT = 5;

	private static $ID_ASSOC = 'id';
	private static $HEADLINE_ASSOC = 'headline';
	private static $AUTHOR_ASSOC = 'author';
	private static $TIME_ASSOC = 'time';
	private static $CONTENT_ASSOC = 'content';
	private static $COLUMN_ASSOC = 'column';

	// php script laedt ALLE artikel in die db
	// RSSFeeds -> Von allen RSS Feeds alle Artikel laden
	// pro RSS Feed
	// alle artikel durchgehen
	// ueberpruefen ob artikel mit diesem namen in der db
	// wenn nicht, dann hinzufuegen
	// otherwise skip
	// do until alle rss feeds durch
	public function grabArticles() {
		App::uses('AllRSSFeeds', 'Lib');
		App::uses('LastRSS', 'Lib');

		$rssReader = new LastRSS();
		$rssFeeds = new AllRSSFeeds();
		$feeds = $rssFeeds->getAllRSS();
		// $this->set('articles', $rssReader->get($feeds['News']));

		foreach ($feeds as $feed) {
			$parsedFeed = $rssReader->get($feed);

			foreach ($parsedFeed['items'] as $rawArticle) {
				$article = $this->parse($rawArticle['link']);
				if ($article == null || !is_array($article)) {
					continue;
				}
				$this->set('articles', $article);
				if ($this->Article->existsArticle($article[self::$HEADLINE_INDEX])) {
					$this->set('trigger', "article has been skipped!");
					continue;
				} else {
					$this->Article->create();
					$this->Article->set('headline', $article[self::$HEADLINE_INDEX]);
					$this->Article->set('author', $article[self::$AUTHOR_INDEX]);
					$this->Article->set('time', $article[self::$TIME_INDEX]);
					$this->Article->set('content', $article[self::$CONTENT_INDEX]);
					$this->Article->set('column', $parsedFeed['title']);
					$this->Article->save();
					$this->chopArticlesIntoTasks($this->Article->id, $article[self::$CONTENT_INDEX]);
					$this->set('trigger', "new article has been added!");
				}
			}
		}

		$this->set('success', "Yayyy, geschafft :D");

	}

	/**
	 * Pushes them tasks to MW.
	 */
	public function pushTasksToMW() {

		App::uses('MobileWorks', 'Lib');
		$this->loadModel('ArticleTask');
		$allTasks = $this->ArticleTask->find('all');
		$mw = new MobileWorks(); // provide your username/password
		$mw->username = 'hochi';
		$mw->password = 'hochi';
		$mw->sandbox();

		foreach($allTasks as $tasks) {
			foreach($tasks as $task) {
				$t = $mw->Task(array("instructions" => "How is the company mentioned in these paragraphs?"));
				$t->set_param("resource", $task['tasktext']); // add the required fields
				$t->add_field("Name", "t"); // finally, post it and get the url of the newly created task
				$found = $this->ArticleTask->find('first', array('conditions' => array('id' => $task[self::$ID_ASSOC])));
				if($found['ArticleTask']['taskurl'] != "") {
					continue;
				}
				$task_url = $t->post();
				$this->ArticleTask->set('id', $found['ArticleTask']['id']);
				$this->ArticleTask->set('taskurl', $task_url);
				$this->ArticleTask->save();
			}
		}
		

	}

	/**
	 * Splits the big fat articles into small tiny tasks.
	 */
	public function createTasks() {
		$this->loadModel('Article');
		$allArticles = $this->Article->find('all');
		foreach($allArticles as $articles) {
			foreach($articles as $article) {
				$this->chopArticlesIntoTasks($article[self::$ID_ASSOC], $article[self::$CONTENT_ASSOC]);
			}
		}
		$this->set("text", "Done.");
	}

	private function chopArticlesIntoTasks($id, $article) {

		$this->loadModel('ArticleTask');

		$dom_document = new DOMDocument();
		@$dom_document->loadHTML($article);
		$allParagraphs = $dom_document->getElementsByTagName('p');
		$text = '';
		$j = 0;
		if($this->ArticleTask->find('count', array('conditions' => array('id' => $id))) > 0) {
			return;
		}
		foreach($allParagraphs as $i => $para) {
			if(trim($para->nodeValue) == '') {
				continue;
			}
			$text .= '<p>' . $para->nodeValue . '</p>';
			if($j % (self::$PARAGRAPH_COUNT) == 0) {
				$this->ArticleTask->create();
				$this->ArticleTask->set('articleid', $id);
				$this->ArticleTask->set('tasktext', $text);
				$this->ArticleTask->set('pushed', false);
				$this->ArticleTask->set('taskurl', null);
				$this->ArticleTask->save();
				$text = '';
			}
			$j++;
		}
		if($text != '') {
			$this->ArticleTask->create();
			$this->ArticleTask->set('articleid', $id);
			$this->ArticleTask->set('tasktext', $text);
			$this->ArticleTask->set('pushed', false);
			$this->ArticleTask->set('taskurl', null);
			$this->ArticleTask->save();
		}

	}

	private function parse($link) {
		$htmlsrc = file_get_contents($link);
		$dom_document = new DOMDocument();
		$dom_document->strictErrorChecking = false;
		@$dom_document->loadHTML($htmlsrc);

		//use DOMXpath to navigate the html with the DOM
		$dom_xpath = new DOMXpath($dom_document);

		if(!strstr($link, "http://finance.yahoo.com")){
			return;
		}
		
		$headlineDOM = $dom_xpath->query("//h1[contains(concat(' ',normalize-space(@class),' '),' headline ')]");
		$authorDOM = $dom_xpath->query("//div[contains(concat(' ',normalize-space(@class),' '),' bd ')]/cite/span");
// 		$timeDOM = $dom_xpath->query("//div[contains(concat(' ',normalize-space(@class),' '),' bd ')]/cite/abbr");
		$timeDOM = $dom_xpath->query("//cite/abbr");
		$contentDOM = $dom_xpath->query("//div[contains(concat(' ',normalize-space(@class),' '),' yom-mod yom-art-content ')]");

		
		if(!$headlineDOM || !$authorDOM || !$timeDOM || !$contentDOM) {
// 			echo "<pre>";
// 			echo "Konnte den Link: " . $link . " nicht lesen.";
// 			echo "</pre>";
			return null;
		}

		if(!$headlineDOM ||  ($headlineDOM instanceof DOMNodeList) && !is_null($headlineDOM)) {
			if(!is_null($headlineDOM ->item(0)) && is_object($headlineDOM->item(0))){
				$headline = $headlineDOM->item(0)->nodeValue;
			}else{
// 				echo "<pre>";
// 				print_r($headlineDOM);
// 				echo "</pre>";
// 				echo "DAFUQ " . $link;
				return null;
			}
		} else {
// 			echo "<pre>";
// 			print_r($headlineDOM);
// 			echo "</pre>";
			return null;
		}

		if(!$authorDOM || ($authorDOM instanceof DOMNodeList) && !is_null($authorDOM)) {
			if(!is_null($authorDOM ->item(0)) && is_object($authorDOM->item(0))){
				$author = $authorDOM->item(0)->nodeValue;
			}else{
// 				echo "<pre>";
// 				print_r($authorDOM);
// 				echo "</pre>";
// 				echo "DAFUQ " . $link;		
				return null;
			}
			
		} else {
// 			echo "<pre>";
// 			print_r($authorDOM);
// 			echo "</pre>";
			return null;
		}

		if(!$timeDOM || ($timeDOM instanceof DOMNodeList) && !is_null($timeDOM)) {

			if(!is_null($timeDOM ->item(0)) && is_object($timeDOM->item(0))){
				$time = $timeDOM->item(0)->getAttribute("title");
			}else{
// 				echo "<pre>";
// 				print_r($timeDOM);
// 				echo "</pre>";
// 				echo "DAFUQ " . $link;
				return null;
			}
			
		} else {
// 			echo "<pre>";
// 			print_r($timeDOM);
// 			echo "</pre>";
			return null;
		}

		if(!$contentDOM || ($contentDOM instanceof DOMNodeList) && !is_null($contentDOM)) {
			if(!is_null($contentDOM ->item(0)) && is_object($contentDOM->item(0))){
				$content = $dom_document->saveXML($contentDOM->item(0));
			}else{
// 				echo "<pre>";
// 				print_r($contentDOM);
// 				echo "</pre>";
// 				echo "DAFUQ " . $link;
				return null;
			}
		} else {
// 			echo "<pre>";
// 			print_r($contentDOM);
// 			echo "</pre>";
			return null;
		}

		$result = array();

		$result[self::$HEADLINE_INDEX] = $headline;
		$result[self::$AUTHOR_INDEX] = $author;
		$result[self::$TIME_INDEX] = $time;
		$result[self::$CONTENT_INDEX] = $content;

		return $result;
	}

}
?>