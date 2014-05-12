<div class="col-md-8"></div>
<div class="col-md-4">
	
	<legend>Login to <?=$this->config->item('appName')?></legend>

	<?=@$msgBox?>
	
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

