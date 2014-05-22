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

    <div class="container">

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

                <?php if(!$this->session->userdata('email')):?>

                    <li><a href="<?=base_url('index')?>">Home</a></li>

                <?php else:?>

                    <li><a href="<?=base_url('index')?>">All Books</a></li>

                <?php endif;?>
                
            </ul>

            
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <?php if(!$this->session->userdata('email')):?>

                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Accounts <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="<?=base_url('user/create')?>">Create Account</a></li>
                            <li><a href="<?=base_url('user/login')?>">Login</a></li>
                        </ul>

                    <?php else:?>

                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?=$this->arena->titleCase($this->session->userdata('names'))?> <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="<?=base_url('user/profile')?>">My Profile</a></li>
                            <li><a href="<?=base_url('user/logout')?>">Logout</a></li>
                        </ul>
                        
                    <?php endif;?>           
                        
                </li>
            </ul>
        </div><!-- /.navbar-collapse -->

        </div>
    </nav>

    <style type="text/css">
    body{
        margin-top: 70px;
    }
    </style>

    <div class="container">