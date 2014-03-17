<?php
App::uses('AppController', 'Controller');
App::uses('HttpSocket', 'Network/Http');
/**
 * Projects Controller
 *
 * @property Project $Project
 * @property PaginatorComponent $Paginator
 */
class ProjectsController extends AppController {

	/**
	 * Components
	 *
	 * @var array
	 */
	public $components = array('Paginator','RequestHandler');

	public function beforefilter(){

		parent::beforefilter();
		$this->Auth->allow('socket');
	}
	/**
	 * index method
	 *
	 * @return void
	 */
	public function index() {
		$this->Project->recursive = 0;
		$this->set('projects', $this->Paginator->paginate());
	}

	/**
	 * Process the buyer confirmation 
	 * - update the status of the itmes
	 * - transfer the money to the buyer
	 * @return void
	 * @param 
	 */
	public function process_confirmation() {
		if ($this->request->is('get')) {
			var_dump($this->Auth->user());
		}
					
	}
			
	public function buyers_confirmation(){

		if($this->request->is('get')){

			if (!empty($_GET['tx'])){

				$request_params = array(
						'cmd' => '_notify-synch', 
						'tx' => $_GET['tx'], 
						'at' => 'CkhAfHMDmehkqSw5gzDcFv835TVSr-FQ9S4mFQobe_WW50IR2dVFJCcFdHy');
				
				$nvp_string = '';
				foreach($request_params as $var=>$val){
					$nvp_string .= '&'.$var.'='.urlencode($val);
				}

		        $ch = curl_init( 'https://www.sandbox.paypal.com/cgi-bin/webscr' );
				curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
				curl_setopt($ch, CURLOPT_TIMEOUT, 30);
				curl_setopt($ch, CURLOPT_POST, 1);
				curl_setopt($ch, CURLOPT_POSTFIELDS, $nvp_string);
				curl_setopt($ch, CURLOPT_HEADER, false); 
				curl_setopt($ch, CURLOPT_NOBODY, false); // remove body 
				curl_setopt($ch, CURLINFO_HEADER_OUT, TRUE); 
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE); 
			    $head = curl_exec($ch);

				//parsing the curl response 
			    $pieces = $this->array_up($head);
				//var_dump( $pieces);
				$this->set('curlResponse', $pieces );

				$transacionResult = array_shift($pieces);
				//var_dump($transactionResult);
				$this->set('transacionResult' , $transacionResult);

				curl_close( $ch );	
				

				$this->set('total',$pieces['mc_gross']);

				$this->set('pices',$pieces);

				$itemsList = $this->get_items_list($pieces);
				$this->set('itemsList', $itemsList);

				$projectAddress = $this->get_param_custom($pieces, 'projAddress');
				$this->set('projectAddress', $projectAddress);

				$this->Session->setFlash('Buyer Confirmation');

				return true;	

			}
		}
		$this->Session->setFlash('There is no information to process this requirment.');
		return false;
	}

	public function get_items_list($itemsList){
		$items = array(); $cont = 1;

		foreach ($itemsList as $key => $value) {

			if(strstr($key,'item_name')){
				$numero = substr($key, -1, 1);
				$items[$numero] = array('item'=>$value);
			}

			if(strstr($key,'item_number')){

				$numero = substr($key, -1, 1);
				array_push($items[$numero], $items[$numero]['item_id'] = $value);
			}

				$numero = substr($key, -1, 1);

				array_push($items[$numero], $items[$numero]['mc_gross'] = $value);
			}

			if(strstr($key,'quantity')){
				$numero = substr($key, -1, 1);

				array_push($items[$numero], $items[$numero]['quantity'] = $value);
			}
			$cont = $cont+1;
		}
		var_dump($items);
		return $items;
	}

    public function get_param_custom($get_response , $param){

		foreach ($get_response as $key => $value) {

			if(strstr($key,'custom')){

			    $pices = explode(' ', urldecode($value));

				foreach ($pices as $value) {

					if (strstr($value, '=')) {

						if (strstr($value, $param)) {
							$userId = $value;
							$userIdPice =explode('=', $userId);
							$dataVal = $userIdPice[1];
						}


					}elseif ($param == 'projAddress'){
						//concatenate the array elemnts dont have =
						$dataVal .= " ".$value;

					}
				}

			}
		}
		return $dataVal;
	}

	public function array_up($strCurlResult , $type = 'line') {
	    
	    if ($type === 'line') {

			$pieces = explode("\n", $strCurlResult);

		}elseif ($type === 'space'){

			$pieces = explode(" ", $strCurlResult);
		}

		foreach ($pieces as $key => $value) {

			$piecesI = explode("=", $value);

			if (isset($piecesI[0])) { $key = $piecesI[0]; }else{ $key = ''; }

			if (isset($piecesI[1])) { 
				$value = $piecesI[1]; 
			}else{
					if(isset($piecesI[0])) {
					 	 $value = $piecesI[0];
					}else{
						 $value = NULL; 
					}
					
			}

			$formatedArray[$key] = $value;
		}

		return $formatedArray;
	}

	public function donate(){


		if ($this->request->is('post')){

			$this->set("projectAddress" , $this->request->data('projectAddress'));
			$this->set("projectTitle" , $this->request->data('projectTitle'));

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
		if (!$this->Project->exists($id)) {
			throw new NotFoundException(__('Invalid project'));
		}
		$options = array('conditions' => array('Project.' . $this->Project->primaryKey => $id));
		$this->set('project', $this->Project->find('first', $options));

			$HttpSocket = new HttpSocket(array('timeout' => 20));

			// string data
			$response = $HttpSocket->post('http://www.want-2-help.org/projects/socket', array('name'=>'Germando'));
			$this->set('socket_response', $response->body);

			//debug($HttpSocket->request);
			//debug($response->raw);

			// array data
			//$data = array('name' => 'test', 'type' => 'user');
			//$results = $HttpSocket->post('http://example.com/add', $data);

	}

	public function socket(){
		$this->layout = 'ajax';
		$name = $_POST['name'];

		$array['User']=  array('username'=>'carmelo', 'mobile'=>'111222333');
		//$arrayM['Model']=  array('username'=>'carmelo', 'mobile'=>'345433');

		echo http_build_query($array);
	}

	/**
	 * add method
	 *
	 * @return void
	 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Project->create();
			if ($this->Project->save($this->request->data)) {
				$this->Session->setFlash(__('The project has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The project could not be saved. Please, try again.'));
			}
		}
		$needs = $this->Project->Need->find('list');
		$subcategories = $this->Project->Subcategory->find('list');
		$users = $this->Project->User->find('list');
		$this->set(compact('needs', 'subcategories', 'users'));
	}

	/**
	 * edit method
	 *
	 * @throws NotFoundException
	 * @param string $id
	 * @return void
	 */
	public function edit($id = null) {
		if (!$this->Project->exists($id)) {
			throw new NotFoundException(__('Invalid project'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Project->save($this->request->data)) {
				$this->Session->setFlash(__('The project has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The project could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Project.' . $this->Project->primaryKey => $id));
			$this->request->data = $this->Project->find('first', $options);
		}
		$needs = $this->Project->Need->find('list');
		$subcategories = $this->Project->Subcategory->find('list');
		$users = $this->Project->User->find('list');
		$this->set(compact('needs', 'subcategories', 'users'));
	}

	/**
	 * delete method
	 *
	 * @throws NotFoundException
	 * @param string $id
	 * @return void
	 */
	public function delete($id = null) {
		$this->Project->id = $id;
		if (!$this->Project->exists()) {
			throw new NotFoundException(__('Invalid project'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Project->delete()) {
			$this->Session->setFlash(__('The project has been deleted.'));
		} else {
			$this->Session->setFlash(__('The project could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

	/**
	 * admin_index method
	 *
	 * @return void
	 */
	public function admin_index() {
		$this->Project->recursive = 0;
		$this->set('projects', $this->Paginator->paginate());
	}

	/**
	 * admin_view method
	 *
	 * @throws NotFoundException
	 * @param string $id
	 * @return void
	 */
	public function admin_view($id = null) {
		if (!$this->Project->exists($id)) {
			throw new NotFoundException(__('Invalid project'));
		}
		$options = array('conditions' => array('Project.' . $this->Project->primaryKey => $id));
		$this->set('project', $this->Project->find('first', $options));
	}

	/**
	 * admin_add method
	 *
	 * @return void
	 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Project->create();
			if ($this->Project->save($this->request->data)) {
				$this->Session->setFlash(__('The project has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The project could not be saved. Please, try again.'));
			}
		}
		$needs = $this->Project->Need->find('list');
		$subcategories = $this->Project->Subcategory->find('list');
		$users = $this->Project->User->find('list');
		$this->set(compact('needs', 'subcategories', 'users'));
	}

	/**
	 * admin_edit method
	 *
	 * @throws NotFoundException
	 * @param string $id
	 * @return void
	 */
	public function admin_edit($id = null) {
		if (!$this->Project->exists($id)) {
			throw new NotFoundException(__('Invalid project'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Project->save($this->request->data)) {
				$this->Session->setFlash(__('The project has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The project could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Project.' . $this->Project->primaryKey => $id));
			$this->request->data = $this->Project->find('first', $options);
		}
		$needs = $this->Project->Need->find('list');
		$subcategories = $this->Project->Subcategory->find('list');
		$users = $this->Project->User->find('list');
		$this->set(compact('needs', 'subcategories', 'users'));
	}

	/**
	 * admin_delete method
	 *
	 * @throws NotFoundException
	 * @param string $id
	 * @return void
	 */
	public function admin_delete($id = null) {
		$this->Project->id = $id;
		if (!$this->Project->exists()) {
			throw new NotFoundException(__('Invalid project'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Project->delete()) {
			$this->Session->setFlash(__('The project has been deleted.'));
		} else {
			$this->Session->setFlash(__('The project could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
