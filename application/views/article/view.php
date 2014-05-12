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
	}
	?>
	
	<?php if(count($articles)==0):?>

		<div class="text-muted lead text-center">
			This chapter has no articles
		</div>

	<?php else:?>

		<div class="list-group">
			<?php foreach ($articles as $article):?>
					
				<a href="<?=base_url('docs/articles/show/'.$article['id'])?>" class="list-group-item">

					<small class="pull-right text-muted">
						<?=$this->arena->fbTime($article['created_on'])?>
					</small>

					<h4 class="text-info" style="border-bottom: 1px solid #f5f5f5;"><?=$article['name']?></h4>
					
					<div style="text-align: justify;">
						<?=$this->arena->sentenceCase($article['description'])?>
					</div>
					
				</a>
			<?php endforeach;?>
		</div>

		

	<?php endif;?>

</div>
<div class="col-md-3 pull-right">

	<legend>Options</legend>
	
	<a href="<?=base_url('docs/article/write/'.$chapter['id'])?>" class="btn btn-default btn-block">Write new article</a>

</div>