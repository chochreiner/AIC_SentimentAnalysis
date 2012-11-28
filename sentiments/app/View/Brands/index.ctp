<div class="row">
    <div class="span10">
<div class="content_box brands index">
	<h2><?php echo __('Brands'); ?></h2>
	<table class="table table-striped table-condensed table-hover">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('company_id'); ?></th>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th><?php echo $this->Paginator->sort('search_names'); ?></th>
			<th><?php echo $this->Paginator->sort('target_group_min_age'); ?></th>
			<th><?php echo $this->Paginator->sort('target_group_max_age'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
	foreach ($brands as $brand): ?>
	<tr>
		<td><?php echo h($brand['Brand']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($brand['Company']['name'], array('controller' => 'companies', 'action' => 'view', $brand['Company']['id'])); ?>
		</td>
		<td><?php echo h($brand['Brand']['name']); ?>&nbsp;</td>
		<td><?php echo h($brand['Brand']['search_names']); ?>&nbsp;</td>
		<td><?php echo h($brand['Brand']['target_group_min_age']); ?>&nbsp;</td>
		<td><?php echo h($brand['Brand']['target_group_max_age']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $brand['Brand']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $brand['Brand']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $brand['Brand']['id']), null, __('Are you sure you want to delete # %s?', $brand['Brand']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
<?php echo $this->Paginator->pagination(); ?>
</div>
</div>
    <div class="span2">
<div class="content_box actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Brand'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Companies'), array('controller' => 'companies', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Company'), array('controller' => 'companies', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Evaluations'), array('controller' => 'evaluations', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Evaluation'), array('controller' => 'evaluations', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Paragraphs'), array('controller' => 'paragraphs', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Paragraph'), array('controller' => 'paragraphs', 'action' => 'add')); ?> </li>
	</ul>
</div>
</div>
</div>