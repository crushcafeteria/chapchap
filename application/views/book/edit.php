<div class="col-md-8">
	<legend>Edit Book</legend>

	<?=form_open(base_url('book/edit/'.$book['id']));?>

	<?=form_hidden('book_id', $book['id'])?>

	<?=form_label('Book name', 'name');?>
	<?=form_input(array('name'=>'name', 'value'=>$book['name'], 'class'=>'form-control input-xxlarge', 'placeholder'=>'Enter the name of this book...'));?>
	<?=form_error('name')?>

	<?=form_label('Book Description', 'description');?>
	<textarea name="description" class="form-control input-xxlarge" placeholder="What is this book all about?" rows="10"><?=$book['description']?></textarea>
	<?=form_error('description')?>

	<br>

	<?=form_submit(array('name'=>'submit', 'value'=>'Save this book', 'class'=>'btn btn-primary'))?>

	<?=form_close()?>

</div>

<div class="col-md-4 pull-right">
	<legend>Options</legend>

	<a href="<?=base_url('docs/index')?>" class="btn btn-default btn-block">List all books</a>
</div>




