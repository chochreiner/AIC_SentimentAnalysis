<div class="row">
    <div class="span10">
        <div class="content_box companies index">
	        <legend><?php echo $this->fetch('title'); ?></legend>
	        <table class="table table-striped table-condensed table-hover">
	            <tr>
			        <th><?php echo $this->Paginator->sort('id'); ?></th>
			        <th><?php echo $this->Paginator->sort('name'); ?></th>
			        <th class="actions"><?php echo __('Actions'); ?></th>
	            </tr>
	            <?php
	                foreach ($companies as $company): ?>
	                <tr>
		                <td><?php echo h($company['Company']['id']); ?>&nbsp;</td>
		                <td><?php echo h($company['Company']['name']); ?>&nbsp;</td>
		                <td class="actions">
			                <?php echo $this->Html->link(__('View'), array('action' => 'view', $company['Company']['id'])); ?>
			                <?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $company['Company']['id'])); ?>
			                <?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $company['Company']['id']), null, __('Are you sure you want to delete # %s?', $company['Company']['id'])); ?>
		                </td>
	                </tr>
                    <?php endforeach; ?>
	        </table>
	        <p>
	            <?php
	                echo $this->Paginator->counter(array(
	                'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')));
	            ?>	</p>

	        <div class="paging">
	        <?php
		        echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		        echo $this->Paginator->numbers(array('separator' => ''));
		        echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	        ?>
	        </div>
        </div>
    </div>
    <div class="span2">
        <div class="content_box actions">
	        <legend><?php echo __('Actions'); ?></legend>
	        <ul>
		        <li><?php echo $this->Html->link(__('New Company'), array('action' => 'add')); ?></li>
		        <li><?php echo $this->Html->link(__('List Brands'), array('controller' => 'brands', 'action' => 'index')); ?> </li>
		        <li><?php echo $this->Html->link(__('New Brand'), array('controller' => 'brands', 'action' => 'add')); ?> </li>
	        </ul>
	    </div>
    </div>
</div>    
