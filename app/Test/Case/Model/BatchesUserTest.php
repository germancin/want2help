<?php
App::uses('BatchesUser', 'Model');

/**
 * BatchesUser Test Case
 *
 */
class BatchesUserTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.batches_user',
		'app.user',
		'app.role',
		'app.batch',
		'app.point',
		'app.points_user',
		'app.project',
		'app.projects_user'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->BatchesUser = ClassRegistry::init('BatchesUser');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->BatchesUser);

		parent::tearDown();
	}

}
