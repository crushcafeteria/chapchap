<div class="container page">
	<div class="span12 card">
		<legend>Map of all books hosted on this Chapchap installation</legend>

		<table class="table">
			<tr>
				<th>Book</th>
				<th>Chapters</th>
			</tr>
			<?php foreach ($map as $key => $book):?>
				<tr>
					<td><?=$book['name']?></td>
					<td>
						<table class="table-mini table-hover" width="100%">
							<?php foreach ($book['chapters'] as $key => $chapter):?>
								<tr>
									<td><?=$chapter['name']?></td>
									<td width="20%" class="text-right">
										<a href="<?=base_url('chapter/view/'.$chapter['book_id'])?>">Read</a>
									</td>
								</tr>
							<?php endforeach;?>
						</table>
					</td>
				</tr>
			<?php endforeach;?>
		</table>
	</div>
</div>

<style type="text/css">
	.table-mini{
		font-size: 11px
	}

	.table-mini td{
		padding: 5px;
	}
</style>

	