<div class="col-md-9">

	<h3>
		<?=$book['name']?> 
		<div class="text-muted pull-right">
			<?=count($chapters)?> chapters
		</div>
	</h3>

	<hr>

	<small class="text-muted">
		<?=$book['description']?>
	</small>

	<hr>

	<?php
	if(@$_GET['status']=='success'){
		$this->arena->msgBox('A new chapter has been successfully created', 'Success', 'alert-success');
	}
	?>
	
	<?php if(count($chapters)==0):?>

		<div class="text-muted lead text-center">
			This book has no chapters
		</div>

	<?php else:?>

		<div class="list-group">
			<?php foreach ($chapters as $chapter):?>
					
				<a href="<?=base_url('docs/article/view/'.$chapter['id'])?>" class="list-group-item">

					<small class="pull-right text-muted">
						<?=$this->arena->fbTime($chapter['created_on'])?>
					</small>

					<h4 class="text-info" style="border-bottom: 1px solid #f5f5f5;"><?=$chapter['name']?></h4>
					
					<div style="text-align: justify;">
						<?=$this->arena->sentenceCase($chapter['description'])?>
					</div>
					
				</a>
			<?php endforeach;?>
		</div>

		<?php var_dump($chapters);?>

	<?php endif;?>

</div>
<div class="col-md-3 pull-right">

	<legend>Options</legend>
	
	<a href="<?=base_url('docs/chapter/add/'.$book['id'])?>" class="btn btn-default btn-block">Add new Chapter</a>

</div>