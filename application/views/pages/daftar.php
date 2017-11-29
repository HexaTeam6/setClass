<!DOCTYPE html>
<html lang="en">
<head>
    <title>setClass</title>
    <!-- Wizard Step, SweetAlert, and Select2 CSS -->
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
<div id="main-wrapper">
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
                                <form action="#" class="validation-wizard wizard-circle">
                                    <!-- Step 1 -->
                                    <h6>Data pribadi</h6>
                                    <section>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="wnip">NIP :</label>
                                                    <input type="text" class="form-control required" id="wnip"
                                                           name="nip">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="wnama">Nama : </label>
                                                    <input type="text" class="form-control required" id="wnama"
                                                           name="nama">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="wemail"> Email : </label>
                                                    <input type="email" class="form-control required"
                                                           id="wemail" name="email"></div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="wjenisKelamin"> Jenis Kelamin :</label>
                                                    <select class="custom-select form-control required"
                                                            id="wjenisKelamin"
                                                            name="jenisKelamin">
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
                                                    <label for="wtempatLahir"> Kota Kelahiran : </label>
                                                    <input type="text" class="form-control required"
                                                           id="wtempatLahir" name="tempatLahir">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="wtanggalLahir">Tanggal Lahir : </label>
                                                    <input type="date" class="form-control required" id="wtanggalLahir"
                                                           name="tanggalLahir">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="walamat">Alamat : </label>
                                                    <input type="text" class="form-control required"
                                                           id="walamat" name="alamat">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="wtelepon">Nomor Telepon : </label>
                                                    <input type="text" class="form-control required" id="wtelepon"
                                                           name="telepon">
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
                                                    <label for="wkodeKelas">Kode Kelas :</label>
                                                    <input type="text" class="form-control required" id="wkodeKelas"
                                                           name="kodeKelas">
                                                </div>
                                            </div>
                                            <div class="col-md-5">
                                                <div class="form-group" style="padding-top: 34px;">
                                                    <button class="btn btn-success">Generate</button>
                                                    <label style="float: right;" class="label label-light-warning">
                                                        Jangan sebarkan<br> kode kelas ini secara bebas</label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="wnamaSekolah">Nama Sekolah : </label>
                                                    <input type="text" class="form-control required"
                                                           id="wnamaSekolah" name="namaSekolah">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="walamatSekolah">Alamat Sekolah : </label>
                                                    <input type="text" class="form-control required" id="walamatSekolah"
                                                           name="alamatSekolah">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="wteleponSekolah">Nomor Telepon Sekolah : </label>
                                                    <input type="text" class="form-control required"
                                                           id="wteleponSekolah" name="teleponSekolah">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="wkelas"> Kelas : </label>
                                                    <select class="selectpicker form-control required" id="wkelas" name="kelas">
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
                                                    <label for="wjurusan">Jurusan :</label>
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

<!--Moment, Wizard, SweetAlert, and Select2 JS-->
<?php $this->load->view('partials/_javascripts'); ?>
<script>
    $(document).ready(function () {
        $('#jurusan').hide();
        $('.selectpicker').selectpicker();

        $('.selectpicker').change(function () {
            if ($('.selectpicker').val() == '1 SMA/SMK' || $('.selectpicker').val() == '2 SMA/SMK' || $('.selectpicker').val() == '3 SMA/SMK'){
                $('#jurusan').show();
                console.log($('.selectpicker').val());
            }else{
                $('#jurusan').hide();
                console.log($('.selectpicker').val());
            }
        });
    });
</script>
</body>
</html>
