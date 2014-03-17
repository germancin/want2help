<?php
App::uses('AppController', 'Controller');
/**
 * ProjectsNeeds Controller
 *
 * @property ProjectsNeed $ProjectsNeed
 * @property PaginatorComponent $Paginator
 */
class ProjectsNeedsController extends AppController {

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
		$this->ProjectsNeed->recursive = 0;
		$this->set('projectsNeeds', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->ProjectsNeed->exists($id)) {
			throw new NotFoundException(__('Invalid projects need'));
		}
		$options = array('conditions' => array('ProjectsNeed.' . $this->ProjectsNeed->primaryKey => $id));
		$this->set('projectsNeed', $this->ProjectsNeed->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->ProjectsNeed->create();
			if ($this->ProjectsNeed->save($this->request->data)) {
				$this->Session->setFlash(__('The projects need has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The projects need could not be saved. Please, try again.'));
			}
		}
		$projects = $this->ProjectsNeed->Project->find('list');
		$needs = $this->ProjectsNeed->Need->find('list');
		$this->set(compact('projects', 'needs'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->ProjectsNeed->exists($id)) {
			throw new NotFoundException(__('Invalid projects need'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->ProjectsNeed->save($this->request->data)) {
				$this->Session->setFlash(__('The projects need has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The projects need could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('ProjectsNeed.' . $this->ProjectsNeed->primaryKey => $id));
			$this->request->data = $this->ProjectsNeed->find('first', $options);
		}
		$projects = $this->ProjectsNeed->Project->find('list');
		$needs = $this->ProjectsNeed->Need->find('list');
		$this->set(compact('projects', 'needs'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->ProjectsNeed->id = $id;
		if (!$this->ProjectsNeed->exists()) {
			throw new NotFoundException(__('Invalid projects need'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->ProjectsNeed->delete()) {
			$this->Session->setFlash(__('The projects need has been deleted.'));
		} else {
			$this->Session->setFlash(__('The projects need could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->ProjectsNeed->recursive = 0;
		$this->set('projectsNeeds', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->ProjectsNeed->exists($id)) {
			throw new NotFoundException(__('Invalid projects need'));
		}
		$options = array('conditions' => array('ProjectsNeed.' . $this->ProjectsNeed->primaryKey => $id));
		$this->set('projectsNeed', $this->ProjectsNeed->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->ProjectsNeed->create();
			if ($this->ProjectsNeed->save($this->request->data)) {
				$this->Session->setFlash(__('The projects need has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The projects need could not be saved. Please, try again.'));
			}
		}
		$projects = $this->ProjectsNeed->Project->find('list');
		$needs = $this->ProjectsNeed->Need->find('list');
		$this->set(compact('projects', 'needs'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->ProjectsNeed->exists($id)) {
			throw new NotFoundException(__('Invalid projects need'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->ProjectsNeed->save($this->request->data)) {
				$this->Session->setFlash(__('The projects need has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The projects need could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('ProjectsNeed.' . $this->ProjectsNeed->primaryKey => $id));
			$this->request->data = $this->ProjectsNeed->find('first', $options);
		}
		$projects = $this->ProjectsNeed->Project->find('list');
		$needs = $this->ProjectsNeed->Need->find('list');
		$this->set(compact('projects', 'needs'));
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->ProjectsNeed->id = $id;
		if (!$this->ProjectsNeed->exists()) {
			throw new NotFoundException(__('Invalid projects need'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->ProjectsNeed->delete()) {
			$this->Session->setFlash(__('The projects need has been deleted.'));
		} else {
			$this->Session->setFlash(__('The projects need could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
