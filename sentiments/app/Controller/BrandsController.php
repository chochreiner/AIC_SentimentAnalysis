<?php
App::uses('AppController', 'Controller');
/**
 * Brands Controller
 *
 * @property Brand $Brand
 */
class BrandsController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Brand->recursive = 0;
		$this->set('brands', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Brand->id = $id;
		if (!$this->Brand->exists()) {
			throw new NotFoundException(__('Invalid brand'));
		}
		$this->set('brand', $this->Brand->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Brand->create();
			if ($this->Brand->save($this->request->data)) {
				$this->Session->setFlash(__('The brand has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The brand could not be saved. Please, try again.'));
			}
		}
		$companies = $this->Brand->Company->find('list');
		$this->set(compact('companies'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->Brand->id = $id;
		if (!$this->Brand->exists()) {
			throw new NotFoundException(__('Invalid brand'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Brand->save($this->request->data)) {
				$this->Session->setFlash(__('The brand has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The brand could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Brand->read(null, $id);
		}
		$companies = $this->Brand->Company->find('list');
		$this->set(compact('companies'));
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
		$this->Brand->id = $id;
		if (!$this->Brand->exists()) {
			throw new NotFoundException(__('Invalid brand'));
		}
		if ($this->Brand->delete()) {
			$this->Session->setFlash(__('Brand deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Brand was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
