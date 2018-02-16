<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
    <meta name="theme-color" content="#2196F3">
    <link rel="icon" href="<?php echo base_url('/assets/img/flaticon.png')?>">
    <title>setClass</title>

    <!-- CSS  -->
    <link href="<?php echo base_url('assets/landingPage/css/plugin-min.css'); ?>" type="text/css" rel="stylesheet">
    <link href="<?php echo base_url('assets/landingPage/css/custom-min.css'); ?>" type="text/css" rel="stylesheet">
</head>
<body>

<!-- Pre Loader -->
<div id="loader-wrapper">
    <div id="loader"></div>

    <div class="loader-section section-left"></div>
    <div class="loader-section section-right"></div>

</div>
<div style="background-size: cover; background-image: url('<?php echo base_url('/assets/img/homepage.jpg'); ?>')">
    <!--Navigation-->
    <div class="navbar-fixed">
        <nav id="nav_f" class="default_color" role="navigation">
            <div class="container">
                <div class="nav-wrapper">
                    <div id="logo-container" class="brand-logo"><img
                                src="<?php echo base_url('/assets/img/setClass.png') ?>" alt="setClass Logo"
                                width="50px" style="position: relative; margin-bottom: -5px;"/> set<b>C</b>lass
                    </div>
                    <ul class="right hide-on-med-and-down">
                        <li><a href="#intro" id="tentang">Tentang</a></li>
                        <li><a href="<?php echo site_url('Auth/masuk') ?>">Masuk</a></li>
                        <li><a href="<?php echo site_url('Daftar/')?>">Daftar</a></li>
                    </ul>
                    <ul id="nav-mobile" class="side-nav">
                        <li><a href="#intro">Tentang</a></li>
                        <li><a href="<?php echo site_url('Auth/masuk') ?>">Masuk</a></li>
                        <li><a href="<?php echo site_url('Daftar/')?>">Daftar</a></li>
                    </ul>
                    <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="mdi-navigation-menu"></i></a>
                </div>
            </div>
        </nav>
    </div>

    <!--Typing Text-->
    <div class="section no-pad-bot" id="index-banner" style="background-color: transparent;">
        <div style="margin-left: 80px;">
            <h1 class="text_h left header cd-headline letters type" style="font-size: 50px">
                <b>setClass</b>
                <span>Mengatur</span>
                <span class="cd-words-wrapper waiting">
                <b class="is-visible">informasi</b>
                <b>absensi</b>
                <b>keuangan</b>
            </span>
                <br>
                <span id="subtext" style="font-size: 20px; font-style: italic;">"Buat kelas anda terkoordinir secara online"</span>
            </h1>
        </div>
    </div>
</div>

<!--Intro and service-->
<div id="intro" class="section scrollspy">
    <div class="container">
        <div class="row">
            <div class="col s12">
                <h2 class="center header text_h2"> Lorem ipsum dolor sit amet, consectetur adipiscing elit. <span
                            class="span_h2"> Phasellus  </span>vestibulum lorem risus, nec suscipit lorem <span
                            class="span_h2"> laoreet quis.</span></h2>
            </div>

            <div class="col s12 m4 l4">
                <div class="center promo promo-example">
                    <i class="mdi-image-flash-on"></i>
                    <h5 class="promo-caption">Speeds up development</h5>
                    <p class="light center">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo
                        ligula eget dolor. Cum sociis natoque penatibus et magnis dis parturient montes.</p>
                </div>
            </div>
            <div class="col s12 m4 l4">
                <div class="center promo promo-example">
                    <i class="mdi-social-group"></i>
                    <h5 class="promo-caption">User Experience Focused</h5>
                    <p class="light center">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo
                        ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes,
                        nascetur ridiculus mus.</p>
                </div>
            </div>
            <div class="col s12 m4 l4">
                <div class="center promo promo-example">
                    <i class="mdi-hardware-desktop-windows"></i>
                    <h5 class="promo-caption">Fully responsive</h5>
                    <p class="light center">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo
                        ligula eget dolor. Aenean massa.</p>
                </div>
            </div>
        </div>
    </div>
</div>

<!--Footer-->
<footer id="contact" class="page-footer default_color scrollspy">
    <div class="footer-copyright default_color">
        <div class="container">
            <b>Copyright &copy; 2017 setClass.</b> All rights reserved.
        </div>
    </div>
</footer>


<!--  Scripts-->
<script src="<?php echo base_url('assets/landingPage/js/plugin-min.js'); ?>"></script>
<script src="<?php echo base_url('assets/landingPage/js/custom-min.js'); ?>"></script>
<script>
    $(document).ready(function () {

        $('#tentang').click(function () {
            $('html, body').animate({
                scrollTop: $('#intro').offset().top
            }, 500)
        });

    });
</script>
</body>
</html>
