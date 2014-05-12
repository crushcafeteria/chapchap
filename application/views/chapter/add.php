<legend>Add new chapter</legend>

<div class="col-md-9">
	
<?=form_open(base_url('docs/chapter/add/'.$bookID))?>

<?=form_hidden('bookID', $bookID)?>

<?=form_label('Chapter Name', 'name')?>
<?=form_input('name', '', 'class="form-control" placeholder="Chapter name..."')?>
<?=form_error('name')?>

<?=form_label('Chapter Summary', 'description')?>
<textarea name="description" class="form-control" placeholder="What is this chapter all about?" rows="6"></textarea>
<?=form_error('description')?>

<button type="submit" class="btn btn-primary">Save this chapter</button>


<?=form_close()?>

</div>
<div class="col-md-3 pull-right">
	
	<legend>Options</legend>

	<a href="<?=base_url('docs/book/view/'.$bookID)?>" class="btn btn-default btn-block">List all chapters</a>
</div>