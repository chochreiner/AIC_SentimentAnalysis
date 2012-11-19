<?php
App::uses('AppController', 'Controller');
/**
 * Paragraphs Controller
 *
 * @property Paragraph $Paragraph
 */
class ParagraphsController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Paragraph->recursive = 0;
		$this->set('paragraphs', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Paragraph->id = $id;
		if (!$this->Paragraph->exists()) {
			throw new NotFoundException(__('Invalid paragraph'));
		}
		$this->set('paragraph', $this->Paragraph->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Paragraph->create();
			if ($this->Paragraph->save($this->request->data)) {
				$this->Session->setFlash(__('The paragraph has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The paragraph could not be saved. Please, try again.'));
			}
		}
		$articles = $this->Paragraph->Article->find('list');
		$this->set(compact('articles'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->Paragraph->id = $id;
		if (!$this->Paragraph->exists()) {
			throw new NotFoundException(__('Invalid paragraph'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Paragraph->save($this->request->data)) {
				$this->Session->setFlash(__('The paragraph has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The paragraph could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Paragraph->read(null, $id);
		}
		$articles = $this->Paragraph->Article->find('list');
		$this->set(compact('articles'));
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
		$this->Paragraph->id = $id;
		if (!$this->Paragraph->exists()) {
			throw new NotFoundException(__('Invalid paragraph'));
		}
		if ($this->Paragraph->delete()) {
			$this->Session->setFlash(__('Paragraph deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Paragraph was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
