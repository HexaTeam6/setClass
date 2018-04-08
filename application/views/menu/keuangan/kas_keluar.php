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
                    <h3 class="text-themecolor m-b-0 m-t-0">Kas Keluar</h3>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Keuangan</li>
                    </ol>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->

            <!-- ============================================================== -->
            <!-- Modal -->
            <!-- ============================================================== -->
            <div class="modal fade" id="AddModal" role="dialog">
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
                                    <label for="wnominal" class="control-label">Kas yang dikeluarkan</label>
                                    <input type="text" name="nominal" id="wnominal" class="form-control" required>
                                </div>

                                <div class="form-group">
                                    <label for="wperihal" class="control-label">Perihal</label>
                                    <textarea name="perihal" id="wperihal" class="form-control" rows="5" required></textarea>
                                </div>

                            </div>
                            <div class="modal-footer">
                                <input type="text" id="kode_kas_keluar" name="kode_kas_keluar">
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
            <div class="row">

                <?php if ($_SESSION['kode_akses'] != 2 && $_SESSION['kode_akses'] != 1){?>
                <div class="col-lg-3 col-md-6">
                    <div class="card card-info" data-toggle="tooltip"
                         data-title="<?php echo ($_SESSION['kode_akses'] == 4)? 'Total kas yang anak anda bayarkan': 'Total kas yang anda bayarkan'?>">
                        <div class="card-body">
                            <div class="d-flex flex-row">
                                <div class="round round-lg align-self-center round-info"><i class="ti-wallet"></i></div>
                                <div class="m-l-10 align-self-center">
                                    <h4 class="m-b-0 moneyChart" style="color: white;">
                                        <?php if ($_SESSION['kode_akses'] == 4){
                                            echo ($kasAnak != '')? $kasAnak : '0';
                                            echo '</h4>
                                                    <h6 class="m-b-0 font-light" style="color:white;">Kas anak anda</h6>';
                                        }else{
                                            echo ($kasPribadi != '')? $kasPribadi : '0';
                                            echo '</h4>
                                                    <h6 class="m-b-0 font-light" style="color:white;">Kas anda</h6>';
                                        } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php }?>

                <div class="col-lg-3 col-md-6">
                    <div class="card card-warning" data-toggle="tooltip"
                         data-title="Total kas yang dimiliki kelas">
                        <div class="card-body">
                            <div class="d-flex flex-row">
                                <div class="round round-lg align-self-center round-warning"><i class="mdi mdi-cash-multiple"></i></div>
                                <div class="m-l-10 align-self-center">
                                    <h4 class="m-b-0 moneyChart" style="color: white;"><?php echo ($kasKelas != '')? $kasKelas : '0'?></h4>
                                    <h6 class="m-b-0 font-light" style="color: white;">Total kas kelas</h6></div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="card card-primary" data-toggle="tooltip"
                         data-title="Total pemasukkan kelas dari uang kas">
                        <div class="card-body">
                            <div class="d-flex flex-row">
                                <div class="round round-lg align-self-center round-primary"><i class="mdi mdi-package-down"></i></div>
                                <div class="m-l-10 align-self-center">
                                    <h4 class="m-b-0 moneyChart" style="color: white;"><?php echo ($kasMasuk != '')? $kasMasuk : '0'?></h4>
                                    <h6 class="m-b-0 font-light" style="color: white;">Pemasukan</h6></div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="card card-danger" data-toggle="tooltip"
                         data-title="Total pengeluaran kelas dari uang kas">
                        <div class="card-body">
                            <div class="d-flex flex-row">
                                <div class="round round-lg align-self-center round-danger"><i class="mdi mdi-package-up"></i></div>
                                <div class="m-l-10 align-self-center">
                                    <h4 class="m-b-0 moneyChart" style="color: white;"><?php echo ($kasKeluar != '')? $kasKeluar : '0'?></h4>
                                    <h6 class="m-b-0 font-light" style="color: white;">Pengeluaran</h6></div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>


            <div class="card">
                <div class="card-body">
                    <div class="table-responsive m-t">
                        <?php if ($_SESSION['23insert'] == 1 && ($_SESSION['akses_jabatan'] == 2 || $_SESSION['akses_jabatan'] == 5)){?>
                            <button id="btnAdd" class="btn btn-info waves-effect waves-light" type="button" data-toggle="modal" data-target="#AddModal">
                                <span class="btn-label">
                                    <i class="fa fa-plus"></i>
                                </span>
                                Tambah Data
                            </button>
                        <?php }?>
                        <div style="position:relative; float: right">
                            <a href="<?php echo site_url('/KasKeluar/excel')?>" id="btnExcel" class="btn btn-info waves-effect waves-light"
                               style="background: #1F6F43; border: 0px"
                               data-toggle="tooltip" data-title="Export Excel">
                                <i class="mdi mdi-file-excel"></i>
                            </a>
                            <a href="<?php echo site_url('/KasKeluar/pdf')?>" id="btnPdf" class="btn btn-info waves-effect waves-light"
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
                                    <th>Kode Kas Keluar</th>
                                    <th>Nama</th>
                                    <th width="13%">Nominal</th>
                                    <th>Perihal</th>
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
                                        <td class="kode_kas_keluar">
                                            <label class="label label-inverse"><?php echo $row->kode_kas_keluar;?></label>
                                        </td>
                                        <td class="nama">
                                            <label data-toggle="tooltip" data-title="<?php echo $row->jabatan?>"
                                                   class="label label-info"><?php echo $row->nama;?></label>
                                        </td>
                                        <td>
                                            Rp <label class="nominal"><?php echo $row->nominal;?></label>
                                        </td>
                                        <td class="perihal">
                                            <span class="text-muted" style="font-size: 14px"><?php echo $row->perihal;?></span>
                                        </td>
                                        <td class="keterangan">
                                            <span class="col-md-3">
                                                <label class="label label-light-success">
                                                    <i class="mdi mdi-clock"></i>
                                                    <?php echo 'Pada '.date('d-m-Y', strtotime($row->created_at)).'<br>'.get_timeago(strtotime($row->created_at));?>
                                                </label>
                                            </span>
<!--                                            <span class="col-md-3">-->
<!--                                                <label class="label label-light-warning">-->
<!--                                                    <i class="mdi mdi-clock"></i>-->
<!--                                                    --><?php //echo ' Diperbarui '.get_timeago(strtotime($row->updated_at));?>
<!--                                                </label>-->
<!--                                            </span>-->
                                        </td>
                                        <td align=center>
                                            <?php if ($_SESSION['23edit'] == 1 && ($_SESSION['akses_jabatan'] == 2 || $_SESSION['akses_jabatan'] == 5)){?>
                                                <a href='#'>
                                                    <span data-placement='top' data-toggle='tooltip' data-original-title='Edit'>
                                                        <button class='btn btn-xs btn-rounded btn-warning waves waves-effect waves-light' data-title="Edit" id="btnEdit" data-toggle="modal" data-target="#AddModal">
                                                            <span class='fa fa-pencil'></span>
                                                        </button>
                                                    </span>
                                                </a>
                                            <?php }?>

                                            <?php if ($_SESSION['23delete'] == 1 && ($_SESSION['akses_jabatan'] == 2 || $_SESSION['akses_jabatan'] == 5)){?>
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
        $("#wnominal").inputmask('decimal', {
            digits: 2,
            placeholder: "0",
            digitsOptional: false,
            radixPoint: ".",
            groupSeparator: ",",
            max: "<?php echo $kasKelas?>",
            autoGroup: true
        });
        $(".nominal").inputmask('decimal', {
            digits: 2,
            digitsOptional: false,
            radixPoint: ".",
            groupSeparator: ",",
            autoGroup: true
        });
        $(".moneyChart").inputmask('decimal', {
            digits: 2,
            digitsOptional: false,
            radixPoint: ".",
            groupSeparator: ",",
            autoGroup: true,
            prefix: "Rp "
        });

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
            $('#form').attr('action', "<?php echo site_url('/KasKeluar/insert')?>");
            $("#kode_kas_keluar").val('');
            $("#wnominal").val('');
            $("#wperihal").val('');
            $('.modal-title').text('Tambah Data');
        });

        $('#datatable').on('click', '[id^=btnEdit]', function() {
            $('#form').attr('action', "<?php echo site_url('/KasKeluar/update')?>");
            var $item = $(this).closest("tr");
            $("#kode_kas_keluar").val($.trim($item.find(".kode_kas_keluar").text()));
            $("#wnominal").val($.trim($item.find(".nominal").text()));
            $("#wperihal").val($.trim($item.find(".perihal").text()));
            $('.modal-title').text('Edit Data');
        });

        $('#datatable').on('click', '[id^=btnDelete]', function() {
            var $item = $(this).closest("tr");
            var kode = $.trim($item.find(".kode_kas_keluar").text());

            swal({
                    title: "Apakah yakin akan dihapus?",
                    text: "Hapus transaksi " + kode,
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
                            url: "<?php echo site_url("/KasKeluar/delete/");?>" + kode,
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
