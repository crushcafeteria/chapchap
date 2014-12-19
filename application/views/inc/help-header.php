<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?=$this->config->item('helpAppName')?> | <?=$title?></title>

    <!-- Bootstrap core CSS -->
    <link href="<?=base_url('assets/bootstrap/css/bootstrap.min.css')?>" rel="stylesheet">

    <!-- Fontawesome -->
    <link rel="stylesheet" type="text/css" href="<?=base_url('assets/fontawesome/css/font-awesome.min.css')?>">
</head>

<style type="text/css">
    body{
        background-color: #f5f5f5;
    }

    .card {
        background-color: rgb(255, 255, 255);
        border-radius: 6px 6px 6px 6px;
        box-shadow: 0px 1px 2px rgba(0, 0, 0, 0.3);
        margin-bottom: 20px;
        padding: 20px 20px;
        text-align: justify;
    }
</style>

<body>

<?php $this->load->view('inc/help-nav')?>
