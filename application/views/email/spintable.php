<table class="table table-hover">

	<tr>
		<th>
			Names
		</th>
		<th>
			Email
		</th>
			
	</tr>

<?php foreach ($data as $key => $user):?>

	<tr>
		<td>
			<?=$this->arena->titleCase($user['fname'])?> 
			<?=$this->arena->titleCase($user['lname'])?>
		</td>
		<td>
			<?=strtolower($user['email'])?>
		</td>
			
	</tr>

<?php endforeach;?>


</table>