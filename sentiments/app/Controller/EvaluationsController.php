<?php
App::uses('AppController', 'Controller');
/**
 * Evaluations Controller
 *
 * @property Evaluation $Evaluation
 */
class EvaluationsController extends AppController {

/**
 * MobileWorks doesn't allow direct sending of the evaluatable 
 * content, instead we must provide it as a url. So here it is!
 * 
 * @param  Integer $id Evaluation id
 * @return void
 */
	public function showTaskResource($id=null) {
		$this->Evaluation->id = $id;
		if (!$this->Evaluation->exists()) {
			throw new NotFoundException(__('Invalid evaluation'));
		}

		$this->Evaluation->recursive = 2; // also load the article record
		$this->set('evaluation', $this->Evaluation->read(null, $id));

		$this->layout = 'plain';
	}


/**
 * This is triggered by MobileWorks when we have results
 */
	public function returnstepone($id) {
		$result = json_decode(file_get_contents ('php://input'), true);
		$rating=0;
		foreach($result['tasks'] as $tasks) {
			$taskid= $tasks['taskid'];
			foreach($tasks['answer']['0'] as $results) {
				if ($results['0']=="Yes") {
					$rating += 1;
				}
				if ($results['0']=="No") {
					$rating -= 1;
				}
		
			}
		}
		if ($rating>0) {
			$rating = 1;
		} else {
			$rating = 0;
		}
 		
		$this->Evaluation->id = $id;

		$this->Evaluation->read(null,$id);
		$this->Evaluation->data['Evaluation']['rating'] = $rating;
		$this->Evaluation->saveAll($this->Evaluation->data);
		continueEvaluation($taskid);
		
		$this->redirect(array('action' => 'index'));
	}


	public function continueEvaluation($taskid) {
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
			$log .= '<h4>Analysing Article <i>'.$open_article['Article']['title'].'</i></h4>';

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
						'type'	   => '0' //articleTopic = 0
					)));
					
					$log .= '<p>Creating new MobileWorks Task for question: '.'<a href="/evaluations/showTaskResource/'.$this->Article->Paragraph->Evaluation->id.'">' . 'Is this article mainly about '.$brandData['name'].'?'.'</a></p>';


					$this->Article->Paragraph->Evaluation->pushTask($mw, 3, 's');
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


	public function returnsteptwo($id) {
		$result = json_decode(file_get_contents ('php://input'), true);
		$rating=0;
		foreach($result['tasks'] as $tasks) {
			print($tasks['taskid']);
			foreach($tasks['answer']['0'] as $results) {
				if ($results['0']=="Yes") {
					$rating += 1;
				}
				if ($results['0']=="No") {
					$rating -= 1;
				}
		
			}
		}
		if ($rating>0) {
			$rating = 1;
		} else {
			$rating = 0;
		}
 		
		$this->Evaluation->id = $id;

		$this->Evaluation->read(null,$id);
		$this->Evaluation->data['Evaluation']['rating'] = $rating;

		$this->Evaluation->saveAll($this->Evaluation->data);


/*
		$this->Evaluation->EvaluationResult->create();
		$this->Evaluation->EvaluationResult->set('evaluation_id', $this->Evaluation->id);
		$this->Evaluation->EvaluationResult->set('taskid', file_get_contents ('php://input'));
		$this->Evaluation->EvaluationResult->save();
*/
		
		return;

		if (!$this->Evaluation->exists()) {
			throw new NotFoundException(__('Invalid evaluation'));
		}
		
		$this->Evaluation->read(null,$id);
		$url = $this->Evaluation->data['Evaluation']['task_url'];

		// workaround because https does not work
		$url = 'http://'.substr($url, 8);

		$mw = $this->getMobileWorksApi();
		$p = $mw->retrieve($url);


		if($p['status'] == 'd' || $p['status'] == 'done'){
			// that means that all tasks were answered.
		
			foreach($p['tasks'] as $task){
				if(!empty($task['answer'])){
					foreach($task['answer'] as $ans){

						$temp = $this->Evaluation->EvaluationResult->find('list', array('conditions' => array('taskid' => $task['taskid'])));
						if (!empty($temp)){
							continue;
						}
						
						$this->Evaluation->EvaluationResult->create();
						$this->Evaluation->EvaluationResult->set('evaluation_id', $this->Evaluation->id);
						$this->Evaluation->EvaluationResult->set('taskid', $task['taskid']);
						
						
						if($ans['result'] == 'yes' || $ans['result'] == 'Yes'){
							$this->Evaluation->EvaluationResult->set('result', 1);
						}else if($ans['result'] == 'no' || $ans['result'] == 'No') {
							$this->Evaluation->EvaluationResult->set('result', 0);
						}else if(is_int($ans['result'])){
							$this->Evaluation->EvaluationResult->set('result', $ans['result']);
						} else {
							throw new Exception('Invalid Result');
						}
						$this->Evaluation->EvaluationResult->save();
					}
				}
			}
			$this->Evaluation->saveAll($this->Evaluation->data);
		}
		$this->redirect(array('action' => 'index'));
	}

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Evaluation->recursive = 0;
		$this->set('evaluations', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Evaluation->id = $id;
		if (!$this->Evaluation->exists()) {
			throw new NotFoundException(__('Invalid evaluation'));
		}
		$this->set('evaluation', $this->Evaluation->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Evaluation->create();
			if ($this->Evaluation->save($this->request->data)) {
				$this->Session->setFlash(__('The evaluation has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The evaluation could not be saved. Please, try again.'));
			}
		}
		$paragraphs = $this->Evaluation->Paragraph->find('list');
		$brands = $this->Evaluation->Brand->find('list');
		$this->set(compact('paragraphs', 'brands'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->Evaluation->id = $id;
		if (!$this->Evaluation->exists()) {
			throw new NotFoundException(__('Invalid evaluation'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Evaluation->save($this->request->data)) {
				$this->Session->setFlash(__('The evaluation has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The evaluation could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Evaluation->read(null, $id);
		}
		$paragraphs = $this->Evaluation->Paragraph->find('list');
		$brands = $this->Evaluation->Brand->find('list');
		$this->set(compact('paragraphs', 'brands'));
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
		$this->Evaluation->id = $id;
		if (!$this->Evaluation->exists()) {
			throw new NotFoundException(__('Invalid evaluation'));
		}
		if ($this->Evaluation->delete()) {
			$this->Session->setFlash(__('Evaluation deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Evaluation was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
