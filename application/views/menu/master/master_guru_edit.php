<!DOCTYPE html>
<html lang="en">
<head>
    <title>setClass</title>
    <!--SweetAlert, Dropify-->
    <?php $this->load->view('partials/_css'); ?>
</head>

<body class="fix-sidebar fix-header card-no-border">
<?php $this->load->view('partials/_preloader'); ?>

<!-- ============================================================== -->
<!-- Main wrapper - style you can find in pages.scss -->
<!-- ============================================================== -->
<div id="main-wrapper">
    <?php
    $header['notif'] = $notif;
    $header['new'] = $new;
    $header['mark'] = $mark;
    $this->load->view('partials/_header', $header);
    ?>

    <?php $this->load->view('partials/_sidebar'); ?>
    <!-- ============================================================== -->
    <!-- Page wrapper  -->
    <!-- ============================================================== -->
    <div class="page-wrapper">

        <!-- ============================================================== -->
        <!-- Container fluid  -->
        <!-- ============================================================== -->
        <div class="container-fluid">

            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="row page-titles">
                <div class="col-md-5 col-8 align-self-center">
                    <h3 class="text-themecolor m-b-0 m-t-0">Sunting Data Guru</h3>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Master</li>
                    </ol>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->

            <!-- ============================================================== -->
            <!-- Start Page Content -->
            <!-- ============================================================== -->
            <div class="card">
                <div class="card-body" style="padding-left: 125px; padding-right: 125px;">
                    <center style="margin-bottom: 50px">
                        <h2><b>Sunting Data Guru</b></h2>
                        "Tambah atau edit data guru di kelas anda"
                    </center>
                    <form id="form" method="post" action="<?php echo site_url('/MasterGuru/update')?>" enctype="multipart/form-data">
                        <?php foreach ($data as $row):?>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group" id="formGroupNip">
                                    <label for="wnip">NIP</label>
                                    <input minlength="12" type="text" class="form-control" id="wnip" name="nip" value="<?php echo $row->NIP?>" required>
                                    <input type="hidden" id="kode_guru" name="kode_guru" value="<?php echo $row->kode_guru;?>" required>
                                    <div class="help-block" id="alertNip"></div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="wnama">Nama</label>
                                    <input type="text" class="form-control" id="wnama" name="nama" value="<?php echo $row->nama_guru?>" required>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="hidden" id="jenis_kelamin" value="<?php echo $row->jenis_kelamin?>" required>
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
                                           id="wtempatLahir" name="tempatLahir" value="<?php echo $row->tempat_lahir?>" required>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="wtanggalLahir">Tanggal Lahir</label>
                                    <input type="date" class="form-control" id="wtanggalLahir"
                                           name="tanggalLahir" value="<?php echo $row->tanggal_lahir ?>" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="walamat">Alamat : </label>
                                    <input type="text" class="form-control"
                                           id="walamat" name="alamat" value="<?php echo $row->alamat?>" required>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="wtelepon">Nomor Telepon</label>
                                    <input type="text" class="form-control" id="wtelepon"
                                           name="telepon" value="<?php echo $row->no_telp ?>" required>
                                </div>
                            </div>
                        </div>

                        <div class="row" style="margin-bottom: 20px;">
                            <div class="col-md-12">
                                <label for="input-file-now">Foto</label>
                                <input type="file" id="input-file-now" name="foto" class="dropify"
                                       data-allowed-file-extensions="jpg png jpeg"
                                       data-default-file="<?php echo ($row->foto == '') ? '' : base_url('/assets/img/fotoGuru/').$row->foto?>">
                            </div>
                        </div>

                        <center>
                            <button type="submit" id="btnSimpan" class="btn btn-primary btn-rounded waves waves-effect waves-light">
                                <span class="btn-label"><i class="fa fa-graduation-cap"></i></span>
                                Simpan
                            </button>
                        </center>
                        <?php endforeach;?>
                    </form>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End PAge Content -->
            <!-- ============================================================== -->

        </div>
        <!-- ============================================================== -->
        <!-- End Container fluid  -->
        <!-- ============================================================== -->
        <?php $this->load->view('partials/_footer'); ?>
    </div>
    <!-- ============================================================== -->
    <!-- End Page wrapper  -->
    <!-- ============================================================== -->

</div>
<!-- ============================================================== -->
<!-- End Wrapper -->
<!-- ============================================================== -->

<!--Dropify JS, InputMask Js, SweetAlert JS-->
<?php $this->load->view('partials/_javascripts'); ?>
<script>
    $(function () {

        <?php if (isset($_SESSION['msg'])) {?>
        swal({
            position: 'center',
            type: 'success',
            title: "<?php echo $_SESSION['msg'];?>",
            showConfirmButton: false,
            timer: 1500
        });
        <?php }?>

        $("input,select,textarea").jqBootstrapValidation({
            preventSubmit: true
        });

        $("#wnip").inputmask("9{1,12}");
        $("#wtelepon").inputmask("+628-9{1,3}-9{1,3}-9{1,4}");
        $("#wjenisKelamin").selectpicker('val', $('#jenis_kelamin').val());

        //check NIP
        $('#wnip').blur(function () {
            var nip = $('#wnip').val();
            var kode_guru = $('#kode_guru').val();
            console.log(nip);
//            console.log("<?php //echo site_url("/MasterGuru/checkUpdate/");?>//" + kode_guru + "/" + nip);
            if (!nip==""){
                $.ajax({
                    url: "<?php echo site_url("/MasterGuru/checkUpdate/");?>" + kode_guru + "/" + nip,
                    success: function (result) {
                        console.log(result);
                        if (result == "true"){
//                            console.log("200 OK");
                            $('#formGroupNip').removeClass("validate");
                            $('#formGroupNip').addClass("has-danger");
                            $('#wnip').addClass("form-control-danger");
                            $('#alertNip').append("<ul role='alert'><li style='margin-left: -40px;' class='label label-light-danger'>&blacksquare; Guru dengan NIP tersebut sudah ada</li></ul>");
                            $('#btnSimpan').hide();
                        }else {
                            $('#wnip').removeClass("form-control-danger");
                            $('#formGroupNip').removeClass("has-danger");
                            $('#btnSimpan').show();
                        }
                    }
                });
            }else {
                $('#wnip').removeClass("form-control-danger");
                $('#formGroupNip').removeClass("has-danger");
            }
        });

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
