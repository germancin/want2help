<?php
App::uses('AppController', 'Controller');
/**
 * ProjectsUsers Controller
 *
 * @property ProjectsUser $ProjectsUser
 * @property PaginatorComponent $Paginator
 */
class ProjectsUsersController extends AppController {

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
		$this->ProjectsUser->recursive = 0;
		$this->set('projectsUsers', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->ProjectsUser->exists($id)) {
			throw new NotFoundException(__('Invalid projects user'));
		}
		$options = array('conditions' => array('ProjectsUser.' . $this->ProjectsUser->primaryKey => $id));
		$this->set('projectsUser', $this->ProjectsUser->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->ProjectsUser->create();
			if ($this->ProjectsUser->save($this->request->data)) {
				$this->Session->setFlash(__('The projects user has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The projects user could not be saved. Please, try again.'));
			}
		}
		$projects = $this->ProjectsUser->Project->find('list');
		$users = $this->ProjectsUser->User->find('list');
		$this->set(compact('projects', 'users'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->ProjectsUser->exists($id)) {
			throw new NotFoundException(__('Invalid projects user'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->ProjectsUser->save($this->request->data)) {
				$this->Session->setFlash(__('The projects user has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The projects user could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('ProjectsUser.' . $this->ProjectsUser->primaryKey => $id));
			$this->request->data = $this->ProjectsUser->find('first', $options);
		}
		$projects = $this->ProjectsUser->Project->find('list');
		$users = $this->ProjectsUser->User->find('list');
		$this->set(compact('projects', 'users'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->ProjectsUser->id = $id;
		if (!$this->ProjectsUser->exists()) {
			throw new NotFoundException(__('Invalid projects user'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->ProjectsUser->delete()) {
			$this->Session->setFlash(__('The projects user has been deleted.'));
		} else {
			$this->Session->setFlash(__('The projects user could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->ProjectsUser->recursive = 0;
		$this->set('projectsUsers', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->ProjectsUser->exists($id)) {
			throw new NotFoundException(__('Invalid projects user'));
		}
		$options = array('conditions' => array('ProjectsUser.' . $this->ProjectsUser->primaryKey => $id));
		$this->set('projectsUser', $this->ProjectsUser->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->ProjectsUser->create();
			if ($this->ProjectsUser->save($this->request->data)) {
				$this->Session->setFlash(__('The projects user has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The projects user could not be saved. Please, try again.'));
			}
		}
		$projects = $this->ProjectsUser->Project->find('list');
		$users = $this->ProjectsUser->User->find('list');
		$this->set(compact('projects', 'users'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->ProjectsUser->exists($id)) {
			throw new NotFoundException(__('Invalid projects user'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->ProjectsUser->save($this->request->data)) {
				$this->Session->setFlash(__('The projects user has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The projects user could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('ProjectsUser.' . $this->ProjectsUser->primaryKey => $id));
			$this->request->data = $this->ProjectsUser->find('first', $options);
		}
		$projects = $this->ProjectsUser->Project->find('list');
		$users = $this->ProjectsUser->User->find('list');
		$this->set(compact('projects', 'users'));
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->ProjectsUser->id = $id;
		if (!$this->ProjectsUser->exists()) {
			throw new NotFoundException(__('Invalid projects user'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->ProjectsUser->delete()) {
			$this->Session->setFlash(__('The projects user has been deleted.'));
		} else {
			$this->Session->setFlash(__('The projects user could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
