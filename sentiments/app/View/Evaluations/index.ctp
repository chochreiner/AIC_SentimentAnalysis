<div class="row">
    <div class="span10">
<div class="content_box evaluations index">
	<h2><?php echo __('Evaluations'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('paragraph_id'); ?></th>
			<th><?php echo $this->Paginator->sort('brand_id'); ?></th>
			<th><?php echo $this->Paginator->sort('question'); ?></th>
			<th><?php echo $this->Paginator->sort('task_url'); ?></th>
			<th><?php echo $this->Paginator->sort('type'); ?></th>
			<th><?php echo $this->Paginator->sort('rating'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
	foreach ($evaluations as $evaluation): ?>
	<tr>
		<td><?php echo h($evaluation['Evaluation']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($evaluation['Paragraph']['id'], array('controller' => 'paragraphs', 'action' => 'view', $evaluation['Paragraph']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($evaluation['Brand']['name'], array('controller' => 'brands', 'action' => 'view', $evaluation['Brand']['id'])); ?>
		</td>
		<td><?php echo h($evaluation['Evaluation']['question']); ?>&nbsp;</td>
		<td><?php echo h($evaluation['Evaluation']['task_url']); ?>&nbsp;</td>
		<td><?php echo h($evaluation['Evaluation']['type']); ?>&nbsp;</td>
		<td><?php echo h($evaluation['Evaluation']['rating']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $evaluation['Evaluation']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $evaluation['Evaluation']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $evaluation['Evaluation']['id']), null, __('Are you sure you want to delete # %s?', $evaluation['Evaluation']['id'])); ?>
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
</div>
    <div class="span2">
<div class="content_box actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Evaluation'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Paragraphs'), array('controller' => 'paragraphs', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Paragraph'), array('controller' => 'paragraphs', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Brands'), array('controller' => 'brands', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Brand'), array('controller' => 'brands', 'action' => 'add')); ?> </li>
	</ul>
</div>
</div>
</div>
