<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
	<legend id="myModalLabel">
		Preview | 
		<?php if($item['type']=='articles'):?>
			<?=$item['title']?>
		<?php else:?>
			<?=$item['name']?>
		<?php endif;?>
	</legend>
</div>
<div class="modal-body">
	<div class="">
		<?php if($item['type']=='articles'):?>
			<?=$item['content']?>
		<?php else:?>
			<?=$item['description']?>
		<?php endif;?>
	</div>
</div>
<div class="modal-footer">
	<button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
</div>

<?php //var_dump($item)?>