<?php
App::uses('ProjectsNeed', 'Model');

/**
 * ProjectsNeed Test Case
 *
 */
class ProjectsNeedTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.projects_need',
		'app.project',
		'app.project_asset',
		'app.need',
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
		$this->ProjectsNeed = ClassRegistry::init('ProjectsNeed');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->ProjectsNeed);

		parent::tearDown();
	}

}
