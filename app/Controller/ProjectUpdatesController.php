<?php
App::uses('AppController', 'Controller');
/**
 * ProjectUpdates Controller
 *
 * @property ProjectUpdate $ProjectUpdate
 * @property PaginatorComponent $Paginator
 */
class ProjectUpdatesController extends AppController {

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
		$this->ProjectUpdate->recursive = 0;
		$this->set('projectUpdates', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->ProjectUpdate->exists($id)) {
			throw new NotFoundException(__('Invalid project update'));
		}
		$options = array('conditions' => array('ProjectUpdate.' . $this->ProjectUpdate->primaryKey => $id));
		$this->set('projectUpdate', $this->ProjectUpdate->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->ProjectUpdate->create();
			if ($this->ProjectUpdate->save($this->request->data)) {
				$this->Session->setFlash(__('The project update has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The project update could not be saved. Please, try again.'));
			}
		}
		$projects = $this->ProjectUpdate->Project->find('list');
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
		if (!$this->ProjectUpdate->exists($id)) {
			throw new NotFoundException(__('Invalid project update'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->ProjectUpdate->save($this->request->data)) {
				$this->Session->setFlash(__('The project update has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The project update could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('ProjectUpdate.' . $this->ProjectUpdate->primaryKey => $id));
			$this->request->data = $this->ProjectUpdate->find('first', $options);
		}
		$projects = $this->ProjectUpdate->Project->find('list');
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
		$this->ProjectUpdate->id = $id;
		if (!$this->ProjectUpdate->exists()) {
			throw new NotFoundException(__('Invalid project update'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->ProjectUpdate->delete()) {
			$this->Session->setFlash(__('The project update has been deleted.'));
		} else {
			$this->Session->setFlash(__('The project update could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->ProjectUpdate->recursive = 0;
		$this->set('projectUpdates', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->ProjectUpdate->exists($id)) {
			throw new NotFoundException(__('Invalid project update'));
		}
		$options = array('conditions' => array('ProjectUpdate.' . $this->ProjectUpdate->primaryKey => $id));
		$this->set('projectUpdate', $this->ProjectUpdate->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->ProjectUpdate->create();
			if ($this->ProjectUpdate->save($this->request->data)) {
				$this->Session->setFlash(__('The project update has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The project update could not be saved. Please, try again.'));
			}
		}
		$projects = $this->ProjectUpdate->Project->find('list');
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
		if (!$this->ProjectUpdate->exists($id)) {
			throw new NotFoundException(__('Invalid project update'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->ProjectUpdate->save($this->request->data)) {
				$this->Session->setFlash(__('The project update has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The project update could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('ProjectUpdate.' . $this->ProjectUpdate->primaryKey => $id));
			$this->request->data = $this->ProjectUpdate->find('first', $options);
		}
		$projects = $this->ProjectUpdate->Project->find('list');
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
		$this->ProjectUpdate->id = $id;
		if (!$this->ProjectUpdate->exists()) {
			throw new NotFoundException(__('Invalid project update'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->ProjectUpdate->delete()) {
			$this->Session->setFlash(__('The project update has been deleted.'));
		} else {
			$this->Session->setFlash(__('The project update could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
