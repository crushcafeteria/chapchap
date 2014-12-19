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
            <a class="navbar-brand" href="<?=base_url()?>">
                <i class="icon-edit"></i> 
                <?=$this->config->item('appName')?>
            </a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
            <ul class="nav navbar-nav">
                <li><a href="<?=base_url('home')?>">Home</a></li>
                <li><a href="<?=base_url('book/index')?>">All Books</a></li>
                <li><a href="<?=base_url('map')?>">Map</a></li>
                <li><a href="<?=base_url('api')?>">API</a></li>
            </ul>

            <ul class="nav navbar-nav navbar-right pull-right">
                <li class="dropdown">
                    <?php if(!$this->session->userdata('id')):?>

                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Accounts <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="<?=base_url('user/create')?>">Create Account</a></li>
                            <li><a href="<?=base_url('user/login')?>">Login</a></li>
                        </ul>

                    <?php else:?>

                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Hi, <?=$this->arena->titleCase($this->session->userdata('fname'))?> <b class="caret"></b></a>
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