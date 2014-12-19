<table class="table-hover" width="100%">

	<?php foreach ($results as $key => $result):?>
		<tr>
			<?php if($_GET['t']=='ARTICLES'):?>
				<td><?=$result['title']?></td>
			<?php else:?>
				<td><?=$result['name']?></td>
			<?php endif;?>
			<td>
				<a href="#preview-slug-<?=$result['id']?>" class="preview-<?=$result['id']?>" style="margin-right: 5px;" title="Preview"><i class="icon-fullscreen"></i> </a>
				&nbsp
				<a href="#insert-slug-<?=$result['id']?>" class="insert-<?=$result['id']?>" title="Insert"><i class="icon-paste"></i> </a>
			</td>
		</tr>

		<script>
		$('.preview-<?=$result['id']?>').click(function(){
			$('#dialog').modal('show').html(li).load('<?=base_url('slug/preview/'.strtolower($_GET['t']).'/'.$result['id'])?>')
		})

		$('.insert-<?=$result['id']?>').click(function(){
			<?php if($_GET['t']=='ARTICLES'):?>
				CKEDITOR.instances.content.insertText('[article:<?=$result['id']?>:<?=$result['title']?>]');
			<?php elseif($_GET['t']=='CHAPTERS'):?>
				CKEDITOR.instances.content.insertText('[chapter:<?=$result['id']?>:<?=$result['name']?>]');
			<?php elseif($_GET['t']=='BOOKS'):?>
				CKEDITOR.instances.content.insertText('[book:<?=$result['id']?>:<?=$result['name']?>]');
			<?php endif;?>
		})
		</script>
	<?php endforeach;?>
</table>

<script>
$('[title]').tooltip();

</script>