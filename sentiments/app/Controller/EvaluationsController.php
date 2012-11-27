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
		$this->continueEvaluation($taskid, $rating);
		
		$this->redirect(array('action' => 'index'));
	}


	public function continueEvaluation($taskid, $rating) {
		$taskid="13104-9219";
		$rating="1";
	
		if ($rating=="0") {
			$this->partlyArticle($taskid);
		} else {
			$this->mainlyArticle($taskid);
		}
	}
	
	private function partlyArticle($taskid) {
		$paragraph_id_query = $this->Evaluation->query("SELECT paragraph_id, brand_id FROM tblevaluations WHERE task_id =\"".$taskid."\"");
		
		$article_id_query = $this->Evaluation->query("SELECT article_id FROM tblparagraphs WHERE id =".$paragraph_id_query['0']['tblevaluations']['paragraph_id']);
		$brand_name_query = $this->Evaluation->query("SELECT search_names, name FROM tblbrands WHERE id =".$paragraph_id_query['0']['tblevaluations']['brand_id']);


		$paragraph_query = $this->Evaluation->query("SELECT * FROM tblparagraphs WHERE article_id =".$article_id_query['0']['tblparagraphs']['article_id']);

		$resultTask = array();
		foreach($paragraph_query as $paragraph) {
			foreach(explode(",", $brand_name_query['0']['tblbrands']['search_names']) as $searchstring) {
				if (strpos(strtolower($paragraph['tblparagraphs']['text']), $searchstring) != false) {
					array_push($resultTask, $paragraph['tblparagraphs']['id']);
					break;
				}
			}			
		}		
		
		$mw = $this->getMobileWorksApi();
		foreach($resultTask as $task) {
			$this->Evaluation->create();
			$this->Evaluation->save(array(
				'Evaluation'=>array(
				'brand_id' => $paragraph_id_query['0']['tblevaluations']['brand_id'],
				'paragraph_id' => $task,
				'question' => 'How do you feel about the brand '.$brand_name_query['0']['tblbrands']['name'].'?',
				'type'	   => '1' //paragraphTopic = 0
			)));
			$this->Evaluation->pushTask($mw, 3, 'm');
		}
	}
	
	
	private function mainlyArticle($taskid) {
		$paragraph_id_query = $this->Evaluation->query("SELECT paragraph_id, brand_id FROM tblevaluations WHERE task_id =\"".$taskid."\"");
		
		$article_id_query = $this->Evaluation->query("SELECT article_id FROM tblparagraphs WHERE id =".$paragraph_id_query['0']['tblevaluations']['paragraph_id']);
		$brand_name_query = $this->Evaluation->query("SELECT search_names, name FROM tblbrands WHERE id =".$paragraph_id_query['0']['tblevaluations']['brand_id']);


		$paragraph_query = $this->Evaluation->query("SELECT * FROM tblparagraphs WHERE article_id =".$article_id_query['0']['tblparagraphs']['article_id']);

		$resultTaskEven = array();
		$resultTaskOdd = array();
		foreach($paragraph_query as $paragraph) {
			if (($paragraph['tblparagraphs']['position'] % 2) === 0) {
				array_push($resultTaskEven, $paragraph['tblparagraphs']['id']);
			} else {
				array_push($resultTaskOdd, $paragraph['tblparagraphs']['id']);
			}		
		}		
		
		$mw = $this->getMobileWorksApi();
		foreach($resultTaskEven as $task) {
			$this->Evaluation->create();
			$this->Evaluation->save(array(
				'Evaluation'=>array(
				'brand_id' => $paragraph_id_query['0']['tblevaluations']['brand_id'],
				'paragraph_id' => $task,
				'question' => 'How do you feel about the brand '.$brand_name_query['0']['tblbrands']['name'].'?',
				'type'	   => '1' //paragraphTopic = 0
			)));
			$this->Evaluation->pushTask($mw, 3, 'm');
		}	
		
		foreach($resultTaskOdd as $task) {
			$this->Evaluation->create();
			$this->Evaluation->save(array(
				'Evaluation'=>array(
				'brand_id' => $paragraph_id_query['0']['tblevaluations']['brand_id'],
				'paragraph_id' => $task,
				'question' => 'How do you feel about the brand '.$brand_name_query['0']['tblbrands']['name'].'?',
				'type'	   => '1' //paragraphTopic = 0
			)));
			$this->Evaluation->pushTask($mw, 3, 'm');
		}	
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
