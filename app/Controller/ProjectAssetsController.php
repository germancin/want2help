<?php
App::uses('AppController', 'Controller');
/**
 * ProjectAssets Controller
 *
 * @property ProjectAsset $ProjectAsset
 * @property PaginatorComponent $Paginator
 */
class ProjectAssetsController extends AppController {

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
		$this->ProjectAsset->recursive = 0;
		$this->set('projectAssets', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->ProjectAsset->exists($id)) {
			throw new NotFoundException(__('Invalid project asset'));
		}
		$options = array('conditions' => array('ProjectAsset.' . $this->ProjectAsset->primaryKey => $id));
		$this->set('projectAsset', $this->ProjectAsset->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->ProjectAsset->create();
			if ($this->ProjectAsset->save($this->request->data)) {
				$this->Session->setFlash(__('The project asset has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The project asset could not be saved. Please, try again.'));
			}
		}
		$projects = $this->ProjectAsset->Project->find('list');
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
		if (!$this->ProjectAsset->exists($id)) {
			throw new NotFoundException(__('Invalid project asset'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->ProjectAsset->save($this->request->data)) {
				$this->Session->setFlash(__('The project asset has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The project asset could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('ProjectAsset.' . $this->ProjectAsset->primaryKey => $id));
			$this->request->data = $this->ProjectAsset->find('first', $options);
		}
		$projects = $this->ProjectAsset->Project->find('list');
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
		$this->ProjectAsset->id = $id;
		if (!$this->ProjectAsset->exists()) {
			throw new NotFoundException(__('Invalid project asset'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->ProjectAsset->delete()) {
			$this->Session->setFlash(__('The project asset has been deleted.'));
		} else {
			$this->Session->setFlash(__('The project asset could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->ProjectAsset->recursive = 0;
		$this->set('projectAssets', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->ProjectAsset->exists($id)) {
			throw new NotFoundException(__('Invalid project asset'));
		}
		$options = array('conditions' => array('ProjectAsset.' . $this->ProjectAsset->primaryKey => $id));
		$this->set('projectAsset', $this->ProjectAsset->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->ProjectAsset->create();
			if ($this->ProjectAsset->save($this->request->data)) {
				$this->Session->setFlash(__('The project asset has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The project asset could not be saved. Please, try again.'));
			}
		}
		$projects = $this->ProjectAsset->Project->find('list');
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
		if (!$this->ProjectAsset->exists($id)) {
			throw new NotFoundException(__('Invalid project asset'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->ProjectAsset->save($this->request->data)) {
				$this->Session->setFlash(__('The project asset has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The project asset could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('ProjectAsset.' . $this->ProjectAsset->primaryKey => $id));
			$this->request->data = $this->ProjectAsset->find('first', $options);
		}
		$projects = $this->ProjectAsset->Project->find('list');
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
		$this->ProjectAsset->id = $id;
		if (!$this->ProjectAsset->exists()) {
			throw new NotFoundException(__('Invalid project asset'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->ProjectAsset->delete()) {
			$this->Session->setFlash(__('The project asset has been deleted.'));
		} else {
			$this->Session->setFlash(__('The project asset could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
