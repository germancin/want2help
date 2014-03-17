<?php
App::uses('AppController', 'Controller');
/**
 * UsersProfiles Controller
 *
 * @property UsersProfile $UsersProfile
 * @property PaginatorComponent $Paginator
 */
class UsersProfilesController extends AppController {

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
		$this->UsersProfile->recursive = 0;
		$this->set('usersProfiles', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->UsersProfile->exists($id)) {
			throw new NotFoundException(__('Invalid users profile'));
		}
		$options = array('conditions' => array('UsersProfile.' . $this->UsersProfile->primaryKey => $id));
		$this->set('usersProfile', $this->UsersProfile->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->UsersProfile->create();
			if ($this->UsersProfile->save($this->request->data)) {
				$this->Session->setFlash(__('The users profile has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The users profile could not be saved. Please, try again.'));
			}
		}
		$users = $this->UsersProfile->User->find('list');
		$this->set(compact('users'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->UsersProfile->exists($id)) {
			throw new NotFoundException(__('Invalid users profile'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->UsersProfile->save($this->request->data)) {
				$this->Session->setFlash(__('The users profile has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The users profile could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('UsersProfile.' . $this->UsersProfile->primaryKey => $id));
			$this->request->data = $this->UsersProfile->find('first', $options);
		}
		$users = $this->UsersProfile->User->find('list');
		$this->set(compact('users'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->UsersProfile->id = $id;
		if (!$this->UsersProfile->exists()) {
			throw new NotFoundException(__('Invalid users profile'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->UsersProfile->delete()) {
			$this->Session->setFlash(__('The users profile has been deleted.'));
		} else {
			$this->Session->setFlash(__('The users profile could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->UsersProfile->recursive = 0;
		$this->set('usersProfiles', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->UsersProfile->exists($id)) {
			throw new NotFoundException(__('Invalid users profile'));
		}
		$options = array('conditions' => array('UsersProfile.' . $this->UsersProfile->primaryKey => $id));
		$this->set('usersProfile', $this->UsersProfile->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->UsersProfile->create();
			if ($this->UsersProfile->save($this->request->data)) {
				$this->Session->setFlash(__('The users profile has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The users profile could not be saved. Please, try again.'));
			}
		}
		$users = $this->UsersProfile->User->find('list');
		$this->set(compact('users'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->UsersProfile->exists($id)) {
			throw new NotFoundException(__('Invalid users profile'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->UsersProfile->save($this->request->data)) {
				$this->Session->setFlash(__('The users profile has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The users profile could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('UsersProfile.' . $this->UsersProfile->primaryKey => $id));
			$this->request->data = $this->UsersProfile->find('first', $options);
		}
		$users = $this->UsersProfile->User->find('list');
		$this->set(compact('users'));
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->UsersProfile->id = $id;
		if (!$this->UsersProfile->exists()) {
			throw new NotFoundException(__('Invalid users profile'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->UsersProfile->delete()) {
			$this->Session->setFlash(__('The users profile has been deleted.'));
		} else {
			$this->Session->setFlash(__('The users profile could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
