<div class="evaluationResults view">
<h2><?php  echo __('Evaluation Result'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($evaluationResult['EvaluationResult']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Evaluation'); ?></dt>
		<dd>
			<?php echo $this->Html->link($evaluationResult['Evaluation']['id'], array('controller' => 'evaluations', 'action' => 'view', $evaluationResult['Evaluation']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Result'); ?></dt>
		<dd>
			<?php echo h($evaluationResult['EvaluationResult']['result']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Evaluation Result'), array('action' => 'edit', $evaluationResult['EvaluationResult']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Evaluation Result'), array('action' => 'delete', $evaluationResult['EvaluationResult']['id']), null, __('Are you sure you want to delete # %s?', $evaluationResult['EvaluationResult']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Evaluation Results'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Evaluation Result'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Evaluations'), array('controller' => 'evaluations', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Evaluation'), array('controller' => 'evaluations', 'action' => 'add')); ?> </li>
	</ul>
</div>
