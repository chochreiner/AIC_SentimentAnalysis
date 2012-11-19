<?php
App::uses('AppModel', 'Model');
/**
 * EvaluationResult Model
 *
 * @property Evaluation $Evaluation
 */
class EvaluationResult extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'result';


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Evaluation' => array(
			'className' => 'Evaluation',
			'foreignKey' => 'evaluation_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
