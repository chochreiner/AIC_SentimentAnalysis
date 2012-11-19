<div class="paragraphs view">
<h2><?php  echo __('Paragraph'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($paragraph['Paragraph']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Article'); ?></dt>
		<dd>
			<?php echo $this->Html->link($paragraph['Article']['title'], array('controller' => 'articles', 'action' => 'view', $paragraph['Article']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Position'); ?></dt>
		<dd>
			<?php echo h($paragraph['Paragraph']['position']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Text'); ?></dt>
		<dd>
			<?php echo h($paragraph['Paragraph']['text']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Evaluated'); ?></dt>
		<dd>
			<?php echo h($paragraph['Paragraph']['evaluated']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Paragraph'), array('action' => 'edit', $paragraph['Paragraph']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Paragraph'), array('action' => 'delete', $paragraph['Paragraph']['id']), null, __('Are you sure you want to delete # %s?', $paragraph['Paragraph']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Paragraphs'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Paragraph'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Articles'), array('controller' => 'articles', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Article'), array('controller' => 'articles', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Evaluations'), array('controller' => 'evaluations', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Evaluation'), array('controller' => 'evaluations', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Evaluations'); ?></h3>
	<?php if (!empty($paragraph['Evaluation'])): ?>
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
		foreach ($paragraph['Evaluation'] as $evaluation): ?>
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
