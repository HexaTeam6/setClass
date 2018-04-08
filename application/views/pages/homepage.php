<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">

    <!-- Page Title Here -->
    <title>setClass</title>

    <!-- Meta -->
    <!-- Page Description Here -->
    <meta name="description" content="Website untuk mengatur dan mengkoordinir kelas anda secara online.">

    <!-- Disable screen scaling-->
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximum-scale=1, user-scalable=0">

    <!--icon-->
    <link rel="icon" href="<?php echo base_url('/assets/img/flaticon.png')?>">

    <!-- Web fonts and Web Icons -->
    <link rel="stylesheet" href="<?php echo base_url('/assets/Landeux/fonts/opensans/stylesheet.css')?>">
    <link rel="stylesheet" href="<?php echo base_url('/assets/Landeux/fonts/ionicons.min.css')?>">
    <link rel="stylesheet" href="<?php echo base_url('/assets/Landeux/fonts/font-awesome.min.css')?>">

    <!-- Vendor CSS style -->
    <link rel="stylesheet" href="<?php echo base_url('/assets/Landeux/css/pageloader.css')?>">

    <!-- Uncomment below to load individualy vendor CSS -->
    <link rel="stylesheet" href="<?php echo base_url('/assets/Landeux/css/bootstrap.min.css')?>">
    <link rel="stylesheet" href="<?php echo base_url('/assets/Landeux/js/vendor/swiper.min.css')?>">
    <link rel="stylesheet" href="<?php echo base_url('/assets/Landeux/js/vegas/vegas.min.css')?>">

    <!-- Main CSS files -->
    <link rel="stylesheet" href="<?php echo base_url('/assets/Landeux/css/main.css')?>">

    <!-- alt layout -->
    <link rel="stylesheet" href="<?php echo base_url('/assets/Landeux/css/style-default.css')?>">

    <script src="<?php echo base_url('/assets/Landeux/js/vendor/modernizr-2.7.1.min.js')?>"></script>
</head>

<body id="menu" class="body-black">

<!-- BEGIN OF site header Menu -->
<header class="page-header navbar page-header-alpha menu-right scrolled-white topmenu-right no-menu-icon">

    <!-- Begin of menu icon toggler -->
    <button class="navbar-toggler site-menu-icon" id="navMenuIcon">
      <span class="menu-icon">
        <span class="bars">
          <span class="bar1"></span>
          <span class="bar2"></span>
          <span class="bar3"></span>
        </span>
      </span>
    </button>
    <!-- End of menu icon toggler -->

    <!-- Begin of logo/brand -->
    <a class="navbar-brand" href="">
      <span class="logo">
        <img class="light-logo" src="<?php echo base_url('/assets/Landeux/img/setClass-white.png')?>" alt="Logo">
        <img class="dark-logo" src="<?php echo base_url('/assets/Landeux/img/setClass-dark.png')?>" alt="Logo">
      </span>
        <span class="text">
        <span class="line">set<b>C</b>lass</span>
        <span class="line sub">Manage keperluan kelas</span>
      </span>
    </a>
    <!-- End of logo/brand -->

    <!-- begin of menu wrapper -->
    <div class="all-menu-wrapper" id="navbarMenu">
        <!-- Begin of top menu -->
        <nav class="navbar-topmenu" id="topBarMenu" style="margin-right: 150px">
            <ul class="navbar-nav navbar-nav-menu">
                <li class="nav-item active">
                    <a class="nav-link" href="#home">Tentang</a>
                </li>
                <!--<li class="nav-item">-->
                <!--<a class="nav-link" href="#features">Fitur</a>-->
                <!--</li>-->
                <li class="nav-item">
                    <a class="nav-link" href="#use-case">Daftar</a>
                </li>
            </ul>
            <!-- Begin of CTA Actions, & Icons menu -->
            <ul class="navbar-nav navbar-nav-actions">
                <li class="nav-item cta">
                    <a class="btn btn-primary bg-gradient-primary no-border btn-shadow btn-round" href="<?php echo site_url('Auth/masuk')?>">
                        Masuk
                    </a>
                </li>
            </ul>
            <!-- End of CTA & Icons menu -->
        </nav>
        <!-- End of top menu -->


        <nav class="navbar-action">
        </nav>
    </div>
    <!-- end of menu wrapper -->

</header>
<!-- END OF site header Menu-->

<!-- BEGIN OF page cover -->
<div class="page-cover">
    <!-- Cover Background -->
    <div class="cover-bg bg-gradient-primary"></div>

    <!-- Image mask layer -->
    <!--<div class="cover-bg-mask bg-img" data-image-src="img/bg-layer.png"></div>-->

</div>
<!--END OF page cover -->

<!-- BEGIN OF page main content -->
<main class="page-main page-fullpage main-anim" id="mainpage">

    <!-- Begin of home section -->
    <div class="section section-home fullheight landing-home" data-section="home" id="home">
        <!-- Begin of section wrapper -->
        <div class="section-wrapper twoside home-padding">
            <div class="row">
                <!-- begin of left content -->
                <div class="col left-content text-center text-md-left center-vh">
                    <!-- content -->
                    <div class="section-content">
                        <!-- title and description -->
                        <div class="title-desc">
                            <h2 class="display-3 display-title">
                                <strong>
                                    <span class="line-block sr-up-td1">SetClass</span>
                                </strong>
                            </h2>
                            <h4 class="sr-up-td3">"Penuhi kebutuhan dan buat kelas anda terkoordinir secara online."</h4>
                        </div>

                        <!-- Action button -->
                        <div class="btns-action">
                            <span class="inline-block sr-up-td5">
                              <a class="btn btn-white btn-shadow btn-round no-border" href="<?php echo site_url('Auth/masuk')?>">
                                <span class="txt text-gradient-primary">
                                  <strong>Masuk</strong>
                                </span>
                              </a>
                            </span>
                                        <span class="inline-block sr-up-td6">
                              <a class="btn btn-outline-white btn-round" id="daftarBtn" href="#use-case">
                                Daftar
                              </a>
                            </span>
                        </div>
                    </div>
                </div>
                <!-- end of left content -->

                <!-- begin of right content -->
                <div class="col right-content hidden-sm center-vh">
                    <!-- content -->
                    <div class="section-content anim">
                        <!-- illustartion -->
                        <div class="illustr sr-zoomin-td6">
                            <img class="portrait" src="<?php echo base_url('/assets/Landeux/img/studentElement.png')?>" alt="Logo">
                        </div>
                    </div>
                </div>
                <!-- end of right content -->
            </div>


        </div>
        <!-- End of section wrapper -->
    </div>
    <!-- End of home section -->

    <!-- Begin of description section -->
    <div class="section section-description bg-white-gray bg-bright" data-section="description-about">
        <!-- Begin of section wrapper -->
        <div class="section-wrapper padding-top padding-bottom">
            <!-- title -->
            <div class="section-title text-center">
                <h5>Penjelasan</h5>
                <h2 class="display-4 display-title">Apa itu set<b>C</b>lass ?</h2>
            </div>

            <!-- content -->
            <div class="section-content anim text-center">
                <!-- title and description -->
                <div class="title-desc reduced">
                    <p>Di zaman seperti sekarang banyak masalah diluar sana
                        yang dapat diselesaikan dengan teknologi. Namun, banyak orang lupa dengan masalah masalah kecil disekitar mereka,
                        karena mereka terlalu sibuk mencari masalah yang mereka anggap besar. Oleh karena itu <strong>setClass</strong>
                        dibuat untuk memenuhi kabutuhan yang ada, tepatnya kebutuhan dalam memanagement kepengurusan kelas. Karena <strong>kami</strong>
                        yakin bahwasannya <i><b>suatu hal yang besar itu dimulai dari yang kecil.</b></i></p>
                </div>
            </div>

        </div>
        <!-- End of section wrapper -->
    </div>
    <!-- End of description section -->

    <!-- Begin of list two side 1 section -->
    <div class="section section-twoside bg-white bg-bright" data-section="features" id="features">
        <!-- Begin of section wrapper -->
        <div class="section-wrapper twoside padding-bottom">

            <!-- text or illustration order are manipulated via Bootstrap order-md-1, order-md-2 class -->
            <!-- begin of item -->
            <div class="item row">
                <!-- begin of illustration content -->
                <div class="col-12 col-md-6 col-lg-7 order-md-2">
                    <!-- content -->
                    <div class="section-content center-vh anim">
                        <!-- illustartion -->
                        <div class="images text-center">
                            <div class="img-frame-normal img-black frame-small sr-down-td3">
                                <div class="img-1">
                                    <img class="img" alt="Image" src="<?php echo base_url('/assets/Landeux/img/phone.png')?>">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end of illustration content -->

                <!-- begin of text content -->
                <div class="col-12 col-md-6 col-lg-5 order-md-1 center-vh">
                    <!-- content -->
                    <div class="section-content anim">
                        <!-- title and description -->
                        <div class="title-desc text-right">
                            <h2 class="display-4 display-title sr-up-td2">Multiple
                                <br>App
                            </h2>
                            <div class="row justify-content-end sr-up-td3">
                                <div class="col-12 col-md-9 mb-3">
                                    <div>
                                        <h4 class="border-primary text-primary">Mobile ready</h4>
                                        <p>Gunakan aplikasi berbasis mobile atau website untuk terus memantau perkembangan kelas anda
                                            <br><i>- coming soon</i>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <!-- end of text content -->
            </div>
            <!-- end of item -->

            <!-- begin of item -->
            <div class="item row">
                <!-- begin of illustration content -->
                <div class="col-12 col-md-6 col-lg-7 order-md-1">
                    <!-- content -->
                    <div class="section-content center-vh anim">
                        <!-- illustartion -->
                        <div class="images text-center">
                            <div class="img-frame-normal img-black sr-down-td3">
                                <div class="img-1">
                                    <img class="img" style="width: 100%; height: auto" alt="Image" src="<?php echo base_url('/assets/Landeux/img/laptop.png')?>">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end of illustration content -->

                <!-- begin of text content -->
                <div class="col-12 col-md-6 col-lg-5 order-md-2 center-vh">
                    <!-- content -->
                    <div class="section-content anim">
                        <!-- title and description -->
                        <div class="title-desc text-left">
                            <h2 class="display-4 display-title sr-up-td2">Smart
                                <br>Design</h2>
                            <div class="row justify-content-start">
                                <div class="col-12 col-md-9 mb-3 sr-up-td3">
                                    <div>
                                        <h4 class="border-primary text-primary">Multi-browser</h4>
                                        <p>Dapat dibuka dari browser perangkat manapun dengan ukuran yang berbeda beda</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <!-- end of text content -->
            </div>
            <!-- end of item -->
        </div>
        <!-- End of section wrapper -->
    </div>
    <!-- End of list two side 1 section -->

    <!-- Begin of slider features section -->
    <div class="section section-twoside bg-white bg-bright" data-section="slider-use-case"
         id="use-case">
        <!-- Begin of section wrapper -->
        <div class="section-wrapper twoside padding-bottom padding-top">
            <!-- title -->
            <div class="section-title text-center">
                <h2 class="display-4 display-title">Siapa anda ?</h2>
            </div>

            <!-- begin of carousel-swiper-beta -->
            <div class="slider-wrapper carousel-swiper-hash carousel-swiper-hash-demo">
                <!-- pagination -->
                <div class="items-pagination"></div>

                <!-- slider -->
                <div class="slider-container swiper-container">
                    <ul class="item-list swiper-wrapper">
                        <!-- item -->
                        <li class="slide-item swiper-slide" data-hash="Wali Kelas">
                            <div class="item row">
                                <!-- begin of illustration content -->
                                <div class="col-12 col-md-6 col-lg-7 order-md-1">
                                    <!-- content -->
                                    <div class="section-content anim">
                                        <!-- illustartion -->
                                        <div class="images text-center">
                                            <div class="img-frame-normal full img-black">
                                                <div class="img-1">
                                                    <img class="img" alt="Image" src="<?php echo base_url('/assets/Landeux/img/teacher.png')?>">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- end of illustration content -->

                                <!-- begin of text content -->
                                <div class="col-12 col-md-6 col-lg-5 order-md-2 center-vh">
                                    <!-- content -->
                                    <div class="section-content">
                                        <!-- title and description -->
                                        <div class="title-desc">
                                            <h2 class="display-4 display-title anim fadein-top td-2 text-black">Wali Kelas</h2>
                                            <p class="anim fadein-top td-3">Wali Kelas bertugas mengurus dan mengkoordinir siswa
                                                dikelasnya serta sebagai perantara antara guru dan siswa.</p>
                                            <div class="row anim fadein-top td-4">
                                                <div class="col-12 mb-3">
                                                    <div class="">
                                                        <h4 class="border-primary text-primary">Yang dapat dilakukan</h4>
                                                        <ul class="list-primary">
                                                            <li>Membuat kelas</li>
                                                            <li>Memvalidasi akun siswa dan wali murid</li>
                                                            <li>Menentukan pengurus kelas</li>
                                                            <li>Memantau keuangan kelas</li>
                                                            <li>Memantau absensi kelas</li>
                                                            <li>Membuat dan mengatur informasi kelas</li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Action button -->
                                        <div class="btns-action anim fadein-bottom td-2">
                                            <a class="btn btn-primary bg-gradient-primary btn-round no-border btn-shadow" href="<?php echo site_url('Daftar')?>">
                                                <span class="txt">Daftar</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <!-- end of text content -->
                            </div>
                        </li>
                        <!-- item -->
                        <li class="slide-item swiper-slide" data-hash="Siswa">
                            <div class="item row">
                                <!-- begin of illustration content -->
                                <div class="col-12 col-md-6 col-lg-7 order-md-1">
                                    <!-- content -->
                                    <div class="section-content anim">
                                        <!-- illustartion -->
                                        <div class="images text-center">
                                            <div class="img-frame-normal full img-black">
                                                <div class="img-1">
                                                    <img class="img" alt="Image" src="<?php echo base_url('/assets/Landeux/img/student.png')?>">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- end of illustration content -->

                                <!-- begin of text content -->
                                <div class="col-12 col-md-6 col-lg-5 order-md-2 center-vh">
                                    <!-- content -->
                                    <div class="section-content anim">
                                        <!-- title and description -->
                                        <div class="title-desc">
                                            <h2 class="display-4 display-title anim fadein-top td-2 text-black">Siswa</h2>
                                            <p class="anim fadein-top td-3">Siswa merupakan pondasi dalam memanage kelas mereka, karena
                                                mereka yang terlibat secara langsung dalam mengurus dan mengkoordinir kelas mereka.</p>
                                            <div class="row anim fadein-top td-4">
                                                <div class="col-12 mb-3">
                                                    <div class="">
                                                        <h4 class="border-primary text-primary">Yang dapat dilakukan</h4>
                                                        <ul class="list-primary">
                                                            <li>Memperbarui biodata pribadi</li>
                                                            <li>Membuat dan melaksanakan absensi</li>
                                                            <li>Mengatur keuangan kelas</li>
                                                            <li>Mengatur dan membuat informasi untuk kelas</li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Action button -->
                                        <div class="btns-action anim fadein-bottom td-2">
                                            <a class="btn btn-primary bg-gradient-primary btn-round no-border btn-shadow" href="<?php echo site_url('DaftarSiswa')?>">
                                                <span class="txt">Daftar</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <!-- end of text content -->
                            </div>
                        </li>
                        <!-- item -->
                        <li class="slide-item swiper-slide" data-hash="Wali Murid">
                            <div class="item row">
                                <!-- begin of illustration content -->
                                <div class="col-12 col-md-6 col-lg-7 order-md-1">
                                    <!-- content -->
                                    <div class="section-content anim">
                                        <!-- illustartion -->
                                        <div class="images text-center">
                                            <div class="img-frame-normal full img-black">
                                                <div class="img-1">
                                                    <img class="img" alt="Image" src="<?php echo base_url('/assets/Landeux/img/parents.png')?>">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- end of illustration content -->

                                <!-- begin of text content -->
                                <div class="col-12 col-md-6 col-lg-5 order-md-2 center-vh">
                                    <!-- content -->
                                    <div class="section-content anim">
                                        <!-- title and description -->
                                        <div class="title-desc">
                                            <h2 class="display-4 display-title anim fadein-top td-2 text-black">Wali Murid</h2>
                                            <p class="anim fadein-top td-3">Wali Murid bertugas untuk memantau perkembangan anaknya dan
                                                informasi informasi terbaru yang ada di kelasnya.</p>
                                            <div class="row anim fadein-top td-4">
                                                <div class="col-12 mb-3">
                                                    <div class="">
                                                        <h4 class="border-primary text-primary">Yang dapat dilakukan</h4>
                                                        <ul class="list-primary">
                                                            <li>Memantau absensi anaknya dikelas</li>
                                                            <li>Memantau keuangan kelas dan anaknya</li>
                                                            <li>Mengetahui informasi terbaru dikelas</li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Action button -->
                                        <div class="btns-action anim fadein-bottom td-2">
                                            <a class="btn btn-primary bg-gradient-primary btn-round no-border btn-shadow" href="<?php echo site_url('DaftarWaliMurid')?>">
                                                <span class="txt">Daftar</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <!-- end of text content -->
                            </div>
                        </li>
                    </ul>
                </div>

            </div>
            <!-- end of carousel-swiper-beta -->

        </div>
        <!-- End of section wrapper -->
    </div>
    <!-- End of slider features section -->

    <!-- Begin of features section -->
    <div class="section section-twoside bg-white-gray bg-bright" data-section="slider-reviews">
        <!-- Begin of section wrapper -->
        <div class="section-wrapper twoside padding-bottom padding-top">

            <!-- begin of carousel-swiper-beta -->
            <div class="slider-wrapper carousel-swiper-review carousel-swiper-review-demo">
                <!-- slider -->
                <div class="slider-container swiper-container">
                    <ul class="item-list swiper-wrapper">
                        <!-- item -->
                        <li class="slide-item swiper-slide">
                            <div class="item">
                                <div class="section-content center-vh">
                                    <!-- title and description -->
                                    <div class="title-desc text-center">
                                        <p class="anim fadein-top td-2 display-5">"Look the problem at around you, and change it to a chance"</p>
                                        <p class="anim fadein-top td-3">Abdur Rachman Wahed - Hexa</p>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <!-- item -->
                        <li class="slide-item swiper-slide">
                            <div class="item">
                                <div class="section-content center-vh">
                                    <!-- title and description -->
                                    <div class="title-desc text-center">
                                        <p class="anim fadein-top td-2 display-5">"It saved us a lot of times"</p>
                                        <p class="anim fadein-top td-3">Jeff Ma, Alizon</p>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <!-- item -->
                        <li class="slide-item swiper-slide" data-hash="App page">
                            <div class="item">
                                <div class="section-content center-vh">
                                    <!-- title and description -->
                                    <div class="title-desc text-center">
                                        <p class="anim fadein-top td-2 display-5">"We set up our landing page in hour"</p>
                                        <p class="anim fadein-top td-3">Dave Johnson, Homecraft</p>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>

                <!-- pagination -->
                <div class="items-pagination"></div>
            </div>
            <!-- end of carousel-swiper-beta -->

        </div>
        <!-- End of section wrapper -->
    </div>
    <!-- End of features section -->

    <!-- Begin of footer section -->
    <div class="section section-footer bg-secondary" data-section="footer">
        <!-- Begin of section wrapper -->
        <div class="section-wrapper">

            <!-- content -->
            <div class="section-content">
                <footer class="footer footer-alpha text-center">
                    <nav class="footer-nav">
                        <div class="row">
                            <div class="col-12">
                                <a class="navbar-brand" href="index-2.html">
                                    <img src="<?php echo base_url('/assets/Landeux/img/setClass-white.png')?>" alt="Title">
                                    <h3 class="text">set<b>C</b>lass</h3>
                                </a>
                            </div>
                            <div class="col-12">
                                <p>© Website made by
                                    <a href="#">
                                        <span class="marked">Hexa</span>
                                    </a>- abdurrachmanwahed@gmail.com</p>
                            </div>
                        </div>
                    </nav>
                </footer>
            </div>
        </div>
        <!-- End of section wrapper -->
    </div>
    <!-- End of footer section -->
</main>
<!-- END OF page main content -->



<!-- scripts -->
<!-- All Javascript plugins goes here -->
<!--		<script src="//code.jquery.com/jquery-1.12.4.min.js"></script>-->
<script src="<?php echo base_url('/assets/Landeux/js/vendor/scrollreveal.min.js')?>"></script>
<script src="<?php echo base_url('/assets/Landeux/js/vendor/scrollreveal-anim.js')?>"></script>
<script src="<?php echo base_url('/assets/Landeux/js/vendor/jquery-1.12.4.min.js')?>"></script>

<!-- All vendor scripts -->
<script src="<?php echo base_url('/assets/Landeux/js/vendor/all.js')?>"></script>
<script src="<?php echo base_url('/assets/Landeux/js/particlejs/particles.min.js')?>"></script>

<!-- Countdown script -->
<script src="<?php echo base_url('/assets/Landeux/js/jquery.downCount.js')?>"></script>

<!-- Form script -->
<script src="<?php echo base_url('/assets/Landeux/js/form_script.js')?>"></script>

<!-- Javascript main files -->
<script src="<?php echo base_url('/assets/Landeux/js/main.js')?>"></script>

<script>
    $(document).ready(function(){
        $('#daftarBtn').click(function (event) {
            if(this.hash !== ''){
                event.preventDefault();

                var hash = this.hash;

                $('html, body').animate({
                    scrollTop: $(hash).offset().top
                }, 1000, function () {
                    //some doing
                });
            }
        });
    });
</script>

<!-- Google Analytics: Uncomment and change UA-XXXXX-X to be your site"s ID. -->
<!--<script>
  (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
  function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
  e=o.createElement(i);r=o.getElementsByTagName(i)[0];
  e.src="//www.google-analytics.com/analytics.js";
  r.parentNode.insertBefore(e,r)}(window,document,"script","ga"));
  ga("create","UA-XXXXX-X");ga("send","pageview");
</script>-->

<!-- Uncomment below to enable particles scripts -->
<!--<script src="./js/particlejs/particles-init.js"></script>-->
<!--<script src="./js/particlejs/particles-init-snow.js"></script>-->
</body>
</html>