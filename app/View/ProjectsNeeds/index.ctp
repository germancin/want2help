<div class="projectsNeeds index bake-header">
	<h2><?php echo __('Projects Needs'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('project_id'); ?></th>
			<th><?php echo $this->Paginator->sort('need_id'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($projectsNeeds as $projectsNeed): ?>
	<tr>
		<td><?php echo h($projectsNeed['ProjectsNeed']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($projectsNeed['Project']['title'], array('controller' => 'projects', 'action' => 'view', $projectsNeed['Project']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($projectsNeed['Need']['name'], array('controller' => 'needs', 'action' => 'view', $projectsNeed['Need']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $projectsNeed['ProjectsNeed']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $projectsNeed['ProjectsNeed']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $projectsNeed['ProjectsNeed']['id']), null, __('Are you sure you want to delete # %s?', $projectsNeed['ProjectsNeed']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions bake-header">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Projects Need'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Projects'), array('controller' => 'projects', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Project'), array('controller' => 'projects', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Needs'), array('controller' => 'needs', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Need'), array('controller' => 'needs', 'action' => 'add')); ?> </li>
	</ul>
</div>
