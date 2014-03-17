<?php
App::uses('User', 'Model');

/**
 * User Test Case
 *
 */
class UserTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.user',
		'app.role',
		'app.donation_detail',
		'app.project',
		'app.project_asset',
		'app.need',
		'app.projects_need',
		'app.subcategory',
		'app.projects_subcategory',
		'app.projects_user',
		'app.donation',
		'app.batch',
		'app.batches_user',
		'app.point',
		'app.points_user',
		'app.skill',
		'app.skills_user'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->User = ClassRegistry::init('User');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->User);

		parent::tearDown();
	}

}
