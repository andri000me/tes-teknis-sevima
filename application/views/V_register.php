<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Page Register" />
    <meta name="keywords" content="Register" />
    <meta name="robots" content="index, follow" />
    <title>Insta Mini | Login</title>

    <!-- Stylesheets
    ================================================= -->
    <link rel="stylesheet" href=" <?php echo base_url() ?>assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href=" <?php echo base_url() ?>assets/css/style.css" />
    <link rel="stylesheet" href=" <?php echo base_url() ?>assets/css/ionicons.min.css" />
    <link rel="stylesheet" href=" <?php echo base_url() ?>assets/css/font-awesome.min.css" />

    <!--Google Font-->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,400i,700,700i" rel="stylesheet">
</head>

<body>

    <!-- Page Loader -->
    <?php $this->load->view('Pelengkap/V_page_loader') ?>
    <!-- End Page Loader -->

    <!-- Top Banner
    ================================================= -->
    <section id="banner">
        <div class="container">

            <!-- Sign Up Form
        ================================================= -->
            <div class="sign-up-form">
                <a href="<?php echo site_url('Login') ?>" class="logo"><img src=" <?php echo base_url() ?>assets/images/login/logo.png" alt="insta mini" style="width: 200px;;" /></a>
                <h2 class="text-white">Register Insta Mini</h2>
                <div id="notifications"><?php echo $this->session->flashdata('pesan'); ?></div>
                <div class="line-divider"></div>
                <div class="form-wrapper">
                    <p class="signup-text">Buat akun sekarang dan temukan teman-temanmu disini</p>
                    <form method="POST" action="<?php echo site_url('Register/register_akun') ?>">
                        <fieldset class="form-group">
                            <input type="text" class="form-control" name="nama" placeholder="Masukan Nama">
                        </fieldset>
                        <fieldset class="form-group">
                            <input type="email" class="form-control" name="email" placeholder="Masukan Email">
                        </fieldset>
                        <fieldset class="form-group">
                            <input type="password" class="form-control" name="password" placeholder="Masukan Password">
                        </fieldset>

                        <button class="btn-secondary">Register</button>
                    </form>
                </div>
                <a href="<?php echo site_url('Login') ?>">Sudah punya akun?</a>
                <img class="form-shadow" src=" <?php echo base_url() ?>assets/images/bottom-shadow.png" alt="" />
            </div><!-- Sign Up Form End -->

            <svg class="arrows hidden-xs hidden-sm">
                <path class="a1" d="M0 0 L30 32 L60 0"></path>
                <path class="a2" d="M0 20 L30 52 L60 20"></path>
                <path class="a3" d="M0 40 L30 72 L60 40"></path>
            </svg>
        </div>
    </section>

    <!-- Features Section
    ================================================= -->
    <section id="features">
        <div class="container wrapper">
            <h1 class="section-title slideDown">Insta Mini</h1>
            <div class="row slideUp">
                <div class="feature-item col-md-2 col-sm-6 col-xs-6 col-md-offset-2">
                    <div class="feature-icon"><i class="icon ion-person-add"></i></div>
                    <h3>Make Friends</h3>
                </div>
                <div class="feature-item col-md-2 col-sm-6 col-xs-6">
                    <div class="feature-icon"><i class="icon ion-images"></i></div>
                    <h3>Publish Posts</h3>
                </div>
                <div class="feature-item col-md-2 col-sm-6 col-xs-6">
                    <div class="feature-icon"><i class="icon ion-chatbox-working"></i></div>
                    <h3>Private Chats</h3>
                </div>
                <div class="feature-item col-md-2 col-sm-6 col-xs-6">
                    <div class="feature-icon"><i class="icon ion-compose"></i></div>
                    <h3>Create Polls</h3>
                </div>
            </div>

        </div>

    </section>

    <!-- Footer -->
    <?php $this->load->view('Pelengkap/V_footer') ?>
    <!-- End Footer -->

    <!-- Scripts
    ================================================= -->
    <script src=" <?php echo base_url() ?>assets/js/jquery-3.1.1.min.js"></script>
    <script src=" <?php echo base_url() ?>assets/js/bootstrap.min.js"></script>
    <script src=" <?php echo base_url() ?>assets/js/jquery.appear.min.js"></script>
    <script src=" <?php echo base_url() ?>assets/js/jquery.incremental-counter.js"></script>
    <script src=" <?php echo base_url() ?>assets/js/script.js"></script>
</body>

</html>