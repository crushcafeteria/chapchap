<div class="col-md-12">

	<legend>Edit article</legend>

	<?=form_open(base_url('article/edit/'.$article['id']))?>

	<?=form_hidden('article_id', $article['id'])?>

	<?=form_label('Title', 'title')?>
	<?=form_input('title', $article['title'], 'class="form-control" placeholder="Article title..."')?>
	<?=form_error('title')?>

	<?=form_label('Content', 'content')?>
	<textarea id="content" name="content"><?=$article['content']?></textarea>
	<?=form_error('content')?>

	<br>

	<button type="submit" class="btn btn-primary btn-lg btn-block">Save this article</button>

	<?=form_close()?>
</div>
<div class="col-md-3 pull-right">
</div>

<script>
CKEDITOR.replace('content', {
	height : 350,
	skin: 'office'
});

$('[title]').tooltip({
	placement: 'right'
});
</script>