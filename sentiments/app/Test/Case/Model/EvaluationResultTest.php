<?php
App::uses('EvaluationResult', 'Model');

/**
 * EvaluationResult Test Case
 *
 */
class EvaluationResultTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.evaluation_result',
		'app.evaluation',
		'app.paragraph',
		'app.article',
		'app.brand',
		'app.company',
		'app.brands_paragraph'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->EvaluationResult = ClassRegistry::init('EvaluationResult');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->EvaluationResult);

		parent::tearDown();
	}

}
