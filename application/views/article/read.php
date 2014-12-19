<div class="col-md-4 pull-right">
	<legend>Options</legend>

	<a href="<?=base_url('article/edit/'.$article['id'])?>" class="btn btn-default btn-block">Edit this article</a>
	<a href="<?=base_url('articles/'.$article['book_id'])?>" class="btn btn-default btn-block">List all articles</a>
</div>

<div class="col-md-8">

	<legend>
		<?=$article['title']?>
	</legend>

	<?php
	if(@$_GET['status']=='article_edited'){
		$this->arena->msgBox('This article has been successfully edited', 'Success', 'alert-success');
	}
	?>

	<div class="reader">
		<?php if(empty($article['content'])):?>
			<?php $this->load->view('common/no-results', array('msg'=>'There are no articles to display'))?>
		<?php else:?>
			<?=decode_sudolink($article['content'])?>
		<?php endif;?>
	</div>

	<hr>

	<span class="text-muted pull-right">
		<i class="icon-time"></i> 
		This document was updated <?=$this->arena->fbTime($article['last_update'])?> ago
	</span>

</div>

<div class="col-md-8">

	<legend>Tag Link</legend>
	<input type="text" value="<?=$this->config->item('help_root_link')?>/document/<?=$article['id']?>" class="form-control">
	<a target="_blank" class="pull-right" href="<?=$this->config->item('help_root_link')?>/document/<?=$article['id']?>" title="Preview"><i class="icon-eye-open"></i></a>

	<legend>API Link</legend>
	<input type="text" value="<?=$this->config->item('api_root_link')?>/api/article/<?=$article['id']?>" class="form-control">
	<a target="_blank" class="pull-right" href="<?=$this->config->item('api_root_link')?>/api/article/<?=$article['id']?>" title="Preview"><i class="icon-eye-open"></i></a>

</div>


	


<script type="text/javascript">
	$('.input').hover(function(){
		$(this).select();
	})
</script>


