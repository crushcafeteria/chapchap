<div class="container">
	<div class="span3 card pull-left nav-left" data-spy="affix" data-offset-top="200">

		<div class="panel panel-default">
			<div class="panel-body">
				<legend>Options</legend>
				<a href="<?=base_url('chapter/add/'.$book['id'])?>" class="btn btn-success btn-block"><i class="icon-plus-sign"></i> Add new Chapter</a>
			</div>
		</div>

		<div class="panel panel-default">
			<div class="panel-body">
				<legend>Information</legend>
				<h4>Book: <?=$book['name']?></h4>
				<h4>Total Chapters: <?=$stats['total_chapters']?></h4>
			</div>
		</div>
	</div>
	<div class="span9 pull-right">
		<?php
		if(@$_GET['status']=='success'){
			$this->arena->msgBox('Operation has been successfully applied', 'Action Complete!', 'alert-success');
		} else if(@$_GET['status']=='failed'){
			$this->arena->msgBox('Operation has failed! Please try again later', 'Operation Failed!', 'alert-danger');
		}
		?>

		<?php if(count($chapters)==0):?>
			<div class="text-muted lead text-center">
				This book has no chapters
			</div>
		<?php else:?>
			<?php foreach ($chapters as $chapter):?>

				<div class="card text-left">
					<h3 class="card-heading simple">
						<a href="<?=base_url('article/view/'.$chapter['id'])?>"><?=$chapter['name']?></a>
					</h3>
					<div class="card-body">
						<h4>
							<?=$this->arena->sentenceCase($chapter['description'])?>
						</h4>
						<hr>
						<div class="articles">
							<h4 class="muted">This chapter has <?=count($chapter['articles'])?> articles</h4>

							<?php if(count($chapter['articles'])==0):?>

								<div class="text-center text-error">
									<i class="icon-frown icon-2x"></i><br>
									This chapter has no articles
								</div>

							<?php else:?>

								<table class="table table-hover">

									<?php foreach ($chapter['articles'] as $key => $article):?>
										<tr>
											<td><?=$article['title']?></td>
											<td>
												<small class="label">
													<?=$this->arena->fbTime($article['created_on'])?> ago
												</small>
											</td>
											<td>
												<div class="btn-group pull-right">
													<a href="<?=base_url('article/read/'.$article['id'])?>" class="btn btn-success"><i class="icon-book"></i> Read</a>
													<a href="<?=base_url('article/edit/'.$article['id'])?>" class="btn btn-primary"><i class="icon-edit"></i> Edit</a>
												</div>
											</td>
										</tr>

									<?php endforeach;?>
								</table>

							<?php endif;?>


							<hr>
						</div>
					</div>
					<div class="card-body">
						<a href="<?=base_url('article/write/'.$chapter['id'])?>" class="btn btn-success"><i class="icon-plus-sign"></i> Write Article</a>
						<a href="<?=base_url('chapter/edit/'.$chapter['id'])?>" class="btn btn-primary"><i class="icon-edit"></i> Edit Chapter</a>

						<a href="<?=base_url('chapter/delete/'.$chapter['book_id'].'/'.$chapter['id'])?>" class="btn btn-danger pull-right"><i class="icon-remove-sign"></i> Delete</a>
					</div>
				</div>

			<?php endforeach;?>

			<!-- <?php var_dump($chapters);?> -->

		<?php endif;?>

	</div>
</div>

<script>
	$('.chapter-desc').slimScroll({
		height: '100px'
	})

	$('[title]').tooltip({
		placement: 'bottom'
	});

	$('.nav-left').affix();


</script>