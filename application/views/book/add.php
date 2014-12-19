<div class="col-md-8">
	<legend>Add new book</legend>

	<?=form_open(base_url('book/add'));?>

	<?=form_label('Book name', 'name');?>
	<?=form_input(array('name'=>'name', 'class'=>'form-control input-xxlarge', 'autofocus'=>'autofocus', 'placeholder'=>'Enter the name of this book...'));?>
	<?=form_error('name')?>

	<?=form_label('Book Description', 'description');?>
	<textarea name="description" class="form-control" placeholder="What is this book all about?" rows="6"></textarea>
	<?=form_error('description')?>

	<br>

	<?=form_submit(array('name'=>'submit', 'value'=>'Save this book', 'class'=>'btn btn-primary'))?>

	<?=form_close()?>
</div>


<div class="col-md-4 pull-right">
	<legend>Options</legend>

	<a href="<?=base_url('book/index')?>" class="btn btn-primary btn-block">Back to books</a>
</div>
