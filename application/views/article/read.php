<?php
if(@$_GET['status']=='article_edited'){
	$this->arena->msgBox('This article has been successfully edited', 'Success', 'alert-success');
}
?>


<div clas="col-md-9">

	<legend><?=$article['title']?></legend>

	<p class="lead">
		<?=$article['content']?>
	</p>

	
	<hr>
	<span class="text-muted pull-left">
		<i class="icon-time"></i> 
		This document was updated <?=$this->arena->fbTime($article['last_update'])?> ago
	</span>

	<div>
		<legend>API Link</legend>
		
	</div>

	<div class="btn-group pull-right">
		<a href="<?=base_url('article/edit/'.$article['id'])?>" class="btn btn-primary">Edit this article</a>
		<a href="<?=base_url('article/delete/'.$article['id'])?>" class="btn btn-danger">Delete this article</a>
	</div>
</div>

<div clas="col-md-3">
	<legend>API Link</legend>
	<input type="text" class="form-control" readonly="readonly" value="<?=base_url('api/article/'.$article['id'])?>">

	<legend>Permalink</legend>
	<input type="text" class="form-control" readonly="readonly" value="<?=base_url('api/article/'.$article['id'])?>">
	
</div>