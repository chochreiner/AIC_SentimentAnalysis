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
 * Expects the evaluation id to be the current active record id.
 * 
 * @param  MobileWorks $mobileWorksApi  A configured mobileWorksApi
 * @return void
 */
	public function pushTask($mobileWorksApi) {
		$this->read(null, $this->id);

		// create a project (to get an instant callback, we need a new project for every task)
		$p = $mobileWorksApi->Project(array(
			'projectid' => $this->data['Evaluation']['id'],
			'webhooks'  => Configure::read('domain') . '/evaluations/returnResult/'.$this->data['Evaluation']['id'],
			//'tests'     => @todo Add Test tasks here https://www.mobileworks.com/developers/parameters/#projecttests
			));

		// create the tasks
		for($i=0; $i<3; $i++) {
			$t = $mobileWorksApi->Task(array(
				'taskid'       => $this->data['Evaluation']['id']. '-' . $i,
				'instructions' => $this->data['Evaluation']['question'],
				'resource'	   => Configure::read('domain') . '/evaluations/showTaskResource/'.$this->data['Evaluation']['id'],
				'resourcetype' => 't',
				'workflow'     => 'm',
				//'payment'      => X @todo implement for Stage 2
				// Add user blocking options https://www.mobileworks.com/developers/parameters/#blocked and below
				));

			// build choices
			if($this->data['Evaluation']['type'] == 'articletopic') {
				$t->add_field('result', 'm', array("choices"=>"Yes,No"));
			} else { // titlesentiment or paragraphsentiment
				$t->add_field('rating', 'm', array("choices"=>"-5 (Very Bad),-4,-3,-2,-1,0 (balanced),1,2,3,4,5 (Very positive)"));
			}

			// add to project
			$p->add_task($t);
		}

		// push the project
		$project_url = $p->post();

		// add the task url to the evaluation record
		$this->saveField('task_url', $project_url);
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
/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'EvaluationResult' => array(
			'className' => 'EvaluationResult',
			'foreignKey' => 'evaluation_id',
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

}
