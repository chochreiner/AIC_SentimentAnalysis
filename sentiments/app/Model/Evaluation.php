<?php
App::uses('AppModel', 'Model');
/**
 * Evaluation Model
 *
 * @property Paragraph $Paragraph
 * @property Brand $Brand
 */
class Evaluation extends AppModel {



/**
 * Pushes a given task to MobileWorks. The resource is set according
 * to the evalution type.
 * 
 * Expects the evaluation be be the current active record.
 * 
 * @param  MobileWorks $mobileWorksApi  A configured mobileWorksApi
 * @return void
 */
	public function pushTask($mobileWorksApi) {
		$this->recursive = 2; // also load teh associated article
		$this->read(null,$this->id);

		// build resource
		switch($this->data['Evaluation']['type']) {
			case 'articletopic':
				$resource = 
					'<h1>' . $this->data['Paragraph']['Article']['title'] . '</h1><p>' .
					$this->data['Paragraph']['text'] . '</p>';
				break;
			case 'titlesentiment':
				$resource = $this->data['Paragraph']['Article']['title'];
				break;
			case 'paragraphsentiment':
				$resource = $this->data['Paragraph']['text'];
				break;
		}

		// push the task
		$t = $mobileWorksApi->Task(array(
			'instructions' => $this->data['Evaluation']['question'],
			'resource'	   => $resource
			));
		$t->add_field("Name", "t");
		$task_url = $t->post();

		// add the task url to the evaluation record
		$this->saveField('task_url', $task_url);
	}




	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Paragraph' => array(
			'className' => 'Paragraph',
			'foreignKey' => 'paragraph_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Brand' => array(
			'className' => 'Brand',
			'foreignKey' => 'brand_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
