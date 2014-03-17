<div class="projectsSubcategories view bake-header">
<h2><?php echo __('Projects Subcategory'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($projectsSubcategory['ProjectsSubcategory']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Subcategory'); ?></dt>
		<dd>
			<?php echo $this->Html->link($projectsSubcategory['Subcategory']['name'], array('controller' => 'subcategories', 'action' => 'view', $projectsSubcategory['Subcategory']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Project'); ?></dt>
		<dd>
			<?php echo $this->Html->link($projectsSubcategory['Project']['title'], array('controller' => 'projects', 'action' => 'view', $projectsSubcategory['Project']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions bake-header">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Projects Subcategory'), array('action' => 'edit', $projectsSubcategory['ProjectsSubcategory']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Projects Subcategory'), array('action' => 'delete', $projectsSubcategory['ProjectsSubcategory']['id']), null, __('Are you sure you want to delete # %s?', $projectsSubcategory['ProjectsSubcategory']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Projects Subcategories'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Projects Subcategory'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Subcategories'), array('controller' => 'subcategories', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Subcategory'), array('controller' => 'subcategories', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Projects'), array('controller' => 'projects', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Project'), array('controller' => 'projects', 'action' => 'add')); ?> </li>
	</ul>
</div>
