<?php
App::uses('AppController', 'Controller');
/**
 * ProjectsSubcategories Controller
 *
 * @property ProjectsSubcategory $ProjectsSubcategory
 * @property PaginatorComponent $Paginator
 */
class ProjectsSubcategoriesController extends AppController {

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
		$this->ProjectsSubcategory->recursive = 0;
		$this->set('projectsSubcategories', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->ProjectsSubcategory->exists($id)) {
			throw new NotFoundException(__('Invalid projects subcategory'));
		}
		$options = array('conditions' => array('ProjectsSubcategory.' . $this->ProjectsSubcategory->primaryKey => $id));
		$this->set('projectsSubcategory', $this->ProjectsSubcategory->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->ProjectsSubcategory->create();
			if ($this->ProjectsSubcategory->save($this->request->data)) {
				$this->Session->setFlash(__('The projects subcategory has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The projects subcategory could not be saved. Please, try again.'));
			}
		}
		$subcategories = $this->ProjectsSubcategory->Subcategory->find('list');
		$projects = $this->ProjectsSubcategory->Project->find('list');
		$this->set(compact('subcategories', 'projects'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->ProjectsSubcategory->exists($id)) {
			throw new NotFoundException(__('Invalid projects subcategory'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->ProjectsSubcategory->save($this->request->data)) {
				$this->Session->setFlash(__('The projects subcategory has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The projects subcategory could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('ProjectsSubcategory.' . $this->ProjectsSubcategory->primaryKey => $id));
			$this->request->data = $this->ProjectsSubcategory->find('first', $options);
		}
		$subcategories = $this->ProjectsSubcategory->Subcategory->find('list');
		$projects = $this->ProjectsSubcategory->Project->find('list');
		$this->set(compact('subcategories', 'projects'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->ProjectsSubcategory->id = $id;
		if (!$this->ProjectsSubcategory->exists()) {
			throw new NotFoundException(__('Invalid projects subcategory'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->ProjectsSubcategory->delete()) {
			$this->Session->setFlash(__('The projects subcategory has been deleted.'));
		} else {
			$this->Session->setFlash(__('The projects subcategory could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->ProjectsSubcategory->recursive = 0;
		$this->set('projectsSubcategories', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->ProjectsSubcategory->exists($id)) {
			throw new NotFoundException(__('Invalid projects subcategory'));
		}
		$options = array('conditions' => array('ProjectsSubcategory.' . $this->ProjectsSubcategory->primaryKey => $id));
		$this->set('projectsSubcategory', $this->ProjectsSubcategory->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->ProjectsSubcategory->create();
			if ($this->ProjectsSubcategory->save($this->request->data)) {
				$this->Session->setFlash(__('The projects subcategory has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The projects subcategory could not be saved. Please, try again.'));
			}
		}
		$subcategories = $this->ProjectsSubcategory->Subcategory->find('list');
		$projects = $this->ProjectsSubcategory->Project->find('list');
		$this->set(compact('subcategories', 'projects'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->ProjectsSubcategory->exists($id)) {
			throw new NotFoundException(__('Invalid projects subcategory'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->ProjectsSubcategory->save($this->request->data)) {
				$this->Session->setFlash(__('The projects subcategory has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The projects subcategory could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('ProjectsSubcategory.' . $this->ProjectsSubcategory->primaryKey => $id));
			$this->request->data = $this->ProjectsSubcategory->find('first', $options);
		}
		$subcategories = $this->ProjectsSubcategory->Subcategory->find('list');
		$projects = $this->ProjectsSubcategory->Project->find('list');
		$this->set(compact('subcategories', 'projects'));
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->ProjectsSubcategory->id = $id;
		if (!$this->ProjectsSubcategory->exists()) {
			throw new NotFoundException(__('Invalid projects subcategory'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->ProjectsSubcategory->delete()) {
			$this->Session->setFlash(__('The projects subcategory has been deleted.'));
		} else {
			$this->Session->setFlash(__('The projects subcategory could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
