<?php
App::uses('AppController', 'Controller',  'BatchesUser');

/**
 * Donations Controller
 *
 * @property Donation $Donation
 * @property PaginatorComponent $Paginator
 */
class DonationsController extends AppController {

	public $cont = 1;

	public function beforeFilter(){
		parent::beforeFilter();
		$this->Auth->allow();

		if ($this->action == 'confirmation'){
			
			$this->cont = $this->cont+1;
		}
	}

	public function beforeSave($options = array()) {
		echo $this->here;
		echo "wwww";

		
	}
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
	$this->Donation->recursive = 0;
	$this->set('donations', $this->Paginator->paginate());
}

public function paypal_redirect(){

	if ($this->request->is('get')){

		if (isset($_GET['url'])) {

			$data = $this->get_items_list($_GET);

			//update the status of the need so is not buy it twice.
			foreach ($data as $value) {
				$this->update_need_status($value['item_number'] , 't_locked');
			}

			/*Loop through $request_params array to generate the NVP string.*/
			$nvp_string = '';
			foreach($_GET as $var=>$val) {
				$nvp_string .= '&'.$var.'='.urlencode($val);	
			}

			$url = urldecode("https://www.sandbox.paypal.com/cgi-bin/webscr".$nvp_string);
 
			$this->redirect($url);

		}
	}
}

public function get_need_ids($get_response){

	$tt = $this->get_items_list();
	var_dump($tt);
}

public function confirmation(){

		if ($this->request->is('get')) {

			if (isset($_GET['tx'])){

				$tx = $_GET['tx']; 
				$paypalGetResponse = $_GET;
				$this->set('paypalGetResponse' , $paypalGetResponse);

				//paypal token for being send it back to retreive the response of the transaction;	
				$this->set('tx', $tx);

				if($this->Auth->loggedIn()){
					$userId = $this->Auth->user('id');
				}else{
					$userId = 0;
				}

				$dat = $this->Donation->find('first', array('options'=>array('Donation.transaction_token'=>$tx)));

				if (empty($dat['Donation']['transaction_token'])){

				    $this->Donation->save(array(
							 'transaction_token' => $tx,
							 'payment_status' => $_GET['st'],
							 'amount' => $_GET['amt'],
							 'user_id' => $userId,
							 'status_flow' => '2',

							 
							 ));
			    }

			    //$this->Donation->deleteAll(array('Donation.mc_currency'=>''));

				if($_GET['st'] ==="Completed"){

					$this->redirect('/donations/thankyou/?tx='.$tx);
				}


			}

		}else{

			echo "the request is not get";
		}
}

public function confirmation_save(){

	if($this->request->is('get')){

		$data = $this->prepare_response_to_save($_GET);

		//sending the data I need to save and the raw curlResponse 
		$this->save_donation_response($data, $_GET);

		$params = '';
		foreach ($_GET as $key => $value) {
			$params .= "&".$key."=".urlencode($value);
		}

		$this->redirect('/donations/thankyou/?'.$params);

	}
}

public function thankyou(){

	if($this->request->is('get')){

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
		
		$this->set('curlResponse', $pieces );

		$transacionResult = array_shift($pieces);
		//var_dump($transactionResult);
		$this->set('transacionResult' , $transacionResult);

		curl_close( $ch );

		if($this->Auth->loggedIn()){
			$userId = $this->Auth->user('id');

			//$this->updateUserDonations();
		}else{
			$userId = 0;
		}
        
	    $this->Donation->updateAll(array('status_flow' => '3',
	    				 'num_cart_items' => $pieces['num_cart_items'],
	    				 'first_name' => "'".$pieces['first_name']."'",
	    				 'last_name' => "'".$pieces['last_name']."'",
						 'payer_id' => "'".$pieces['payer_id']."'",
						 'address_street' => "'".urldecode($pieces['address_street'])."'",
						 'address_zip' => "'".$pieces['address_zip']."'",
						 'payment_date' => "'".urldecode($pieces['payment_date'])."'",
						 'address_country_code' => "'".$pieces['address_country_code']."'",
						 'address_name' => "'".urldecode($pieces['address_name'])."'",
						 'address_city' => "'".urldecode($pieces['address_city'])."'",
						 'payer_email' => "'".urldecode($pieces['payer_email'])."'",
						 'mc_currency' => "'".$pieces['mc_currency']."'",
						 'address_status' => "'".urldecode($pieces['address_status'])."'",
						 'protection_eligibility' => "'".$pieces['protection_eligibility']."'",
						 'user_id' => $userId,


				 ),array('Donation.transaction_token' => $_GET['tx']));


		if ($this->Auth->loggedIn()) {

			$donationInfo = ClassRegistry::init('Donation')->find('first',array('order'=> array('Donation.created'=> 'desc'),'recursive'=>-1));
			//$userDonation = ClassRegistry::init('UserDonation')->find('first',array('options'=> array('UserDonation.donation_id'=> $donationInfo['Donation']['id'] ),'recursive'=> -1));
			
			$data['UserDonation'] = array('user_id'=>$userId, 'donation_id'=> $donationInfo['Donation']['id']);
			ClassRegistry::init('UserDonation')->create();
			ClassRegistry::init('UserDonation')->save($data);

		}

		$this->set('total',$pieces['mc_gross']);

		$itemsList = $this->get_items_list($pieces);
		$this->set('itemsList', $itemsList);

		$projectAddress = $this->get_param_custom($pieces, 'projAddress');
		$this->set('projectAddress', $projectAddress);

		$tokenId = $_GET['tx'];
		$this->send_buyers_message($tokenId);
				
	}		

}
public function updateUserDonations($donationId){

	if (!empty($donationId)){
		
	}

	return false;
}
public function save_donation_response($data, $curlResponse) {

    //get the token id so i can updatethe field.
	if (!empty($curlResponse['payer_id'])  && !empty($curlResponse['txn_id'])) {

		$userId = $this->get_param_custom($curlResponse, 'userId');

		if ($userId == ''){
			$userId = 0;
		}


	    $this->Donation->save(array('num_cart_items' => $data['Donation']['num_cart_items'],
								 'first_name' => $data['Donation']['first_name'],
								 'last_name' => $data['Donation']['last_name'],
								 'payer_id' => $data['Donation']['payer_id'],
								 'address_street' => $data['Donation']['address_street'],
								 'address_zip' => $data['Donation']['address_zip'],
								 'payment_date' => $data['Donation']['payment_date'],
								 'address_country_code' => $data['Donation']['address_country_code'],
								 'address_name' => $data['Donation']['address_name'],
								 'address_city' => $data['Donation']['address_city'],
								 'payer_email' => $data['Donation']['payer_email'],
								 'mc_currency' => $data['Donation']['mc_currency'],
								 'address_status' => $data['Donation']['address_status'],
								 'protection_eligibility' => $data['Donation']['protection_eligibility'],
								 'user_id' => $userId ,
								 'transaction_token' => $data['Donation']['txn_id'],
								 'payment_status' => $curlResponse['payment_status'],
								 'amount' => $curlResponse['mc_gross'],
								 
								 ));


	    $dt =   $this->Donation->find('first', array(
			  'options' => array('transaction_token' => $data['Donation']['txn_id'])
	    ));

	    $token_id = $dt['Donation']['transaction_token'];
	    $donationId = $dt['Donation']['id'];
	    $numberSufix = $data['Donation']['num_cart_items'];


		if ( !empty($token_id) ){

			$customPiece = explode(" ", urldecode($curlResponse['custom']) );

			$this->set('custom', $customPiece);

			foreach ($customPiece as $value) {

				if (strstr($value, '=')) {

					if (strstr($value, 'userId')) {
						$userId = $value;
						$userIdPice =explode('=', $userId);
						$userId = $userIdPice[1];
					}

					if (strstr($value, 'projectId')) {
						$projectId = $value;
						$projectIdPice =explode('=', $projectId);
						$projectId = $projectIdPice[1];
					}

					if (strstr($value, 'projAddress')) {
						$ProjectAddress = $value;
					}

				}else{
					//concatenate the array elemnts dont have =
					$ProjectAddress .= " ".$value;

				}
			}

			if ($userId == ''){
				$userId = 0;
			}

			$cont = 1;
			while ($cont <= $numberSufix) {

				$donationDetails['DonationDetail'] = array('need_title' => urldecode($curlResponse['item_name'.$cont]), 
												   'gross_cost' => $curlResponse['mc_gross_'.$cont], 
												   'quantity'   => $curlResponse['quantity'.$cont], 
												   'need_id'    => $curlResponse['item_number'.$cont], 
												   'donation_id'=> $donationId,
												   'user_id'    => $userId,
												   'project_id' => $projectId,
							   					   'type' => 'donation',);
				

				//$this->Donation->DonationDetail->create();
			    //$this->Donation->DonationDetail->save($donationDetails);
			    ClassRegistry::init('DonationDetail')->create();
			    ClassRegistry::init('DonationDetail')->save($donationDetails);
			    $cont = $cont+1;

			    //redirect to the page where will see the details

			}				

		}	

	}		
}

public function prepare_response_to_save($data) {

	//var_dump($data);
	$num_cart_items = $this->clean_val( $data['num_cart_items'] );
	$txn_id = $this->clean_val( $data['txn_id'] );
	$user_id = $this->clean_val( '1');
	$first_name = $this->clean_val( $data['first_name'] );
	$last_name = $this->clean_val( $data['last_name'] );
	$payer_id = $this->clean_val( $data['payer_id'] );
	$address_street = $this->clean_val( $data['address_street'] );
	$address_zip = $this->clean_val( $data['address_zip'] );
	$payment_date = $this->clean_val( $data['payment_date'] );
	$address_country_code = $this->clean_val( $data['address_country_code'] );
    $address_name = $this->clean_val( $data['address_name'] );
	$address_city = $this->clean_val( $data['address_city'] );
	$payer_email = $this->clean_val( $data['payer_email'] );
	$mc_currency = $this->clean_val( $data['mc_currency'] );
	$address_status = $this->clean_val( $data['address_status'] );
	$protection_eligibility = $this->clean_val( $data['protection_eligibility'] );


	$data['Donation'] =  array('num_cart_items' => $num_cart_items,
							   'txn_id' => $txn_id,
							   'user_id' => $user_id,
							   'first_name' => $first_name,
							   'last_name' => $last_name,
							   'payer_id' => $payer_id,
							   'address_street' => $address_street,
							   'address_zip' => $address_zip,
							   'address_country_code' => $address_country_code,
							   'address_name'=> $address_name,
							   'address_city' => $address_city,
							   'payer_email' => $payer_email,
							   'mc_currency' => $mc_currency,
							   'payment_date' => $payment_date,
							   'address_status' => $address_status,
							   'protection_eligibility' => $protection_eligibility,);

	return $data;
}

public function send_buyers_message($tokenId){

	require_once(APP.DS.'Plugin'.DS.'sms'.DS.'Twilio.php');
   //production
	$sid = "AC4af2d1d9ea89fab22b21ff18a2348c99"; 
	$token = "7b1c09ae1c0c491f2b0dead446766d06";

   //test start
	//$sid = "AC2ed4f92d0663d25a31b1b7ff580c5822"; 
	//$token = "610c2105ecc6766dc91001bf6803f2fb";
	//$fromNumber = '+15005550006';
	//$toNumber = '+15005550009';	//no mobile
  //test ends	

	$fromNumber = '+18134131741';
	$client = new Services_Twilio($sid, $token);

	$batchUsers = ClassRegistry::init('BatchesUser')->find('all', 
													   array(
														 'recursive'=> -1 ,
														 'conditions' => array('BatchesUser.batch_id' => '3'),
		));

	$users = array();
	foreach ($batchUsers as $key => $batch) {

	    $users[] = ClassRegistry::init('User')->find('first', 
	  											   array('recursive'=> -1 ,
														 'conditions' => array('User.id' => $batch['BatchesUser']['user_id']),
	  	));

	}

	$sentMessages = array();
	foreach ($users as $key => $value) {

		$toNumber = "+1".$value['User']['mobile'];

		$message = 'Hey,'.$value['User']['username'].' a donation was made. http://want-2-help.org/projects/buyers_confirmation?tx='.$tokenId;

		$response = $client->account->messages->sendMessage($fromNumber, $toNumber, $message);  

		//var_dump($response);


		$sentMessages[] = array('user'=>$value['User']['username'], 'mobile'=>$value['User']['mobile']);

	}


	$this->set('sentMessages' , $sentMessages);
	$this->set('numberOfUsersMessageWasSent', count($sentMessages));
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

public function get_items_list($itemsList){
	$items = array(); $cont = 1;

	foreach ($itemsList as $key => $value) {

		if(strstr($key,'item_name')){
			$numero = substr($key, -1, 1);
			$items[$numero] = array('item'=>$value);
		}

		if(strstr($key,'mc_gross_')){
			$numero = substr($key, -1, 1);

			array_push($items[$numero], $items[$numero]['mc_gross'] = $value);
		}

		if(strstr($key,'quantity')){
			$numero = substr($key, -1, 1);

			array_push($items[$numero], $items[$numero]['quantity'] = $value);
		}

		if(strstr($key,'item_number')){
			$numero = substr($key, -1, 1);

			array_push($items[$numero], $items[$numero]['item_number'] = $value);
		}

		$cont = $cont+1;
	}
	return $items;
}

public function attempt(){

	    $donation = FALSE;
	    $location = FALSE;
	    $this->set('donation', $donation);
	    $this->set('location', $location);

		if ($this->request->is('post')){

			$this->set("projectAddress" , $this->request->data('projectAddress'));
			$this->set("projectTitle" , $this->request->data('projectTitle'));

			$this->set('postResponse', $_POST );

		}

		// Set sandbox (test mode) to true/false.
		$sandbox = TRUE;

		// Set PayPal API version and credentials.
		$api_version = '85.0';
		$api_endpoint = $sandbox ? 'https://api-3t.sandbox.paypal.com/nvp' : 'https://api-3t.paypal.com/nvp';
		$api_username = $sandbox ? 'elmaildegerman-facilitator_api1.gmail.com' : 'LIVE_USERNAME_GOES_HERE';
		$api_password = $sandbox ? '1387213747' : 'LIVE_PASSWORD_GOES_HERE';
		$api_signature = $sandbox ? 'AiPC9BjkCyDFQXbSkoZcgqH3hpacAzaTvKhy7qEk66W8HIx-AuFUF9lV' : 'LIVE_SIGNATURE_GOES_HERE';

		//setting up the params inorder to create the paypal link
		$request_params = array(
							'cmd' => '_cart', 
							'upload' => '0', 
							'business' => 'want2help@gmail.com', 
							'return' => 'http://www.want-2-help.org/donations/confirmation/',
							'rm'=>'2', //sending mthod POST to the return URL
							'notify_url' => 'http://www.want-2-help.org/donations/notify',

							);

        /**/
		if ($_POST['cart_qty'] > '0') {
			$contQ = 1; $contL = 1; $listItems = array();
			foreach ($_POST as $key => $value) {

				if (strstr($key,'item') && $value != '0') {

					$donation = TRUE;
					$number   = $contQ;
					$param    = explode('&&', $value);

					$cost      = $param[0];
					$item_name = $param[1];
					$need_id   = $param[2];
					$qty       = $param[3];

					array_push($request_params, $request_params['item_name_'.$number] = $item_name,
						                        $request_params['amount_'.$number] = $cost,
						                        $request_params['item_number_'.$number] = $need_id,
						                        $request_params['quantity_'.$number] = $qty );
				    $contQ = $contQ+1;
				    $this->set('donation', $donation);

				    $listItems[] = array('item_name' => $item_name, 'amount' => $cost, 'qty' => $qty);
				}

				if (strstr($key,'location') && $value != '0') {

					$location = TRUE;
					$number   = $contL;
					$param    = explode('&&', $value);

					$cost      = $param[0];
					$item_name = $param[1];
					$need_id   = $param[2];
					$qty       = $param[3];

					$locationArray = array('item_name_'.$number => $item_name,
										   'amount_'.$number => $cost,
										   'item_number_'.$number => $need_id,
						                   'quantity_'.$number =>  $qty,
						                   'type' => 'at_location');
				    $contL = $contL+1;
					$this->set('location', $location);

					$status = 'after_donation';
					$needId = $need_id;

				}
			}

			if ($donation && $location){

				$this->set('locationsArray', $locationArray);
				$this->set('donationsArray', $request_params);

				/*update the need status to after donation*/
				$customParams = 'projAddress='.$_POST['projectAddress']." userId=".$_POST['userId']." projectId=".$_POST['project_id'].' location=TRUE';

				//$this->save_donation_details($needId, $status);

			}elseif($donation){

				$customParams = 'projAddress='.$_POST['projectAddress']." userId=".$_POST['userId']." projectId=".$_POST['project_id'].' location=FALSE';
				$this->set('request_params', $request_params);
				$this->set('donationsArray', $listItems);
				//$this->save_donation_details($needId, $status);

			}elseif($location){
				
				$customParams = '';
				//redirect to the location page.

			}

		}

		/*adding the custom param to the the paypal link*/
		array_push($request_params, $request_params['custom'] = $customParams);
			
		/*Loop through $request_params array to generate the NVP string.*/
		$nvp_string = '';
		foreach($request_params as $var=>$val) {
			$nvp_string .= '&'.$var.'='.urlencode($val);	
		}

		$url = urldecode("https://www.sandbox.paypal.com/cgi-bin/webscr".$nvp_string);

		$data = $nvp_string;

		$urlR  = '/donations/paypal_redirect/?url='.$data;

		$this->set('paypalUrl', $urlR);
}

public function update_need_status($needId , $status){

	$tt['Need'] = array('id'=>$needId, 'status'=>$status);
	if (ClassRegistry::init('Need')->save($tt)){
 
 		return TRUE;
	}
	return FALSE;
}

public function update_donation_detail_type($needId , $type){

	$tt['Need'] = array('id'=>$needId, 'type'=>$type);
	if (ClassRegistry::init('DonationDetail')->save($tt)){
 
 		return TRUE;
	}
	return FALSE;
}

public function clean_val($value){
	if (!empty($value) && isset($value)) {

		return urldecode($value);

	}else{

		$value = '';
		return $value;

	}
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
