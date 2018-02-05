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
                    <h3 class="text-themecolor m-b-0 m-t-0">Menu Header</h3>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Pengaturan</li>
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
                                    <label for="wnama" class="control-label">Nama Menu:</label>
                                    <input type="text" class="form-control" id="wnama" name="nama" required>
                                </div>
                                <div class="form-group">
                                    <label for="wicon" class="control-label">Icon:</label>
                                    <select class="selectpicker form-control required"
                                            name="icon" id="wicon">
                                        <option></option>
                                        <optgroup label="Icon List">
                                            <option value="fa fa-book"
                                                    data-content="<i class='fa fa-book'></i>  <span class='label label-light-success'>fa-book<span>"></option>
                                            <option value="fa fa-calendar"
                                                    data-content="<i class='fa fa-calendar'></i>  <span class='label label-light-success'>fa-calendar<span>"></option>
                                            <option value="fa fa-envelope"
                                                    data-content="<i class='fa fa-envelope'></i>  <span class='label label-light-success'>fa-envelope<span>"></option>
                                            <option value="fa fa-folder"
                                                    data-content="<i class='fa fa-folder'></i>  <span class='label label-light-success'>fa-folder<span>"></option>
                                            <option value="fa fa-gear"
                                                    data-content="<i class='fa fa-gear'></i>  <span class='label label-light-success'>fa-gear<span>"></option>
                                            <option value="fa fa-chain"
                                                    data-content="<i class='fa fa-chain'></i>  <span class='label label-light-success'>fa-chain<span>"></option>
                                            <option value="fa fa-wrench"
                                                    data-content="<i class='fa fa-wrench'></i>  <span class='label label-light-success'>fa-wrench<span>"></option>
                                            <option value="fa fa-user"
                                                    data-content="<i class='fa fa-user'></i>  <span class='label label-light-success'>fa-user<span>"></option>
                                            <option value="fa fa-pencil"
                                                    data-content="<i class='fa fa-pencil'></i>  <span class='label label-light-success'>fa-pencil<span>"></option>
                                            <option value="fa fa-bell"
                                                    data-content="<i class='fa fa-bell'></i>  <span class='label label-light-success'>fa-bell<span>"></option>
                                            <option value="fa fa-plus-square"
                                                    data-content="<i class='fa fa-plus-square'></i>  <span class='label label-light-success'>fa-plus-square<span>"></option>
                                            <option value="fa fa-archive"
                                                    data-content="<i class='fa fa-archive'></i>  <span class='label label-light-success'>fa-archive<span>"></option>
                                            <option value="fa fa-money"
                                                    data-content="<i class='fa fa-money'></i>  <span class='label label-light-success'>fa-money<span>"></option>
                                        </optgroup>
                                    </select>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <input type="hidden" id="kode_menu_header" name="kode">
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
                        <?php if ($_SESSION['4insert'] == 1){?>
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
                                    <th>Menu Header</th>
                                    <th>Icon</th>
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
                                        <td class="menu_header">
                                            <?php echo $row->menu_header;?>
                                            <input type="hidden" id="kode_menu_header" value="<?php echo $row->kode_menu_header;?>">
                                        </td>
                                        <td>
                                            <?php echo '<i class="'.$row->icon.'">    <label class="label label-success" id="mIcon">'.$row->icon.'</label></i>'?>
                                        </td>
                                        <td align=center>
                                            <?php if ($_SESSION['4edit'] == 1){?>
                                                <a href='#'>
                                                    <span data-placement='top' data-toggle='tooltip' title data-original-title='Edit'>
                                                        <button class='btn btn-xs btn-rounded btn-warning waves waves-effect waves-light' data-title="Edit" id="btnEdit" data-toggle="modal" data-target="#AddModal">
                                                            <span class='fa fa-pencil'></span>
                                                        </button>
                                                    </span>
                                                </a>
                                            <?php }?>

                                            <?php if ($_SESSION['4delete'] == 1){?>
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
            $('#form').attr('action', "<?php echo site_url('/MenuHeader/insert')?>");
            $("#kode_menu_header").val('');
            $("#wnama").val('');
            $('.selectpicker').selectpicker('val', '');
            $('.modal-title').text('Tambah Data');
        });

        $('#datatable').on('click', '[id^=btnEdit]', function() {
            $('#form').attr('action', "<?php echo site_url('/MenuHeader/update')?>");
            var $item = $(this).closest("tr");
            $("#kode_menu_header").val($item.find("input[id$='kode_menu_header']:hidden:first").val());
            $("#wnama").val($.trim($item.find(".menu_header").text()));
            $('.selectpicker').selectpicker('val', $.trim($item.find("#mIcon").text()));
            $('.modal-title').text('Edit Data');
        });

        $('#datatable').on('click', '[id^=btnDelete]', function() {
            var $item = $(this).closest("tr");
            var kode = $item.find("input[id$='kode_menu_header']:hidden:first").val();
            var nama = $.trim($item.find(".menu_header").text());

            swal({
                    title: "Apakah yakin akan dihapus?",
                    text: "Menu Header dengan nama " + nama,
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
                            url: "<?php echo site_url("/MenuHeader/delete/");?>" + kode,
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
