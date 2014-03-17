<?php
App::uses('AppModel', 'Model');
/**
 * Point Model
 *
 * @property User $User
 */
class Point extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'number';


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasAndBelongsToMany associations
 *
 * @var array
 */
	public $hasAndBelongsToMany = array(
		'User' => array(
			'className' => 'User',
			'joinTable' => 'points_users',
			'foreignKey' => 'point_id',
			'associationForeignKey' => 'user_id',
			'unique' => 'keepExisting',
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
		)
	);

}
