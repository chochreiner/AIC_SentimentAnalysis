<div class="articles form">
<?php echo $this->Form->create('Article'); ?>
	<fieldset>
		<legend><?php echo __('Edit Article'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('author');
		echo $this->Form->input('title');
		echo $this->Form->input('publish_date');
		echo $this->Form->input('link');
		echo $this->Form->input('guid');
		echo $this->Form->input('source');
		echo $this->Form->input('content');
		echo $this->Form->input('channel');
		echo $this->Form->input('evaluated');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Article.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Article.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Articles'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Paragraphs'), array('controller' => 'paragraphs', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Paragraph'), array('controller' => 'paragraphs', 'action' => 'add')); ?> </li>
	</ul>
</div>
