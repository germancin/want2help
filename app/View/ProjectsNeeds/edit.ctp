<div class="projectsNeeds form bake-header">
<?php echo $this->Form->create('ProjectsNeed'); ?>
	<fieldset>
		<legend><?php echo __('Edit Projects Need'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('project_id');
		echo $this->Form->input('need_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions bake-header">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('ProjectsNeed.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('ProjectsNeed.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Projects Needs'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Projects'), array('controller' => 'projects', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Project'), array('controller' => 'projects', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Needs'), array('controller' => 'needs', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Need'), array('controller' => 'needs', 'action' => 'add')); ?> </li>
	</ul>
</div>
