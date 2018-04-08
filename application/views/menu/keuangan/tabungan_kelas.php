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
                    <h3 class="text-themecolor m-b-0 m-t-0">Tabungan Kelas</h3>
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
                                    <label for="wsiswa">Dari</label>
                                    <select style="width:100%;" class="select2 form-control" id="wsiswa"
                                            name="siswa" required>
                                        <option></option>
                                        <optgroup label="Anggota Kelas">
                                            <?php foreach ($siswa as $row):?>
                                            <option value="<?php echo $row->NIS?>"><?php echo $row->nama?></option>
                                            <?php endforeach;?>
                                        </optgroup>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="wnominal" class="control-label">Nominal</label>
                                    <input type="text" name="nominal" id="wnominal" class="form-control" required>
                                </div>

                            </div>
                            <div class="modal-footer">
                                <input type="hidden" id="kode_tabungan" name="kode_tabungan">
                                <input type="hidden" id="namaSiswa" name="namaSiswa">
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
                         data-title="<?php echo ($_SESSION['kode_akses'] == 4)? 'Total tabungan yang anak anda bayarkan': 'Total tabungan yang anda bayarkan'?>">
                        <div class="card-body">
                            <div class="d-flex flex-row">
                                <div class="round round-lg align-self-center round-info"><i class="ti-wallet"></i></div>
                                <div class="m-l-10 align-self-center">
                                    <h4 class="m-b-0 moneyChart" style="color: white;">
                                        <?php if ($_SESSION['kode_akses'] == 4){
                                            echo ($tabunganAnak != '')? $tabunganAnak : '0';
                                            echo '</h4>
                                                    <h6 class="m-b-0 font-light" style="color:white;">Tabungan anak</h6>';
                                        }else{
                                            echo ($tabunganPribadi != '')? $tabunganPribadi : '0';
                                            echo '</h4>
                                                    <h6 class="m-b-0 font-light" style="color:white;">Tabungan anda</h6>';
                                        } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php }?>

                <div class="col-lg-3 col-md-6">
                    <div class="card card-warning" data-toggle="tooltip"
                         data-title="Total tabungan yang dimiliki kelas">
                        <div class="card-body">
                            <div class="d-flex flex-row">
                                <div class="round round-lg align-self-center round-warning"><i class="mdi mdi-cash-multiple"></i></div>
                                <div class="m-l-10 align-self-center">
                                    <h4 class="m-b-0 moneyChart" style="color: white;"><?php echo ($tabunganKelas != '')? $tabunganKelas : '0'?></h4>
                                    <h6 class="m-b-0 font-light" style="color: white;">Total tabungan</h6></div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="card">
                <div class="card-body">
                    <div class="table-responsive m-t">
                        <?php if ($_SESSION['22insert'] == 1 && ($_SESSION['akses_jabatan'] == 2 || $_SESSION['akses_jabatan'] == 5)){?>
                            <button id="btnAdd" class="btn btn-info waves-effect waves-light" type="button" data-toggle="modal" data-target="#AddModal">
                                <span class="btn-label">
                                    <i class="fa fa-plus"></i>
                                </span>
                                Tambah Data
                            </button>
                        <?php }?>
                        <div style="position:relative; float: right">
                            <a href="<?php echo site_url('/TabunganKelas/excel')?>" id="btnExcel" class="btn btn-info waves-effect waves-light"
                               style="background: #1F6F43; border: 0px"
                               data-toggle="tooltip" data-title="Export Excel">
                                <i class="mdi mdi-file-excel"></i>
                            </a>
                            <a href="<?php echo site_url('/TabunganKelas/pdf')?>" id="btnPdf" class="btn btn-info waves-effect waves-light"
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
                                    <th>Kode Tabungan</th>
                                    <th>Nama</th>
                                    <th>Penerima</th>
                                    <th>Nominal</th>
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
                                        <td class="kode_tabungan">
                                            <label class="label label-inverse"><?php echo $row->kode_tabungan;?></label>
                                        </td>
                                        <td class="nama">
                                            <input type="hidden" id="kodeUser" value="<?php echo $row->kode_user;?>">
                                            <label class="label label-primary"><?php echo $row->nama;?></label>
                                        </td>
                                        <td class="penerima">
                                            <label data-toggle="tooltip" data-title="<?php echo $row->jabatan?>"
                                                   class="label label-info"><?php echo $row->nama_penerima;?></label>
                                        </td>
                                        <td>
                                            Rp <label class="nominal"><?php echo $row->nominal;?></label>
                                        </td>
                                        <td class="keterangan">
                                            <span class="col-md-3">
                                                <label class="label label-light-success">
                                                    <i class="mdi mdi-clock"></i>
                                                    <?php echo 'Diterima '.date('d-m-Y', strtotime($row->created_at)).'<br>'.get_timeago(strtotime($row->created_at));?>
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
                                            <?php if ($_SESSION['22edit'] == 1 && ($_SESSION['akses_jabatan'] == 2 || $_SESSION['akses_jabatan'] == 5)){?>
                                                <a href='#'>
                                                    <span data-placement='top' data-toggle='tooltip' data-original-title='Edit'>
                                                        <button class='btn btn-xs btn-rounded btn-warning waves waves-effect waves-light' data-title="Edit" id="btnEdit" data-toggle="modal" data-target="#AddModal">
                                                            <span class='fa fa-pencil'></span>
                                                        </button>
                                                    </span>
                                                </a>
                                            <?php }?>

                                            <?php if ($_SESSION['22delete'] == 1 && ($_SESSION['akses_jabatan'] == 2 || $_SESSION['akses_jabatan'] == 5)){?>
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
            min: 1000,
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
        $('#wsiswa').change(function () {
            console.log('test');
            $('#namaSiswa').val($('#wsiswa option:selected').text());
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
            $('#form').attr('action', "<?php echo site_url('/TabunganKelas/insert')?>");
            $('#wsiswa').val('').trigger('change.select2');
            $("#namaSiswa").val('');
            $("#kode_tabungan").val('');
            $("#wnominal").val('');
            $('.modal-title').text('Tambah Data');
        });

        $('#datatable').on('click', '[id^=btnEdit]', function() {
            $('#form').attr('action', "<?php echo site_url('/TabunganKelas/update')?>");
            var $item = $(this).closest("tr");
            $('#wsiswa').val($item.find("input[id$='kodeUser']:hidden:first").val()).trigger('change.select2');
            $("#namaSiswa").val($.trim($item.find(".nama").text()));
            $("#kode_tabungan").val($.trim($item.find(".kode_tabungan").text()));
            $("#wnominal").val($.trim($item.find(".nominal").text()));
            $('.modal-title').text('Edit Data');
        });

        $('#datatable').on('click', '[id^=btnDelete]', function() {
            var $item = $(this).closest("tr");
            var kode = $.trim($item.find(".kode_tabungan").text());
            var nama = $.trim($item.find(".nama").text());

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
                            url: "<?php echo site_url("/TabunganKelas/delete/");?>" + kode,
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
