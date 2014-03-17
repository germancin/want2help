<?php
App::uses('AppModel', 'Model');
/**
 * UserDonation Model
 *
 * @property User $User
 * @property Donation $Donation
 */
class UserDonation extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'user_id';


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
		),
		'Donation' => array(
			'className' => 'Donation',
			'foreignKey' => 'donation_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
