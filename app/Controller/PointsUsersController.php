<?php
App::uses('AppController', 'Controller');
/**
 * PointsUsers Controller
 *
 * @property PointsUser $PointsUser
 * @property PaginatorComponent $Paginator
 */
class PointsUsersController extends AppController {

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
		$this->PointsUser->recursive = 0;
		$this->set('pointsUsers', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->PointsUser->exists($id)) {
			throw new NotFoundException(__('Invalid points user'));
		}
		$options = array('conditions' => array('PointsUser.' . $this->PointsUser->primaryKey => $id));
		$this->set('pointsUser', $this->PointsUser->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->PointsUser->create();
			if ($this->PointsUser->save($this->request->data)) {
				$this->Session->setFlash(__('The points user has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The points user could not be saved. Please, try again.'));
			}
		}
		$users = $this->PointsUser->User->find('list');
		$points = $this->PointsUser->Point->find('list');
		$this->set(compact('users', 'points'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->PointsUser->exists($id)) {
			throw new NotFoundException(__('Invalid points user'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->PointsUser->save($this->request->data)) {
				$this->Session->setFlash(__('The points user has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The points user could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('PointsUser.' . $this->PointsUser->primaryKey => $id));
			$this->request->data = $this->PointsUser->find('first', $options);
		}
		$users = $this->PointsUser->User->find('list');
		$points = $this->PointsUser->Point->find('list');
		$this->set(compact('users', 'points'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->PointsUser->id = $id;
		if (!$this->PointsUser->exists()) {
			throw new NotFoundException(__('Invalid points user'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->PointsUser->delete()) {
			$this->Session->setFlash(__('The points user has been deleted.'));
		} else {
			$this->Session->setFlash(__('The points user could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->PointsUser->recursive = 0;
		$this->set('pointsUsers', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->PointsUser->exists($id)) {
			throw new NotFoundException(__('Invalid points user'));
		}
		$options = array('conditions' => array('PointsUser.' . $this->PointsUser->primaryKey => $id));
		$this->set('pointsUser', $this->PointsUser->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->PointsUser->create();
			if ($this->PointsUser->save($this->request->data)) {
				$this->Session->setFlash(__('The points user has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The points user could not be saved. Please, try again.'));
			}
		}
		$users = $this->PointsUser->User->find('list');
		$points = $this->PointsUser->Point->find('list');
		$this->set(compact('users', 'points'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->PointsUser->exists($id)) {
			throw new NotFoundException(__('Invalid points user'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->PointsUser->save($this->request->data)) {
				$this->Session->setFlash(__('The points user has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The points user could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('PointsUser.' . $this->PointsUser->primaryKey => $id));
			$this->request->data = $this->PointsUser->find('first', $options);
		}
		$users = $this->PointsUser->User->find('list');
		$points = $this->PointsUser->Point->find('list');
		$this->set(compact('users', 'points'));
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->PointsUser->id = $id;
		if (!$this->PointsUser->exists()) {
			throw new NotFoundException(__('Invalid points user'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->PointsUser->delete()) {
			$this->Session->setFlash(__('The points user has been deleted.'));
		} else {
			$this->Session->setFlash(__('The points user could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
