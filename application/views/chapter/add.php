<div class="container">
	<div class="span8 card">
		
		<legend>Add new chapter</legend>

		<div class="col-md-9">
			<?=form_open(base_url('chapter/add/'.$bookID))?>

			<?=form_hidden('bookID', $bookID)?>

			<?=form_label('Chapter Name', 'name')?>
			<?=form_input('name', set_value('name'), 'class="form-control input" placeholder="Chapter name..."')?>
			<?=form_error('name')?>

			<?=form_label('Chapter Summary', 'description')?>
			<textarea name="description" class="form-control input" placeholder="What is this chapter all about?" rows="6"></textarea>
			<?=form_error('description')?>

			<button type="submit" class="btn btn-primary">Save this chapter</button>

			<?=form_close()?>
		</div>

	</div>
	<div class="span4 card">
		<legend>Options</legend>
		<a href="<?=base_url('book/view/'.$bookID)?>" class="btn btn-primary btn-block">Back to chapters</a>
		<a href="<?=base_url('book/index')?>" class="btn btn-info btn-block">Book Library</a>
	</div>
</div>
