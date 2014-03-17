<?php
App::uses('AppController', 'Controller');
/**
 * BatchesUsers Controller
 *
 * @property BatchesUser $BatchesUser
 * @property PaginatorComponent $Paginator
 */
class BatchesUsersController extends AppController {

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
		$this->BatchesUser->recursive = 0;
		$this->set('batchesUsers', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->BatchesUser->exists($id)) {
			throw new NotFoundException(__('Invalid batches user'));
		}
		$options = array('conditions' => array('BatchesUser.' . $this->BatchesUser->primaryKey => $id));
		$this->set('batchesUser', $this->BatchesUser->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->BatchesUser->create();
			if ($this->BatchesUser->save($this->request->data)) {
				$this->Session->setFlash(__('The batches user has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The batches user could not be saved. Please, try again.'));
			}
		}
		$users = $this->BatchesUser->User->find('list');
		$batches = $this->BatchesUser->Batch->find('list');
		$this->set(compact('users', 'batches'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->BatchesUser->exists($id)) {
			throw new NotFoundException(__('Invalid batches user'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->BatchesUser->save($this->request->data)) {
				$this->Session->setFlash(__('The batches user has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The batches user could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('BatchesUser.' . $this->BatchesUser->primaryKey => $id));
			$this->request->data = $this->BatchesUser->find('first', $options);
		}
		$users = $this->BatchesUser->User->find('list');
		$batches = $this->BatchesUser->Batch->find('list');
		$this->set(compact('users', 'batches'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->BatchesUser->id = $id;
		if (!$this->BatchesUser->exists()) {
			throw new NotFoundException(__('Invalid batches user'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->BatchesUser->delete()) {
			$this->Session->setFlash(__('The batches user has been deleted.'));
		} else {
			$this->Session->setFlash(__('The batches user could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->BatchesUser->recursive = 0;
		$this->set('batchesUsers', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->BatchesUser->exists($id)) {
			throw new NotFoundException(__('Invalid batches user'));
		}
		$options = array('conditions' => array('BatchesUser.' . $this->BatchesUser->primaryKey => $id));
		$this->set('batchesUser', $this->BatchesUser->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->BatchesUser->create();
			if ($this->BatchesUser->save($this->request->data)) {
				$this->Session->setFlash(__('The batches user has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The batches user could not be saved. Please, try again.'));
			}
		}
		$users = $this->BatchesUser->User->find('list');
		$batches = $this->BatchesUser->Batch->find('list');
		$this->set(compact('users', 'batches'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->BatchesUser->exists($id)) {
			throw new NotFoundException(__('Invalid batches user'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->BatchesUser->save($this->request->data)) {
				$this->Session->setFlash(__('The batches user has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The batches user could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('BatchesUser.' . $this->BatchesUser->primaryKey => $id));
			$this->request->data = $this->BatchesUser->find('first', $options);
		}
		$users = $this->BatchesUser->User->find('list');
		$batches = $this->BatchesUser->Batch->find('list');
		$this->set(compact('users', 'batches'));
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->BatchesUser->id = $id;
		if (!$this->BatchesUser->exists()) {
			throw new NotFoundException(__('Invalid batches user'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->BatchesUser->delete()) {
			$this->Session->setFlash(__('The batches user has been deleted.'));
		} else {
			$this->Session->setFlash(__('The batches user could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
