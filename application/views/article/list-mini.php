<div class="container">
	
	

	<div class="col-md-8">

		<legend>
			<?=$book['name']?> 
			<div class="label label-success pull-right">
				<?=count($articles)?> articles
			</div>
		</legend>

		<?php
		if(@$_GET['status']=='article_created'){
			$this->arena->msgBox('You have successfully created a new article', 'Article Created', 'alert-success');
		} else if(@$_GET['status']=='article_deleted'){
			$this->arena->msgBox('You have successfully deleted an article', 'Success', 'alert-success');
		}
		?>

		<?php if(count($articles)==0):?>
			<?php $this->load->view('common/no-results', array('msg'=>'No articles have been created in this book.<br> You can '.anchor(base_url('article/write/'.$book['id']), 'click here').' to create an article.'))?>
		<?php else:?>

			<div class="list-group">
				<?php foreach ($articles as $article):?>
					<a href="<?=base_url('article/read/'.$article['id'])?>" class="list-group-item">
						<small class="text-muted pull-right">
							<i class="icon-time"></i> 
							<?=$this->arena->fbTime($article['last_update'])?> ago
						</small>
						<?=$article['title']?>
					</a>
				<?php endforeach;?>

		<?php endif;?>
	</div>

	<div class="col-md-4">
		<legend>Options</legend>
		<a href="<?=base_url('article/write/'.$book['id'])?>" class="btn btn-primary btn-block"><i class="icon-edit"></i> Write new article</a>
		<a href="<?=base_url('books')?>" class="btn btn-info btn-block"><i class="icon-arrow-left"></i> Back to books</a>
	</div>

</div>

	
