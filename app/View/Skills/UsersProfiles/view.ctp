<div class="usersProfiles view bake-header">
<h2><?php echo __('Users Profile'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($usersProfile['UsersProfile']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($usersProfile['User']['username'], array('controller' => 'users', 'action' => 'view', $usersProfile['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('First Name'); ?></dt>
		<dd>
			<?php echo h($usersProfile['UsersProfile']['first_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Last Name'); ?></dt>
		<dd>
			<?php echo h($usersProfile['UsersProfile']['last_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Address'); ?></dt>
		<dd>
			<?php echo h($usersProfile['UsersProfile']['address']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('City'); ?></dt>
		<dd>
			<?php echo h($usersProfile['UsersProfile']['city']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('State'); ?></dt>
		<dd>
			<?php echo h($usersProfile['UsersProfile']['state']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Zip'); ?></dt>
		<dd>
			<?php echo h($usersProfile['UsersProfile']['zip']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Image Profile'); ?></dt>
		<dd>
			<?php echo h($usersProfile['UsersProfile']['image_profile']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Gender'); ?></dt>
		<dd>
			<?php echo h($usersProfile['UsersProfile']['gender']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('NonUs'); ?></dt>
		<dd>
			<?php echo h($usersProfile['UsersProfile']['nonUs']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($usersProfile['UsersProfile']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($usersProfile['UsersProfile']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions bake-header">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Users Profile'), array('action' => 'edit', $usersProfile['UsersProfile']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Users Profile'), array('action' => 'delete', $usersProfile['UsersProfile']['id']), null, __('Are you sure you want to delete # %s?', $usersProfile['UsersProfile']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Users Profiles'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Users Profile'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
