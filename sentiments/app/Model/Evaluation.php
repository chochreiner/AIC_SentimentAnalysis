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
	public static $TYPE_TITLE_SENTIMENT = 1; //0.5
	public static $TYPE_PARAGRAPH_SENTIMENT = 2; //0.2
	public static $TYPE_FIRSTPARAGRAPH_SENTIMENT = 3; //0.3



/**
 * Pushes a given task to MobileWorks. The resource is set according
 * to the evalution type.
 * 
 * Expects the evaluation id to be the current active record id.
 * 
 * @param  MobileWorks $mobileWorksApi  A configured mobileWorksApi
 * @return void
 */
	public function pushTask($mobileWorksApi, $redundancy, $workflowType) {
		$this->read(null, $this->id);
		
			if($this->data['Evaluation']['type'] == Evaluation::$TYPE_ARTICLE_TOPIC) {
				$callback = Configure::read('domain') . '/evaluations/returnstepone/'.$this->data['Evaluation']['id'];
			} else {
				$callback = Configure::read('domain') . '/evaluations/returnsteptwo/'.$this->data['Evaluation']['id'];
			}	
				
			// create a project (to get an instant callback, we need a new project for every task)
			$p = $mobileWorksApi->Project(array(
				'projectid' => Configure::read('version') . $this->data['Evaluation']['id'],
				'webhooks'  => $callback,
			));

			$taskid = Configure::read('version') . $this->data['Evaluation']['id']. '-' . rand(1, 10000);															
			$t = $mobileWorksApi->Task(array(
				'taskid'       => $taskid,
				'instructions' => $this->data['Evaluation']['question'],
				'workflow'     => $workflowType,
				'redundancy'   => $redundancy,
				//'payment'      => X @todo implement for Stage 2
				// Add user blocking options https://www.mobileworks.com/developers/parameters/#blocked and below
				));

			if($this->data['Evaluation']['type'] == Evaluation::$TYPE_ARTICLE_TOPIC) {
				$t->add_field('result', 'm', array("choices"=>"Yes,No"));
			} else { // titlesentiment or paragraphsentiment
				$t->add_field('rating', 'm', array("choices"=>"-5 (Very Bad),-4,-3,-2,-1,0 (balanced),1,2,3,4,5 (Very positive)"));
				$t1 = $mobileWorksApi->Task(array(
				'taskid'       => $taskid."checktask",
				'instructions' => 'Are you experienced in economies?',
				//'payment'      => X @todo implement for Stage 2
				// Add user blocking options https://www.mobileworks.com/developers/parameters/#blocked and below
				));
				$t1->add_field('result', 'm', array("choices"=>"Yes,No"));
				$p->add_task($t1);
			}

			$p->add_task($t);
			$project_url = $p->post();
			$this->saveField('task_url', $project_url);
			$this->saveField('task_id', $taskid);
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
