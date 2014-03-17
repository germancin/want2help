<?php
App::uses('AppController', 'Controller');
/**
 * Donations Controller
 *
 * @property Donation $Donation
 * @property PaginatorComponent $Paginator
 */
class DonationsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

public function notify() {

	if ($this->request->is('post')) {

        $data['Donation']['amount'] = $_POST['mc_gross'];
        $data['Donation']['payment_status'] = $_POST['payment_status'];
        $data['Donation']['project_id'] = $_POST['custom'];
        $data['Donation']['created'] = date("Y-m-d H:i:s");  
        $data['Donation']['transaction_token'] = $_POST['txn_id'];  

        $tx = $data['Donation']['transaction_token'];

        if (!empty($tx) && $this->transation_token_not_exist($tx)) {
			$this->Donation->create();
			$this->Donation->save($data);
        }

	}

}	

public function transation_token_not_exist($transaction_token) {

	$field = $this->Donation->find('first', array(
        'conditions' => array('Donation.transaction_token' => $transaction_token)
    ));

	if (empty($field)) {
		return true;
	}

	return false;
}

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Donation->recursive = 0;
		$this->set('donations', $this->Paginator->paginate());


		if ($this->request->is('get')) {

			var_dump($_GET);

			$tx = $_GET['tx'];

            $request_params = array(
					'cmd' => '_notify-synch', 
					'tx' => $tx, 
					'at' => 'CkhAfHMDmehkqSw5gzDcFv835TVSr-FQ9S4mFQobe_WW50IR2dVFJCcFdHy');
			
			$nvp_string = '';
			foreach($request_params as $var=>$val){
				$nvp_string .= '&'.$var.'='.urlencode($val);	
			}

            $ch = curl_init( 'https://www.sandbox.paypal.com/cgi-bin/webscr' );
			curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1) ;
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
			curl_setopt($ch, CURLOPT_TIMEOUT, 30);
			curl_setopt($ch, CURLOPT_POST, 1);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $nvp_string);
			$strCurlResult = curl_exec($ch);
			curl_close( $ch );

			var_dump($strCurlResult);

		}else{

			echo "the request is not post";
		}

	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Donation->exists($id)) {
			throw new NotFoundException(__('Invalid donation'));
		}
		$options = array('conditions' => array('Donation.' . $this->Donation->primaryKey => $id));
		$this->set('donation', $this->Donation->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Donation->create();
			var_dump($this->request->data);
			if ($this->Donation->save($this->request->data)) {
				$this->Session->setFlash(__('The donation has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The donation could not be saved. Please, try again.'));
			}
		}
		$users = $this->Donation->User->find('list');
		$projects = $this->Donation->Project->find('list');
		$needs = $this->Donation->Need->find('list');
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
		if (!$this->Donation->exists($id)) {
			throw new NotFoundException(__('Invalid donation'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Donation->save($this->request->data)) {
				$this->Session->setFlash(__('The donation has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The donation could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Donation.' . $this->Donation->primaryKey => $id));
			$this->request->data = $this->Donation->find('first', $options);
		}
		$users = $this->Donation->User->find('list');
		$projects = $this->Donation->Project->find('list');
		$needs = $this->Donation->Need->find('list');
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
		$this->Donation->id = $id;
		if (!$this->Donation->exists()) {
			throw new NotFoundException(__('Invalid donation'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Donation->delete()) {
			$this->Session->setFlash(__('The donation has been deleted.'));
		} else {
			$this->Session->setFlash(__('The donation could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Donation->recursive = 0;
		$this->set('donations', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Donation->exists($id)) {
			throw new NotFoundException(__('Invalid donation'));
		}
		$options = array('conditions' => array('Donation.' . $this->Donation->primaryKey => $id));
		$this->set('donation', $this->Donation->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Donation->create();
			if ($this->Donation->save($this->request->data)) {
				$this->Session->setFlash(__('The donation has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The donation could not be saved. Please, try again.'));
			}
		}
		$users = $this->Donation->User->find('list');
		$projects = $this->Donation->Project->find('list');
		$needs = $this->Donation->Need->find('list');
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
		if (!$this->Donation->exists($id)) {
			throw new NotFoundException(__('Invalid donation'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Donation->save($this->request->data)) {
				$this->Session->setFlash(__('The donation has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The donation could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Donation.' . $this->Donation->primaryKey => $id));
			$this->request->data = $this->Donation->find('first', $options);
		}
		$users = $this->Donation->User->find('list');
		$projects = $this->Donation->Project->find('list');
		$needs = $this->Donation->Need->find('list');
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
		$this->Donation->id = $id;
		if (!$this->Donation->exists()) {
			throw new NotFoundException(__('Invalid donation'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Donation->delete()) {
			$this->Session->setFlash(__('The donation has been deleted.'));
		} else {
			$this->Session->setFlash(__('The donation could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
