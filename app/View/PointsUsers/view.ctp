<div class="pointsUsers view bake-header">
<h2><?php echo __('Points User'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($pointsUser['PointsUser']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($pointsUser['User']['username'], array('controller' => 'users', 'action' => 'view', $pointsUser['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Point'); ?></dt>
		<dd>
			<?php echo $this->Html->link($pointsUser['Point']['number'], array('controller' => 'points', 'action' => 'view', $pointsUser['Point']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($pointsUser['PointsUser']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($pointsUser['PointsUser']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions bake-header">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Points User'), array('action' => 'edit', $pointsUser['PointsUser']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Points User'), array('action' => 'delete', $pointsUser['PointsUser']['id']), null, __('Are you sure you want to delete # %s?', $pointsUser['PointsUser']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Points Users'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Points User'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Points'), array('controller' => 'points', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Point'), array('controller' => 'points', 'action' => 'add')); ?> </li>
	</ul>
</div>
