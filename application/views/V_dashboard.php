<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Page Dashboard" />
    <meta name="keywords" content="Dashboard" />
    <meta name="robots" content="index, follow" />
    <title>Insta Mini | Dashboard</title>

    <!-- Stylesheets
    ================================================= -->
    <link rel="stylesheet" href=" <?php echo base_url() ?>assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href=" <?php echo base_url() ?>assets/css/style.css" />
    <link rel="stylesheet" href=" <?php echo base_url() ?>assets/css/ionicons.min.css" />
    <link rel="stylesheet" href=" <?php echo base_url() ?>assets/css/font-awesome.min.css" />
    <link href=" <?php echo base_url() ?>assets/css/emoji.css" rel="stylesheet">

    <!--Google Font-->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,400i,700,700i" rel="stylesheet">

</head>

<?php
$account = $this->session->userdata("account");
$id = $account['id_akun'];
foreach ($akun as $p) {
    if ($p['id_akun'] == $id) {
        $id_akun = $p['id_akun'];
        $email_akun = $p['email'];
        $nama_akun = $p['nama'];
        $foto_akun = $p['foto'];
        $follower_akun = $p['follower'];
    }
}
?>

<body>
    <!-- Page Loader -->
    <?php $this->load->view('Pelengkap/V_page_loader') ?>
    <!-- End Page Loader -->

    <!-- Header -->
    <?php $this->load->view('Pelengkap/V_header') ?>
    <!-- End header -->

    <div id="page-contents">
        <div class="container">
            <div class="row">
                <!-- Side Bar Left -->
                <div class="col-md-3 static">
                    <!--Profil-->
                    <div class="profile-card">
                        <img src="<?php echo base_url() ?>assets/images/profil/<?= $foto_akun ?>" alt="user" class="profile-photo" />
                        <h5><a href="#" class="text-white"><?= $nama_akun ?></a></h5>
                        <a href="#" class="text-white"><i class="ion ion-android-person-add"></i> <?= number_format($follower_akun, 0, ",", ".") ?></a>
                    </div>
                    <!--End Profil-->

                    <!-- News -->
                    <ul class="nav-news-feed">
                        <li><i class="icon ion-ios-paper"></i>
                            <div><a href="<?php echo site_url('Dashboard') ?>">Beranda</a></div>
                        </li>
                        <li><i class="icon ion-ios-people"></i>
                            <div><a href="#">Teman Terdekat</a></div>
                        </li>
                        <li><i class="icon ion-ios-people-outline"></i>
                            <div><a href="#">Teman</a></div>
                        </li>
                        <li><i class="icon ion-chatboxes"></i>
                            <div><a href="#">Pesan</a></div>
                        </li>
                        <li><i class="icon ion-images"></i>
                            <div><a href="#">Foto</a></div>
                        </li>
                        <li><i class="icon ion-ios-videocam"></i>
                            <div><a href="#">Video</a></div>
                        </li>
                    </ul>
                    <!--End News-->
                </div>

                <div class="col-md-7">

                    <!-- Create Post -->
                    <div class="create-post">
                        <div class="row">
                            <form action="<?php echo site_url('Dashboard/tambah_post') ?>" method="POST" enctype="multipart/form-data">
                                <div class="col-md-7 col-sm-7">
                                    <div class="form-group">
                                        <img src="<?php echo base_url() ?>assets/images/profil/<?= $foto_akun ?>" alt="" class="profile-photo-md" />
                                        <textarea name="text" cols="30" rows="1" class="form-control" placeholder="Apa yang anda pikirkan..." required></textarea>
                                        <input type="hidden" name="id_akun" value="<?= $id_akun; ?>" />
                                        <input type="hidden" name="nama" value="<?= $nama_akun; ?>" />
                                        <input type="hidden" name="foto" value="<?= $foto_akun; ?>" />
                                    </div>
                                </div>
                                <div class="col-md-5 col-sm-5">
                                    <div class="tools">
                                        <ul class="publishing-tools list-inline">
                                            <li><i class="ion-images" id="upfile1" style="cursor:pointer;"></i></li>
                                            <input type="file" id="file1" name="foto_postingan" style="display:none" />
                                        </ul>
                                        <button type="submit" class="btn btn-primary pull-right">Publish</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- End Create Post -->

                    <?php
                    foreach ($postingan as $p) {
                        $id_akun_post = $p['id_akun'];
                        $id_post = $p['id_post'];
                        $nama_akun_post = $p['nama'];
                        $text_post = $p['text'];
                        $foto_akun_post = $p['foto'];
                        $foto_postingan = $p['foto_postingan'];
                        $time_post = $p['waktu'];
                        $jumlah_like = 0;

                        date_default_timezone_set('Asia/Jakarta');
                        $now = date("Y-m-d H:i:s");

                        $diff = strtotime($now) - strtotime($time_post);
                        if ($diff > 2592000) {
                            $diff = $diff / 2592000;
                            $diff = round($diff);
                            $waktu_post = strval($diff) . ' bulan';
                        } else if ($diff > 604800) {
                            $diff = $diff / 604800;
                            $diff = round($diff);
                            $waktu_post = strval($diff) . ' minggu';
                        } else if ($diff > 86400) {
                            $diff = $diff / 86400;
                            $diff = round($diff);
                            $waktu_post = strval($diff) . ' hari';
                        } else if ($diff > 3600) {
                            $diff = $diff / 3600;
                            $diff = round($diff);
                            $waktu_post = strval($diff) . ' jam';
                        } else if ($diff > 60) {
                            $diff = $diff / 60;
                            $diff = round($diff);
                            $waktu_post = strval($diff) . ' menit';
                        } else {
                            $waktu_post = strval($diff) . ' detik';
                        }
                    ?>
                        <!-- Post Content -->
                        <div class="post-content">
                            <?php if ($foto_postingan != "") { ?>
                                <img src="<?php echo base_url() ?>assets/images/post/<?= $foto_postingan ?>" alt="post-image" class="img-responsive post-image" />
                            <?php } ?>
                            <div class="post-container">
                                <img src="<?php echo base_url() ?>assets/images/profil/<?= $foto_akun_post ?>" alt="user" class="profile-photo-md pull-left" />
                                <div class="post-detail">
                                    <div class="user-info">
                                        <h5>
                                            <a href="#" class="profile-link"><?= $nama_akun_post ?></a>
                                            <?php if ($id_akun_post == $id_akun) { ?>
                                                <a class="btn text-red" data-toggle="modal" data-target="#ModalHapusPostingan<?php echo $p['id_post']; ?>">
                                                    <i class="fa fa-close"></i>
                                                </a>
                                            <?php } ?>
                                        </h5>

                                        <p class="text-muted">Membagikan foto sekitar <?= $waktu_post ?> yang lalu</p>
                                    </div>
                                    <?php foreach ($data_like as $r) {
                                        $id_post_like = $r['id_post'];

                                        if ($id_post_like == $id_post) {
                                            $jumlah_like++;
                                        }
                                    ?>
                                    <?php } ?>

                                    <?php
                                    $status = false;
                                    foreach ($data_like as $r) {
                                        if (($id_post == $r['id_post']) and  ($id_akun == $r['id_akun'])) {
                                            $status = true;
                                        }
                                    }

                                    if ($status == true) {
                                    ?>
                                        <div class="reaction">
                                            <form method="POST" action="<?php echo site_url('Dashboard/delete_like') ?>">
                                                <input type="hidden" name="id_akun" value="<?= $id_akun ?>">
                                                <input type="hidden" name="id_post" value="<?= $id_post ?>">
                                                <button type="submit" class="btn text-red">
                                                    <i class="fa fa-heart"></i> <?= $jumlah_like ?>
                                                </button>
                                            </form>
                                        </div>
                                    <?php } else {
                                    ?>
                                        <div class="reaction">
                                            <form method="POST" action="<?php echo site_url('Dashboard/add_like') ?>">
                                                <input type="hidden" name="id_akun" value="<?= $id_akun ?>">
                                                <input type="hidden" name="id_post" value="<?= $id_post ?>">
                                                <button type="submit" class="btn">
                                                    <i class="fa fa-heart"></i> <?= $jumlah_like ?>
                                                </button>
                                            </form>
                                        </div>
                                    <?php } ?>
                                    <div class="line-divider"></div>
                                    <div class="post-text">
                                        <p><?= $text_post ?></p>
                                    </div>
                                    <div class="line-divider"></div>

                                    <!-- Comment -->
                                    <?php
                                    foreach ($data_komen as $p) {
                                        $id_akun_komen = $p['id_akun'];
                                        $nama_akun_komen = $p['nama'];
                                        $foto_akun_komen = $p['foto'];
                                        $text_komen = $p['text'];
                                        $id_post_komentar = $p['id_post'];

                                        if ($id_post_komentar == $id_post) {
                                    ?>
                                            <div class="post-comment">
                                                <img src="<?php echo base_url() ?>assets/images/profil/<?= $foto_akun_komen ?>" alt="" class="profile-photo-sm" />
                                                <p><a href="#" class="profile-link"><?= $nama_akun_komen ?></a>
                                                    <?php if ($id_akun_komen == $id_akun) { ?>
                                                        <a class="btn text-red" data-toggle="modal" data-target="#ModalHapusKomentar<?php echo $p['id_comment']; ?>">
                                                            <i class="fa fa-close"></i>

                                                        </a>
                                                    <?php } ?>
                                                    <br><?= $text_komen ?>
                                                </p>
                                            </div>
                                    <?php }
                                    } ?>

                                    <form method="POST" action="<?php echo site_url('Dashboard/tambah_komentar') ?>">
                                        <div class="post-comment">
                                            <img src="<?php echo base_url() ?>assets/images/profil/<?= $foto_akun ?>" alt="" class="profile-photo-sm" />
                                            <input type="text" name="text" class="form-control" placeholder="Tuliskan komentar anda...." required>
                                            <input type="hidden" name="id_post" value="<?= $id_post ?>">
                                            <input type="hidden" name="id_akun" value="<?= $id_akun ?>">
                                        </div>
                                        <button type="submit" class="btn btn-primary pull-right">Publish</button><br><br>
                                    </form>
                                    <!-- End Comment -->
                                </div>
                            </div>
                        </div>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Delete Postingan -->
    <?php
    foreach ($postingan as $k) :
        $id     = $k['id_post'];
    ?>
        <div class="modal fade bd-example-modal-sm" id="ModalHapusPostingan<?php echo $id; ?>" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel">Hapus Postingan</h4>
                    </div>
                    <form class="form-horizontal" action="<?php echo site_url('Dashboard/delete_postingan'); ?>" method="POST">
                        <div class="modal-body">
                            <input type="hidden" name="id_post" value="<?php echo $id; ?>" />
                            <p>Apakah anda yakin mau menghapus postingan anda?</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-raised btn-default waves-effect" data-dismiss="modal">Batal</button>
                            <button type="submit" class="btn  btn-raised btn-danger waves-effect" id="simpan">Hapus</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
    <!-- End Modal Delete Like -->

    <!-- Modal Delete Like -->
    <?php
    foreach ($data_komen as $k) :
        $id     = $k['id_comment'];
    ?>
        <div class="modal fade bd-example-modal-sm" id="ModalHapusKomentar<?php echo $id; ?>" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel">Hapus Komentar</h4>
                    </div>
                    <form class="form-horizontal" action="<?php echo site_url('Dashboard/delete_comment'); ?>" method="POST">
                        <div class="modal-body">
                            <input type="hidden" name="id_comment" value="<?php echo $id; ?>" />
                            <p>Apakah anda yakin mau menghapus komentar anda?</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-raised btn-default waves-effect" data-dismiss="modal">Batal</button>
                            <button type="submit" class="btn  btn-raised btn-danger waves-effect" id="simpan">Hapus</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
    <!-- End Modal Delete Like -->

    <!-- Scripts -->
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCTMXfmDn0VlqWIyoOxK8997L-amWbUPiQ&callback=initMap"></script>
    <script src=" <?php echo base_url() ?>assets/js/jquery-3.1.1.min.js"></script>
    <script src=" <?php echo base_url() ?>assets/js/bootstrap.min.js"></script>
    <script src=" <?php echo base_url() ?>assets/js/jquery.sticky-kit.min.js"></script>
    <script src=" <?php echo base_url() ?>assets/js/jquery.scrollbar.min.js"></script>
    <script src=" <?php echo base_url() ?>assets/js/script.js"></script>

    <script>
        $("#upfile1").click(function() {
            $("#file1").trigger('click');
        });
    </script>
</body>

</html>