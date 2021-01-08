<!-- Header
    ================================================= -->
<header id="header">
    <nav class="navbar navbar-default navbar-fixed-top menu">
        <div class="container">

            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php echo site_url('Dashboard') ?>"><img src=" <?php echo base_url() ?>assets/images/login/logo.png" alt="logo" style="width: 60px;;" /></a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right main-menu">
                    <li class="dropdown"><a href="<?php echo site_url('Login/logout') ?>">Logout</a></li>
                </ul>
                <center>
                    <form class="navbar-form hidden-sm">
                        <div class="form-group">
                            <i class="icon ion-android-search"></i>
                            <input type="text" class="form-control" placeholder="Search friends, photos, videos">
                        </div>
                    </form>
                </center>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container -->
    </nav>
</header>
<!--Header End-->