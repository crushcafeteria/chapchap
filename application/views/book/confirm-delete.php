<div class="col-md-4"></div>
<div class="col-md-4 card text-center">
	<?php //var_dump($book)?>
	<legend>Confirm Delete Action</legend>
	<?=$this->arena->msgBox('This action will delete this book and all its articles. It cannot be rolled back.','Advisory', 'alert-danger', false)?>

	<div class="list-group">
		<div href="#" class="list-group-item">
			Book Name: <?=$book['name']?>
		</div>
		<div href="#" class="list-group-item">
			Created on <?=$this->arena->formatDate('BLOG', $book['created_on'])?>
		</div>
	</div>

	<div class="col-md-6">
		<?=form_open(base_url('book/delete/'.$book['id']))?>
			<?=form_hidden('posted', true)?>
			<?=form_hidden('cancel_action', 'YES')?>
			<button type="submit" class="btn btn-danger btn-block"><i class="icon-remove-sign"></i> Cancel</button>
		<?=form_close()?>
	</div>

	<div class="col-md-6">
		<?=form_open(base_url('book/delete/'.$book['id']))?>
			<?=form_hidden('posted', true)?>
			<?=form_hidden('confirm_action', 'YES')?>
			<button type="submit" class="btn btn-success btn-block"><i class="icon-trash"></i> Delete</button>
		<?=form_close()?>
	</div>

</div>
<div class="col-md-4"></div>