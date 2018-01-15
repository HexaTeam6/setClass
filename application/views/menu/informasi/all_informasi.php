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
                    <h3 class="text-themecolor m-b-0 m-t-0">Lihat Informasi</h3>
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
            <?php foreach ($data as $row):?>
                <div class="card" style="width: 70%; margin: 5% 25% 0% 15%;">
                    <div class="card-body">
                        <div class="profiletimeline">
                            <div class="sl-item">
                                <div class="sl-left">
                                    <img width="50px" height="50px" style="max-width: 50px" src="<?php echo base_url('/assets/img/userProfile/').$row->foto?>" alt="user" class="img-circle">
                                </div>
                                <div class="sl-right">
                                    <div><b><?php echo $row->nama?></b>  <label class="label label-inverse"><?php echo $row->jabatan?></label> <br>
                                        <span class="sl-date">Untuk <?php switch ($row->akses_jabatan){
                                                case 3: echo 'Ketua Kelas';
                                                    break;
                                                case 4: echo 'Sekertaris';
                                                    break;
                                                case 5: echo 'Bendahara';
                                                    break;
                                                case 0: echo 'Semua anggota';
                                                    break;
                                                default: echo 'tidak ditentukan';
                                            }?> - <?php echo get_timeago(strtotime($row->created_at))?></span>
                                        <p class="m-t-10"><?php echo $row->isi_informasi?></p>
                                        <img style="max-width: 90%" src="<?php echo base_url('/assets/img/informasi/').$row->gambar;?>" alt="">
                                    </div>
                                    <div class="like-comm m-t-20">
                                        <a href="<?php echo site_url('LihatInformasi/info/').$row->id_informasi?>" class="link m-r-10"><i class="fa fa-comments"></i> <?php echo $row->komen?> Komentar</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach;?>
            <center><a href="<?php echo site_url('/DataInformasi')?>" class="btn btn-inverse" style="margin-top: 50px">Lihat Semua</a></center>
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
//        $('#isiKomentar').hide();
//        $('#komentar').keypress(function (e) {
//            var komen = $('#komentar').val();
//            if(e.which == 13){
//                komen += '<br>';
//            }
//            $('#isiKomentar').val(komen);
//        });

        <?php if (isset($_SESSION['msg'])) {?>
        swal({
            position: 'center',
            type: 'success',
            title: "<?php echo $_SESSION['msg'];?>",
            showConfirmButton: false,
            timer: 1500
        });
        <?php }?>

        <?php if (isset($_SESSION['error'])) {?>
        swal({
            position: 'center',
            type: 'error',
            title: "<?php echo $_SESSION['error'];?>",
            showConfirmButton: false,
            timer: 1500
        });
        <?php }?>

    });
</script>
</body>
</html>