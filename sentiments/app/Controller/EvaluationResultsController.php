<?php
App::uses('AppController', 'Controller');
/**
 * EvaluationResults Controller
 *
 * @property EvaluationResult $EvaluationResult
 */
class EvaluationResultsController extends AppController {



	public function getOverviewforAllBrands() {
		$data = $this->EvaluationResult->query("
		SELECT b.name brand, SUM(r.result) rating FROM tblevaluations e, tblevaluation_results r, tblbrands b 
			WHERE 
				r.evaluation_id = e.id AND
				e.brand_id = b.id 
				GROUP BY b.name
				ORDER by rating DESC");
			
			$result = array();
			foreach($data as $item) {
				array_push($result, array("brand" => $item['b']['brand'], "rating" => $item['0']['rating']));
			}
			
			$this->set('data', $result);
			$this->render('/Evaluations/Json/index');
	}
	
	
		public function getOverviewforAllBrandsDiagram() {
		$data = $this->EvaluationResult->query("
		SELECT b.name brand, SUM(r.result) rating FROM tblevaluations e, tblevaluation_results r, tblbrands b 
			WHERE 
				r.evaluation_id = e.id AND
				e.brand_id = b.id 
				GROUP BY b.name
				ORDER by rating DESC");
			
			
			
			$result = "[";
			foreach($data as $item) {
				$result = $result."{name:'".$item['b']['brand']."',data: [".$item['0']['rating']."]},";
			}
			$result = $result."]";
			
			$this->set('data', $result);
			$this->set('title', "'Sentiment of all Brands'");
			$this->render('/EvaluationResults/rankingdiagram');
			
	}
	
	public function getResultsforOneBrand($brand) {
		$data = $this->EvaluationResult->query("
		SELECT r.result rating, b.name FROM tblevaluations e, tblevaluation_results r, tblbrands b 
			WHERE 
				r.evaluation_id = e.id AND
				e.brand_id = b.id AND
				b.id=".$brand." 
				ORDER by rating DESC");
				
				
						
			$result = array();
			$counter = 0;
			$name = "";
			foreach($data as $item) {
				array_push($result, array("rating" => $item['r']['rating']));
				$name = $item['b']['name'];
				$counter++;
			}
			
			$result_1=array("brand" => $name, "rating" =>$result);
			
			$this->set('data', $result_1);
			$this->render('/Evaluations/Json/index');

	}
	
	public function getHotBrands($number = 3) {
		$data = $this->EvaluationResult->query("
		SELECT b.name brand, COUNT(r.result) rating FROM tblevaluations e, tblevaluation_results r, tblbrands b 
			WHERE 
				r.evaluation_id = e.id AND
				e.brand_id = b.id 
				GROUP BY b.name
				ORDER by rating DESC
				LIMIT ".$number);
				
				
						
			$result = array();
			foreach($data as $item) {
				array_push($result, array("brand" => $item['b']['brand'], "rating" => $item['0']['rating']));
			}
			
			$this->set('data', $result);
			$this->render('/Evaluations/Json/index');
	}
	
	public function getHotBrandsDiagram($number = 3) {
		$data = $this->EvaluationResult->query("
		SELECT b.name brand, COUNT(r.result) rating FROM tblevaluations e, tblevaluation_results r, tblbrands b 
			WHERE 
				r.evaluation_id = e.id AND
				e.brand_id = b.id 
				GROUP BY b.name
				ORDER by rating DESC
				LIMIT ".$number);
			
			
			
			$result = "[";
			foreach($data as $item) {
				$result = $result."{name:'".$item['b']['brand']."',data: [".$item['0']['rating']."]},";
			}
			$result = $result."]";
			
			$this->set('data', $result);
			$this->set('title', "'Hot Brands'");
			$this->render('/EvaluationResults/rankingdiagram');
			
	}
	
	public function getHotCompanies($number = 3) {
				$data = $this->EvaluationResult->query("
		SELECT c.name company, COUNT(r.result) rating FROM tblevaluations e, tblevaluation_results r, tblbrands b, tblcompanies c 
			WHERE 
				r.evaluation_id = e.id AND
				e.brand_id = b.id AND
				b.company_id=c.id 
				GROUP BY c.name
				ORDER by rating DESC
				LIMIT ".$number);
				
			$result = array();
			foreach($data as $item) {
				array_push($result, array("company" => $item['c']['company'], "rating" => $item['0']['rating']));
			}
			
			$this->set('data', $result);
			$this->render('/Evaluations/Json/index');
	
	}
	
		public function getHotCompaniesDiagram($number = 3) {
				$data = $this->EvaluationResult->query("
		SELECT c.name company, COUNT(r.result) rating FROM tblevaluations e, tblevaluation_results r, tblbrands b, tblcompanies c 
			WHERE 
				r.evaluation_id = e.id AND
				e.brand_id = b.id AND
				b.company_id=c.id 
				GROUP BY c.name
				ORDER by rating DESC
				LIMIT ".$number);
			
			
			
			$result = "[";
			foreach($data as $item) {
				$result = $result."{name:'".$item['c']['company']."',data: [".$item['0']['rating']."]},";
			}
			$result = $result."]";
			
			$this->set('data', $result);
			$this->set('title', "'Hot Companies'");
			$this->render('/EvaluationResults/rankingdiagram');
			
	}
	
	


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
		
 //		return json_encode($data);
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
