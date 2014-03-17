<?php
App::uses('AppController', 'Controller');
/**
 * Needs Controller
 *
 * @property Need $Need
 * @property PaginatorComponent $Paginator
 */
class NeedsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Need->recursive = 0;
		$this->set('needs', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Need->exists($id)) {
			throw new NotFoundException(__('Invalid need'));
		}
		$options = array('conditions' => array('Need.' . $this->Need->primaryKey => $id));
		$this->set('need', $this->Need->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Need->create();
			if ($this->Need->save($this->request->data)) {
				$this->Session->setFlash(__('The need has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The need could not be saved. Please, try again.'));
			}
		}
		$projects = $this->Need->Project->find('list');
		$this->set(compact('projects'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Need->exists($id)) {
			throw new NotFoundException(__('Invalid need'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Need->save($this->request->data)) {
				$this->Session->setFlash(__('The need has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The need could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Need.' . $this->Need->primaryKey => $id));
			$this->request->data = $this->Need->find('first', $options);
		}
		$projects = $this->Need->Project->find('list');
		$this->set(compact('projects'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Need->id = $id;
		if (!$this->Need->exists()) {
			throw new NotFoundException(__('Invalid need'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Need->delete()) {
			$this->Session->setFlash(__('The need has been deleted.'));
		} else {
			$this->Session->setFlash(__('The need could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Need->recursive = 0;
		$this->set('needs', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Need->exists($id)) {
			throw new NotFoundException(__('Invalid need'));
		}
		$options = array('conditions' => array('Need.' . $this->Need->primaryKey => $id));
		$this->set('need', $this->Need->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Need->create();
			if ($this->Need->save($this->request->data)) {
				$this->Session->setFlash(__('The need has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The need could not be saved. Please, try again.'));
			}
		}
		$projects = $this->Need->Project->find('list');
		$this->set(compact('projects'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->Need->exists($id)) {
			throw new NotFoundException(__('Invalid need'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Need->save($this->request->data)) {
				$this->Session->setFlash(__('The need has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The need could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Need.' . $this->Need->primaryKey => $id));
			$this->request->data = $this->Need->find('first', $options);
		}
		$projects = $this->Need->Project->find('list');
		$this->set(compact('projects'));
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->Need->id = $id;
		if (!$this->Need->exists()) {
			throw new NotFoundException(__('Invalid need'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Need->delete()) {
			$this->Session->setFlash(__('The need has been deleted.'));
		} else {
			$this->Session->setFlash(__('The need could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
