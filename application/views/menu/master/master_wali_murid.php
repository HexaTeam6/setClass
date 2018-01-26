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
                    <h3 class="text-themecolor m-b-0 m-t-0">Master Wali Murid</h3>
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
                <div class="card-body">
                    <div class="table-responsive m-t">
<!--                        --><?php //if ($_SESSION['13insert'] == 1){?>
<!--                            <button id="btnAdd" class="btn btn-info waves-effect waves-light" type="button" data-toggle="modal" data-target="#AddModal">-->
<!--                                <span class="btn-label">-->
<!--                                    <i class="fa fa-plus"></i>-->
<!--                                </span>-->
<!--                                Tambah Data-->
<!--                            </button>-->
<!--                        --><?php //}?>
                        <div id="myTable_wrapper" class="dataTables_wrapper no-footer">
                            <table id="datatable" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Nama</th>
                                    <th>Telepon</th>
                                    <th>Keterangan</th>
                                    <th>Hubungan</th>
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
                                        <td class="nama">
                                            <input type="hidden" id="nik" value="<?php echo $row->NIK?>">
                                            <?php echo $row->nama;?><br>
                                        </td>
                                        <td class="telepon">
                                            <?php echo $row->no_telp;?>
                                        </td>
                                        <td class="keterangan">
                                            Wali Murid dari <a href="<?php echo site_url('MasterSiswa/preview/').$row->NIS?>" class="text-warning font-weight-bold" data-toggle="tooltip" title="Profil"><?php echo $row->nama_siswa?></a>
                                        </td>
                                        <td class="hubungan">
                                            <label class="label label-inverse"><?php echo $row->hubungan_dengan_siswa;?></label>
                                        </td>
                                        <td align=center>
                                            <?php if ($row->status == 'Unconfirmed' && $_SESSION['kode_akses'] == 2){?>
                                            <a href='<?php echo site_url('/MasterWaliMurid/confirm/').$row->NIK.'/'.$row->nama?>'>
                                                <button data-toggle="tooltip" title="Konfirmasi"
                                                        class="btn btn-xs btn-rounded btn-primary waves waves-effect waves-light" id="btnConfirm">
                                                    <i class="fa fa-check"></i>
                                                </button>
                                            </a>
                                            <?php }?>

                                            <a href='<?php echo site_url('/MasterWaliMurid/preview/').$row->NIK?>'>
                                                <button data-toggle="tooltip" title="Lihat"
                                                        class="btn btn-xs btn-rounded btn-info waves waves-effect waves-light" id="btnPreview">
                                                    <i class="fa fa-paper-plane"></i>
                                                </button>
                                            </a>

<!--                                            --><?php //if ($_SESSION['17edit'] == 1){?>
<!--                                                <a href='#'>-->
<!--                                                    <span data-placement='top' data-toggle='tooltip' data-original-title='Edit'>-->
<!--                                                        <button class='btn btn-xs btn-rounded btn-warning waves waves-effect waves-light' data-title="Edit" id="btnEdit" data-toggle="modal" data-target="#AddModal">-->
<!--                                                            <span class='fa fa-pencil'></span>-->
<!--                                                        </button>-->
<!--                                                    </span>-->
<!--                                                </a>-->
<!--                                            --><?php //}?>

                                            <?php if ($_SESSION['17delete'] == 1){?>
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


<?php $this->load->view('partials/_javascripts'); ?>
<script>
    $(function () {
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
            var kode = $item.find("input[id$='nik']:hidden:first").val();
            var nama = $.trim($item.find(".nama").text());

            swal({
                    title: "Apakah yakin akan dihapus?",
                    text: "Wali Murid dengan nama " + nama + " akan dihapus dari kelas",
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
                        $.ajax({
                            url: "<?php echo site_url("/MasterWaliMurid/delete/");?>" + kode + "/" + nama,
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
