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
                    <h3 class="text-themecolor m-b-0 m-t-0">Jadwal Matapelajaran</h3>
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
                                    <label for="wguru" class="control-label">Guru: </label>
                                    <select class="selectpicker form-control required"
                                            name="NIP" id="wguru" required>
                                        <option></option>
                                        <optgroup label="Guru List">
                                            <?php foreach ($guru as $row):?>
                                            <option value="<?php echo $row->NIP?>"><?php echo $row->nama_guru?></option>
                                            <?php endforeach;?>
                                        </optgroup>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="wmapel" class="control-label">Matapelajaran: </label>
                                    <select class="selectpicker form-control required"
                                            name="kode_matapelajaran" id="wmapel" required>
                                        <option></option>
                                        <optgroup label="Matapelajaran List">
                                            <?php foreach ($mapel as $row):?>
                                                <option value="<?php echo $row->kode_matapelajaran?>"><?php echo $row->nama_matapelajaran?></option>
                                            <?php endforeach;?>
                                        </optgroup>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="wruang" class="control-label">Ruang: </label>
                                    <select class="selectpicker form-control required"
                                            name="kode_ruang" id="wruang" required>
                                        <option></option>
                                        <optgroup label="Ruang List">
                                            <?php foreach ($ruang as $row):?>
                                                <option value="<?php echo $row->kode_ruang?>"><?php echo $row->nama_ruang?></option>
                                            <?php endforeach;?>
                                        </optgroup>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="whari" class="control-label">Hari: </label>
                                    <select class="selectpicker form-control required"
                                            name="hari" id="whari" required>
                                        <option></option>
                                        <optgroup label="Hari List">
                                                <option value="1">Senin</option>
                                                <option value="2">Selasa</option>
                                                <option value="3">Rabu</option>
                                                <option value="4">Kamis</option>
                                                <option value="5">Jum'at</option>
                                                <option value="6">Sabtu</option>
                                        </optgroup>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="wjam" class="control-label">Jam: </label>
                                    <br>
                                    <input class="form-control col-md-5 timepicker" id="wjamMulai" name="jam_mulai" placeholder="Jam Mulai">
                                    <input class="form-control col-md-5 timepicker" id="wjamSelesai" name="jam_selesai" placeholder="Jam Selesai">
                                </div>

                            </div>
                            <div class="modal-footer">
                                <input type="hidden" id="kode_jadwal" name="kode_jadwal">
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
                        <?php if ($_SESSION['27insert'] == 1){?>
                            <button id="btnAdd" class="btn btn-info waves-effect waves-light" type="button" data-toggle="modal" data-target="#AddModal">
                                <span class="btn-label">
                                    <i class="fa fa-plus"></i>
                                </span>
                                Tambah Data
                            </button>
                        <?php }?>
                        <div style="position:relative; float: right">
                            <a href="<?php echo site_url('/JadwalMapel/excel')?>" id="btnExcel" class="btn btn-info waves-effect waves-light"
                               style="background: #1F6F43; border: 0px"
                               data-toggle="tooltip" data-title="Export Excel">
                                <i class="mdi mdi-file-excel"></i>
                            </a>
                            <a href="<?php echo site_url('/JadwalMapel/pdf')?>" id="btnPdf" class="btn btn-info waves-effect waves-light"
                               style="background: rgba(238,13,11,0.75); border: 0px"
                               data-toggle="tooltip" data-title="Export PDF">
                                <i class="mdi mdi-file-pdf"></i>
                            </a>
                        </div>
                        <div id="myTable_wrapper" class="dataTables_wrapper no-footer">
                            <table id="datatable" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>Guru</th>
                                    <th>Matapelajaran</th>
                                    <th>Ruang</th>
                                    <th>Hari</th>
                                    <th>Jam</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                foreach ($data as $row):
                                    ?>
                                    <tr>
                                        <td class="guru">
                                            <?php echo $row->nama_guru;?>
                                            <input type="hidden" id="NIP" value="<?php echo $row->NIP?>">
                                            <input type="hidden" id="kode_jadwal" value="<?php echo $row->kode_jadwal?>">
                                        </td>
                                        <td class="matapelajaran">
                                            <label class="label label-inverse"><?php echo $row->nama_matapelajaran;?></label>
                                            <input type="hidden" id="kode_matapelajaran" value="<?php echo $row->kode_matapelajaran?>">
                                        </td>
                                        <td class="ruang">
                                            <?php echo $row->nama_ruang;?>
                                            <input type="hidden" id="kode_ruang" value="<?php echo $row->kode_ruang?>">
                                        </td>
                                        <td class="hari">
                                            <label class="label label-primary">
                                            <?php switch ($row->hari){
                                                case 1 : echo 'Senin';
                                                    break;
                                                case 2 : echo 'Selasa';
                                                    break;
                                                case 3 : echo 'Rabu';
                                                    break;
                                                case 4 : echo 'Kamis';
                                                    break;
                                                case 5 : echo "Jum'at";
                                                    break;
                                                case 6 : echo 'Sabtu';
                                                    break;
                                                default : echo 'Tidak terdefinisi';
                                            }?>
                                            </label>
                                            <input type="hidden" id="hari" value="<?php echo $row->hari?>">
                                        </td>
                                        <td class="jam">
                                            <?php $jamMulai = explode(':',$row->jam_mulai);
                                                  $jamSelesai = explode(':',$row->jam_selesai);
                                            echo $jamMulai[0].':'.$jamMulai[1].' - '.$jamSelesai[0].':'.$jamSelesai[1]?>
                                            <input type="hidden" id="jamMulai" value="<?php echo $jamMulai[0].':'.$jamMulai[1]?>">
                                            <input type="hidden" id="jamSelesai" value="<?php echo $jamSelesai[0].':'.$jamSelesai[1]?>">
                                        </td>
                                        <td align=center>
                                            <?php if ($_SESSION['27edit'] == 1){?>
                                                <a href='#'>
                                                    <span data-placement='top' data-toggle='tooltip' data-original-title='Edit'>
                                                        <button class='btn btn-xs btn-rounded btn-warning waves waves-effect waves-light' data-title="Edit" id="btnEdit" data-toggle="modal" data-target="#AddModal">
                                                            <span class='fa fa-pencil'></span>
                                                        </button>
                                                    </span>
                                                </a>
                                            <?php }?>

                                            <?php if ($_SESSION['27delete'] == 1){?>
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
        $('.timepicker').bootstrapMaterialDatePicker({ format : 'HH:mm', time: true, date: false });

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
            $('#form').attr('action', "<?php echo site_url('/JadwalMapel/insert')?>");
            $('.selectpicker').selectpicker('val', '');
            $("#wjamMulai").val('');
            $("#wjamSelesai").val('');
            $('.modal-title').text('Tambah Data');
        });

        $('#datatable').on('click', '[id^=btnEdit]', function() {
            $('#form').attr('action', "<?php echo site_url('/JadwalMapel/update')?>");
            var $item = $(this).closest("tr");
            $('#wguru').selectpicker('val', $item.find("input[id$='NIP']:hidden:first").val());
            $('#wmapel').selectpicker('val', $item.find("input[id$='kode_matapelajaran']:hidden:first").val());
            $('#wruang').selectpicker('val', $item.find("input[id$='kode_ruang']:hidden:first").val());
            $('#whari').selectpicker('val', $item.find("input[id$='hari']:hidden:first").val());
            $("#wjamMulai").val($item.find("input[id$='jamMulai']:hidden:first").val());
            $("#wjamSelesai").val($item.find("input[id$='jamSelesai']:hidden:first").val());
            $("#kode_jadwal").val($item.find("input[id$='kode_jadwal']:hidden:first").val());
            $('.modal-title').text('Edit Data');
        });

        $('#datatable').on('click', '[id^=btnDelete]', function() {
            var $item = $(this).closest("tr");
            var kode = $item.find("input[id$='kode_jadwal']:hidden:first").val();
            var nama = $.trim($item.find(".guru").text());

            swal({
                    title: "Apakah yakin akan dihapus?",
                    text: "Hapus jadwal " + nama,
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
                            url: "<?php echo site_url("/JadwalMapel/delete/");?>" + kode + "/" + nama,
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
