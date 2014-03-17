<div class="needs form bake-header">
<?php echo $this->Form->create('Need'); ?>
	<fieldset>
		<legend><?php echo __('Edit Need'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name');
		echo $this->Form->input('prox_value');
		echo $this->Form->input('description');
		echo $this->Form->input('Project');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions bake-header">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Need.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Need.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Needs'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Projects'), array('controller' => 'projects', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Project'), array('controller' => 'projects', 'action' => 'add')); ?> </li>
	</ul>
</div>
