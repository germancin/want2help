<?php
App::uses('UsersProfile', 'Model');

/**
 * UsersProfile Test Case
 *
 */
class UsersProfileTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.users_profile',
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
		$this->UsersProfile = ClassRegistry::init('UsersProfile');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->UsersProfile);

		parent::tearDown();
	}

}
