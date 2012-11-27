<div class="row">
    <div class="span10">

<div class="content_box evaluationResults form">
<?php echo $this->Form->create('EvaluationResult'); ?>
	<fieldset>
		<legend><?php echo __('Add Evaluation Result'); ?></legend>
	<?php
		echo $this->Form->input('evaluation_id');
		echo $this->Form->input('result');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
</div>
    <div class="span2">
<div class="content_box actions">
	<legend><?php echo __('Actions'); ?></legend>
	<ul>

		<li><?php echo $this->Html->link(__('List Evaluation Results'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Evaluations'), array('controller' => 'evaluations', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Evaluation'), array('controller' => 'evaluations', 'action' => 'add')); ?> </li>
	</ul>
</div>
</div>
</div>