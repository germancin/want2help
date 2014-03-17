<?php
App::uses('ProjectsSubcategory', 'Model');

/**
 * ProjectsSubcategory Test Case
 *
 */
class ProjectsSubcategoryTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.projects_subcategory',
		'app.subcategory',
		'app.project',
		'app.project_asset',
		'app.need',
		'app.projects_need',
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
		$this->ProjectsSubcategory = ClassRegistry::init('ProjectsSubcategory');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->ProjectsSubcategory);

		parent::tearDown();
	}

}
