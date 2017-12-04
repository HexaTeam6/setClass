<!DOCTYPE html>
<html lang="en">
<head>
    <title>setClass</title>
    <!--Toast CSS-->
    <?php $this->load->view('partials/_css');?>
</head>

<body>
<?php $this->load->view('partials/_preloader');?>

<!--alert-->
<div class="jq-toast-wrap top-right">
    <div class="jq-toast-single jq-has-icon jq-icon-error" style="text-align: left; display: none;"><span
                class="jq-toast-loader jq-toast-loaded"
                style="-webkit-transition: width 3.1s ease-in;-o-transition: width 3.1s ease-in;                       transition: width 3.1s ease-in;                       background-color: #ff6849;"></span><span
                class="close-jq-toast-single">×</span>
        <h2 class="jq-toast-heading">Welcome to Monster admin</h2>Use the predefined ones, or specify a custom position
        object.
    </div>
</div>

<!-- ============================================================== -->
<!-- Main wrapper - style you can find in pages.scss -->
<!-- ============================================================== -->
<section id="wrapper">
    <div class="login-register"
         style="background-image: url('<?php echo base_url('/assets/img/blurred-classroom.jpg') ?>');">
        <div class="login-box card">
            <div class="card-body">
                <form class="form-horizontal form-material" id="loginform" action="javascript:void(0)">
                    <h3 class="box-title m-b-20">Sign In</h3>
                    <div class="form-group ">
                        <div class="col-xs-12">
                            <input class="form-control" id="username" type="text" required placeholder="NIP/NIS/NIK"></div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <input class="form-control" id="password" type="password" required placeholder="Password"></div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <div class="checkbox checkbox-primary pull-left p-t-0">
                                <input id="checkbox-signup" type="checkbox">
                                <label for="checkbox-signup"> Remember me </label>
                            </div>
                            <a href="javascript:void(0)" id="to-recover" class="text-dark pull-right"><i
                                        class="fa fa-lock m-r-5"></i> Lupa password?</a></div>
                    </div>
                    <div class="form-group text-center m-t-20">
                        <div class="col-xs-12">
                            <button class="btn btn-info btn-lg btn-block text-uppercase waves-effect waves-light"
                                    type="submit" id="btnMasuk">Masuk
                            </button>
                        </div>
                    </div>
                    <div class="form-group m-b-0">
                        <div class="col-sm-12 text-center">
                            <p>Tidak memiliki akun? <a href="<?php echo site_url('Daftar/')?>" class="text-info m-l-5"><b>Daftar</b></a>
                            </p>
                        </div>
                    </div>
                </form>

                <form class="form-horizontal" id="recoverform" action="#">
                    <a href="javascript:void(0)" id="to-login" style="margin-top: -15px;" class="text-dark pull-right"><i
                                class="fa fa-close m-r-5"></i></a>
                    <div class="form-group ">
                        <div class="col-xs-12">
                            <h3>Recover Password</h3>
                            <p class="text-muted">Enter your Email and instructions will be sent to you! </p>
                        </div>
                    </div>
                    <div class="form-group ">
                        <div class="col-xs-12">
                            <input class="form-control" type="text" required="" placeholder="Email"></div>
                    </div>
                    <div class="form-group text-center m-t-20">
                        <div class="col-xs-12">
                            <button class="btn btn-primary btn-lg btn-block text-uppercase waves-effect waves-light"
                                    type="submit">Reset
                            </button>
                        </div>
                    </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

</section>
<!-- ============================================================== -->
<!-- End Wrapper -->
<!-- ============================================================== -->

<!--Toast JS-->
<?php $this->load->view('partials/_javascripts');?>
<script>
    $('#loginform').submit(function () {
//        console.log($('#loginform').serialize());
        var username = $('#username').val();
        var password = $('#password').val();
//        console.log("<?php //echo site_url("/Auth/login/");?>//" + username + "/" + password);
        $.ajax({
            url: "<?php echo site_url("/Auth/login/");?>",
            dataType: 'text',
            type: "POST",
            contentType: 'application/x-www-form-urlencoded',
            data: {"username": username, "password": password},
            success: function (result) {
                if (result == "false"){
                    console.log(result);
                    $.toast({
                        heading: 'Login Gagal',
                        text: 'Pastikan username dan password sesuai.',
                        position: 'top-right',
                        loaderBg:'#ff6849',
                        icon: 'error',
                        hideAfter: 3000,
                        stack: 6
                    });
                }else {
                    $.toast({
                        heading: 'Login Berhasil',
                        text: 'Username dan password sesuai.',
                        position: 'top-right',
                        loaderBg:'#ff6849',
                        icon: 'success',
                        hideAfter: 2000,
                        stack: 6
                    });
                    setTimeout(function(){document.location.href = result}, 2100);
                }
            }
        });
    });
</script>
</body>
</html>