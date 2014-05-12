<div class="col-md-12">

	<legend>Write a new article</legend>

	<?=form_open(base_url('docs/article/write/'.$chapterID))?>

	<?=form_label('Title', 'title')?>
	<?=form_input('title', '', 'class="form-control" placeholder="Article title..."')?>

	<?=form_label('Body', 'body')?>
	<textarea id="content" name="body"></textarea>

	<br>

	<button type="submit" class="btn btn-primary btn-lg btn-block">Save this article</button>

	<?=form_close()?>
</div>
<div class="col-md-3 pull-right">
</div>

<script>
CKEDITOR.replace('content', {
	height : 350
});
</script>