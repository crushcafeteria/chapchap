<legend>Email Queue</legend>

<div class="col-md-9">

	<?=$this->arena->msgBox('This list might not be accurate. Cron jobs are processing this list','Information','alert-success')?>

	<table class="table table-condensed table-hover">
		<thead>
			<tr>
				<th>Proc. ID</th>
				<th>Recipient</th>
				<th>Title</th>
				<th>Created On</th>
				<th>Link Back</th>
			</tr>
		</thead>
		<tbody>

			<?php foreach ($queue as $email):?>
				<?php
					$recipients = json_decode($email['recipients'], true);

					$addr = '';

					foreach ($recipients as $key => $user){
						$addr[] = $user;
					}
				?>
				<tr>
					<td>
						<?=$email['id']?>
					</td>
					<td width="200">
						<ul>
							<?php foreach ($addr as $key => $item):?>
								<li>
									<a href="mailto:<?=$item['recipient_email']?>"><?=$item['recipient_name']?></a>
								</li>
							<?php endforeach;?>
						</ul>

						<!-- <a href="><?=$email['recipient_name']?></td> -->
					<td><?=$email['title']?></td>
					<td><?=$this->arena->fbTime($email['created_on'])?> ago</td>
					<td>
						<a target="_blank" href="<?=$email['link_back']?>" class="btn btn-default btn-xs">Go</a>
					</td>
				</tr>

			<?php endforeach;?>
			
		</tbody>
	</table>
</div>

<div class="col-md-3 pull-right">
	<legend>Queue Statistics</legend>

	<table class="table table-condensed">
		<tr>
			<td>Emails in queue</td>
			<td><?=count($queue)?></td>
		</tr>
	</table>

	<legend>Queue Options</legend>
	<a href="<?=base_url('email/queue')?>" class="btn btn-block btn-success">Refresh</a>
</div>

	

<script>
$('[title]').tooltip({
	placement: 'bottom'
});
</script>