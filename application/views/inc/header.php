<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?=$this->config->item('appName')?> | <?=$title?></title>

    <!-- Bootstrap core CSS -->
    <link href="<?=base_url('assets/css/bootstrap.css')?>" rel="stylesheet">
    <link href="<?=base_url('assets/themes/cerulean/bootstrap.css')?>" rel="stylesheet">

    <!-- Custom Google Web Font -->
    <!-- <link href='http://fonts.googleapis.com/css?family=Lato:100,300,400,700,900,100italic,300italic,400italic,700italic,900italic' rel='stylesheet' type='text/css'> -->

    <!-- Add custom CSS here -->
    <link href="<?=base_url('assets/css/landing-page.css')?>" rel="stylesheet">

    <!-- JavaScript -->
    <script src="<?=base_url('assets/js/jquery-1.10.2.js')?>"></script>
    <script src="<?=base_url('assets/js/bootstrap.js')?>"></script>

    <!-- CKEditor -->
    <script src="<?=base_url('assets/ckeditor/ckeditor.js')?>"></script>
    

</head>

<body>


    <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#"><?=$this->config->item('appName')?></a>
        </div>
    
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">

            <ul class="nav navbar-nav">
                <li><a href="#">Home</a></li>
                <li><a href="#">About</a></li>
            </ul>

            <form class="navbar-form navbar-left" role="search">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Search">
                </div>
                <button type="submit" class="btn btn-default">Submit</button>
            </form>

            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Accounts <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="#">Create Account</a></li>
                        <li><a href="#">Login</a></li>
                    </ul>
                </li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </nav>

    <style type="text/css">
    body{
        margin-top: 70px;
    }
    </style>

    <div class="container">