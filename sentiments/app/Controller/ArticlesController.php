<?php
App::uses('AppController', 'Controller');
/**
 * Articles Controller
 *
 * @property Article $Article
 */
class ArticlesController extends AppController {


/**
 * Parse all Yahoo RSS feeds and collect new articles.
 *
 * In the article models afterSave callback all article
 * paragraphs are extracted.
 *
 * php script laedt ALLE artikel in die db
 * RSSFeeds -> Von allen RSS Feeds alle Artikel laden
 * pro RSS Feed
 * alle artikel durchgehen
 * ueberpruefen ob artikel mit diesem namen in der db
 * wenn nicht, dann hinzufuegen
 * otherwise skip
 * do until alle rss feeds durch
 *
 * @param  Integer $lastestNumberOfArticles If a number, only parse the lastest articles, 
 *                                          since parsing all articles is very slow. For
 *                                          testing use e.g. 1 or 10
 * @param  Boolean $onlyFirstFeed 			Set this to true to only use the first feed,
 *                                   		this is for testing purposes.
 */
	public function grabArticles($lastestNumberOfArticles=false,$onlyFirstFeed=false) {
		App::uses('AllRSSFeeds', 'Lib');
		App::uses('LastRSS', 'Lib');

		$rssReader = new LastRSS();
		$rssFeeds = new AllRSSFeeds();
		$feeds = $rssFeeds->getAllRSS();
		// $this->set('articles', $rssReader->get($feeds['News']));

		$log = '';
		foreach ($feeds as $feed) {
			$parsedFeed = $rssReader->get($feed);
			if($parsedFeed == false) {
				$this->set('log', '<h1>Could not load feed '.$feed.'.<br/><br />Aborted.</h1>');
				return;
			}
			$log .= '<h1>Parsing feed '.$parsedFeed['title'].'</h1>';

			foreach ($parsedFeed['items'] as $index=>$articleMeta) {
				if($lastestNumberOfArticles && $index>=$lastestNumberOfArticles) {
					break; // latest articles are parsed
				}

				$log .= 'Parsing article "'.$articleMeta['title'].'"...<br>';
				
				if(!isset($articleMeta['guid']) || empty($articleMeta['guid'])) {
					$log .= 'Could not read guid for article:';
					$log .= '<pre>'.print_r($articleMeta,true).'</pre>';
					break;
				}

				if(false && $this->Article->guidExists($articleMeta['guid'])) {
					$log .= 'Article already exists in our database, skipping.<br><br>';
					continue;
				}

				if(!$this->Article->parse($articleMeta)) {
					$log .= 'Could not parse article.<br><br>';
					continue;
				}

				// save the article
				$this->Article->set('channel', $parsedFeed['title']);
				if(!$this->Article->save()) {
					$log .= 'Could not save article.<br><br>';
					$log .= '<pre>'.print_r($this->Article->invalidFields(),true).'</pre>';
					continue;
				} else {
					$log .= 'Article saved.<br><br>';
				}
			}

			if($onlyFirstFeed) {
				break;
			}
		}

		$this->set('log', $log .'<br><h1>Yayyy, geschafft :D</h1>');
	}



/**
 * This function will loop through all open articles
 * and creates the mobile works evaluation tasks
 */
	public function startEvaluation() {
		$log = '';

		// load all open articles
		$open_articles = $this->Article->find('all', array(
			'conditions' => array(
				'evaluated' => 0
			)));

		$log .= '<h1>' . count($open_articles).' Articles to analyse</h1>';

		// keep track of the already handled brands
		$handled_brands = array();

		// create a MW api class
		$mw = $this->getMobileWorksApi();

		// now handle each paragraph individually
		foreach ($open_articles as $open_article) {
			$log .= '<h2>Analysing Article <i>'.$open_article['Article']['title'].'</i></h2>';

			foreach($open_article['Paragraph'] as $paragraphData) {

				// load the paragraph with all associated data
				$this->Article->Paragraph->read(null, $paragraphData['id']);

				if(empty($this->Article->Paragraph->data['Brand'])) {
					continue; // no associated brand
				}

				foreach ($this->Article->Paragraph->data['Brand'] as $brandData) {
					// check if there is already an request for this brand
					if(in_array($brandData['id'], $handled_brands)) {
						continue;
					}

					$this->Article->Paragraph->Evaluation->create();
					$this->Article->Paragraph->Evaluation->save(array(
						'Evaluation'=>array(
							'brand_id' => $brandData['id'],
							'paragraph_id' => $this->Article->Paragraph->id,
							'question' => 'Is this article mainly about '.$brandData['name'].'?',
							'type'	   => 'articletopic'
						)));
					
					$log .= '<p>Creating new MobileWorks Task for question: '.
							'<a href="/evaluations/showTaskResource/'.$this->Article->Paragraph->Evaluation->id.'">'.
							'Is this article mainly about '.$brandData['name'].'?'.
							'</a></p>';
					$this->Article->Paragraph->Evaluation->pushTask($mw);

					// keep track of handled brands
					array_push($handled_brands,	$brandData['id']);
				}
			}

			// everything done for this article
			$this->Article->id = $open_article['Article']['id'];
			$this->Article->saveField('evaluated', 1);
		}
		

		// output log
		$this->set('log',$log);
	}



/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Article->recursive = 0;
		$this->set('articles', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Article->id = $id;
		if (!$this->Article->exists()) {
			throw new NotFoundException(__('Invalid article'));
		}
		$this->set('article', $this->Article->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Article->create();
			if ($this->Article->save($this->request->data)) {
				$this->Session->setFlash(__('The article has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The article could not be saved. Please, try again.'));
			}
		}
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->Article->id = $id;
		if (!$this->Article->exists()) {
			throw new NotFoundException(__('Invalid article'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Article->save($this->request->data)) {
				$this->Session->setFlash(__('The article has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The article could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Article->read(null, $id);
		}
	}

/**
 * delete method
 *
 * @throws MethodNotAllowedException
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->Article->id = $id;
		if (!$this->Article->exists()) {
			throw new NotFoundException(__('Invalid article'));
		}
		if ($this->Article->delete()) {
			$this->Session->setFlash(__('Article deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Article was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
