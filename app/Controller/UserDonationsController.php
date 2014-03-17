<?php
App::uses('AppController', 'Controller');
/**
 * UserDonations Controller
 *
 * @property UserDonation $UserDonation
 * @property PaginatorComponent $Paginator
 */
class UserDonationsController extends AppController {

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
		$this->UserDonation->recursive = 0;
		$this->set('userDonations', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->UserDonation->exists($id)) {
			throw new NotFoundException(__('Invalid user donation'));
		}
		$options = array('conditions' => array('UserDonation.' . $this->UserDonation->primaryKey => $id));
		$this->set('userDonation', $this->UserDonation->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->UserDonation->create();
			if ($this->UserDonation->save($this->request->data)) {
				$this->Session->setFlash(__('The user donation has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user donation could not be saved. Please, try again.'));
			}
		}
		$users = $this->UserDonation->User->find('list');
		$donations = $this->UserDonation->Donation->find('list');
		$this->set(compact('users', 'donations'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->UserDonation->exists($id)) {
			throw new NotFoundException(__('Invalid user donation'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->UserDonation->save($this->request->data)) {
				$this->Session->setFlash(__('The user donation has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user donation could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('UserDonation.' . $this->UserDonation->primaryKey => $id));
			$this->request->data = $this->UserDonation->find('first', $options);
		}
		$users = $this->UserDonation->User->find('list');
		$donations = $this->UserDonation->Donation->find('list');
		$this->set(compact('users', 'donations'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->UserDonation->id = $id;
		if (!$this->UserDonation->exists()) {
			throw new NotFoundException(__('Invalid user donation'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->UserDonation->delete()) {
			$this->Session->setFlash(__('The user donation has been deleted.'));
		} else {
			$this->Session->setFlash(__('The user donation could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->UserDonation->recursive = 0;
		$this->set('userDonations', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->UserDonation->exists($id)) {
			throw new NotFoundException(__('Invalid user donation'));
		}
		$options = array('conditions' => array('UserDonation.' . $this->UserDonation->primaryKey => $id));
		$this->set('userDonation', $this->UserDonation->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->UserDonation->create();
			if ($this->UserDonation->save($this->request->data)) {
				$this->Session->setFlash(__('The user donation has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user donation could not be saved. Please, try again.'));
			}
		}
		$users = $this->UserDonation->User->find('list');
		$donations = $this->UserDonation->Donation->find('list');
		$this->set(compact('users', 'donations'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->UserDonation->exists($id)) {
			throw new NotFoundException(__('Invalid user donation'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->UserDonation->save($this->request->data)) {
				$this->Session->setFlash(__('The user donation has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user donation could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('UserDonation.' . $this->UserDonation->primaryKey => $id));
			$this->request->data = $this->UserDonation->find('first', $options);
		}
		$users = $this->UserDonation->User->find('list');
		$donations = $this->UserDonation->Donation->find('list');
		$this->set(compact('users', 'donations'));
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->UserDonation->id = $id;
		if (!$this->UserDonation->exists()) {
			throw new NotFoundException(__('Invalid user donation'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->UserDonation->delete()) {
			$this->Session->setFlash(__('The user donation has been deleted.'));
		} else {
			$this->Session->setFlash(__('The user donation could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
