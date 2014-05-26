<div class="col-md-3 pull-left">

	<div class="panel panel-default">
		<div class="panel-body">
		   
		    <legend>Options</legend>
		
			<a href="<?=base_url('chapter/add/'.$book['id'])?>" class="btn btn-success btn-block">Add new Chapter</a>


		</div>
	</div>


	<div class="panel panel-default">
		<div class="panel-body">
		   
		    <legend>Book Name</legend>
			<?=$book['name']?>

			<legend>Stats</legend>
			<?=count($chapters)?> chapters

		</div>
	</div>

		
		
	
</div>






<div class="col-md-9 pull-right">

	<?php
	if(@$_GET['status']=='success'){
		$this->arena->msgBox('Operation has been successfully applied', 'Action Complete!', 'alert-success');
	} else if(@$_GET['status']=='failed'){
		$this->arena->msgBox('Operation has failed! Please try again later', 'Operation Failed!', 'alert-danger');
	} 
	?>

	<legend>
		Book: <?=$book['name']?> 
		<div class="text-muted pull-right">
			<?=count($chapters)?> chapters
		</div>
	</legend>

	
	<?php if(count($chapters)==0):?>

		<div class="text-muted lead text-center">
			This book has no chapters
		</div>

	<?php else:?>

			<?php foreach ($chapters as $chapter):?>

				<div class="col-md-6">
					<div class="panel panel-default">
						  <div class="panel-heading">
								<h3 class="panel-title">
									<a href="<?=base_url('article/view/'.$chapter['id'])?>"><?=$chapter['name']?></a>
								</h3>
						  </div>
						  <div class="panel-body chapter-desc">
								<p><?=$this->arena->sentenceCase($chapter['description'])?></p>
						  </div>
						  <div class="panel-footer text-muted">

							    <div class="btn-group">
									<a href="<?=base_url('article/write/'.$chapter['id'])?>" class="btn btn-success btn-xs" title="Write article in this chapter">Write</a>
									<a href="<?=base_url('chapter/edit/'.$chapter['id'])?>" class="btn btn-primary btn-xs">Edit</a>
								</div>

								<span class="pull-right">
									<div class="btn-group">
										<a href="<?=base_url('chapter/delete/'.$chapter['book_id'].'/'.$chapter['id'])?>" class="btn btn-danger btn-xs">Delete</a>
									</div>
								</span>
						  </div>
					</div>
				</div>

			<?php endforeach;?>

		<!-- <?php var_dump($chapters);?> -->

	<?php endif;?>

</div>


<script>
$('.chapter-desc').slimScroll({
	height: '250px'
})

$('[title]').tooltip({
	placement: 'bottom'
});
</script>