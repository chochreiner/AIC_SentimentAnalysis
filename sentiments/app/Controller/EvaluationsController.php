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
	public function returnResult($id) {
		// @todo implement this, see also the model Evaluation::pushTask

		$this->Evaluation->id = $id;

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
