<div class="batches form bake-header">
<?php echo $this->Form->create('Batch'); ?>
	<fieldset>
		<legend><?php echo __('Edit Batch'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name');
		echo $this->Form->input('slug');
		echo $this->Form->input('image');
		echo $this->Form->input('description');
		echo $this->Form->input('User');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions bake-header">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Batch.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Batch.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Batches'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
