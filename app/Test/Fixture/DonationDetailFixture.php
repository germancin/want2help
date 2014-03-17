<?php
/**
 * DonationDetailFixture
 *
 */
class DonationDetailFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'user_id' => array('type' => 'integer', 'null' => false, 'default' => null),
		'project_id' => array('type' => 'integer', 'null' => false, 'default' => null),
		'need_id' => array('type' => 'integer', 'null' => false, 'default' => null),
		'need_title' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 9999, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'gross_cost' => array('type' => 'integer', 'null' => false, 'default' => null),
		'paypal_tax' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 9999, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'donation_id' => array('type' => 'integer', 'null' => false, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1)
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'MyISAM')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => 1,
			'user_id' => 1,
			'project_id' => 1,
			'need_id' => 1,
			'need_title' => 'Lorem ipsum dolor sit amet',
			'gross_cost' => 1,
			'paypal_tax' => 'Lorem ipsum dolor sit amet',
			'donation_id' => 1
		),
	);

}
