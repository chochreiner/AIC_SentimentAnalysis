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

				if($this->Article->guidExists($articleMeta['guid'])) {
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
