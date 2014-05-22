<div class="col-md-12">

	<legend>New article under <span title="<?=substr($chapter['description'], 0, 150)?>..."><?=$chapter['name']?></span></legend>

	<?=form_open(base_url('article/write/'.$chapter['id']))?>

	<?=form_hidden('chapter_id', $chapter['id'])?>

	<?=form_label('Title', 'title')?>
	<?=form_input('title', set_value('title'), 'class="form-control" placeholder="Article title..."')?>
	<?=form_error('title')?>

	<?=form_label('Content', 'content')?>
	<textarea id="content" name="content"><?=set_value('content')?></textarea>
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