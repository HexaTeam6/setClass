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
                    <h3 class="text-themecolor m-b-0 m-t-0">Menu Child</h3>
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
            <!-- Start Page Content -->
            <!-- ============================================================== -->
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive m-t">
                        <form action="<?php echo site_url('MenuLevel/update')?>" method="post">
                            <button id="btnBack" class="btn btn-default waves-effect waves-light" type="button">
                            <span class="btn-label">
                                <i class="fa fa-arrow-circle-left"></i>
                            </span>
                                Kembali
                            </button>

                            <button class="btn btn-info waves-effect waves-light" type="submit">
                            <span class="btn-label">
                                <i class="fa fa-save"></i>
                            </span>
                                Simpan
                            </button>

                            <input type="hidden" name="kode_akses" value="<?php echo $kode_akses?>">
                            <div id="myTable_wrapper" class="dataTables_wrapper no-footer">
                                <table id="datatable" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>Menu Name</th>
                                        <th>View</th>
                                        <th>Insert</th>
                                        <th>Update</th>
                                        <th>Delete</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php $no = 1;
                                    foreach ($data as $row):?>
                                        <tr>
                                            <td><?php echo $row->menu_name; ?></td>
                                            <td align="center">
                                                <input id="vCheck<?php echo $no; ?>"
                                                       class="filled-in chk-col-light-blue" type="checkbox" value="1"
                                                       name="view_<?php echo $row->kode_menu_child; ?>" <?php echo ($row->akses_view == "1") ? "checked" : ""; ?>>
                                                <label style="margin-bottom: -10px;"
                                                       for="vCheck<?php echo $no; ?>"></label>
                                            </td>
                                            <td align="center">
                                                <input id="iCheck<?php echo $no; ?>"
                                                       class="filled-in chk-col-light-blue" type="checkbox" value="1"
                                                       name="insert_<?php echo $row->kode_menu_child; ?>" <?php echo ($row->akses_insert == "1") ? "checked" : ""; ?>>
                                                <label style="margin-bottom: -10px;"
                                                       for="iCheck<?php echo $no; ?>"></label>
                                            </td>
                                            <td align="center">
                                                <input id="uCheck<?php echo $no; ?>"
                                                       class="filled-in chk-col-light-blue" type="checkbox" value="1"
                                                       name="edit_<?php echo $row->kode_menu_child; ?>" <?php echo ($row->akses_edit == "1") ? "checked" : ""; ?>>
                                                <label style="margin-bottom: -10px;"
                                                       for="uCheck<?php echo $no; ?>"></label>
                                            </td>
                                            <td align="center">
                                                <input id="dCheck<?php echo $no; ?>"
                                                       class="filled-in chk-col-light-blue" type="checkbox" value="1"
                                                       name="delete_<?php echo $row->kode_menu_child; ?>" <?php echo ($row->akses_delete == "1") ? "checked" : ""; ?>>
                                                <label style="margin-bottom: -10px;"
                                                       for="dCheck<?php echo $no; ?>"></label>
                                            </td>
                                        </tr>
                                        <?php $no++;
                                    endforeach ?>
                                    </tbody>
                                </table>
                            </div>
                        </form>
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

        $('#btnBack').click(function () {
            window.location.href = "<?php echo site_url('/MenuLevel')?>";
        });

    });
</script>
</body>
</html>
