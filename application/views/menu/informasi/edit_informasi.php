<!DOCTYPE html>
<html lang="en">
<head>
    <title>setClass</title>
    <?php $this->load->view('partials/_css'); ?>
    <?php $this->load->view('partials/_tinyMce'); ?>

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
                    <h3 class="text-themecolor m-b-0 m-t-0">Sunting Informasi</h3>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Informasi</li>
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
                <div class="card-body">
                    <center>
                        <h2><b>Sunting Informasi</b></h2>
                        "Share informasi ke seluruh anggota kelas"
                    </center>
                    <form id="form" method="post" action="<?php echo site_url('/DataInformasi/update')?>" enctype="multipart/form-data">
                        <?php foreach ($data as $row):?>
                            <input type="hidden" id="akses" value="<?php echo $row->akses_jabatan?>">
                        <div class="form-group col-md-4" style="margin-top: 40px">
                            <label for="wjabatan" class="control-label">Informasi untuk :</label>
                            <select class="selectpicker form-control required"
                                    name="aksesJabatan" id="wjabatan" required>
                                <option></option>
                                <optgroup label="Jabatan List">
                                    <option value="3">Ketua Kelas</option>
                                    <option value="4">Sekertaris</option>
                                    <option value="5">Bendahara</option>
                                    <option value="0">Semua anggota kelas</option>
                                </optgroup>
                            </select>
                        </div>
                        <div class="col-md-12" style="margin-bottom: 20px">
                            <label for="input-file-now">Gambar (optional) :</label>
                            <input type="file" id="input-file-now" name="foto" class="dropify"
                                   data-allowed-file-extensions="jpg png jpeg"
                                   data-default-file="<?php echo ($row->gambar == '') ? '' : base_url('/assets/img/informasi/').$row->gambar?>">
                        </div>
                        <div class="form-group col-md-12">
                            <label for="input-file-now">Isi informasi :</label>
                            <textarea id="isiInformasi"><?php echo $row->isi_informasi?></textarea>
                            <textarea id="isi" name="isiInformasi"></textarea>
                            <input type="hidden" name="idInformasi" value="<?php echo $row->id_informasi?>">
                        </div>
                        <center>
                            <button type="button" id="btnSimpan" class="btn btn-primary btn-rounded waves waves-effect waves-light">
                                <span class="btn-label"><i class="mdi mdi-send"></i></span>
                                Simpan
                            </button>
                        </center>
                        <?php endforeach; ?>
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


<?php $this->load->view('partials/_javascripts'); ?>

<script>
    $(function () {
        $('.selectpicker').selectpicker('val', $('#akses').val());
        $('#isi').hide();

        <?php if (isset($_SESSION['msg'])) {?>
        swal({
            position: 'center',
            type: 'success',
            title: "<?php echo $_SESSION['msg'];?>",
            showConfirmButton: false,
            timer: 1500
        });
        <?php }?>

        $('#btnSimpan').click(function(){
            var isi = tinyMCE.get('isiInformasi').getContent();
            $('#isi').text(isi);
            $('#form').submit();
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
