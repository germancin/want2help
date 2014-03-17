<div class="donations view bake-header">
<h2><?php echo __('Donation'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($donation['Donation']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($donation['User']['username'], array('controller' => 'users', 'action' => 'view', $donation['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Amount'); ?></dt>
		<dd>
			<?php echo h($donation['Donation']['amount']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Payment Status'); ?></dt>
		<dd>
			<?php echo h($donation['Donation']['payment_status']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Transaction Token'); ?></dt>
		<dd>
			<?php echo h($donation['Donation']['transaction_token']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('First Name'); ?></dt>
		<dd>
			<?php echo h($donation['Donation']['first_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Last Name'); ?></dt>
		<dd>
			<?php echo h($donation['Donation']['last_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Payer Id'); ?></dt>
		<dd>
			<?php echo h($donation['Donation']['payer_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Address Street'); ?></dt>
		<dd>
			<?php echo h($donation['Donation']['address_street']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Address Zip'); ?></dt>
		<dd>
			<?php echo h($donation['Donation']['address_zip']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Address Country Code'); ?></dt>
		<dd>
			<?php echo h($donation['Donation']['address_country_code']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Address Name'); ?></dt>
		<dd>
			<?php echo h($donation['Donation']['address_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Num Cart Items'); ?></dt>
		<dd>
			<?php echo h($donation['Donation']['num_cart_items']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Address City'); ?></dt>
		<dd>
			<?php echo h($donation['Donation']['address_city']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Payer Email'); ?></dt>
		<dd>
			<?php echo h($donation['Donation']['payer_email']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Mc Currency'); ?></dt>
		<dd>
			<?php echo h($donation['Donation']['mc_currency']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Payment Date'); ?></dt>
		<dd>
			<?php echo h($donation['Donation']['payment_date']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Address Status'); ?></dt>
		<dd>
			<?php echo h($donation['Donation']['address_status']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Protection Eligibility'); ?></dt>
		<dd>
			<?php echo h($donation['Donation']['protection_eligibility']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($donation['Donation']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($donation['Donation']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions bake-header">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Donation'), array('action' => 'edit', $donation['Donation']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Donation'), array('action' => 'delete', $donation['Donation']['id']), null, __('Are you sure you want to delete # %s?', $donation['Donation']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Donations'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Donation'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
