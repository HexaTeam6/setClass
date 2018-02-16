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
            <div class="card">
                <div class="card-body">
                    <center>
                        <h2><b>Absensi Kelas</b></h2>
                        "Mendata anggota kelas anda setiap harinya"
                    </center>
                    <form action="<?php echo site_url('AbsensiKelas/insert')?>" method="post">
                        <div class="table-responsive m-t">
                            <input type="hidden" name="kode_absensi" value="<?php echo $kode_absensi; ?>">
                            <div id="myTable_wrapper" class="dataTables_wrapper no-footer">
                                <table id="datatable" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th align="center" width="5%">No</th>
                                        <th width="20%">NIS</th>
                                        <th style="text-align: center" >Nama Siswa</th>
                                        <th width="20%">Status</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php $no = 1;
                                    foreach ($siswa as $row):?>
                                        <tr>
                                            <td><?php echo $no; ?></td>
                                            <td><label class="label label-warning"><?php echo $row->NIS; ?></label></td>
                                            <td><a href="<?php echo site_url('MasterSiswa/preview/').$row->NIS?>" data-toggle="tooltip" data-title="Lihat">
                                                    <label style="cursor: pointer; color: #67757c;"><?php echo $row->nama; ?></label>
                                                </a>
                                                <input type="hidden" name="siswa-<?php echo $row->NIS?>" value="<?php echo $row->NIS;?>">
                                            </td>
                                            <td align="center">
                                                    <select class="selectpicker form-control required" id="wstatus"
                                                            name="status-<?php echo $row->NIS?>" required>
                                                        <option></option>
                                                        <optgroup label="Status">
                                                            <option value="Masuk">Masuk</option>
                                                            <option value="Tidak Masuk">Tidak Masuk</option>
                                                            <option value="Sakit">Sakit</option>
                                                            <option value="Izin">Izin</option>
                                                        </optgroup>
                                                    </select>
                                            </td>
                                        </tr>
                                        <?php $no++;
                                    endforeach ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <center>
                            <button id="btnAdd" class="btn btn-success waves waves-effect waves-light" type="submit">
                                <span class="btn-label">
                                    <i class="fa fa-check-square-o"></i>
                                </span>
                                    Simpan
                            </button>
                        </center>
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

<!--Jasny Bootsrap JS-->
<?php $this->load->view('partials/_javascripts'); ?>
<script>
    $(function () {
        $('#datatable').DataTable({
            "paging": false,
            "lengthChange": false,
            "searching": true,
            "ordering": false,
            "info": false,
            "autoWidth": false,
            "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
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

    });
</script>
</body>
</html>
