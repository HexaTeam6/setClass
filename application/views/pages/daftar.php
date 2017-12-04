<!DOCTYPE html>
<html lang="en" style="background-color: #F2F2F2">
<head>
    <title>setClass</title>
    <!-- Wizard Step, SweetAlert, BootstrapSelect CSS, and Dropify CSS -->
    <?php $this->load->view('partials/_css'); ?>

        <style>
            .wizard-content .wizard{
                overflow: visible;
            }
            .wizard-content .wizard>.content{
                overflow: visible;
            }
        </style>
</head>

<body>
<?php $this->load->view('partials/_preloader'); ?>

<!-- ============================================================== -->
<!-- Main wrapper - style you can find in pages.scss -->
<!-- ============================================================== -->
<div id="main-wrapper" style="background-color: #F2F2F2;">
    <!-- Page wrapper  -->
    <!-- ============================================================== -->

    <div class="col-md-8" style="margin: 5% 17% 0% 17%;">
        <!-- ============================================================== -->
        <!-- Container fluid  -->
        <!-- ============================================================== -->
        <div class="container-fluid">
            <!-- ============================================================== -->
            <!-- Start Page Content -->
            <!-- ============================================================== -->
            <div class="row">

                <!-- Validation wizard -->
                <div class="row" id="validation">
                    <div class="col-12">
                        <div class="card wizard-content">
                            <div class="card-body">
                                <h2 class="card-title">Sign Up</h2>
                                <h6 class="card-subtitle">Daftar sebagai Wali Kelas</h6>
                                <form action="<?php echo site_url('Daftar/insert') ?>"
                                      class="validation-wizard wizard-circle" method="post" id="form">
                                    <!-- Step 1 -->
                                    <h6>Data pribadi</h6>
                                    <section>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group" id="formGroupNip">
                                                    <label for="wnip">NIP</label>
<!--                                                    <div class="control">-->
                                                        <input minlength="12" type="text" class="form-control"
                                                               id="wnip" name="nip" required>
                                                        <div class="help-block" id="alertNip"></div>
<!--                                                    </div>-->
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="wnama">Nama</label>
                                                    <input type="text" class="form-control" id="wnama"
                                                           name="nama" required>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="password">Password</label>
                                                    <div class="control">
                                                        <input type="password" class="form-control" id="password"
                                                               name="password" pattern="(.*[a-z]+.*)(.*[A-Z]+.*)|(.*[A-Z]+.*)(.*[a-z]+.*)"
                                                               data-validation-pattern-message="Minimal terdapat satu huru kecil dan besar"
                                                               data-validation-regex-regex="(.*[0-9]+.*)(.*[!@#\$%\^&\*]+.*)|(.*[!@#\$%\^&\*]+.*)(.*[0-9]+.*)"
                                                               data-validation-regex-message="Minimal terdapat satu angka dan simbol"
                                                               minlength="8"
                                                               required>
                                                        <div class="help-block"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="cpassword">Retype Password</label>
                                                    <div class="controls">
                                                        <input type="password" id="cpassword" name="cpassword"
                                                               data-validation-match-match="password"
                                                               class="form-control" required>
                                                        <div class="help-block"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="wemail"> Email</label>
                                                    <input type="email" class="form-control"
                                                           id="wemail" name="email" required></div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="wjenisKelamin"> Jenis Kelamin</label>
                                                    <select class="custom-select form-control"
                                                            id="wjenisKelamin"
                                                            name="jenisKelamin" required>
                                                        <option value="">Pilih Jenis Kelamin</option>
                                                        <option value="Laki Laki">Laki Laki</option>
                                                        <option value="Perempuan">Perempuan</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="wtempatLahir"> Kota Kelahiran</label>
                                                    <input type="text" class="form-control"
                                                           id="wtempatLahir" name="tempatLahir" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="wtanggalLahir">Tanggal Lahir</label>
                                                    <input type="date" class="form-control" id="wtanggalLahir"
                                                           name="tanggalLahir" required>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="walamat">Alamat : </label>
                                                    <input type="text" class="form-control"
                                                           id="walamat" name="alamat" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="wtelepon">Nomor Telepon</label>
                                                    <input type="text" class="form-control" id="wtelepon"
                                                           name="telepon" required>
                                                </div>
                                            </div>
                                        </div>
                                    </section>
                                    <!-- Step 2 -->
                                    <h6>Data Kelas</h6>
                                    <section>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="wkodeKelas">Kode Kelas</label>
                                                    <input type="text" class="form-control" id="wkodeKelas"
                                                           name="kodeKelas" required readonly>
                                                </div>
                                            </div>
                                            <div class="col-md-5">
                                                <div class="form-group" style="padding-top: 34px;">
                                                    <button type="button"
                                                            class="btn btn-success waves-effect waves-light"
                                                            id="generate">Generate
                                                    </button>
                                                    <label style="float: right;" class="label label-light-warning">
                                                        Jangan sebarkan<br> kode kelas ini secara bebas</label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="wnamaSekolah">Nama Sekolah</label>
                                                    <input type="text" class="form-control required"
                                                           id="wnamaSekolah" name="namaSekolah">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="walamatSekolah">Alamat Sekolah</label>
                                                    <input type="text" class="form-control required" id="walamatSekolah"
                                                           name="alamatSekolah">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="wteleponSekolah">Nomor Telepon Sekolah</label>
                                                    <input type="text" class="form-control required"
                                                           id="wteleponSekolah" name="teleponSekolah">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="wkelas"> Kelas</label>
                                                    <select class="selectpicker form-control required" id="wkelas"
                                                            name="kelas">
                                                        <option></option>
                                                        <optgroup label="Sekolah Dasar">
                                                            <option value="1 SD">Kelas 1 SD</option>
                                                            <option value="2 SD">Kelas 2 SD</option>
                                                            <option value="3 SD">Kelas 3 SD</option>
                                                            <option value="4 SD">Kelas 4 SD</option>
                                                            <option value="5 SD">Kelas 5 SD</option>
                                                            <option value="6 SD">Kelas 6 SD</option>
                                                        </optgroup>
                                                        <optgroup label="Sekolah Menengah Pertama">
                                                            <option value="1 SMP">Kelas 1 SMP</option>
                                                            <option value="2 SMP">Kelas 2 SMP</option>
                                                            <option value="3 SMP">Kelas 3 SMP</option>
                                                        </optgroup>
                                                        <optgroup label="Sekolah Menengah Atas">
                                                            <option value="1 SMA/SMK">Kelas 1 SMA/SMK</option>
                                                            <option value="2 SMA/SMK">Kelas 2 SMA/SMA</option>
                                                            <option value="3 SMA/SMK">Kelas 3 SMA/SMK</option>
                                                        </optgroup>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row" id="jurusan">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="wjurusan">Jurusan</label>
                                                    <input type="text" class="form-control" id="wjurusan"
                                                           name="jurusan">
                                                </div>
                                            </div>
                                        </div>
                                    </section>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End Page wrapper  -->
    <!-- ============================================================== -->
</div>

<!--Moment, Wizard, SweetAlert, BootstrapSelect, Jquery InputMask, Validation, and Dropify JS-->
<?php $this->load->view('partials/_javascripts'); ?>
<script>
    $(document).ready(function () {
        $('#jurusan').hide();
        $('.selectpicker').selectpicker();

        $('.selectpicker').change(function () {
            if ($('.selectpicker').val() == '1 SMA/SMK' || $('.selectpicker').val() == '2 SMA/SMK' || $('.selectpicker').val() == '3 SMA/SMK') {
                $('#jurusan').show();
                $('#wjurusan').attr("required", true);
                //console.log($('.selectpicker').val());
            } else {
                $('#jurusan').hide();
                $('#wjurusan').attr("required", false);
//                console.log($('.selectpicker').val());
            }
        });

//        Generate Kode Kelas with ajax
        $('#generate').click(function () {
            $.ajax({
                url: "<?php echo site_url("/Daftar/generateClass");?>",
                success: function (result) {
                    $("#wkodeKelas").val(result);
                    $("#generate").removeClass("btn-success").addClass("btn-disabled").attr("disabled", true).attr("style", "cursor:not-allowed");
                }
            });
        });

//        validation in submit
        $("input,select,textarea").not("[type=submit]").jqBootstrapValidation({
            preventSubmit: true,
            submitError: function ($form, events, errors) {
                console.log(errors);
                var alerts = "";
                for (var props in errors) {
                    for (var i = 0; i < errors[props].length; i++) {
                        console.log(errors[props][i]);
                        alerts += "<span class='label label-light-danger'>&blacksquare; " + errors[props][i] + "</span><br>";
                    }
                }

                swal({
                    title: 'Kesalahan',
                    type: 'error',
                    text: 'Coba periksa kembali di password anda!<br>' + '<div style="margin-top: 10px;">' + alerts + '</div>',
                    html: true
                });
            }
        });

        $("#wnip").inputmask("9{1,12}");
        $("#wtelepon").inputmask("+628-9{1,3}-9{1,3}-9{1,4}");
//        $("#wemail").inputmask("a{1,20}@a{1,20}.a{3}[.{2}]");

        //check NIP
        $('#wnip').blur(function () {
            var nip = $('#wnip').val();
            console.log(nip);
            console.log("<?php echo site_url("/Daftar/checkUserInfo/");?>" + nip);
            if (!nip==""){
                $.ajax({
                    url: "<?php echo site_url("/Daftar/checkUserInfo/");?>" + nip,
                    success: function (result) {
                        console.log(result);
                        if (result == "true"){
                            console.log("200 OK");
                            $('#formGroupNip').removeClass("validate");
                            $('#formGroupNip').addClass("has-danger");
                            $('#wnip').addClass("form-control-danger");
                            $('#alertNip').append("<ul role='alert'><li style='margin-left: -40px;' class='label label-light-danger'>&blacksquare; NIP telah digunakan</li></ul>");

                        }else {
                            $('#wnip').removeClass("form-control-danger");
                            $('#formGroupNip').removeClass("has-danger");
                        }
                    }
                });
            }else {
                $('#wnip').removeClass("form-control-danger");
                $('#formGroupNip').removeClass("has-danger");
            }
        });

//        alert password validation
//        $("#password").keypress(function () {
//            var alert = $("#alertPassword ul li").text().split(",");
//            $("#alertPassword ul li").remove();
//            $("#alertPassword ul li").append("<li>tastasta</li>");
//            console.log(alert);
//        });
//        $('#password').not("[type=submit]").jqBootstrapValidation();
//        $('#cpassword').not("[type=submit]").jqBootstrapValidation();

    });
</script>
</body>
</html>
