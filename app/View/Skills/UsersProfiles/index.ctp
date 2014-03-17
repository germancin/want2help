<div class="usersProfiles index bake-header">
	<h2><?php echo __('Users Profiles'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('user_id'); ?></th>
			<th><?php echo $this->Paginator->sort('first_name'); ?></th>
			<th><?php echo $this->Paginator->sort('last_name'); ?></th>
			<th><?php echo $this->Paginator->sort('address'); ?></th>
			<th><?php echo $this->Paginator->sort('city'); ?></th>
			<th><?php echo $this->Paginator->sort('state'); ?></th>
			<th><?php echo $this->Paginator->sort('zip'); ?></th>
			<th><?php echo $this->Paginator->sort('image_profile'); ?></th>
			<th><?php echo $this->Paginator->sort('gender'); ?></th>
			<th><?php echo $this->Paginator->sort('nonUs'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($usersProfiles as $usersProfile): ?>
	<tr>
		<td><?php echo h($usersProfile['UsersProfile']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($usersProfile['User']['username'], array('controller' => 'users', 'action' => 'view', $usersProfile['User']['id'])); ?>
		</td>
		<td><?php echo h($usersProfile['UsersProfile']['first_name']); ?>&nbsp;</td>
		<td><?php echo h($usersProfile['UsersProfile']['last_name']); ?>&nbsp;</td>
		<td><?php echo h($usersProfile['UsersProfile']['address']); ?>&nbsp;</td>
		<td><?php echo h($usersProfile['UsersProfile']['city']); ?>&nbsp;</td>
		<td><?php echo h($usersProfile['UsersProfile']['state']); ?>&nbsp;</td>
		<td><?php echo h($usersProfile['UsersProfile']['zip']); ?>&nbsp;</td>
		<td><?php echo h($usersProfile['UsersProfile']['image_profile']); ?>&nbsp;</td>
		<td><?php echo h($usersProfile['UsersProfile']['gender']); ?>&nbsp;</td>
		<td><?php echo h($usersProfile['UsersProfile']['nonUs']); ?>&nbsp;</td>
		<td><?php echo h($usersProfile['UsersProfile']['created']); ?>&nbsp;</td>
		<td><?php echo h($usersProfile['UsersProfile']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $usersProfile['UsersProfile']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $usersProfile['UsersProfile']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $usersProfile['UsersProfile']['id']), null, __('Are you sure you want to delete # %s?', $usersProfile['UsersProfile']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Users Profile'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
