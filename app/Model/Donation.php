<?php
App::uses('AppModel', 'Model');
/**
 * Donation Model
 *
 * @property User $User
 * @property DonationDetail $DonationDetail
 */
class Donation extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'transaction_token';


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'user_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'DonationDetail' => array(
			'className' => 'DonationDetail',
			'foreignKey' => 'donation_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);

}
