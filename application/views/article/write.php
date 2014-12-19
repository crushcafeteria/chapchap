<div class="container">

	<div class="col-md-8">
		<legend>New article in <span title="<?=substr($book['description'], 0, 150)?>..."><?=$book['name']?></span></legend>

		<?=form_open(base_url('article/write/'.$book['id']))?>

		<?=form_hidden('book_id', $book['id'])?>

		<?=form_label('Title', 'title')?>
		<?=form_input('title', set_value('title'), 'class="form-control" autofocus placeholder="Article title..."')?>
		<?=form_error('title')?>

		<?=form_label('Content', 'content')?>
		<textarea id="content" name="content" class="form-control"><?=set_value('content')?></textarea>
		<?=form_error('content')?>

		<br>

		<button type="submit" class="btn btn-success btn-sm">Save this article</button>

		<?=form_close()?>
	</div>

	<div class="col-md-4 pull-right">
		<legend>Options</legend>
		<a href="<?=base_url('articles/'.$book['id'])?>" class="btn btn-primary btn-block">Go Back</a>
	</div>

</div>

<script>
	$(document).ready(function(){
		CKEDITOR.replace('content', {
			height : 350,
			skin: 'office',
			filebrowserBrowseUrl 	: "<?=base_url('assets/ckfinder/ckfinder.html')?>",
		});

		$('[title]').tooltip({
			placement: 'right'
		});
	});	
</script>