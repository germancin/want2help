<div class="donationDetails form bake-header">
<?php echo $this->Form->create('DonationDetail'); ?>
	<fieldset>
		<legend><?php echo __('Edit Donation Detail'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('user_id');
		echo $this->Form->input('project_id');
		echo $this->Form->input('need_id');
		echo $this->Form->input('need_title');
		echo $this->Form->input('gross_cost');
		echo $this->Form->input('paypal_tax');
		echo $this->Form->input('donation_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions bake-header">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('DonationDetail.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('DonationDetail.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Donation Details'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Projects'), array('controller' => 'projects', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Project'), array('controller' => 'projects', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Needs'), array('controller' => 'needs', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Need'), array('controller' => 'needs', 'action' => 'add')); ?> </li>
	</ul>
</div>
