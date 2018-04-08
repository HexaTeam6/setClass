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
                    <h3 class="text-themecolor m-b-0 m-t-0">Master Siswa</h3>
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
                            <h4 class="modal-title">Edit Data</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                        aria-hidden="true">&times;</span></button>
                        </div>

                        <form method="post" id="form" action="<?php echo site_url('/MasterSiswa/update')?>">
                            <div class="modal-body">

                                <div class="form-group">
                                    <label for="waksesjabatan" class="control-label">Dasar Jabatan:</label>
                                    <select class="selectpicker form-control required"
                                            name="aksesJabatan" id="waksesjabatan" required>
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
                                    <label for="wjabatan" class="control-label">Jabatan:</label>
                                    <select class="selectpicker form-control required"
                                            name="jabatan" id="wjabatan" required>
                                        <option></option>
                                        <optgroup label="Jabatan List" id="jabatanList">
                                            <option value="3">Ketua Kelas</option>
                                        </optgroup>
                                    </select>
                                </div>

                            </div>
                            <div class="modal-footer">
                                <input type="hidden" id="kodeJabatan" name="kode_jabatan" required>
                                <input type="hidden" id="nama" name="nama" required>
                                <input type="hidden" id="nis" name="nis" required>
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
<!--                        --><?php //if ($_SESSION['13insert'] == 1){?>
<!--                            <button id="btnAdd" class="btn btn-info waves-effect waves-light" type="button" data-toggle="modal" data-target="#AddModal">-->
<!--                                <span class="btn-label">-->
<!--                                    <i class="fa fa-plus"></i>-->
<!--                                </span>-->
<!--                                Tambah Data-->
<!--                            </button>-->
<!--                        --><?php //}?>
                        <div style="position:relative; float: right">
                            <a href="<?php echo site_url('/MasterSiswa/excel')?>" id="btnExcel" class="btn btn-info waves-effect waves-light"
                               style="background: #1F6F43; border: 0px"
                               data-toggle="tooltip" data-title="Export Excel">
                                <i class="mdi mdi-file-excel"></i>
                            </a>
                            <a href="<?php echo site_url('/MasterSiswa/pdf')?>" id="btnPdf" class="btn btn-info waves-effect waves-light"
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
                                    <th>Nama</th>
                                    <th>Jabatan</th>
                                    <th>Telepon</th>
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
                                        <td class="nama">
                                            <input type="hidden" id="nis" value="<?php echo $row->NIS?>">
                                            <input type="hidden" id="kode_jabatan" value="<?php echo $row->kode_jabatan?>">
                                            <input type="hidden" id="akses_jabatan" value="<?php echo $row->akses_jabatan?>">
                                            <?php echo $row->nama;?><br>
                                        </td>
                                        <td class="jabatan">
                                            <label class="label label-inverse"><?php echo $row->jabatan;?></label>
                                        </td>
                                        <td class="telepon">
                                            <?php echo $row->no_telp;?>
                                        </td>
                                        <td class="keterangan">
                                            Bergabung
                                            <label class="label label-light-warning">
                                                <?php $userCreated = get_timeago(strtotime($row->created_at));
                                                echo $userCreated;?>
                                            </label>
                                        </td>
                                        <td align=center>
                                            <?php if ($row->status == 'Unconfirmed' && $_SESSION['kode_akses'] == 2){?>
                                            <a href='<?php echo site_url('/MasterSiswa/confirm/').$row->NIS.'/'.$row->nama?>'>
                                                <button data-toggle="tooltip" title="Konfirmasi"
                                                        class="btn btn-xs btn-rounded btn-primary waves waves-effect waves-light" id="btnConfirm">
                                                    <i class="fa fa-check"></i>
                                                </button>
                                            </a>
                                            <?php }?>

                                            <a href='<?php echo site_url('/MasterSiswa/preview/').$row->NIS?>'>
                                                <button data-toggle="tooltip" title="Lihat"
                                                        class="btn btn-xs btn-rounded btn-info waves waves-effect waves-light" id="btnPreview">
                                                    <i class="fa fa-paper-plane"></i>
                                                </button>
                                            </a>

                                            <?php if ($_SESSION['17edit'] == 1){?>
                                                <a href='#'>
                                                    <span data-placement='top' data-toggle='tooltip' data-original-title='Edit'>
                                                        <button class='btn btn-xs btn-rounded btn-warning waves waves-effect waves-light' data-title="Edit" id="btnEdit" data-toggle="modal" data-target="#AddModal">
                                                            <span class='fa fa-pencil'></span>
                                                        </button>
                                                    </span>
                                                </a>
                                            <?php }?>

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

        //get jabatan from db and set it to Combobox
        function refreshJabatanComboBox(akses_jabatan, _callback) {
            $.ajax({
                url: "<?php echo site_url('/MasterSiswa/getJabatan/')?>" + akses_jabatan,
                success: function (result) {
                    result = JSON.parse(result)
//                    console.log(result);

                    $('#jabatanList').empty();
                    for (var i = 0; i < result.length; i++){
                        $('#jabatanList').append("<option value='"+ result[i].jabatan +"'>"+ result[i].jabatan +"</option>");
                    }
                    $('#wjabatan').selectpicker('refresh');

                    _callback();
                }
            })
        }

        $('#datatable').on('click', '[id^=btnEdit]', function() {
            var $item = $(this).closest("tr");
            var akses_jabatan = $item.find("input[id$='akses_jabatan']:hidden:first").val();

            refreshJabatanComboBox(akses_jabatan, function () {
                $('#waksesjabatan').selectpicker('val', $item.find("input[id$='akses_jabatan']:hidden:first").val());
                $('#wjabatan').selectpicker('val', $.trim($item.find(".jabatan").text()));
                $('#kodeJabatan').val($item.find("input[id$='kode_jabatan']:hidden:first").val());
                $('#nama').val($.trim($item.find(".nama").text()));
                $('#nis').val($item.find("input[id$='nis']:hidden:first").val());
            });
        });

        $('#waksesjabatan').change(function () {
            var akses_jabatan = $('#waksesjabatan').val();
            refreshJabatanComboBox(akses_jabatan, function () {

            });
        });

        $('#wjabatan').change(function () {
            var akses_jabatan = $('#waksesjabatan').val();
            var jabatan = $('#wjabatan').val();

            $.ajax({
                url: "<?php echo site_url('/MasterSiswa/getKodeJabatan/')?>" + akses_jabatan + "/" + jabatan,
                success: function (result) {
                    result = JSON.parse(result);

                    $('#kodeJabatan').val(result[0].kode_jabatan);
                }
            });
        });

        $('#datatable').on('click', '[id^=btnDelete]', function() {
            var $item = $(this).closest("tr");
            var kode = $item.find("input[id$='nis']:hidden:first").val();
            var nama = $.trim($item.find(".nama").text());

            swal({
                    title: "Apakah yakin akan dihapus?",
                    text: "Siswa dengan nama " + nama + " akan dihapus dari anggota kelas",
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
                            url: "<?php echo site_url("/MasterSiswa/delete/");?>" + kode + "/" + nama,
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
