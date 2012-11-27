<div class="row">
    <div class="span10">
<div class="content_box brands view">
<h2><?php  echo __('Brand'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($brand['Brand']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Company'); ?></dt>
		<dd>
			<?php echo $this->Html->link($brand['Company']['name'], array('controller' => 'companies', 'action' => 'view', $brand['Company']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($brand['Brand']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Search Names'); ?></dt>
		<dd>
			<?php echo h($brand['Brand']['search_names']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Target Group Min Age'); ?></dt>
		<dd>
			<?php echo h($brand['Brand']['target_group_min_age']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Target Group Max Age'); ?></dt>
		<dd>
			<?php echo h($brand['Brand']['target_group_max_age']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
</div>
    <div class="span2">
<div class="content_box actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Brand'), array('action' => 'edit', $brand['Brand']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Brand'), array('action' => 'delete', $brand['Brand']['id']), null, __('Are you sure you want to delete # %s?', $brand['Brand']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Brands'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Brand'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Companies'), array('controller' => 'companies', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Company'), array('controller' => 'companies', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Evaluations'), array('controller' => 'evaluations', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Evaluation'), array('controller' => 'evaluations', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Paragraphs'), array('controller' => 'paragraphs', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Paragraph'), array('controller' => 'paragraphs', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Evaluations'); ?></h3>
	<?php if (!empty($brand['Evaluation'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Paragraph Id'); ?></th>
		<th><?php echo __('Brand Id'); ?></th>
		<th><?php echo __('Question'); ?></th>
		<th><?php echo __('Task Url'); ?></th>
		<th><?php echo __('Type'); ?></th>
		<th><?php echo __('Rating'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($brand['Evaluation'] as $evaluation): ?>
		<tr>
			<td><?php echo $evaluation['id']; ?></td>
			<td><?php echo $evaluation['paragraph_id']; ?></td>
			<td><?php echo $evaluation['brand_id']; ?></td>
			<td><?php echo $evaluation['question']; ?></td>
			<td><?php echo $evaluation['task_url']; ?></td>
			<td><?php echo $evaluation['type']; ?></td>
			<td><?php echo $evaluation['rating']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'evaluations', 'action' => 'view', $evaluation['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'evaluations', 'action' => 'edit', $evaluation['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'evaluations', 'action' => 'delete', $evaluation['id']), null, __('Are you sure you want to delete # %s?', $evaluation['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Evaluation'), array('controller' => 'evaluations', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Paragraphs'); ?></h3>
	<?php if (!empty($brand['Paragraph'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Article Id'); ?></th>
		<th><?php echo __('Position'); ?></th>
		<th><?php echo __('Text'); ?></th>
		<th><?php echo __('Evaluated'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($brand['Paragraph'] as $paragraph): ?>
		<tr>
			<td><?php echo $paragraph['id']; ?></td>
			<td><?php echo $paragraph['article_id']; ?></td>
			<td><?php echo $paragraph['position']; ?></td>
			<td><?php echo $paragraph['text']; ?></td>
			<td><?php echo $paragraph['evaluated']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'paragraphs', 'action' => 'view', $paragraph['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'paragraphs', 'action' => 'edit', $paragraph['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'paragraphs', 'action' => 'delete', $paragraph['id']), null, __('Are you sure you want to delete # %s?', $paragraph['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Paragraph'), array('controller' => 'paragraphs', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
</div>
</div>
