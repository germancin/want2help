<?php
App::uses('Donation', 'Model');

/**
 * Donation Test Case
 *
 */
class DonationTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.donation',
		'app.user',
		'app.role',
		'app.batch',
		'app.batches_user',
		'app.point',
		'app.points_user',
		'app.project',
		'app.project_asset',
		'app.need',
		'app.projects_need',
		'app.subcategory',
		'app.projects_subcategory',
		'app.projects_user',
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
		$this->Donation = ClassRegistry::init('Donation');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Donation);

		parent::tearDown();
	}

}
