<div class="col-md-9">
	<legend>Welcome to Arena Docs</legend>

	<?php

	if(@$_GET['status']=='success'){
		$this->arena->msgBox('A new book has been successfully created', 'Success', 'alert-success');
	}

	// var_dump($books);

	?>

	<?php if(count($books)==0):?>
		<div class="text-muted lead text-center">
			There are no books
		</div>
	<?php else:?>

		<div class="list-group">
			<?php foreach ($books as $book):?>
					
				<a href="<?=base_url('docs/chapter/view/'.$book['id'])?>" class="list-group-item">

					<small class="pull-right text-muted">
						<?=$this->arena->fbTime($book['created_on'])?>
					</small>

					<h4 class="text-info" style="border-bottom: 1px solid #f5f5f5;"><?=$book['name']?></h4>
					<div style="text-align: justify;">
						<?=$this->arena->sentenceCase($book['description'])?>
					</div>

					

					
				</a>
			<?php endforeach;?>
		</div>

	<?php endif;?>

</div>


<div class="col-md-3 pull-right">
	<legend>Options</legend>

	<a href="<?=base_url('docs/book/add')?>" class="btn btn-default btn-block">New Book</a>
</div>