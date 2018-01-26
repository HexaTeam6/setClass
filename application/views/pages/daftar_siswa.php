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
                                <center>
                                    <h2 class="card-title">Formulir Pendaftaran</h2>
                                    <h6 class="card-subtitle">Daftar sebagai Siswa</h6>
                                </center>
                                <form action="<?php echo site_url('DaftarSiswa/insert') ?>"
                                      class="validation-wizard wizard-circle" method="post" id="form" enctype="multipart/form-data">
                                    <!-- Step 1 -->
                                    <h6>Data pribadi</h6>
                                    <section>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group" id="formGroupNis">
                                                    <label for="wnis">NIS</label>
                                                        <input minlength="9" type="text" class="form-control"
                                                               id="wnis" name="nis" required>
                                                        <div class="help-block" id="alertNis"></div>
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
                                                <div class="form-group" id="formGroupNik">
                                                    <label for="wnik">NIK</label>
                                                    <input minlength="16" type="text" class="form-control"
                                                           id="wnik" name="nik" required>
                                                    <div class="help-block" id="alertNik"></div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group" id="formGroupEmail">
                                                    <label for="wemail"> Email</label>
                                                    <input type="email" class="form-control"
                                                           id="wemail" name="email" required>
                                                    <div class="help-block" id="alertEmail"></div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="wjenisKelamin"> Jenis Kelamin</label>
                                                    <select class="selectpicker form-control"
                                                            id="wjenisKelamin"
                                                            name="jenisKelamin" required>
                                                        <option value="">Pilih Jenis Kelamin</option>
                                                        <option value="Laki Laki">Laki Laki</option>
                                                        <option value="Perempuan">Perempuan</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="wtempatLahir"> Kota Kelahiran</label>
                                                    <input type="text" class="form-control"
                                                           id="wtempatLahir" name="tempatLahir" required>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="wtanggalLahir">Tanggal Lahir</label>
                                                    <input type="date" class="form-control" id="wtanggalLahir"
                                                           name="tanggalLahir" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="walamat">Alamat : </label>
                                                    <input type="text" class="form-control"
                                                           id="walamat" name="alamat" required>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="wtelepon">Nomor Telepon</label>
                                                    <input type="text" class="form-control" id="wtelepon"
                                                           name="telepon" required>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row" style="margin-bottom: 20px;">
                                            <div class="col-md-12">
                                                <label for="input-file-now">Foto Profil</label>
                                                <input type="file" id="input-file-now" name="foto" class="dropify"
                                                       data-allowed-file-extensions="jpg png jpeg" required>
                                            </div>
                                        </div>
                                    </section>
                                    <!-- Step 2 -->
                                    <h6>Data Kelas</h6>
                                    <section>
                                        <div class="row">
                                            <div class="col-md-5">
                                                <div class="form-group">
                                                    <label for="wkodeKelas">Kode Kelas</label>
                                                    <input type="text" class="form-control" id="wkodeKelas"
                                                           name="kodeKelas" required>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group" style="padding-top: 34px;">
                                                    <button type="button"
                                                            class="btn btn-success waves-effect waves-light"
                                                            id="cariKelas">
                                                        <span class="btn-label">
                                                            <i class="fa fa-search"></i>
                                                        </span>
                                                        Cari
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <label class="label label-light-warning" style="margin-top: 34px;">
                                                    Masukkan kode kelas <br>untuk bergabung ke dalam kelas</label>
                                            </div>
                                        </div>

                                        <label id="notFound" class="label label-light-danger" style="font-size: 16px">
                                            <i class="fa fa-close"></i>  Kode kelas tidak ditemukan.
                                        </label>

                                        <div id="kelasInfo">
                                            <hr size="100%">

                                            <div class="col-md-12" align="center" style="margin-top: 10px">
                                                <label class="label label-primary">Profil Kelas</label>
                                            </div>

                                            <div>
                                                <label class="col-md-3 font-weight-bold float-left">Wali Kelas</label>
                                                <label class="col-md-6" id="labelNamaWali"></label>
                                            </div>

                                            <div>
                                                <label class="col-md-3 font-weight-bold float-left">NIP</label>
                                                <label class="col-md-6" id="labelNip"></label>
                                            </div>

                                            <div>
                                                <label class="col-md-3 font-weight-bold float-left">Nama Sekolah</label>
                                                <label class="col-md-6" id="labelNama"></label>
                                            </div>

                                            <div>
                                                <label class="col-md-3 font-weight-bold float-left">Alamat Sekolah</label>
                                                <label class="col-md-6" id="labelAlamat"></label>
                                            </div>

                                            <div>
                                                <label class="col-md-3 font-weight-bold float-left">Telepon</label>
                                                <label class="col-md-6" id="labelTelepon"></label>
                                            </div>

                                            <div>
                                                <label class="col-md-3 font-weight-bold float-left">Kelas</label>
                                                <label class="col-md-2" id="labelKelas"></label>
                                                <label class="label label-light-warning" id="labelJurusan"></label>
                                            </div>

                                            <div align="center">
                                                <button id="gunakanKode" type="button"
                                                        class="btn btn-primary btn-rounded waves waves-effect waves-light">
                                                    Pilih Kelas
                                                </button>
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
        $('#kelasInfo').hide();
        $('#notFound').hide();
        $('.selectpicker').selectpicker();
        $('a[href^="#finish"]').hide();

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
        $('#cariKelas').click(function () {
            var kode = $('#wkodeKelas').val();
            if (kode == '') kode = 'notFound';
            $.ajax({
                url: "<?php echo site_url("/DaftarSiswa/getClass/");?>"+kode,
                success: function (result) {
//                    console.log(result);
                    if (result != "false"){

                        var data = result;
                        data = data.split(':');

                        $('#labelNamaWali').text(data[0]);
                        $('#labelNip').text(data[1]);
                        $('#labelNama').text(data[2]);
                        $('#labelAlamat').text(data[3]);
                        $('#labelTelepon').text(data[4]);
                        $('#labelKelas').text(data[5]);
                        $('#labelJurusan').text(data[6]);
                        $("#kelasInfo").show();
                        $("#notFound").hide();
                    }else{
                        $("#notFound").show();
                        $("#kelasInfo").hide();
                        $('a[href^="#finish"]').hide();
                    }
                }
            });
        });

        $('#gunakanKode').click(function () {
            $('#wkodeKelas').attr("readonly", true);
            $('#gunakanKode').attr("disabled", true).attr("style", "cursor:not-allowed");
            $('#cariKelas').attr("disabled", true).attr("style", "cursor:not-allowed");
            $('a[href^="#finish"]').show();
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

        //Masking
        $("#wnis").inputmask("9{1,9}");
        $("#wnik").inputmask("9{1,16}");
        $("#wtelepon").inputmask("+628-9{1,3}-9{1,3}-9{1,4}");
//        $("#wemail").inputmask("a{1,20}@a{1,20}.a{3}[.{2}]");

        //check NIS
        $('#wnis').blur(function () {
            var nis = $('#wnis').val();
//            console.log(nis);
//            console.log("<?php //echo site_url("/DaftarSiswa/checkUserInfo/");?>//" + nis);
            if (!nis==""){
                $.ajax({
                    url: "<?php echo site_url("/DaftarSiswa/checkUserInfo/");?>" + nis,
                    success: function (result) {
//                        console.log(result);
                        if (result == "true"){
//                            console.log("200 OK");
                            $('#formGroupNis').removeClass("validate");
                            $('#formGroupNis').addClass("has-danger");
                            $('#wnis').addClass("form-control-danger");
                            $('#alertNis').append("<ul role='alert'><li style='margin-left: -40px;' class='label label-light-danger'>&blacksquare; NIS telah digunakan</li></ul>");
                        }else {
                            $('#wnis').removeClass("form-control-danger");
                            $('#formGroupNis').removeClass("has-danger");
                        }
                    }
                });
            }else {
                $('#wnis').removeClass("form-control-danger");
                $('#formGroupNis').removeClass("has-danger");
            }
        });

        //check Email
        $('#wemail').blur(function () {
            var email = $('#wemail').val();
//            console.log(email);
            email = email.replace("@", "-at-");
//            console.log("<?php //echo site_url("/Daftar/checkUserEmail/");?>//" + email);
            if (!email==""){
                $.ajax({
                    url: "<?php echo site_url("/Daftar/checkUserEmail/");?>" + email,
                    success: function (result) {
//                        console.log(result);
                        if (result == "true"){
//                            console.log("200 OK");
                            $('#formGroupEmail').removeClass("validate");
                            $('#formGroupEmail').addClass("has-danger");
                            $('#wemail').addClass("form-control-danger");
                            $('#alertEmail').append("<ul role='alert'><li style='margin-left: -40px;' class='label label-light-danger'>&blacksquare; Email telah digunakan</li></ul>");
                        }else {
                            $('#wemail').removeClass("form-control-danger");
                            $('#formGroupEmail').removeClass("has-danger");
                        }
                    }
                });
            }else {
                $('#wemail').removeClass("form-control-danger");
                $('#formGroupEmail').removeClass("has-danger");
            }
        });

        //check NIK
        $('#wnik').blur(function () {
            var nik = $('#wnik').val();
//            console.log(nik);
//            console.log("<?php //echo site_url("/DaftarSiswa/checkUserNik/");?>//" + nik);
            if (!nik==""){
                $.ajax({
                    url: "<?php echo site_url("/DaftarSiswa/checkUserNik/");?>" + nik,
                    success: function (result) {
//                        console.log(result);
                        if (result == "true"){
//                            console.log("200 OK");
                            $('#formGroupNik').removeClass("validate");
                            $('#formGroupNik').addClass("has-danger");
                            $('#wnik').addClass("form-control-danger");
                            $('#alertNik').append("<ul role='alert'><li style='margin-left: -40px;' class='label label-light-danger'>&blacksquare; NIK telah digunakan</li></ul>");
                        }else {
                            $('#wnik').removeClass("form-control-danger");
                            $('#formGroupNik').removeClass("has-danger");
                        }
                    }
                });
            }else {
                $('#wnik').removeClass("form-control-danger");
                $('#formGroupNik').removeClass("has-danger");
            }
        });

        //File Upload
        $('.dropify').dropify({
            messages: {
                'default': 'Seret gambar kesini atau klik untuk menambahkan gambar',
                'replace': 'Seret gambar kesini atau klik untuk mengganti gambar',
                'remove':  'Hapus',
                'error':   'Ada kesalahan dalam file.'
            },
            tpl: {
                message:'<div class="dropify-message"><span class="file-icon" /> <p style="text-align: center">{{ default }}</p></div>'
            }
        });

    });
</script>
</body>
</html>
