<?php
/**
 * DonationFixture
 *
 */
class DonationFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'user_id' => array('type' => 'integer', 'null' => false, 'default' => null),
		'amount' => array('type' => 'float', 'null' => false, 'default' => null, 'length' => '19,2'),
		'payment_status' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 300, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'transaction_token' => array('type' => 'text', 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'first_name' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 1000, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'last_name' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 1000, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'payer_id' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 999, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'address_street' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 999, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'address_zip' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 999, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'address_country_code' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 100, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'address_name' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 1000, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'num_cart_items' => array('type' => 'integer', 'null' => false, 'default' => null),
		'address_city' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 1000, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'payer_email' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 1000, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'mc_currency' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 1000, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'payment_date' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 999, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'address_status' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 999, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'protection_eligibility' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 1000, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'created' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'modified' => array('type' => 'timestamp', 'null' => false, 'default' => '0000-00-00 00:00:00'),
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
			'amount' => 1,
			'payment_status' => 'Lorem ipsum dolor sit amet',
			'transaction_token' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'first_name' => 'Lorem ipsum dolor sit amet',
			'last_name' => 'Lorem ipsum dolor sit amet',
			'payer_id' => 'Lorem ipsum dolor sit amet',
			'address_street' => 'Lorem ipsum dolor sit amet',
			'address_zip' => 'Lorem ipsum dolor sit amet',
			'address_country_code' => 'Lorem ipsum dolor sit amet',
			'address_name' => 'Lorem ipsum dolor sit amet',
			'num_cart_items' => 1,
			'address_city' => 'Lorem ipsum dolor sit amet',
			'payer_email' => 'Lorem ipsum dolor sit amet',
			'mc_currency' => 'Lorem ipsum dolor sit amet',
			'payment_date' => 'Lorem ipsum dolor sit amet',
			'address_status' => 'Lorem ipsum dolor sit amet',
			'protection_eligibility' => 'Lorem ipsum dolor sit amet',
			'created' => '2013-12-18 08:14:56',
			'modified' => 1387350896
		),
	);

}
