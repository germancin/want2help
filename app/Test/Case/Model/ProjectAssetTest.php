<?php
App::uses('ProjectAsset', 'Model');

/**
 * ProjectAsset Test Case
 *
 */
class ProjectAssetTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.project_asset',
		'app.project',
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
		$this->ProjectAsset = ClassRegistry::init('ProjectAsset');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->ProjectAsset);

		parent::tearDown();
	}

}
