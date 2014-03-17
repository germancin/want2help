<?php
App::uses('Need', 'Model');

/**
 * Need Test Case
 *
 */
class NeedTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.need',
		'app.project',
		'app.project_asset',
		'app.projects_need',
		'app.subcategory',
		'app.projects_subcategory',
		'app.user',
		'app.role',
		'app.batch',
		'app.batches_user',
		'app.point',
		'app.points_user',
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
		$this->Need = ClassRegistry::init('Need');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Need);

		parent::tearDown();
	}

}
