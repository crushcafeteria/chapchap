<div class="col-md-9">
	<legend>All Books</legend>

	<?php

	if(@$_GET['status']=='success'){
		$this->arena->msgBox('Operation has been successfully applied', 'Action Complete!', 'alert-success');
	} else if(@$_GET['status']=='failed'){
		$this->arena->msgBox('Operation has failed! Please try again later', 'Operation Failed!', 'alert-danger');
	} 

	// var_dump($books);

	?>

	<?php if(count($books)==0):?>
		<div class="text-muted lead text-center">
			There are no books
		</div>
	<?php else:?>

			<?php foreach ($books as $book):?>


				<div class="col-md-6">
					<div class="panel panel-default">
						  <div class="panel-heading">
								<h3 class="panel-title">
									<a href="<?=base_url('chapter/view/'.$book['id'])?>"><?=$book['name']?></a>
								</h3>
						  </div>
						  <div class="panel-body book-desc">
								<p><?=$this->arena->sentenceCase($book['description'])?></p>
						  </div>
						  <div class="panel-footer text-muted">
								<small>
									<?=$this->arena->fbTime($book['created_on'])?>
								</small>

								<span class="pull-right">
									<div class="btn-group">
										<a href="<?=base_url('book/edit/'.$book['id'])?>" class="btn btn-primary btn-xs">Edit</a>
										<a href="<?=base_url('book/delete/'.$book['id'])?>" class="btn btn-danger btn-xs">Delete</a>
									</div>
								</span>
						  </div>
					</div>
				</div>

			<?php endforeach;?>

	<?php endif;?>

</div>


<div class="col-md-3 pull-right">
	<legend>Options</legend>

	<a href="<?=base_url('book/add')?>" class="btn btn-default btn-block">New Book</a>
</div>

<script>
$('.book-desc').slimScroll({
	height: '150px'
})
</script>