<?php
App::uses('AppModel', 'Model');
/**
 * Evaluation Model
 *
 * @property Paragraph $Paragraph
 * @property Brand $Brand
 */
class Evaluation extends AppModel {
	public static $TYPE_ARTICLE_TOPIC = 0;
	public static $TYPE_TITLE_SENTIMENT = 1;
	public static $TYPE_PARAGRAPH_SENTIMENT = 2;



/**
 * Pushes a given task to MobileWorks. The resource is set according
 * to the evalution type.
 * 
 * Expects the evaluation id to be the current active record id.
 * 
 * @param  MobileWorks $mobileWorksApi  A configured mobileWorksApi
 * @return void
 */
	public function pushTask($mobileWorksApi, $redundancy) {
		$this->read(null, $this->id);
		

			// create a project (to get an instant callback, we need a new project for every task)
			$p = $mobileWorksApi->Project(array(
				'projectid' => Configure::read('version') . $this->data['Evaluation']['id'],
				'webhooks'  => Configure::read('domain') . '/evaluations/returnResult/'.$this->data['Evaluation']['id'],
				//'tests'     => @todo Add Test tasks here https://www.mobileworks.com/developers/parameters/#projecttests
			));

			$test1 = $mobileWorksApi->Task(array(
				'resource'=> Configure::read('domain'),
				'instructions' => 'Are you experienced in economies?',
				));
			$test1->add_field('Answer', 't', array('answers'=>array('Yes')));

			$p->add_test_task($test1);
				
			// create the tasks
			$t = $mobileWorksApi->Task(array(
				'taskid'       => Configure::read('version') . $this->data['Evaluation']['id']. '-' . rand(1, 10000),
				'instructions' => $this->data['Evaluation']['question'],
				'resource'	   => Configure::read('domain') . '/evaluations/showTaskResource/'.$this->data['Evaluation']['id'],
				'resourcetype' => 't',
				'workflow'     => 'm',
				'redundancy'   => $redundancy,
				//'payment'      => X @todo implement for Stage 2
				// Add user blocking options https://www.mobileworks.com/developers/parameters/#blocked and below
				));

			// build choices
			if($this->data['Evaluation']['type'] == Evaluation::$TYPE_ARTICLE_TOPIC) {
				$t->add_field('result', 'm', array("choices"=>"Yes,No"));
			} else { // titlesentiment or paragraphsentiment
				$t->add_field('rating', 'm', array("choices"=>"-5 (Very Bad),-4,-3,-2,-1,0 (balanced),1,2,3,4,5 (Very positive)"));
			}

			// add to project
			$p->add_task($t);
		
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
