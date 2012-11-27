<div class="row">
    <div class="span10">
<div class="content_box paragraphs form">
<?php echo $this->Form->create('Paragraph'); ?>
	<fieldset>
		<legend><?php echo __('Add Paragraph'); ?></legend>
	<?php
		echo $this->Form->input('article_id');
		echo $this->Form->input('position');
		echo $this->Form->input('text');
		echo $this->Form->input('evaluated');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
</div>
    <div class="span2">
<div class="content_box actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Paragraphs'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Articles'), array('controller' => 'articles', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Article'), array('controller' => 'articles', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Evaluations'), array('controller' => 'evaluations', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Evaluation'), array('controller' => 'evaluations', 'action' => 'add')); ?> </li>
	</ul>
</div>
</div>
</div>
