<div class="content_box  articles index">
	<legend><?php echo __('Articles'); ?></legend>
	
	<div class="actions">
        <ul class="actionlink">
		    <li><?php echo $this->Html->link(__('New Article'), array('action' => 'add'), array('class'=>'btn')); ?></li>
		    <li><?php echo $this->Html->link(__('List Paragraphs'), array('controller' => 'paragraphs', 'action' => 'index'), array('class'=>'btn')); ?> </li>
		    <li><?php echo $this->Html->link(__('New Paragraph'), array('controller' => 'paragraphs', 'action' => 'add'), array('class'=>'btn')); ?> </li>
	    </ul>
    </div>
	<div class="table_box">
	<table class="table table-striped table-condensed table-hover">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('author'); ?></th>
			<th><?php echo $this->Paginator->sort('title'); ?></th>
			<th><?php echo $this->Paginator->sort('publish_date'); ?></th>
			<th><?php echo $this->Paginator->sort('link'); ?></th>
			<th><?php echo $this->Paginator->sort('guid'); ?></th>
			<th><?php echo $this->Paginator->sort('source'); ?></th>
			<th><?php echo $this->Paginator->sort('content'); ?></th>
			<th><?php echo $this->Paginator->sort('channel'); ?></th>
			<th><?php echo $this->Paginator->sort('evaluated'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
	foreach ($articles as $article): ?>
	<tr>
		<td><?php echo h($article['Article']['id']); ?>&nbsp;</td>
		<td><?php echo h($article['Article']['author']); ?>&nbsp;</td>
		<td><?php echo h($article['Article']['title']); ?>&nbsp;</td>
		<td><?php echo h($article['Article']['publish_date']); ?>&nbsp;</td>
		<td><?php echo h($article['Article']['link']); ?>&nbsp;</td>
		<td><?php echo h($article['Article']['guid']); ?>&nbsp;</td>
		<td><?php echo h($article['Article']['source']); ?>&nbsp;</td>
		<td><?php echo h($article['Article']['content']); ?>&nbsp;</td>
		<td><?php echo h($article['Article']['channel']); ?>&nbsp;</td>
		<td><?php echo h($article['Article']['evaluated']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $article['Article']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $article['Article']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $article['Article']['id']), null, __('Are you sure you want to delete # %s?', $article['Article']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	</div>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>

	<div class="pagination">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
