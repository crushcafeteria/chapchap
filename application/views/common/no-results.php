<div class="col-md-12 text-center text-warning">

	<i class="icon-frown icon-3x"></i>
	<br>
	<?php if(!isset($msg)):?>
		<p class="">
			There are no results to display
		</p>
	<?php else:?>
		<?=$msg?>
	<?php endif;?>

</div>