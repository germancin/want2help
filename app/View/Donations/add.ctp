<div class="donations form bake-header">
<?php echo $this->Form->create('Donation'); ?>
	<fieldset>
		<legend><?php echo __('Add Donation'); ?></legend>
	<?php
		echo $this->Form->input('user_id');
		echo $this->Form->input('amount');
		echo $this->Form->input('payment_status');
		echo $this->Form->input('transaction_token');
		echo $this->Form->input('first_name');
		echo $this->Form->input('last_name');
		echo $this->Form->input('payer_id');
		echo $this->Form->input('address_street');
		echo $this->Form->input('address_zip');
		echo $this->Form->input('address_country_code');
		echo $this->Form->input('address_name');
		echo $this->Form->input('num_cart_items');
		echo $this->Form->input('address_city');
		echo $this->Form->input('payer_email');
		echo $this->Form->input('mc_currency');
		echo $this->Form->input('payment_date');
		echo $this->Form->input('address_status');
		echo $this->Form->input('protection_eligibility');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions bake-header">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Donations'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
