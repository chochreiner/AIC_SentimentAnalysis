<?php

class ArticlesController extends AppController {

	private static $parseRegex = '/<h1 class="headline">([^>]*)<\/h1>.*<cite class="[^"]*">By <span class="[^"]*">([^<]*)<\/span> \| <span class="[^"]*"><a href="[^"]*"\s*>[^<]*<\/a><\/span>[^<]*<abbr title="[^"]*">([^<]*)<\/abbr><\/cite>.*<div class="yom-mod yom-art-content\\s*"><div class="bd">(.*?)<\/div><\/div><script>var t_art_body = new Date\(\).getTime\(\);<\/script>\s*<div[^>]*>\\s*<h4>Related Quotes:<\/h4>/ms';
	private static $HEADLINE_INDEX = 1;
	private static $AUTHOR_INDEX = 2;
	private static $TIME_INDEX = 3;
	private static $CONTENT_INDEX = 4;

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
					$this->chopArticlesIntoTasks($article);
					$this->set('trigger', "new article has been added!");
				}
			}
		}

		$this->set('success', "Yayyy, geschafft :D");

	}

	private function chopArticlesIntoTasks() {
		
		$content = "";
		
		$dom_document->loadHTML($content);
		
		$allParagraphs = $dom_document->getElementsByTagName('p');
		foreach($allParagraphs as $i => $para){
			debug($para->nodeValue);
		}
	}
	
	private function parse($link) {
		$htmlsrc = file_get_contents($link);
		$dom_document = new DOMDocument();
		$dom_document->strictErrorChecking = false;
		@$dom_document->loadHTML($htmlsrc);

		//use DOMXpath to navigate the html with the DOM
		$dom_xpath = new DOMXpath($dom_document);

		$headlineDOM = $dom_xpath->query("//h1[contains(concat(' ',normalize-space(@class),' '),' headline ')]");
		$authorDOM = $dom_xpath->query("//div[contains(concat(' ',normalize-space(@class),' '),' bd ')]/cite/span");
		$timeDOM = $dom_xpath->query("//div[contains(concat(' ',normalize-space(@class),' '),' bd ')]/cite/abbr");
		$contentDOM = $dom_xpath->query("//div[contains(concat(' ',normalize-space(@class),' '),' yom-mod yom-art-content ')]");

		if(!$headlineDOM || !$authorDOM || !$timeDOM || !$contentDOM) {
			echo "<pre>";
			echo "Konnte den Link: " . $link . " nicht lesen.";
			echo "</pre>";
		}
		
		if(!$headlineDOM || is_object($headlineDOM) && !is_null($headlineDOM)) {
			$headline = $headlineDOM->item(0)->nodeValue;
		} else {
			echo "<pre>";
			print_r($headlineDOM);
			echo "</pre>";
		}
		
		if(!$authorDOM || is_object($authorDOM) && !is_null($authorDOM)) {
			$author = $authorDOM->item(0)->nodeValue;
		} else {
			echo "<pre>";
			print_r($authorDOM);
			echo "</pre>";
		}
		
		if(!$timeDOM || is_object($timeDOM) && !is_null($timeDOM)) {
			$time = $timeDOM->item(0)->getAttribute("title");
		} else {
			echo "<pre>";
			print_r($timeDOM);
			echo "</pre>";
		}
		
		if(!$contentDOM || is_object($contentDOM) && !is_null($contentDOM)) {
			$content = $dom_document->saveXML($contentDOM->item(0));
		} else {
			echo "<pre>";
			print_r($contentDOM);
			echo "</pre>";
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