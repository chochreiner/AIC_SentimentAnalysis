<?php
/**
 * EvaluationFixture
 *
 */
class EvaluationFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'paragraph_id' => array('type' => 'integer', 'null' => false, 'default' => null),
		'brand_id' => array('type' => 'integer', 'null' => false, 'default' => null),
		'rating' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 1, 'comment' => 'This is the result, defined by the MobileWorks user, range -5 til +5. For not finished tasks this is null'),
		'please_mobile_works_metadata_fields' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 32, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1)
		),
		'tableParameters' => array('charset' => 'latin1', 'collate' => 'latin1_swedish_ci', 'engine' => 'InnoDB')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => 1,
			'paragraph_id' => 1,
			'brand_id' => 1,
			'rating' => 1,
			'please_mobile_works_metadata_fields' => 'Lorem ipsum dolor sit amet'
		),
	);

}
