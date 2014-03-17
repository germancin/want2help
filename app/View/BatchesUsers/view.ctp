<div class="batchesUsers view bake-header">
<h2><?php echo __('Batches User'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($batchesUser['BatchesUser']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($batchesUser['User']['username'], array('controller' => 'users', 'action' => 'view', $batchesUser['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Batch'); ?></dt>
		<dd>
			<?php echo $this->Html->link($batchesUser['Batch']['name'], array('controller' => 'batches', 'action' => 'view', $batchesUser['Batch']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions bake-header">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Batches User'), array('action' => 'edit', $batchesUser['BatchesUser']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Batches User'), array('action' => 'delete', $batchesUser['BatchesUser']['id']), null, __('Are you sure you want to delete # %s?', $batchesUser['BatchesUser']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Batches Users'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Batches User'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Batches'), array('controller' => 'batches', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Batch'), array('controller' => 'batches', 'action' => 'add')); ?> </li>
	</ul>
</div>
