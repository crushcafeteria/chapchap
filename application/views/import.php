<div class="container">

	<div class="span9 card">
		<?php
		if(@$_GET['status']=='rollback'){
			$this->arena->msgBox('An error occured while swapping information database. All changes have been rolled back.', 'Error. Rollback Initiated!', 'alert-warning');
		} else if(@$_GET['status']=='failed'){
			$this->arena->msgBox('Operation has failed! Please try again later', 'Operation Failed!', 'alert-danger');
		} else if(@$_GET['status']=='import_success'){
			$this->arena->msgBox('The information database has been successfully swapped with another version', 'Database Imported', 'alert-success');
		} 
		?>

		<?=form_open_multipart(base_url('sync/import'))?>

		<legend>Choose a file</legend>
		<?=form_upload('import_file')?>
		<?=form_hidden('import_auth', 'TRUE')?>

		<button type="submit" class="btn btn-success"><i class="icon-upload"></i> Upload Database</button>

		<?=form_close();?>


	</div>

	<div class="span3 card pull-right">
		<legend>Options</legend>
		<a href="<?=base_url('book/all')?>" class="btn btn-primary btn-block"><i class="icon-list-ul"></i> List all books</a>
	</div>
</div>
