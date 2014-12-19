<div class="col-md-8">

	<legend>All Books</legend>
	<?php
	if(@$_GET['status']=='book_added'){
		$this->arena->msgBox('You have successfully created a new book', 'Book Added!', 'alert-success');
	} else if(@$_GET['status']=='edited'){
		$this->arena->msgBox('You have successfully edited a book', 'Changes Saved!', 'alert-success');
	} else if(@$_GET['status']=='edit_failed'){
		$this->arena->msgBox('An unexpected error occured while editing this book! Please try again later', 'Ooops...', 'alert-danger');
	} else if(@$_GET['status']=='deleted'){
		$this->arena->msgBox('You have successfully deleted a book', 'Book Deleted!', 'alert-success');
	} else if(@$_GET['status']=='delete_failed'){
		$this->arena->msgBox('An unexpected error occured while deleting this book! Please try again later', 'Ooops...', 'alert-danger');
	} else if(@$_GET['status']=='delete_cancelled'){
		$this->arena->msgBox('You have cancelled a delete operation', 'Action Confirmed!', 'alert-success');
	} else if(@$_GET['status']=='import_success'){
		$this->arena->msgBox('The information database has been successfully swapped with another version', 'Database Imported', 'alert-success');
	} 
	?>

	<?php if(count($books)==0):?>
		<?php $this->load->view('common/no-results', array('msg'=>'There are no books available for display.<br/> Click '.anchor(base_url('book/add'), 'here').' to add a book'))?>
	<?php else:?>

		<ul class="list-group">
			<?php foreach ($books as $book):?>
				<div href="<?=base_url('articles/'.$book['id'])?>" class="list-group-item">
					<small class="pull-right">
						<i class="icon-time"></i> 
						<?=$this->arena->fbTime($book['created_on'])?> ago
					</small>
					<h4 class="list-group-item-heading"><?=$book['name']?></h4>
					<p class="list-group-item-text text-muted">
						<small>
							<?php if(empty($book['description'])):?>
								No description available
							<?php else:?>
								<?=$this->arena->sentenceCase($book['description'])?>
							<?php endif;?>
						</small>
					</p>
					<div style="border-top: 1px solid #dddddd; margin:5px 0px 0px 0px; padding: 5px 0px 0px 0px;">
						
						<a href="<?=base_url('articles/'.$book['id'])?>" class="btn btn-success btn-xs" title="Open this book"><i class="icon-file"></i> Open this book</a>

						<span class="pull-right">
							<a href="<?=base_url('book/edit/'.$book['id'])?>" class="btn btn-primary btn-xs" title="Edit this book"><i class="icon-edit"></i> Edit</a>
							<a href="<?=base_url('book/download/'.$book['id'])?>" class="btn btn-warning btn-xs" title="Download this book"><i class="icon-download-alt"></i> Download</a>
							<a href="<?=base_url('book/delete/'.$book['id'])?>" class="btn btn-danger btn-xs" title="Delete this book"><i class="icon-remove-sign"></i> Delete</a>
						</span>
					</div>
				</div>
			<?php endforeach;?>

		</ul>

	<?php endif;?>
</div>

<div class="col-md-4 pull-right">
	<legend>Options</legend>
	<a href="<?=base_url('book/add')?>" class="btn btn-primary btn-block btn-sm"><i class="icon-plus-sign"></i> Create a new book</a>
	<hr>
	<a href="<?=base_url('sync/import')?>" class="btn btn-default btn-block btn-sm"><i class="icon-upload"></i> Import Database</a>
	<a href="<?=base_url('sync/export')?>" class="btn btn-primary btn-block btn-sm"><i class="icon-download"></i> Export Database</a>
	<small class="muted">
		This function will export everything in signed JSON format. 
		Never EVER EVER manually edit this file.
	</small>
</div>


<script>
	$('.book-desc').slimScroll({
		height: '150px'
	})
</script>