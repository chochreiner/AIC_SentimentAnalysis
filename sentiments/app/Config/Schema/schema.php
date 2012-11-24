<?php 
class AppSchema extends CakeSchema {

	public function before($event = array()) {
		return true;
	}

	public function after($event = array()) {
	}

	public $articles = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'author' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 30, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'title' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 100, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'publish_date' => array('type' => 'timestamp', 'null' => false, 'default' => 'CURRENT_TIMESTAMP'),
		'link' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 128, 'collate' => 'latin1_swedish_ci', 'comment' => 'currently no use for this', 'charset' => 'latin1'),
		'guid' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 128, 'collate' => 'latin1_swedish_ci', 'comment' => 'used for checking if an article is new', 'charset' => 'latin1'),
		'source' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 128, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'content' => array('type' => 'text', 'null' => false, 'default' => null, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'channel' => array('type' => 'string', 'null' => false, 'default' => 'Unknown', 'length' => 100, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'evaluated' => array('type' => 'boolean', 'null' => false, 'default' => null, 'comment' => 'should set to true when the MobileWorks task creator has analysed it'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1)
		),
		'tableParameters' => array('charset' => 'latin1', 'collate' => 'latin1_swedish_ci', 'engine' => 'InnoDB')
	);
	public $brands = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'company_id' => array('type' => 'integer', 'null' => false, 'default' => null),
		'name' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 32, 'collate' => 'latin1_swedish_ci', 'comment' => 'The display name', 'charset' => 'latin1'),
		'search_names' => array('type' => 'text', 'null' => false, 'default' => null, 'collate' => 'latin1_swedish_ci', 'comment' => 'comma-separated list of names which are used for this brand', 'charset' => 'latin1'),
		'target_group_min_age' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 3),
		'target_group_max_age' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 3),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1)
		),
		'tableParameters' => array('charset' => 'latin1', 'collate' => 'latin1_swedish_ci', 'engine' => 'InnoDB')
	);
	public $brands_paragraphs = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'brand_id' => array('type' => 'integer', 'null' => false, 'default' => null),
		'paragraph_id' => array('type' => 'integer', 'null' => false, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1)
		),
		'tableParameters' => array('charset' => 'latin1', 'collate' => 'latin1_swedish_ci', 'engine' => 'InnoDB')
	);
	public $companies = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 20, 'key' => 'primary'),
		'name' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1)
		),
		'tableParameters' => array('charset' => 'latin1', 'collate' => 'latin1_swedish_ci', 'engine' => 'InnoDB')
	);
	public $evaluation_results = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'evaluation_id' => array('type' => 'integer', 'null' => false, 'default' => null),
		'taskid' => array('type' => 'string', 'null' => false, 'default' => null),
		'result' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 2),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1)
		),
		'tableParameters' => array('charset' => 'latin1', 'collate' => 'latin1_swedish_ci', 'engine' => 'InnoDB')
	);
	public $evaluations = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'paragraph_id' => array('type' => 'integer', 'null' => false, 'default' => null),
		'brand_id' => array('type' => 'integer', 'null' => false, 'default' => null),
		'question' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'task_url' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'type' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 1, 'comment' => '0->articletopic, 1->titlesentiment, 2->paragraphsentiment'),
		'rating' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 1, 'comment' => 'This is the result, defined by the MobileWorks user, range -5 til +5. For not finished tasks this is null'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1)
		),
		'tableParameters' => array('charset' => 'latin1', 'collate' => 'latin1_swedish_ci', 'engine' => 'InnoDB')
	);
	public $paragraphs = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'article_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'index'),
		'position' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 2, 'comment' => 'A number, starting with 0 numbering the paragraphs of an article'),
		'text' => array('type' => 'text', 'null' => false, 'default' => null, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'evaluated' => array('type' => 'boolean', 'null' => false, 'default' => null, 'comment' => 'should set to true when the MobileWorks task creator has analysed it'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'articleid' => array('column' => 'article_id', 'unique' => 0)
		),
		'tableParameters' => array('charset' => 'latin1', 'collate' => 'latin1_swedish_ci', 'engine' => 'InnoDB')
	);
}
