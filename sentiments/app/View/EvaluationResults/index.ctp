<div class="row">
    <div class="span10">

<div class="content_box evaluationResults index">
	<legend><?php echo __('Evaluation Results'); ?></legend>
	<div class="table_box">
	<table class="table table-striped table-condensed table-hover">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('evaluation_id'); ?></th>
			<th><?php echo $this->Paginator->sort('result'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
	foreach ($evaluationResults as $evaluationResult): ?>
	<tr>
		<td><?php echo h($evaluationResult['EvaluationResult']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($evaluationResult['Evaluation']['id'], array('controller' => 'evaluations', 'action' => 'view', $evaluationResult['Evaluation']['id'])); ?>
		</td>
		<td><?php echo h($evaluationResult['EvaluationResult']['result']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $evaluationResult['EvaluationResult']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $evaluationResult['EvaluationResult']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $evaluationResult['EvaluationResult']['id']), null, __('Are you sure you want to delete # %s?', $evaluationResult['EvaluationResult']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	</div>
<?php echo $this->Paginator->pagination(); ?>
</div>
</div>
    <div class="span2">
<div class="content_box actions">
	<legend><?php echo __('Actions'); ?></legend>
	<ul>
		<li><?php echo $this->Html->link(__('New Evaluation Result'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Evaluations'), array('controller' => 'evaluations', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Evaluation'), array('controller' => 'evaluations', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Grab Results from MobileWorks'), array('controller' => 'evaluationResults', 'action' => 'grabResultsFromMW')); ?> </li>
	</ul>
</div>
</div>
</div>
