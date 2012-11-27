<div class="row">
    <div class="span10">
<div class="content_box evaluationResults form">
<?php echo $this->Form->create('EvaluationResult'); ?>
	<fieldset>
		<legend><?php echo __('Edit Evaluation Result'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('evaluation_id');
		echo $this->Form->input('result');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
</div>
    <div class="span2">
<div class="content_box actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('EvaluationResult.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('EvaluationResult.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Evaluation Results'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Evaluations'), array('controller' => 'evaluations', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Evaluation'), array('controller' => 'evaluations', 'action' => 'add')); ?> </li>
	</ul>
</div>
</div>
</div>
