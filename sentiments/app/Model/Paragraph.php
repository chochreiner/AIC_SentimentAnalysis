<?php
App::uses('AppModel', 'Model');
/**
 * Paragraph Model
 *
 * @property Article $Article
 * @property Evaluation $Evaluation
 * @property Brand $Brand
 */
class Paragraph extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'text';

	private $cached_brands = false;


/**
 * Filter the related brands and associate them
 * @param  Boolean $created Only create paragraphs if $created=true
 */
	public function afterSave($created) {
		if(!$created) {
			return;
		}

		// prepare array of hasAndBelongsToMany associations
		$this->data['Brand'] = array('Brand' => array());

		// check for each brand if it matches
		$brands = $this->cached_brands ? $this->cached_brands : $this->Brand->find('all');
		$this->cached_brands = $brands;
		$text = strtolower($this->data['Paragraph']['text']);

		foreach ($brands as $brand) {
			$search_names = explode(',', $brand['Brand']['search_names']);

			$found = false;
			foreach ($search_names as $needle) {
				if(strpos($text,strtolower($needle)) != false) {
					$found = true;
					break;
				}
			}

			if($found) {
				// associate to brand
				array_push($this->data['Brand']['Brand'], $brand['Brand']['id']);
			}
		}

		$this->saveAll($this->data);
	}







	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Article' => array(
			'className' => 'Article',
			'foreignKey' => 'article_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Evaluation' => array(
			'className' => 'Evaluation',
			'foreignKey' => 'paragraph_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);


/**
 * hasAndBelongsToMany associations
 *
 * @var array
 */
	public $hasAndBelongsToMany = array(
		'Brand' => array(
			'className' => 'Brand',
			'joinTable' => 'brands_paragraphs',
			'foreignKey' => 'paragraph_id',
			'associationForeignKey' => 'brand_id',
			'unique' => 'keepExisting',
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
			'deleteQuery' => '',
			'insertQuery' => ''
		)
	);

}
