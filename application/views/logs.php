<!DOCTYPE html>
<html lang="en">
<head>
    <title>setClass</title>
    <?php $this->load->view('partials/_css'); ?>
</head>

<body class="fix-header card-no-border">
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
                    <h3 class="text-themecolor m-b-0 m-t-0">Pemberitahuan</h3>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Pemberitahuan</li>
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
                        <div id="myTable_wrapper" class="dataTables_wrapper no-footer">
                            <table id="datatable" class="table table-bordered">
                                <thead>
                                <tr>
                                    <th>Status</th>
                                    <th>Dari</th>
                                    <th width="45%">Keterangan</th>
                                    <th>Link</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($new as $row): ?>
                                    <tr bgcolor="#f2f4f8">
                                        <td class="status" align="center">
                                            <label class="label label-inverse">Baru</label>
                                        </td>
                                        <td class="user">
                                            <input type="hidden" id="kode_user" value="<?php echo $row->kode_user ?>">
                                            <label class="label label-light-danger"><?php echo $row->jabatan?></label> <?php echo $row->nama; ?>
                                        </td>
                                        <td class="keterangan">
                                            <?php echo $row->message; ?><br>
                                            <span class="time">
                                                <label class="label label-light-warning">
                                                    <i class="mdi mdi-clock" style="font-style: normal">
                                                        <?php echo get_timeago(strtotime($row->created_at)) ?>
                                                    </i>
                                                </label>
                                            </span>
                                        </td>
                                        <td align="center">
                                            <a class="btn btn-info" href="<?php echo site_url('/Logs/getNewLogs/').$row->link.'/'.$row->id; ?>">
                                                <span class="btn-label">
                                                    <i class="fa fa-paper-plane-o"></i>
                                                </span>
                                                Lihat
                                            </a>
                                        </td>
                                    </tr>
                                <?php endforeach ?>

                                <?php foreach ($data as $row): ?>
                                    <tr>
                                        <td class="status" align="center">
                                            <label class="label label-primary">Dilihat</label>
                                        </td>
                                        <td class="user">
                                            <input type="hidden" id="kode_user" value="<?php echo $row->kode_user ?>">
                                            <label class="label label-light-danger"><?php echo $row->jabatan?></label> <?php echo $row->nama; ?>
                                        </td>
                                        <td class="keterangan">
                                            <?php echo $row->message; ?><br>
                                            <span class="time">
                                                <label class="label label-light-warning">
                                                    <i class="mdi mdi-clock" style="font-style: normal">
                                                        <?php echo get_timeago(strtotime($row->created_at)) ?>
                                                    </i>
                                                </label>
                                            </span>
                                        </td>
                                        <td align="center">
                                            <a class="btn btn-info" href="<?php echo site_url('/').$row->link ?>">
                                                <span class="btn-label">
                                                    <i class="fa fa-paper-plane-o"></i>
                                                </span>
                                                Lihat
                                            </a>
                                        </td>
                                    </tr>
                                <?php endforeach ?>
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
    });
</script>
</body>
</html>