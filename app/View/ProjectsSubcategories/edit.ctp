<div class="projectsSubcategories form bake-header">
<?php echo $this->Form->create('ProjectsSubcategory'); ?>
	<fieldset>
		<legend><?php echo __('Edit Projects Subcategory'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('subcategory_id');
		echo $this->Form->input('project_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions bake-header">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('ProjectsSubcategory.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('ProjectsSubcategory.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Projects Subcategories'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Subcategories'), array('controller' => 'subcategories', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Subcategory'), array('controller' => 'subcategories', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Projects'), array('controller' => 'projects', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Project'), array('controller' => 'projects', 'action' => 'add')); ?> </li>
	</ul>
</div>
