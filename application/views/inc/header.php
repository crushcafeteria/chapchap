<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?=$this->config->item('appName')?> | <?=$title?></title>

    <!-- Bootstrap core CSS -->
    <link href="<?=base_url('assets/bootstrap/css/bootstrap.min.css')?>" rel="stylesheet">

    <!-- Add custom CSS here -->
    <link href="<?=base_url('assets/style.css')?>" rel="stylesheet">

    <script src="<?=base_url('assets/js/jquery-1.10.2.js')?>"></script>
    
</head>

<script type="text/javascript">
    var li =    '<div class="text-center img-polaroid"> <img src="<?=base_url('assets/img/loader.gif')?>"/> Searching... </div>';
</script>

<body class="container">

<?php $this->load->view('inc/nav')?>