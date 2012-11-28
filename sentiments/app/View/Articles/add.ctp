<div class="row">
    <div class="span10">
<div class="content_box articles form">
<?php echo $this->Form->create('Article', array('class' => 'form-horizontal')); ?>
	<fieldset>
		<legend><?php echo __('Add Article'); ?></legend>
	<?php
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
</div>
    <div class="span2">
<div class="content_box actions">
	<legend><?php echo __('Actions'); ?></legend>
	<ul>

		<li><?php echo $this->Html->link(__('List Articles'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Paragraphs'), array('controller' => 'paragraphs', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Paragraph'), array('controller' => 'paragraphs', 'action' => 'add')); ?> </li>
	</ul>
</div>
</div>
</div>
