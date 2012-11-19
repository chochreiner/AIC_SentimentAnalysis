<div class="paragraphs form">
<?php echo $this->Form->create('Paragraph'); ?>
	<fieldset>
		<legend><?php echo __('Edit Paragraph'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('article_id');
		echo $this->Form->input('position');
		echo $this->Form->input('text');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Paragraph.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Paragraph.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Paragraphs'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Articles'), array('controller' => 'articles', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Article'), array('controller' => 'articles', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Evaluations'), array('controller' => 'evaluations', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Evaluation'), array('controller' => 'evaluations', 'action' => 'add')); ?> </li>
	</ul>
</div>
