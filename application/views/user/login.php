<div class="container page">
	<div class="col-md-4"></div>
	<div class="col-md-4 card" style="margin-top: 20px;">
		
		<legend>Login with your Arena account</legend>

		<?=@$msgBox?>
		<?php 
		if(@$_GET['status']=='logged_out'){
			$this->arena->msgBox('You are now logged out.','Thanks', 'alert-success');

		} else if(@$_GET['status']=='account_created'){
			$this->arena->msgBox('You have created a new user account. Please login to continue.','Welcome', 'alert-success');
		}
		?>

		<?=form_open(base_url('user/login'))?>

		<!-- ADD NEXT URL -->
	    <?php if(@$_GET['status']=='access_denied'):?>
	        <?=form_hidden('next', urlencode($_GET['next']))?>
	    <?php endif;?>

		<?=form_label('Email address', 'email')?>
		<?=form_input('email', set_value('email'), 'placeholder="Enter your email address..." class="form-control"')?>
		<?=form_error('email')?>

		<?=form_label('Password', 'password')?>
		<?=form_password('password', '', 'placeholder="Enter your password..." class="form-control"')?>
		<?=form_error('password')?>

		<hr>

		<button type="submit" class="btn btn-success btn-block btn-sm">Login</button>

		<?=form_close()?>

	</div>
	<div class="col-md-4"></div>



</div>

	