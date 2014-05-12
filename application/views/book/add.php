<div class="col-md-9">
	<legend>Add new DocBook</legend>

	<?=form_open(base_url('docs/book/add'));?>

	<?=form_label('Book name', 'name');?>
	<?=form_input(array('name'=>'name', 'class'=>'form-control', 'placeholder'=>'Enter the name of this book...'));?>
	<?=form_error('name')?>

	<?=form_label('Book Description', 'description');?>
	<textarea name="description" class="form-control" placeholder="What is this book all about?" rows="6"></textarea>
	<?=form_error('description')?>

	<?=form_submit(array('name'=>'submit', 'value'=>'Save this book', 'class'=>'btn btn-primary'))?>

	<?=form_close()?>

</div>


<div class="col-md-3 pull-right">
	<legend>Options</legend>

	<a href="<?=base_url('docs/index')?>" class="btn btn-default btn-block">List all books</a>
</div>