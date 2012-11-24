<div class="evaluationResults index">
	<h2><?php echo __('Evaluation Results'); ?></h2>
	<table cellpadding="0" cellspacing="0">
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
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>

	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Evaluation Result'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Evaluations'), array('controller' => 'evaluations', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Evaluation'), array('controller' => 'evaluations', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Grab Results from MobileWorks'), array('controller' => 'evaluationResults', 'action' => 'grabResultsFromMW')); ?> </li>
	</ul>
</div>
