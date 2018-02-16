<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>setClass</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url('/assets/img/flaticon.png')?>">

    <!-- Google Fonts -->
    <link href="<?php echo base_url('/assets/avilon/fonts/fonts.css')?>" rel="stylesheet">

    <!-- Bootstrap CSS File -->
    <link href="<?php echo base_url('/assets/avilon/lib/bootstrap/css/bootstrap.min.css')?>" rel="stylesheet">

    <!-- Libraries CSS Files -->
    <link href="<?php echo base_url('/assets/avilon/lib/animate/animate.min.css')?>" rel="stylesheet">
    <link href="<?php echo base_url('/assets/avilon/lib/font-awesome/css/font-awesome.min.css')?>" rel="stylesheet">
    <link href="<?php echo base_url('/assets/avilon/lib/ionicons/css/ionicons.min.css')?>" rel="stylesheet">
    <link href="<?php echo base_url('/assets/avilon/lib/magnific-popup/magnific-popup.css')?>" rel="stylesheet">

    <!-- Main Stylesheet File -->
    <link href="<?php echo base_url('/assets/avilon/css/style.css')?>" rel="stylesheet">
</head>

<body>

<!--==========================
  Header
============================-->
<header id="header" class="header-fixed">
    <div class="container">

        <div id="logo-container" class="brand-logo" style="margin-top: -13px">
            <img src="<?php echo base_url('assets/img/setClass.png') ?>" alt="setClass Logo"
                 width="50px" style="position: relative; margin-bottom: -5px;"/> set<b>C</b>lass
        </div>
        <a href="<?php echo site_url('AbsensiKelas')?>" class="btn-done">Selesai</a>
    </div>

</header><!-- #header -->


<main id="main" style="margin-top: 50px">

    <!--==========================
      Product Featuress Section
    ============================-->
    <section id="features">
        <div class="container">

            <div class="row">

                <div class="col-lg-8 offset-lg-4">
                    <div class="section-header wow fadeIn" data-wow-delay="1s">
                        <h3 class="section-title">Absensi Kelas</h3>
                        <span class="section-divider"></span>
                    </div>
                </div>

                <div class="col-lg-4 col-md-5 features-img">
                    <img src="<?php echo base_url('assets/avilon/img/product-features.png') ?>" alt="" class="wow fadeInLeft" data-wow-delay="0.8s">
                </div>

                <div class="col-lg-8 col-md-7 ">

                    <div class="row">

                        <div class="col-lg-12 col-md-12 box wow fadeInRight" data-wow-delay="1.1s">
                            <img src="<?php echo site_url('QRCodeGenerate/generateQr/').str_replace('/', '-', $kode_absensi)?>" width="250px" alt="">
                        </div>
                        <div class="offset-3 col-lg-6 col-md-6 box wow fadeInRight" data-wow-delay="1.4s">
                            <h4 class="title">Absen melalui Qr Code</h4>
                            <p class="description">Scan Qr Code diatas menggunakan aplikasi <strong>Qr Code Reader</strong> atau yang disediakan dari
                                browser anda untuk melakukan absen kelas.</p>
                            <p class="description text-warning" style="font-size: 13px"><i>"Pastikan anda login terlebih dahulu untuk melakukan absen."</i></p>
                        </div>
                    </div>

                </div>

            </div>

        </div>

    </section><!-- #features -->

</main>

<!--==========================
  Footer
============================-->
<footer>
    <div class="col-md-12 text-center" >
        &copy; Copyright <strong>SetClass</strong>. All Rights Reserved
    </div>
</footer><!-- #footer -->

<!-- JavaScript Libraries -->
<script src="<?php echo base_url('/assets/avilon/lib/jquery/jquery.min.js')?>"></script>
<script src="<?php echo base_url('/assets/avilon/lib/jquery/jquery-migrate.min.js')?>"></script>
<script src="<?php echo base_url('/assets/avilon/lib/bootstrap/js/bootstrap.bundle.min.js')?>"></script>
<script src="<?php echo base_url('/assets/avilon/lib/easing/easing.min.js')?>"></script>
<script src="<?php echo base_url('/assets/avilon/lib/wow/wow.min.js')?>"></script>
<script src="<?php echo base_url('/assets/avilon/lib/superfish/hoverIntent.js')?>"></script>
<script src="<?php echo base_url('/assets/avilon/lib/superfish/superfish.min.js')?>"></script>
<script src="<?php echo base_url('/assets/avilon/lib/magnific-popup/magnific-popup.min.js')?>"></script>

<!-- Template Main Javascript File -->
<script src="<?php echo base_url('/assets/avilon/js/main.js')?>"></script>

</body>
</html>
