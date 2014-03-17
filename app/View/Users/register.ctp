<style type="text/css">

div.form {
	margin: 0px auto;
	width: 95%;
	border-left: 1px solid #666;
	padding: 10px 2%;
}


</style>
<div class="top-image">
	<img src="http://themes.webinane.com/lifeline/images/single-page-top1.jpg" alt="" />
</div><!-- Page Top Image -->
<section class="page">
	<div class="page-title">
			<h1><span>Register</span></h1>
		</div><!-- Page Title-->
	<div class="container">

	
		<div class="users form bake-header">
		<?php echo $this->Form->create('User'); ?>
			<fieldset>
				<legend><?php echo __('Registration'); ?></legend>
			<?php
				echo $this->Form->input('username');
				echo $this->Form->input('email');
				echo $this->Form->input('password');
				echo $this->Form->input('password_confirmation', array('type'=>'password'));
				echo $this->Form->input('Skill');
			?>
			</fieldset>
		<?php echo $this->Form->end(__('Submit')); ?>
		</div>


	</div>	
</section>	
