<?php
App::uses('PointsUser', 'Model');

/**
 * PointsUser Test Case
 *
 */
class PointsUserTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.points_user',
		'app.user',
		'app.role',
		'app.batch',
		'app.batches_user',
		'app.point',
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
		$this->PointsUser = ClassRegistry::init('PointsUser');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->PointsUser);

		parent::tearDown();
	}

}
