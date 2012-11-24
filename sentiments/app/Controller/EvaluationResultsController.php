<?php
App::uses('AppController', 'Controller');
/**
 * EvaluationResults Controller
 *
 * @property EvaluationResult $EvaluationResult
 */
class EvaluationResultsController extends AppController {

	public function getAllResults($evaluationId = null) {
		$this->EvaluationResult->recursive=0;
		if(is_null($evaluationId)) {
			$data = $this->EvaluationResult->find('all');
		} else {
			$data = $this->EvaluationResult->find('all', 
					array('conditions' => 
							array('evaluation_id' => $evaluationId)));
		}
		

		$this->set('data', $data);
		$this->render('/Evaluations/Json/index');
		
// 		return json_encode($data);
	}
	
	public function getResultsByTaskId($taskid) {
		$data = $this->EvaluationResult->find('all',
				array('conditions' =>
						array('taskid' => $taskid)));
		if (empty($data)) {
			throw new NotFoundException(__('Invalid evaluation result'));
		}
		$this->set('data', $data);
		$this->render('/Evaluations/Json/index');
// 		$this->render('Layouts/default');
	}	
/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->EvaluationResult->recursive = 0;
		$this->set('evaluationResults', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->EvaluationResult->id = $id;
		if (!$this->EvaluationResult->exists()) {
			throw new NotFoundException(__('Invalid evaluation result'));
		}
		$this->set('evaluationResult', $this->EvaluationResult->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->EvaluationResult->create();
			if ($this->EvaluationResult->save($this->request->data)) {
				$this->Session->setFlash(__('The evaluation result has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The evaluation result could not be saved. Please, try again.'));
			}
		}
		$evaluations = $this->EvaluationResult->Evaluation->find('list');
		$this->set(compact('evaluations'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->EvaluationResult->id = $id;
		if (!$this->EvaluationResult->exists()) {
			throw new NotFoundException(__('Invalid evaluation result'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->EvaluationResult->save($this->request->data)) {
				$this->Session->setFlash(__('The evaluation result has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The evaluation result could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->EvaluationResult->read(null, $id);
		}
		$evaluations = $this->EvaluationResult->Evaluation->find('list');
		$this->set(compact('evaluations'));
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
		$this->EvaluationResult->id = $id;
		if (!$this->EvaluationResult->exists()) {
			throw new NotFoundException(__('Invalid evaluation result'));
		}
		if ($this->EvaluationResult->delete()) {
			$this->Session->setFlash(__('Evaluation result deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Evaluation result was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
