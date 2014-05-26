<?php
// var_dump($chapter);

?>

<div class="col-md-9">

<legend>Edit chapter</legend>
	
<?=form_open(base_url('chapter/edit/'.$chapter['book_id']))?>

<?=form_hidden('book_id', $chapter['book_id'])?>
<?=form_hidden('chapter_id', $chapter['id'])?>

<?=form_label('Chapter Name', 'name')?>
<?=form_input('name', $chapter['name'], 'class="form-control" placeholder="Chapter name..."')?>
<?=form_error('name')?>

<?=form_label('Chapter Summary', 'description')?>
<textarea name="description" class="form-control" placeholder="What is this chapter all about?" rows="10"><?=$chapter['description']?></textarea>
<?=form_error('description')?>

<button type="submit" class="btn btn-primary">Save this chapter</button>


<?=form_close()?>

</div>
<div class="col-md-3 pull-right">
	
	<legend>Options</legend>

	<a href="<?=base_url('chapter/view/'.$chapter['book_id'])?>" class="btn btn-warning btn-block">Back to chapters</a>
</div>