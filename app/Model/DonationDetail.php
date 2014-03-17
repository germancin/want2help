<?php
App::uses('AppModel', 'Model');
/**
 * DonationDetail Model
 *
 * @property User $User
 * @property Project $Project
 * @property Need $Need
 * @property Donation $Donation
 */
class DonationDetail extends AppModel {


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
		'Project' => array(
			'className' => 'Project',
			'foreignKey' => 'project_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Need' => array(
			'className' => 'Need',
			'foreignKey' => 'need_id',
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
