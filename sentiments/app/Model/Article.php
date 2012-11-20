<?php
App::uses('AppModel', 'Model');
/**
 * Article Model
 *
 * @property Paragraph $Paragraph
 */
class Article extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'title';




/**
 * Checks if the given guid is already in the database.
 * 
 * @return Boolean True if it already exists
 */
	public function guidExists($guid) {
		return $this->find('count', array(
			'conditions' => array(
				'guid' => $guid
			))) > 0;
	}


/**
 * Parses an article on Yahoo and creates
 * a new article record for the given data.
 *
 * Will return false if the data was inconclusive
 * 
 * @param  String $data The feed data, containing a link path to the html data,
 *                      a guid, title and optionally a source
 * @return Boolean      True if everything worked
 */
	public function parse($data) {
		$link = $data['link'];
		
		$link = 'http://finance.yahoo.com/blogs/daily-ticker/stocks-jump-fiscal-cliff-fever-breaks-bounce-legs-165148941.html';
		
		$htmlsrc = file_get_contents($link);
		$dom_document = new DOMDocument();
		$dom_document->strictErrorChecking = false;
		@$dom_document->loadHTML($htmlsrc);

		//use DOMXpath to navigate the html with the DOM
		$dom_xpath = new DOMXpath($dom_document);

		if(!strstr($link, "http://finance.yahoo.com")) { // <-- security check
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
			return false;
		}

		/** read the title directly from the feed
		if(!$headlineDOM ||  ($headlineDOM instanceof DOMNodeList) && !is_null($headlineDOM)) {
			if(!is_null($headlineDOM ->item(0)) && is_object($headlineDOM->item(0))){
				$headline = $headlineDOM->item(0)->nodeValue;
			}else{
// 				echo "<pre>";
// 				print_r($headlineDOM);
// 				echo "</pre>";
// 				echo "DAFUQ " . $link;
				return false;
			}
		} else {
// 			echo "<pre>";
// 			print_r($headlineDOM);
// 			echo "</pre>";
			return false;
		}
		 */

		if(!$authorDOM || ($authorDOM instanceof DOMNodeList) && !is_null($authorDOM)) {
			if(!is_null($authorDOM ->item(0)) && is_object($authorDOM->item(0))){
				$author = $authorDOM->item(0)->nodeValue;
			}else{
// 				echo "<pre>";
// 				print_r($authorDOM);
// 				echo "</pre>";
// 				echo "DAFUQ " . $link;		
				return false;
			}
			
		} else {
// 			echo "<pre>";
// 			print_r($authorDOM);
// 			echo "</pre>";
			return false;
		}

		if(!$timeDOM || ($timeDOM instanceof DOMNodeList) && !is_null($timeDOM)) {

			if(!is_null($timeDOM ->item(0)) && is_object($timeDOM->item(0))){
				$time = $timeDOM->item(0)->getAttribute("title");
			}else{
// 				echo "<pre>";
// 				print_r($timeDOM);
// 				echo "</pre>";
// 				echo "DAFUQ " . $link;
				return false;
			}
			
		} else {
// 			echo "<pre>";
// 			print_r($timeDOM);
// 			echo "</pre>";
			return false;
		}

		if(!$contentDOM || ($contentDOM instanceof DOMNodeList) && !is_null($contentDOM)) {
			if(!is_null($contentDOM ->item(0)) && is_object($contentDOM->item(0))){
				$content = $dom_document->saveXML($contentDOM->item(0));

				$endCut = strrpos($content, '</em></p></div></div>');
				if($endCut){
					$startCur = strrpos($content, '<p><em>');
					
					$toCut = substr($content, $startCur, $endCut);
					if(strrpos($toCut, '<p>') == 0){ // that means no other sub-paragraph will be cut
						$content = substr($content, 0, $startCur);	
					}
				}
// 				echo '<pre>';
// 				print_r($toCut);
// 				echo '</pre>';
				
			}else{
// 				echo "<pre>";
// 				print_r($contentDOM);
// 				echo "</pre>";
// 				echo "DAFUQ " . $link;
				return false;
			}
		} else {
// 			echo "<pre>";
// 			print_r($contentDOM);
// 			echo "</pre>";
			return false;
		}

		// for some reason the title my be in an CDATA tag, remove that
		$title = trim($data['title']);
		if((strpos($title,'<![CDATA[') == 0) && (strpos($title,']]>') == (strlen($title)-3))) {
			$title = substr($title, 9, strlen($title)-3-9);
		}

		// loading worked, set the data
		$this->create();
		$this->set(array(
			'author' => $author,
			'title' => $title,
			'publish_date' => $time,
			'link' => $link,
			'guid' => $data['guid'],
			'content' => $content,
			'source' => isset($data['source']) ? $data['source'] : null,
			));

		return true;
	}


/**
 * After a new article is created we split the article
 * content into paragraphs and save those.
 * 
 * @param  Boolean $created Only create paragraphs if $created=true
 */
	public function afterSave($created) {
		if(!$created) {
			return;
		}

		$dom_document = new DOMDocument();
		@$dom_document->loadHTML($this->data['Article']['content']);
		$allParagraphs = $dom_document->getElementsByTagName('p');
		$position = 0;

		foreach($allParagraphs as $paragraph) {
			if(trim($paragraph->nodeValue) == '') {
				continue;
			}

			// it's possible that paragraphs are created by breaks too
			foreach(explode('<br>', $paragraph->nodeValue) as $paragraph1) {
				if(trim($paragraph1) == '') {
					continue;
				}
				foreach(explode('<br/>', $paragraph1) as $paragraph2) {
					if(trim($paragraph2) == '') {
						continue;
					}
					foreach(explode('<br />', $paragraph2) as $paragraph3) {
						if(trim($paragraph3) == '') {
							continue;
						}

						// we found another paragrah, save it
						$this->Paragraph->create();
						$this->Paragraph->set(array(
							'article_id' => $this->id,
							'position'   => $position,
							'text'		 => $paragraph3
							));
						if(!$this->Paragraph->save()) {
							$this->delete();
							throw new Exception('Could not create paragraph for article '.$this->id);
						}
						$position++;
					}
				}
			}
		}
	}




	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Paragraph' => array(
			'className' => 'Paragraph',
			'foreignKey' => 'article_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);

}
