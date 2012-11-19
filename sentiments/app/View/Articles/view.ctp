<div class="articles view">
<h2><?php  echo __('Article'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($article['Article']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Author'); ?></dt>
		<dd>
			<?php echo h($article['Article']['author']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Title'); ?></dt>
		<dd>
			<?php echo h($article['Article']['title']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Publish Date'); ?></dt>
		<dd>
			<?php echo h($article['Article']['publish_date']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Link'); ?></dt>
		<dd>
			<?php echo h($article['Article']['link']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Guid'); ?></dt>
		<dd>
			<?php echo h($article['Article']['guid']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Source'); ?></dt>
		<dd>
			<?php echo h($article['Article']['source']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Content'); ?></dt>
		<dd>
			<?php echo h($article['Article']['content']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Channel'); ?></dt>
		<dd>
			<?php echo h($article['Article']['channel']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Evaluated'); ?></dt>
		<dd>
			<?php echo h($article['Article']['evaluated']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Article'), array('action' => 'edit', $article['Article']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Article'), array('action' => 'delete', $article['Article']['id']), null, __('Are you sure you want to delete # %s?', $article['Article']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Articles'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Article'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Paragraphs'), array('controller' => 'paragraphs', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Paragraph'), array('controller' => 'paragraphs', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Paragraphs'); ?></h3>
	<?php if (!empty($article['Paragraph'])): ?>
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
		foreach ($article['Paragraph'] as $paragraph): ?>
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
