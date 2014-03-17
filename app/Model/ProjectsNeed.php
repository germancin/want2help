<?php
App::uses('AppModel', 'Model');
/**
 * ProjectsNeed Model
 *
 * @property Project $Project
 * @property Need $Need
 */
class ProjectsNeed extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'id';


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
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
		)
	);
}
