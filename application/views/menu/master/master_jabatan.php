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
                    <h3 class="text-themecolor m-b-0 m-t-0">Master Jabatan</h3>
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
            <!-- Modal -->
            <!-- ============================================================== -->
            <div class="modal fade" id="AddModal" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Tambah Data</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                        aria-hidden="true">&times;</span></button>
                        </div>

                        <form method="post" id="form">
                            <div class="modal-body">

                                <div class="form-group">
                                    <label for="wjabatan" class="control-label">Dasar Jabatan:</label>
                                    <select class="selectpicker form-control required"
                                            name="aksesJabatan" id="wjabatan" required>
                                        <option></option>
                                        <optgroup label="Jabatan List">
                                                <option value="3">Ketua Kelas</option>
                                                <option value="4">Sekertaris</option>
                                                <option value="5">Bendahara</option>
                                                <option value="6">Anggota</option>
                                        </optgroup>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="wnamaJabatan" class="control-label">Jabatan:</label>
                                    <input type="text" class="form-control" id="wnamaJabatan" name="jabatan" required>
                                </div>

                                <div class="form-group">
                                    <label for="wketerangan" class="control-label">Keterangan:</label>
                                    <textarea class="form-control" name="keterangan" id="wketerangan" rows="3"></textarea>
                                </div>

                            </div>
                            <div class="modal-footer">
                                <input type="hidden" id="kode_jabatan" name="kode_jabatan">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Modal -->
            <!-- ============================================================== -->


            <!-- ============================================================== -->
            <!-- Start Page Content -->
            <!-- ============================================================== -->
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive m-t">
                        <?php if ($_SESSION['13insert'] == 1){?>
                            <button id="btnAdd" class="btn btn-info waves-effect waves-light" type="button" data-toggle="modal" data-target="#AddModal">
                                <span class="btn-label">
                                    <i class="fa fa-plus"></i>
                                </span>
                                Tambah Data
                            </button>
                        <?php }?>
                        <div id="myTable_wrapper" class="dataTables_wrapper no-footer">
                            <table id="datatable" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Kode Kelas</th>
                                    <th>Jabatan</th>
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
                                        <td class="kode_kelas">
                                            <label class="label label-light-warning"><?php echo $row->kode_kelas;?></label>
                                        </td>
                                        <td class="jabatan">
                                            <?php echo $row->jabatan;?>
                                            <input type="hidden" id="kode_jabatan" value="<?php echo $row->kode_jabatan;?>">
                                            <input type="hidden" id="akses_jabatan" value="<?php echo $row->akses_jabatan;?>">
                                        </td>
                                        <td>
                                            <?php echo '<label class="label label-light-danger" id="keterangan">'.$row->keterangan.'</label></i>'?>
                                        </td>
                                        <td align=center>
                                            <?php if ($_SESSION['13edit'] == 1 && $row->akses_jabatan != 6 && $row->akses_jabatan != 6){?>
                                                <a href='#'>
                                                    <span data-placement='top' data-toggle='tooltip' data-original-title='Edit'>
                                                        <button class='btn btn-xs btn-rounded btn-warning waves waves-effect waves-light' data-title="Edit" id="btnEdit" data-toggle="modal" data-target="#AddModal">
                                                            <span class='fa fa-pencil'></span>
                                                        </button>
                                                    </span>
                                                </a>
                                            <?php }?>

                                            <?php if ($_SESSION['13delete'] == 1 && $row->akses_jabatan != 6 && $row->akses_jabatan != 7){?>
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

        $('#btnAdd').click(function () {
            $('#form').attr('action', "<?php echo site_url('/MasterJabatan/insert')?>");
            $('.selectpicker').selectpicker('val', '');
            $("#wnamaJabatan").val('');
            $("#wketerangan").val('');
        });

        $('#datatable').on('click', '[id^=btnEdit]', function() {
            $('#form').attr('action', "<?php echo site_url('/MasterJabatan/update')?>");
            var $item = $(this).closest("tr");
            $('.selectpicker').selectpicker('val', $item.find("input[id$='akses_jabatan']:hidden:first").val());
            $('#kode_jabatan').val($item.find("input[id$='kode_jabatan']:hidden:first").val());
            $("#wnamaJabatan").val($.trim($item.find(".jabatan").text()));
            $("#wketerangan").val($.trim($item.find("#keterangan").text()));
        });

        $('#datatable').on('click', '[id^=btnDelete]', function() {
            var $item = $(this).closest("tr");
            var kode = $item.find("input[id$='kode_jabatan']:hidden:first").val();
            var nama = $.trim($item.find(".jabatan").text());

            swal({
                    title: "Apakah yakin akan dihapus?",
                    text: "Data dengan jabatan " + nama,
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
                            url: "<?php echo site_url("/MasterJabatan/delete/");?>" + kode + "/" + nama,
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
