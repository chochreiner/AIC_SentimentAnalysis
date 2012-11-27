
<div class=" content_box paragraphs index">
	<legend><?php echo __('Paragraphs'); ?></legend>
	
	<div class="actions">
	<ul class="actionlink">
		<li><?php echo $this->Html->link(__('New Paragraph'), array('action' => 'add'), array('class'=>'btn')); ?></li>
		<li><?php echo $this->Html->link(__('List Articles'), array('controller' => 'articles', 'action' => 'index'), array('class'=>'btn')); ?> </li>
		<li><?php echo $this->Html->link(__('New Article'), array('controller' => 'articles', 'action' => 'add'), array('class'=>'btn')); ?> </li>
		<li><?php echo $this->Html->link(__('List Evaluations'), array('controller' => 'evaluations', 'action' => 'index'), array('class'=>'btn')); ?> </li>
		<li><?php echo $this->Html->link(__('New Evaluation'), array('controller' => 'evaluations', 'action' => 'add'), array('class'=>'btn')); ?> </li>
	</ul>
    </div>
	
	
	<table class=" table table-striped table-condensed table-hover" cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('article_id'); ?></th>
			<th><?php echo $this->Paginator->sort('position'); ?></th>
			<th><?php echo $this->Paginator->sort('text'); ?></th>
			<th><?php echo $this->Paginator->sort('evaluated'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
	foreach ($paragraphs as $paragraph): ?>
	<tr>
		<td><?php echo h($paragraph['Paragraph']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($paragraph['Article']['title'], array('controller' => 'articles', 'action' => 'view', $paragraph['Article']['id'])); ?>
		</td>
		<td><?php echo h($paragraph['Paragraph']['position']); ?>&nbsp;</td>
		<td><?php echo h($paragraph['Paragraph']['text']); ?>&nbsp;</td>
		<td><?php echo h($paragraph['Paragraph']['evaluated']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $paragraph['Paragraph']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $paragraph['Paragraph']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $paragraph['Paragraph']['id']), null, __('Are you sure you want to delete # %s?', $paragraph['Paragraph']['id'])); ?>
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
