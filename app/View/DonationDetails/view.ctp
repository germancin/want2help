<div class="donationDetails view bake-header">
<h2><?php echo __('Donation Detail'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($donationDetail['DonationDetail']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($donationDetail['User']['username'], array('controller' => 'users', 'action' => 'view', $donationDetail['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Project'); ?></dt>
		<dd>
			<?php echo $this->Html->link($donationDetail['Project']['title'], array('controller' => 'projects', 'action' => 'view', $donationDetail['Project']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Need'); ?></dt>
		<dd>
			<?php echo $this->Html->link($donationDetail['Need']['name'], array('controller' => 'needs', 'action' => 'view', $donationDetail['Need']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Need Title'); ?></dt>
		<dd>
			<?php echo h($donationDetail['DonationDetail']['need_title']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Gross Cost'); ?></dt>
		<dd>
			<?php echo h($donationDetail['DonationDetail']['gross_cost']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Paypal Tax'); ?></dt>
		<dd>
			<?php echo h($donationDetail['DonationDetail']['paypal_tax']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Donation Id'); ?></dt>
		<dd>
			<?php echo h($donationDetail['DonationDetail']['donation_id']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions bake-header">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Donation Detail'), array('action' => 'edit', $donationDetail['DonationDetail']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Donation Detail'), array('action' => 'delete', $donationDetail['DonationDetail']['id']), null, __('Are you sure you want to delete # %s?', $donationDetail['DonationDetail']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Donation Details'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Donation Detail'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Projects'), array('controller' => 'projects', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Project'), array('controller' => 'projects', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Needs'), array('controller' => 'needs', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Need'), array('controller' => 'needs', 'action' => 'add')); ?> </li>
	</ul>
</div>
