<style type="text/css">

div.form {
	margin: 0px auto;
	width: 95%;
	border-left: 1px solid #666;
	padding: 10px 2%;
}

.bake-header {
	margin-top: 140px !important;
}

</style>
<div class="users form bake-header">
<?php echo $this->Form->create('User'); ?>
	<fieldset>
		<legend><?php echo __('Login'); ?></legend>
	<?php
		echo $this->Form->input('username');
		echo $this->Form->input('password');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Login')); ?>
</div>

