<div class="col-md-8"></div>
<div class="col-md-4">
	
	<legend>Login to <?=$this->config->item('appName')?></legend>

	<?=@$msgBox?>
	<?php 
	if(@$_GET['status']=='logged_out'){
		$this->arena->msgBox('You are now logged out.','Thanks', 'alert-success');

	} else if(@$_GET['status']=='account_created'){
		$this->arena->msgBox('You have created a new user account. Please login to continue.','Welcome', 'alert-success');
	}
	?>

	<?=form_open(base_url('user/login'))?>

	<?=form_label('Email Address', 'email')?>
	<?=form_input('email', set_value('email'), 'placeholder="Enter your email..." class="form-control"')?>
	<?=form_error('email')?>

	<?=form_label('Password', 'password')?>
	<?=form_password('password', '', 'placeholder="Enter your password..." class="form-control"')?>
	<?=form_error('password')?>

	<button type="submit" class="btn btn-success">Login</button>

	<?=form_close()?>
</div>

