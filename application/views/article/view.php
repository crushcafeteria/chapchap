<div class="col-md-9">

	<?php //var_dump($chapter, $articles);?>

	<h3>
		Chapter: <?=$chapter['name']?> 
		<div class="text-muted pull-right">
			<?=count($articles)?> articles
		</div>
	</h3>

	<hr>

	<small class="text-muted">
		<?=$chapter['description']?>
	</small>

	<hr>

	<?php
	if(@$_GET['status']=='success'){
		$this->arena->msgBox('A new chapter has been successfully created', 'Success', 'alert-success');
	} else if(@$_GET['status']=='article_deleted'){
		$this->arena->msgBox('You have successfully deleted an article', 'Success', 'alert-success');
	}
	?>
	
	<?php if(count($articles)==0):?>

		<div class="text-muted lead text-center">
			This chapter has no articles
		</div>

	<?php else:?>

		<div class="list-group">
			<?php foreach ($articles as $article):?>
					
				<a href="<?=base_url('article/read/'.$article['id'])?>" class="list-group-item">

					<small class="pull-right text-muted">
						<?=$this->arena->fbTime($article['created_on'])?>
					</small>

					<h4><?=$article['title']?></h4>
					
				</a>
			<?php endforeach;?>
		</div>

		

	<?php endif;?>

</div>
<div class="col-md-3 pull-right">

	<legend>Options</legend>
	
	<a href="<?=base_url('article/write/'.$chapter['id'])?>" class="btn btn-default btn-block">Write new article</a>

</div>