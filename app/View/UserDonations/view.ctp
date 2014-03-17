<div class="userDonations view bake-header">
<h2><?php echo __('User Donation'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($userDonation['UserDonation']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($userDonation['User']['username'], array('controller' => 'users', 'action' => 'view', $userDonation['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Donation'); ?></dt>
		<dd>
			<?php echo $this->Html->link($userDonation['Donation']['transaction_token'], array('controller' => 'donations', 'action' => 'view', $userDonation['Donation']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($userDonation['UserDonation']['created']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions bake-header">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit User Donation'), array('action' => 'edit', $userDonation['UserDonation']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete User Donation'), array('action' => 'delete', $userDonation['UserDonation']['id']), null, __('Are you sure you want to delete # %s?', $userDonation['UserDonation']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List User Donations'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User Donation'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Donations'), array('controller' => 'donations', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Donation'), array('controller' => 'donations', 'action' => 'add')); ?> </li>
	</ul>
</div>
