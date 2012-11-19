<div class="evaluations view">
<h2><?php  echo __('Evaluation'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($evaluation['Evaluation']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Paragraph'); ?></dt>
		<dd>
			<?php echo $this->Html->link($evaluation['Paragraph']['id'], array('controller' => 'paragraphs', 'action' => 'view', $evaluation['Paragraph']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Brand'); ?></dt>
		<dd>
			<?php echo $this->Html->link($evaluation['Brand']['name'], array('controller' => 'brands', 'action' => 'view', $evaluation['Brand']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Question'); ?></dt>
		<dd>
			<?php echo h($evaluation['Evaluation']['question']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Task Url'); ?></dt>
		<dd>
			<?php echo h($evaluation['Evaluation']['task_url']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Type'); ?></dt>
		<dd>
			<?php echo h($evaluation['Evaluation']['type']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Rating'); ?></dt>
		<dd>
			<?php echo h($evaluation['Evaluation']['rating']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Evaluation'), array('action' => 'edit', $evaluation['Evaluation']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Evaluation'), array('action' => 'delete', $evaluation['Evaluation']['id']), null, __('Are you sure you want to delete # %s?', $evaluation['Evaluation']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Evaluations'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Evaluation'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Paragraphs'), array('controller' => 'paragraphs', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Paragraph'), array('controller' => 'paragraphs', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Brands'), array('controller' => 'brands', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Brand'), array('controller' => 'brands', 'action' => 'add')); ?> </li>
	</ul>
</div>
