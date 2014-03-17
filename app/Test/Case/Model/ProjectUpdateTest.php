<?php
App::uses('ProjectUpdate', 'Model');

/**
 * ProjectUpdate Test Case
 *
 */
class ProjectUpdateTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.project_update',
		'app.project',
		'app.project_asset',
		'app.need',
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
		$this->ProjectUpdate = ClassRegistry::init('ProjectUpdate');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->ProjectUpdate);

		parent::tearDown();
	}

}
