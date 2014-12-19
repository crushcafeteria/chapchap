<div class="container">
	
	

	<div class="col-md-8">
		<?php //var_dump($book, $articles);?>

		<legend>
			<?=$book['name']?> 
			<div class="label label-success pull-right">
				<?=count($articles)?> articles
			</div>
		</legend>

		<small class="text-muted">
			<?php if(empty($book['description'])):?>
				No description available
			<?php else:?>
				<?=$this->arena->sentenceCase($book['description'])?>
			<?php endif;?>
		</small>

		<small class="pull-right text-muted">
			<i class="icon-user"></i> 
			Book by 
			<?=$book['created_by']['fname']?>
			<?=$book['created_by']['lname']?>
		</small>

		<hr>

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

				<?php foreach ($articles as $article):?>
					<div class="panel panel-default">
						<div class="panel-body">
							<legend><?=$article['title']?></legend>
						   	<p>
						   		<?php if(empty($article['content'])):?>
						   			<div class="text-center text-muted">
						   				<i class="icon-frown icon-2x"></i> <br>
						   				This article is empty.<br>
						   				Click <?=anchor(base_url('article/edit/'.$article['id']), 'here')?> to add content
					   				</div>
						   		<?php else:?>	
						   			<?=word_limiter($article['content'], $this->config->item('article_teaser_length'))?>
						   		<?php endif;?>
						   	</p>

						   	<div class="article-options">
						   		<div class="btn-group">
						   			<a href="<?=base_url('article/read/'.$article['id'])?>" class="btn btn-success btn-sm"><i class="icon-book"></i> Read</a>
						   			<a href="<?=base_url('article/edit/'.$article['id'])?>" class="btn btn-primary btn-sm"><i class="icon-edit"></i> Edit</a>
						   			<a href="<?=base_url('article/delete/'.$article['id'])?>" class="btn btn-danger btn-sm"><i class="icon-trash"></i> Delete</a>
						   		</div>

						   		<span class="text-muted pull-right" style="padding-top: 10px;">
									<i class="icon-time"></i> 
									Last updated <?=$this->arena->fbTime($article['last_update'])?> ago
								</span>

						   	</div>

							   	
						</div>
					</div>
				<?php endforeach;?>

		<?php endif;?>
	</div>

	<div class="col-md-4">
		<legend>Options</legend>
		<a href="<?=base_url('article/write/'.$book['id'])?>" class="btn btn-primary btn-block"><i class="icon-edit"></i> Write new article</a>
		<a href="<?=base_url('books')?>" class="btn btn-info btn-block"><i class="icon-arrow-left"></i> Back to books</a>
	</div>

</div>

	
