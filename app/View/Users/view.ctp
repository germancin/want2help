<div class="users view bake-header">
<h2><?php echo __('User'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($user['User']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Username'); ?></dt>
		<dd>
			<?php echo h($user['User']['username']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Password'); ?></dt>
		<dd>
			<?php echo h($user['User']['password']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Email'); ?></dt>
		<dd>
			<?php echo h($user['User']['email']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Mobile'); ?></dt>
		<dd>
			<?php echo h($user['User']['mobile']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Birthday'); ?></dt>
		<dd>
			<?php echo h($user['User']['birthday']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Certify'); ?></dt>
		<dd>
			<?php echo h($user['User']['certify']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Role'); ?></dt>
		<dd>
			<?php echo $this->Html->link($user['Role']['name'], array('controller' => 'roles', 'action' => 'view', $user['Role']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($user['User']['created']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions bake-header">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit User'), array('action' => 'edit', $user['User']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete User'), array('action' => 'delete', $user['User']['id']), null, __('Are you sure you want to delete # %s?', $user['User']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Roles'), array('controller' => 'roles', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Role'), array('controller' => 'roles', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Donation Details'), array('controller' => 'donation_details', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Donation Detail'), array('controller' => 'donation_details', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Donations'), array('controller' => 'donations', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Donation'), array('controller' => 'donations', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Batches'), array('controller' => 'batches', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Batch'), array('controller' => 'batches', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Points'), array('controller' => 'points', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Point'), array('controller' => 'points', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Projects'), array('controller' => 'projects', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Project'), array('controller' => 'projects', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Skills'), array('controller' => 'skills', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Skill'), array('controller' => 'skills', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Donation Details'); ?></h3>
	<?php if (!empty($user['DonationDetail'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('Project Id'); ?></th>
		<th><?php echo __('Need Id'); ?></th>
		<th><?php echo __('Type'); ?></th>
		<th><?php echo __('Need Title'); ?></th>
		<th><?php echo __('Gross Cost'); ?></th>
		<th><?php echo __('Paypal Tax'); ?></th>
		<th><?php echo __('Donation Id'); ?></th>
		<th><?php echo __('Quantity'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($user['DonationDetail'] as $donationDetail): ?>
		<tr>
			<td><?php echo $donationDetail['id']; ?></td>
			<td><?php echo $donationDetail['user_id']; ?></td>
			<td><?php echo $donationDetail['project_id']; ?></td>
			<td><?php echo $donationDetail['need_id']; ?></td>
			<td><?php echo $donationDetail['type']; ?></td>
			<td><?php echo $donationDetail['need_title']; ?></td>
			<td><?php echo $donationDetail['gross_cost']; ?></td>
			<td><?php echo $donationDetail['paypal_tax']; ?></td>
			<td><?php echo $donationDetail['donation_id']; ?></td>
			<td><?php echo $donationDetail['quantity']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'donation_details', 'action' => 'view', $donationDetail['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'donation_details', 'action' => 'edit', $donationDetail['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'donation_details', 'action' => 'delete', $donationDetail['id']), null, __('Are you sure you want to delete # %s?', $donationDetail['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Donation Detail'), array('controller' => 'donation_details', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Donations'); ?></h3>
	<?php if (!empty($user['Donation'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('Amount'); ?></th>
		<th><?php echo __('Payment Status'); ?></th>
		<th><?php echo __('Transaction Token'); ?></th>
		<th><?php echo __('First Name'); ?></th>
		<th><?php echo __('Last Name'); ?></th>
		<th><?php echo __('Payer Id'); ?></th>
		<th><?php echo __('Address Street'); ?></th>
		<th><?php echo __('Address Zip'); ?></th>
		<th><?php echo __('Address Country Code'); ?></th>
		<th><?php echo __('Address Name'); ?></th>
		<th><?php echo __('Num Cart Items'); ?></th>
		<th><?php echo __('Address City'); ?></th>
		<th><?php echo __('Payer Email'); ?></th>
		<th><?php echo __('Mc Currency'); ?></th>
		<th><?php echo __('Payment Date'); ?></th>
		<th><?php echo __('Address Status'); ?></th>
		<th><?php echo __('Protection Eligibility'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($user['Donation'] as $donation): ?>
		<tr>
			<td><?php echo $donation['id']; ?></td>
			<td><?php echo $donation['user_id']; ?></td>
			<td><?php echo $donation['amount']; ?></td>
			<td><?php echo $donation['payment_status']; ?></td>
			<td><?php echo $donation['transaction_token']; ?></td>
			<td><?php echo $donation['first_name']; ?></td>
			<td><?php echo $donation['last_name']; ?></td>
			<td><?php echo $donation['payer_id']; ?></td>
			<td><?php echo $donation['address_street']; ?></td>
			<td><?php echo $donation['address_zip']; ?></td>
			<td><?php echo $donation['address_country_code']; ?></td>
			<td><?php echo $donation['address_name']; ?></td>
			<td><?php echo $donation['num_cart_items']; ?></td>
			<td><?php echo $donation['address_city']; ?></td>
			<td><?php echo $donation['payer_email']; ?></td>
			<td><?php echo $donation['mc_currency']; ?></td>
			<td><?php echo $donation['payment_date']; ?></td>
			<td><?php echo $donation['address_status']; ?></td>
			<td><?php echo $donation['protection_eligibility']; ?></td>
			<td><?php echo $donation['created']; ?></td>
			<td><?php echo $donation['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'donations', 'action' => 'view', $donation['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'donations', 'action' => 'edit', $donation['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'donations', 'action' => 'delete', $donation['id']), null, __('Are you sure you want to delete # %s?', $donation['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Donation'), array('controller' => 'donations', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Batches'); ?></h3>
	<?php if (!empty($user['Batch'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Slug'); ?></th>
		<th><?php echo __('Image'); ?></th>
		<th><?php echo __('Description'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($user['Batch'] as $batch): ?>
		<tr>
			<td><?php echo $batch['id']; ?></td>
			<td><?php echo $batch['name']; ?></td>
			<td><?php echo $batch['slug']; ?></td>
			<td><?php echo $batch['image']; ?></td>
			<td><?php echo $batch['description']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'batches', 'action' => 'view', $batch['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'batches', 'action' => 'edit', $batch['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'batches', 'action' => 'delete', $batch['id']), null, __('Are you sure you want to delete # %s?', $batch['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Batch'), array('controller' => 'batches', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Points'); ?></h3>
	<?php if (!empty($user['Point'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Number'); ?></th>
		<th><?php echo __('Action'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($user['Point'] as $point): ?>
		<tr>
			<td><?php echo $point['id']; ?></td>
			<td><?php echo $point['number']; ?></td>
			<td><?php echo $point['action']; ?></td>
			<td><?php echo $point['created']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'points', 'action' => 'view', $point['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'points', 'action' => 'edit', $point['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'points', 'action' => 'delete', $point['id']), null, __('Are you sure you want to delete # %s?', $point['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Point'), array('controller' => 'points', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Projects'); ?></h3>
	<?php if (!empty($user['Project'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Title'); ?></th>
		<th><?php echo __('Address'); ?></th>
		<th><?php echo __('City'); ?></th>
		<th><?php echo __('State'); ?></th>
		<th><?php echo __('Zipcode'); ?></th>
		<th><?php echo __('Short Description'); ?></th>
		<th><?php echo __('Description'); ?></th>
		<th><?php echo __('Video'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($user['Project'] as $project): ?>
		<tr>
			<td><?php echo $project['id']; ?></td>
			<td><?php echo $project['title']; ?></td>
			<td><?php echo $project['address']; ?></td>
			<td><?php echo $project['city']; ?></td>
			<td><?php echo $project['state']; ?></td>
			<td><?php echo $project['zipcode']; ?></td>
			<td><?php echo $project['short_description']; ?></td>
			<td><?php echo $project['description']; ?></td>
			<td><?php echo $project['video']; ?></td>
			<td><?php echo $project['created']; ?></td>
			<td><?php echo $project['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'projects', 'action' => 'view', $project['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'projects', 'action' => 'edit', $project['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'projects', 'action' => 'delete', $project['id']), null, __('Are you sure you want to delete # %s?', $project['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Project'), array('controller' => 'projects', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Skills'); ?></h3>
	<?php if (!empty($user['Skill'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Slug'); ?></th>
		<th><?php echo __('Description'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($user['Skill'] as $skill): ?>
		<tr>
			<td><?php echo $skill['id']; ?></td>
			<td><?php echo $skill['name']; ?></td>
			<td><?php echo $skill['slug']; ?></td>
			<td><?php echo $skill['description']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'skills', 'action' => 'view', $skill['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'skills', 'action' => 'edit', $skill['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'skills', 'action' => 'delete', $skill['id']), null, __('Are you sure you want to delete # %s?', $skill['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Skill'), array('controller' => 'skills', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
