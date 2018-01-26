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
                    <h3 class="text-themecolor m-b-0 m-t-0">Data Informasi</h3>
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
                    <div class="table-responsive m-t">
                        <?php if ($_SESSION['18insert'] == 1 && ($_SESSION['akses_jabatan'] == 3 || $_SESSION['akses_jabatan'] == 2 || $_SESSION['akses_jabatan'] == 1)){?>
                            <a href="<?php echo site_url('/DataInformasi/add')?>" id="btnAdd" class="btn btn-info waves-effect waves-light">
                                <span class="btn-label">
                                    <i class="fa fa-plus"></i>
                                </span>
                                Tambah Data
                            </a>
                        <?php }?>
                        <div id="myTable_wrapper" class="dataTables_wrapper no-footer">
                            <table id="datatable" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Dibuat</th>
                                    <th>Untuk</th>
                                    <th width="45%">Riwayat</th>
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
                                        <td class="dibuat">
                                            <label class="label label-primary">
                                                <?php echo $row->nama;?>
                                            </label>
                                        </td>
                                        <td class="untuk">
                                            <label class="label label-inverse">
                                                <?php switch ($row->akses_jabatan){
                                                    case 3: echo 'Ketua Kelas';
                                                    break;
                                                    case 4: echo 'Sekertaris';
                                                    break;
                                                    case 5: echo 'Bendahara';
                                                    break;
                                                    case 0: echo 'Semua anggota';
                                                    break;
                                                    default: echo 'tidak ditentukan';
                                                }?>
                                            </label>
                                        </td>
                                        <td class="riwayat">
<!--                                            --><?php //echo $row->isi_informasi;?>
                                            <input type="hidden" id="id_informasi" value="<?php echo $row->id_informasi;?>">
                                            <span class="col-md-3">
                                                <label class="label label-light-success">
                                                    <i class="mdi mdi-clock"></i>
                                                    <?php echo 'Dibuat '.get_timeago(strtotime($row->created_at));?>
                                                </label>
                                            </span>
                                            <span class="col-md-3">
                                                <label class="label label-light-warning">
                                                    <i class="mdi mdi-clock"></i>
                                                    <?php echo ' Diperbarui '.get_timeago(strtotime($row->updated_at));?>
                                                </label>
                                            </span>
                                        </td>
                                        <td align=center>
                                            <a href="<?php echo site_url('/LihatInformasi/info/').$row->id_informasi;?>">
                                                <span data-placement='top' data-toggle='tooltip' title data-original-title='Lihat'>
                                                    <button class='btn btn-xs btn-rounded btn-info waves waves-effect waves-light' data-title="Edit" id="btnEdit" data-toggle="modal" data-target="#AddModal">
                                                        <span class='fa fa-paper-plane'></span>
                                                    </button>
                                                </span>
                                            </a>

                                            <?php if ($_SESSION['18edit'] == 1 && ($_SESSION['akses_jabatan'] == 3 || $_SESSION['akses_jabatan'] == 2 || $_SESSION['akses_jabatan'] == 1)){?>
                                                <a href="<?php echo site_url('/DataInformasi/edit/').$row->id_informasi?>">
                                                    <span data-placement='top' data-toggle='tooltip' title data-original-title='Edit'>
                                                        <button class='btn btn-xs btn-rounded btn-warning waves waves-effect waves-light' data-title="Edit" id="btnEdit" data-toggle="modal" data-target="#AddModal">
                                                            <span class='fa fa-pencil'></span>
                                                        </button>
                                                    </span>
                                                </a>
                                            <?php }?>

                                            <?php if ($_SESSION['18delete'] == 1 && ($_SESSION['akses_jabatan'] == 3 || $_SESSION['akses_jabatan'] == 2 || $_SESSION['akses_jabatan'] == 1)){?>
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
            var kode = $item.find("input[id$='id_informasi']:hidden:first").val();
            var nama = $.trim($item.find(".dibuat").text());

            swal({
                    title: "Apakah yakin akan dihapus?",
                    text: "Hapus informasi yang dibuat " + nama,
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
                            url: "<?php echo site_url("/DataInformasi/delete/");?>" + kode + "/" + nama,
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
