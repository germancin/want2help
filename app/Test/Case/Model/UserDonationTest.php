<?php
App::uses('UserDonation', 'Model');

/**
 * UserDonation Test Case
 *
 */
class UserDonationTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.user_donation',
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
		$this->UserDonation = ClassRegistry::init('UserDonation');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->UserDonation);

		parent::tearDown();
	}

}
