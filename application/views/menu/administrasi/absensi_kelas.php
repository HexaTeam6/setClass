<!DOCTYPE html>
<html lang="en">
<head>
    <title>setClass</title>
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
                    <h3 class="text-themecolor m-b-0 m-t-0">Absensi Kelas</h3>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Administrasi</li>
                    </ol>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->


            <!-- ============================================================== -->
            <!-- Start Page Content -->
            <!-- ============================================================== -->
            <?php if ($_SESSION['kode_akses'] != 2 && $_SESSION['kode_akses'] != 1){?>
            <div class="row">

<!--                <div class="col-lg-3 col-md-6">-->
<!--                    <div class="card card-info">-->
<!--                        <div class="card-body">-->
<!--                            <div class="d-flex flex-row">-->
<!--                                <div class="round round-lg align-self-center round-info"><i class="ti-wallet"></i></div>-->
<!--                                <div class="m-l-10 align-self-center">-->
<!--                                    <h4 class="m-b-0 moneyChart" style="color: white;">-->
<!--                                        --><?php //if ($_SESSION['kode_akses'] == 4){
//                                            echo ($kasAnak != '')? $kasAnak : '0';
//                                            echo '</h4>
//                                                    <h6 class="m-b-0 font-light" style="color:white;">Kas anak anda</h6>';
//                                        }else{
//                                            echo ($kasPribadi != '')? $kasPribadi : '0';
//                                            echo '</h4>
//                                                    <h6 class="m-b-0 font-light" style="color:white;">Kas anda</h6>';
//                                        } ?>
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
                <div class="col-lg-3 col-md-6">
                    <div class="card card-warning" data-toggle="tooltip"
                         data-title="<?php echo ($_SESSION['kode_akses'] == 4)? 'Akumulasi anak anda sakit': 'Akumulasi anda sakit'?>">
                        <div class="card-body">
                            <div class="d-flex flex-row">
                                <div class="round round-lg align-self-center round-warning"><i class="fa fa-stethoscope"></i></div>
                                <div class="m-l-10 align-self-center">
                                    <h4 class="m-b-0 moneyChart" style="color: white;">
                                        <?php if ($_SESSION['kode_akses'] == 4){
                                            echo ($sakitAnak != '')? $sakitAnak.' hari' : '0 hari';
                                        }else{
                                            echo ($sakit != '')? $sakit.' hari' : '0 hari';
                                        } ?>
                                    </h4>
                                    <h6 class="m-b-0 font-light" style="color: white;">Sakit</h6></div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="card card-primary" data-toggle="tooltip"
                         data-title="<?php echo ($_SESSION['kode_akses'] == 4)? 'Akumulasi anak anda izin': 'Akumulasi anda izin'?>">
                        <div class="card-body">
                            <div class="d-flex flex-row">
                                <div class="round round-lg align-self-center round-primary"><i class="fa fa-info-circle"></i></div>
                                <div class="m-l-10 align-self-center">
                                    <h4 class="m-b-0 moneyChart" style="color: white;">
                                        <?php if ($_SESSION['kode_akses'] == 4){
                                            echo ($izinAnak != '')? $izinAnak.' hari' : '0 hari';
                                        }else{
                                            echo ($izin != '')? $izin.' hari' : '0 hari';
                                        } ?>
                                    </h4>
                                    <h6 class="m-b-0 font-light" style="color: white;">Izin</h6></div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="card card-danger" data-toggle="tooltip"
                         data-title="<?php echo ($_SESSION['kode_akses'] == 4)? 'Akumulasi anak anda tidak masuk': 'Akumulasi anda tidak masuk'?>">
                        <div class="card-body" >
                            <div class="d-flex flex-row">
                                <div class="round round-lg align-self-center round-danger"><i class="mdi mdi-package-up"></i></div>
                                <div class="m-l-10 align-self-center">
                                    <h4 class="m-b-0 moneyChart" style="color: white;">
                                        <?php if ($_SESSION['kode_akses'] == 4){
                                            echo ($tidakMasukAnak != '')? $tidakMasukAnak.' hari': '0 hari';
                                        }else{
                                            echo ($tidakMasuk != '')? $tidakMasuk.' hari' : '0 hari';
                                        } ?>
                                    </h4>
                                    <h6 class="m-b-0 font-light" style="color: white;">Tidak Masuk</h6></div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <?php }?>

            <div class="card">
                <div class="card-body">
                    <div class="table-responsive m-t">
                        <?php if ($_SESSION['26insert'] == 1 && ($_SESSION['akses_jabatan'] == 2 || $_SESSION['akses_jabatan'] == 3 || $_SESSION['akses_jabatan'] == 4) && $check == ''){?>
                            <a href="<?php echo site_url('AbsensiKelas/getAbsen')?>" >
                                <button id="btnAdd" class="btn btn-info waves waves-effect waves-light" type="button">
                                    <span class="btn-label">
                                        <i class="fa fa-plus"></i>
                                    </span>
                                    Tambah Data
                                </button>
                            </a>
                            <a href="<?php echo site_url('QRCodeGenerate')?>">
                                <button id="btnQr" class="btn btn-inverse waves waves-effect waves-light" type="button">
                                    <span class="btn-label">
                                        <i class="fa fa-qrcode"></i>
                                    </span>
                                    QR Code
                                </button>
                            </a>
                        <?php }?>
                        <div style="position:relative; float: right">
                            <a href="<?php echo site_url('/AbsensiKelas/excel')?>" id="btnExcel" class="btn btn-info waves-effect waves-light"
                               style="background: #1F6F43; border: 0px"
                               data-toggle="tooltip" data-title="Export Excel">
                                <i class="mdi mdi-file-excel"></i>
                            </a>
                            <a href="<?php echo site_url('/AbsensiKelas/pdf')?>" id="btnPdf" class="btn btn-info waves-effect waves-light"
                               style="background: rgba(238,13,11,0.75); border: 0px"
                               data-toggle="tooltip" data-title="Export PDF">
                                <i class="mdi mdi-file-pdf"></i>
                            </a>
                        </div>
                        <div id="myTable_wrapper" class="dataTables_wrapper no-footer">
                            <table id="datatable" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Kode Absensi</th>
                                    <th>Tanggal</th>
                                    <th>Keterangan</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $no = 1;
                                foreach ($data as $row):
                                    ?>
                                    <tr>

                                        <td class="no"><?php echo $no;?></td>
                                        <td class="kode_absensi">
                                            <label class="label label-inverse"><?php echo $row->kode_absensi;?></label>
                                        </td>
                                        <td class="tanggal">
                                            <label class="label label-primary"><?php echo $row->tanggal;?></label>
                                        </td>
                                        <td class="keterangan">
                                            <span class="col-md-1">
                                                <label class="label label-light-success">
                                                    <?php echo 'Masuk ('.$row->masuk.')';?>
                                                </label>
                                            </span>
                                            <span class="col-md-1">
                                                <label class="label label-light-warning">
                                                    <?php echo 'Sakit ('.$row->sakit.')';?>
                                                </label>
                                            </span>
                                            <span class="col-md-1">
                                                <label class="label label-light-primary">
                                                    <?php echo 'Izin ('.$row->izin.')';?>
                                                </label>
                                            </span>
                                            <span class="col-md-1">
                                                <label class="label label-light-danger">
                                                    <?php echo 'Tidak Masuk ('.$row->tidakMasuk.')';?>
                                                </label>
                                            </span>
                                        </td>
                                        <td align=center>
                                            <?php if ($_SESSION['26edit'] == 1 && ($_SESSION['akses_jabatan'] == 2 || $_SESSION['akses_jabatan'] == 3 || $_SESSION['akses_jabatan'] == 4)){?>
                                                <a href="<?php echo site_url('AbsensiKelas/edit/').str_replace('/', '-', $row->kode_absensi)?>">
                                                    <span data-placement='top' data-toggle='tooltip' data-original-title='Edit'>
                                                        <button class='btn btn-xs btn-rounded btn-warning waves waves-effect waves-light' data-title="Edit" id="btnEdit" data-toggle="modal" data-target="#AddModal">
                                                            <span class='fa fa-pencil'></span>
                                                        </button>
                                                    </span>
                                                </a>
                                            <?php }?>

                                            <?php if ($_SESSION['26delete'] == 1 && ($_SESSION['akses_jabatan'] == 2 || $_SESSION['akses_jabatan'] == 3 || $_SESSION['akses_jabatan'] == 4)){?>
                                                <a href='#'>
                                                    <span data-placement='top' data-toggle='tooltip' title='Delete'>
                                                        <button class='btn btn-xs btn-rounded btn-danger waves waves-effect waves-light' id="btnDelete">
                                                            <i class='fa fa-remove'></i>
                                                        </button>
                                                    </span>
                                                </a>
                                            <?php }?>
                                        </td>
                                    </tr>
                                    <?php
                                    $no+=1;
                                endforeach
                                ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
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

<!--Select2 JS-->
<?php $this->load->view('partials/_javascripts'); ?>
<script>
    $(function () {
        $('.select2').select2();

        $('#datatable').DataTable({
            "paging": true,
            "lengthChange": true,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "lengthMenu": [[5, 10, 25, 50, -1], [5, 10, 25, 50, "All"]]
        });

        <?php if (isset($_SESSION['msg'])) {?>
        swal({
            position: 'center',
            type: 'success',
            title: "<?php echo $_SESSION['msg'];?>",
            showConfirmButton: false,
            timer: 1500
        });
        <?php }?>


        $('#datatable').on('click', '[id^=btnDelete]', function() {
            var $item = $(this).closest("tr");
            var kode = $.trim($item.find(".kode_absensi").text());

            swal({
                    title: "Apakah yakin akan dihapus?",
                    text: "Hapus absensi " + kode,
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#26C6DA",
                    confirmButtonText: "Ya, hapus!",
                    cancelButtonText: "Tidak, batalkan!",
                    closeOnConfirm: false,
                    closeOnCancel: false
                },
                function(isConfirm){
                    if (isConfirm) {
                        kode = kode.replace(/\//g, '-');
//                        alert(kode);
                        $.ajax({
                            url: "<?php echo site_url("/AbsensiKelas/delete/");?>" + kode,
                            success: function (result) {
                                window.location.href = result;
                            }
                        });
                    } else {
                        swal("Dibatalkan", "Data tidak jadi dihapus", "error");
                    }
                });
        });

    });
</script>
</body>
</html>
