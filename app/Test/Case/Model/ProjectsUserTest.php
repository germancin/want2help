<?php
App::uses('ProjectsUser', 'Model');

/**
 * ProjectsUser Test Case
 *
 */
class ProjectsUserTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.projects_user',
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
		$this->ProjectsUser = ClassRegistry::init('ProjectsUser');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->ProjectsUser);

		parent::tearDown();
	}

}
