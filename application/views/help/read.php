<div class="">

	<div class="col-xs-12 col-sm-12 col-md-9 col-lg-9 pull-right">
		<legend><?=$article['title']?></legend>

		<div class="card help-content">
			<?php if(empty($article['content'])):?>
				<?php $this->load->view('common/nothing')?>
			<?php else:?>
				<?=decode_sudolink($article['content'])?>
			<?php endif;?>
			
		</div>

		<hr>

		<span class="pull-right muted visible-md visible-lg">
			<i class="icon-time"></i> 
			Updated <?=$this->arena->fbTime($article['last_update'])?> ago
		</span>

		<legend>Similar Reads</legend>
		<div class="list-group">
			<?php foreach ($similar as $key => $article):?>
				<a href="<?=$this->config->item('help_root_link')?>/document/<?=$article['id']?>" class="list-group-item"><?=$article['title']?></a>
			<?php endforeach;?>
		</div>

	</div>


	<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 pull-left">

		<legend>Contents</legend>
		<div class="panel panel-default">
			<div class="panel-body">
				<?php foreach ($map as $key => $book):?>
						<h4 class=""><?=$book['name']?></h4>
						<p class="">
							<ul>
								<?php foreach ($book['articles'] as $key => $article):?>
									<li>
										<a href="<?=base_url('document/'.$article['id'])?>">
											<?=$article['title']?>
										</a>
									</li>
								<?php endforeach;?>
							</ul>
						</p>
					</a>
				<?php endforeach;?>
			</div>
		</div>

	</div>

</div>

<style type="text/css">
.help-content {
	font-size: 16px;
	font-size: 2;
	line-height: 30px;
}
</style>
