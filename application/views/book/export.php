<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="<?=base_url('assets/bootstrap/css/bootstrap.min.css')?>">




<?php

// var_dump($book);

$pages = '<div class="container">';

foreach ($book['chapters'] as $key => $chapter) {
	// var_dump($chapter);
	$pages .= '<div class="text-center text-success"><h2><b></u>'.strtoupper($chapter['name']).'</u></b></h2></div>';

	# WRITE ARTICLES
	foreach ($chapter['articles'] as $key => $article) {
		$pages .= '<legend>'.$article['title'].'</legend>';

		if(empty($article['content'])){
			$pages .= '<font color="red">No content here<br><br><br><br></font>';
		}
		$pages .= '<p class="page">'.decode_sudolink($article['content']).'</p>';
	}

}


// var_dump($pages);

echo $pages;

$pages = '</div>';



?>

