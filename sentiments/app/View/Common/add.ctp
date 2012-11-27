<div class="row">
    <div class="span10">
        <div class="content_box companies form">
            <?php echo $this->Form->create('Company'); ?>
	        <fieldset>
		        <legend><?php echo __('Add Company'); ?></legend>
	            <?php
		            echo $this->Form->input('name');
	            ?>
	        </fieldset>
            <?php echo $this->Form->end(__('Submit')); ?>
        </div>
    </div>
    <div class="span2">
        <div class="content_box actions">
	        <legend><?php echo __('Actions'); ?></legend>
	            <ul>
		            <li><?php echo $this->Html->link(__('List Companies'), array('action' => 'index')); ?></li>
		            <li><?php echo $this->Html->link(__('List Brands'), array('controller' => 'brands', 'action' => 'index')); ?> </li>
		            <li><?php echo $this->Html->link(__('New Brand'), array('controller' => 'brands', 'action' => 'add')); ?> </li>
	            </ul>
        </div>
    </div> 
</div>
