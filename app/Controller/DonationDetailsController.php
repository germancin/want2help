<?php
App::uses('AppController', 'Controller');
/**
 * DonationDetails Controller
 *
 * @property DonationDetail $DonationDetail
 * @property PaginatorComponent $Paginator
 */
class DonationDetailsController extends AppController {

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
		$this->DonationDetail->recursive = 0;
		$this->set('donationDetails', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->DonationDetail->exists($id)) {
			throw new NotFoundException(__('Invalid donation detail'));
		}
		$options = array('conditions' => array('DonationDetail.' . $this->DonationDetail->primaryKey => $id));
		$this->set('donationDetail', $this->DonationDetail->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->DonationDetail->create();
			if ($this->DonationDetail->save($this->request->data)) {
				$this->Session->setFlash(__('The donation detail has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The donation detail could not be saved. Please, try again.'));
			}
		}
		$users = $this->DonationDetail->User->find('list');
		$projects = $this->DonationDetail->Project->find('list');
		$needs = $this->DonationDetail->Need->find('list');
		$this->set(compact('users', 'projects', 'needs'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->DonationDetail->exists($id)) {
			throw new NotFoundException(__('Invalid donation detail'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->DonationDetail->save($this->request->data)) {
				$this->Session->setFlash(__('The donation detail has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The donation detail could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('DonationDetail.' . $this->DonationDetail->primaryKey => $id));
			$this->request->data = $this->DonationDetail->find('first', $options);
		}
		$users = $this->DonationDetail->User->find('list');
		$projects = $this->DonationDetail->Project->find('list');
		$needs = $this->DonationDetail->Need->find('list');
		$this->set(compact('users', 'projects', 'needs'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->DonationDetail->id = $id;
		if (!$this->DonationDetail->exists()) {
			throw new NotFoundException(__('Invalid donation detail'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->DonationDetail->delete()) {
			$this->Session->setFlash(__('The donation detail has been deleted.'));
		} else {
			$this->Session->setFlash(__('The donation detail could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->DonationDetail->recursive = 0;
		$this->set('donationDetails', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->DonationDetail->exists($id)) {
			throw new NotFoundException(__('Invalid donation detail'));
		}
		$options = array('conditions' => array('DonationDetail.' . $this->DonationDetail->primaryKey => $id));
		$this->set('donationDetail', $this->DonationDetail->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->DonationDetail->create();
			if ($this->DonationDetail->save($this->request->data)) {
				$this->Session->setFlash(__('The donation detail has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The donation detail could not be saved. Please, try again.'));
			}
		}
		$users = $this->DonationDetail->User->find('list');
		$projects = $this->DonationDetail->Project->find('list');
		$needs = $this->DonationDetail->Need->find('list');
		$this->set(compact('users', 'projects', 'needs'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->DonationDetail->exists($id)) {
			throw new NotFoundException(__('Invalid donation detail'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->DonationDetail->save($this->request->data)) {
				$this->Session->setFlash(__('The donation detail has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The donation detail could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('DonationDetail.' . $this->DonationDetail->primaryKey => $id));
			$this->request->data = $this->DonationDetail->find('first', $options);
		}
		$users = $this->DonationDetail->User->find('list');
		$projects = $this->DonationDetail->Project->find('list');
		$needs = $this->DonationDetail->Need->find('list');
		$this->set(compact('users', 'projects', 'needs'));
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->DonationDetail->id = $id;
		if (!$this->DonationDetail->exists()) {
			throw new NotFoundException(__('Invalid donation detail'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->DonationDetail->delete()) {
			$this->Session->setFlash(__('The donation detail has been deleted.'));
		} else {
			$this->Session->setFlash(__('The donation detail could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
