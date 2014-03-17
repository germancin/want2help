<div class="userDonations form bake-header">
<?php echo $this->Form->create('UserDonation'); ?>
	<fieldset>
		<legend><?php echo __('Add User Donation'); ?></legend>
	<?php
		echo $this->Form->input('user_id');
		echo $this->Form->input('donation_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions bake-header">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List User Donations'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Donations'), array('controller' => 'donations', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Donation'), array('controller' => 'donations', 'action' => 'add')); ?> </li>
	</ul>
</div>
