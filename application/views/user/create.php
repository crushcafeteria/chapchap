<div class="container page">

	<div class="span4 pull-left"></div>
	<div class="span4 card">
		<legend>Create a new account</legend>

		<?=form_open(base_url('user/create'))?>

		<?=form_label('Names', 'names')?>
		<?=form_input('names', set_value('names'), 'class="input" placeholder="Enter your full names..."')?>
		<?=form_error('names')?>

		<?=form_label('Gender', 'gender')?>
		<?=form_dropdown('gender', array('male'=>'Male', 'female'=>'Female', ''=>'Choose'), '', 'class="input"');?>
		<?=form_error('gender')?>

		<?=form_label('Email', 'email')?>
		<?=form_input('email', set_value('email'), 'class="input" placeholder="Enter your email address..."')?>
		<?=form_error('email')?>

		<?=form_label('Password', 'password')?>
		<?=form_password('password', set_value('password'), 'class="input" placeholder="Enter your password..."')?>
		<?=form_error('password')?>

		<?=form_label('Retype Password', 'confirm_password')?>
		<?=form_password('confirm_password', set_value('confirm_password'), 'class="input" placeholder="Retype your password..."')?>
		<?=form_error('confirm_password')?>

		<button type="sublit" class="btn btn-primary">Create Account</button>

		<?=form_close()?>
	</div>
	<div class="span4 pull-right"></div>

</div>