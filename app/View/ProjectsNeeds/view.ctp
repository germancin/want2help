<div class="projectsNeeds view bake-header">
<h2><?php echo __('Projects Need'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($projectsNeed['ProjectsNeed']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Project'); ?></dt>
		<dd>
			<?php echo $this->Html->link($projectsNeed['Project']['title'], array('controller' => 'projects', 'action' => 'view', $projectsNeed['Project']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Need'); ?></dt>
		<dd>
			<?php echo $this->Html->link($projectsNeed['Need']['name'], array('controller' => 'needs', 'action' => 'view', $projectsNeed['Need']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions bake-header">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Projects Need'), array('action' => 'edit', $projectsNeed['ProjectsNeed']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Projects Need'), array('action' => 'delete', $projectsNeed['ProjectsNeed']['id']), null, __('Are you sure you want to delete # %s?', $projectsNeed['ProjectsNeed']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Projects Needs'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Projects Need'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Projects'), array('controller' => 'projects', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Project'), array('controller' => 'projects', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Needs'), array('controller' => 'needs', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Need'), array('controller' => 'needs', 'action' => 'add')); ?> </li>
	</ul>
</div>
