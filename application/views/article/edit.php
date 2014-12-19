	<div class="col-md-9">
		<legend>Edit Article: <?=$article['title']?></legend>

		<?=form_open(base_url('article/edit/'.$article['id']))?>

		<?=form_hidden('article_id', $article['id'])?>

		<?=form_label('Title', 'title')?>
		<?=form_input('title', $article['title'], 'class="form-control" id="title" placeholder="Article title..."')?>
		<?=form_error('title')?>

		<?=form_label('Content', 'content')?>
		<textarea id="content" name="content"><?=$article['content']?></textarea>
		<span class="autosave_feed pull-right"></span>
		<?=form_error('content')?>

		<br>

		<button type="submit" class="btn btn-primary btn-lg btn-block">Save this article</button>

		<?=form_close()?>
	</div>

	<div class="col-md-3 pull-right">
		<legend>Options</legend>
		<a href="<?=base_url('articles/'.$article['book_id'])?>" class="btn btn-primary btn-block"><i class="icon-arrow-left"></i> Back to articles</a>
	</div>

	<div class="col-md-3 pull-right">
		<legend>SudoLinker</legend>

		<label>Search For:</label>
		<select class="c-type form-control">
			<option value="ARTICLES">Articles</option>
			<option value="BOOKS">Books</option>
		</select>

		<label>Enter Keyword:</label>
		<input type="text" class="q-slug form-control" placeholder="Enter keyword...">

		<a href="#search-slug" class="searchSlug btn btn-default btn-sm">Find</a>

		<hr>
		<div class="col-md-12 slug-results">
			No results to display
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

		/*Search for a slug on click or ENTER*/
		$('.searchSlug').click(function(){
			searchSlugs()
		})

		$('.q-slug').keyup(function(){
			if(event.keyCode==13){
				searchSlugs();
			}
		})

		/*autosave*/
		setInterval(function(){
			autosave();
		}, <?=$this->config->item('autosave_interval')?>);
	});

	function searchSlugs(){

		$('.slug-feed').empty();
		$('.slug-results').html(li);

		$.get(
			'<?=base_url('slug/search')?>?t='+$('.c-type').val()+'&q='+$('.q-slug').val(),
			function(response){
				response = $.parseJSON(response);

				if(response.status=='MISSING_DATA'){
					$('.slug-results').html(response.msgBox);
				} else if(response.status=='EMPTY'){
					$('.slug-results').html(response.msgBox);
				} else if(response.status=='OK'){
					$('.slug-results').html(response.html);
				}
			}
		)
	}


	function autosave(){
		$('.autosave_feed').html('<i class="icon-refresh icon-spin"></i> Autosaving changes...');
		$.post(
			'<?=base_url('article/edit/'.$article['id'].'/ajax')?>',
			{
				article_id	: 	<?=$article['id']?>,
				title 		: 	$('#title').val(),
				content		: 	CKEDITOR.instances.content.getData()
			}, function(response){
				response = $.parseJSON(response);

				if(response.status=='SUCCESS'){
					$('.autosave_feed').html('<i class="icon-ok-sign"></i> Last autosaved on '+response.timestamp)
				} else if(response.status=='FAILED'){
					$('.autosave_feed').html('<i class="icon-remove-sign"></i> Autosave failed. Reconnecting in '+(<?=$this->config->item('autosave_interval')?>/1000)+' seconds...')
				}

			}
		);

	}

</script>