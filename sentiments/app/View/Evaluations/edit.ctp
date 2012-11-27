<div class="row">
    <div class="span10">
<div class="content_box evaluations form">
<?php echo $this->Form->create('Evaluation'); ?>
	<fieldset>
		<legend><?php echo __('Edit Evaluation'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('paragraph_id');
		echo $this->Form->input('brand_id');
		echo $this->Form->input('question');
		echo $this->Form->input('task_url');
		echo $this->Form->input('type');
		echo $this->Form->input('rating');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
</div>
    <div class="span2">
<div class="content_box actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Evaluation.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Evaluation.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Evaluations'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Paragraphs'), array('controller' => 'paragraphs', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Paragraph'), array('controller' => 'paragraphs', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Brands'), array('controller' => 'brands', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Brand'), array('controller' => 'brands', 'action' => 'add')); ?> </li>
	</ul>
</div>
</div>
</div>
