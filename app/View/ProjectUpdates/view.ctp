<div class="projectUpdates view bake-header">
<h2><?php echo __('Project Update'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($projectUpdate['ProjectUpdate']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Project'); ?></dt>
		<dd>
			<?php echo $this->Html->link($projectUpdate['Project']['title'], array('controller' => 'projects', 'action' => 'view', $projectUpdate['Project']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Title'); ?></dt>
		<dd>
			<?php echo h($projectUpdate['ProjectUpdate']['title']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Description'); ?></dt>
		<dd>
			<?php echo h($projectUpdate['ProjectUpdate']['description']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Asset'); ?></dt>
		<dd>
			<?php echo h($projectUpdate['ProjectUpdate']['asset']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions bake-header">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Project Update'), array('action' => 'edit', $projectUpdate['ProjectUpdate']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Project Update'), array('action' => 'delete', $projectUpdate['ProjectUpdate']['id']), null, __('Are you sure you want to delete # %s?', $projectUpdate['ProjectUpdate']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Project Updates'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Project Update'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Projects'), array('controller' => 'projects', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Project'), array('controller' => 'projects', 'action' => 'add')); ?> </li>
	</ul>
</div>
