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
                                    <div><b><?php echo $row->nama?></b>  <label class="label label-inverse"><?php echo $row->jabatan?></label>
                                        <?php if ($row->kode_user == $_SESSION['kode_user']){?>
                                            <a href="<?php echo site_url('DataInformasi/edit/').$row->id_informasi?>" style="float: right">
                                               <span class="sl-date text-warning"><i class="fa fa-pencil"></i> Edit</span>
                                            </a>
                                        <?php }?>
                                        <br>
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
                                        <?php if ($row->gambar != ''){?>
                                            <div class="el-element-overlay" style="max-width: 90%">
                                                <div class="el-card-item">
                                                    <div class="el-card-avatar el-overlay-1">
                                                        <center>
                                                            <img style="max-width: 90%" src="<?php echo base_url('/assets/img/informasi/').$row->gambar;?>">
                                                        </center>
                                                        <div class="el-overlay">
                                                            <ul class="el-info">
                                                                <li><a class="btn default btn-outline image-popup-vertical-fit" href="<?php echo base_url('/assets/img/informasi/').$row->gambar;?>"><i class="icon-magnifier"></i></a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php }?>
                                    </div>
<!--                                    <div class="like-comm m-t-20">-->
<!--                                        <a href="javascript:void(0)" class="link m-r-10"><i class="fa fa-comments"></i> 2 comment</a>-->
<!--                                    </div>-->
                                </div>
                            </div>
                            <span class="sl-date">Komentar</span>

                            <div class="comment-widgets">
                            <?php foreach ($komentar as $komen):?>
                                <div class="d-flex flex-row comment-row" style="padding-bottom: 0; padding-top: 0">
                                    <div class="p-2">
                                        <img style="border-radius: 100%" width="50px" height="50px" src="<?php echo base_url('/assets/img/userProfile/').$komen->foto?>" alt="user" width="50">
                                    </div>
                                    <div class="comment-text w-100">
                                        <div class="comment-footer">
                                            <?php if ($komen->kode_user == $_SESSION['kode_user'] || $row->kode_user == $_SESSION['kode_user']){?>
                                                <span class="action-icons pull-right">
                                                    <a href="<?php echo site_url('LihatInformasi/delete/').$komen->id_komentar.'/'.$row->id_informasi?>"><i class="ti-trash"></i> hapus</a>
                                                </span>
                                            <?php }?>
                                        </div>
                                        <b><?php echo $komen->nama?></b> <label class="label label-inverse"><?php echo $komen->jabatan?></label>
                                        <p class="m-b-5"><?php echo nl2br($komen->isi_komentar)?></p>
                                        <span class="sl-date"><?php echo get_timeago(strtotime($komen->created_at))?></span>
                                    </div>
                                </div>
                            <?php endforeach;?>
                            </div>

                            <div class="comment-widgets">
                                <div class="d-flex flex-row comment-row">
                                    <div class="p-2">
                                        <img style="border-radius: 100%" width="50px" height="50px" src="<?php echo base_url('/assets/img/userProfile/').$_SESSION['foto']?>" alt="user" width="50">
                                    </div>
                                    <div class="comment-text w-100">
                                        <h5><?php echo $_SESSION['nama']?></h5>
                                        <form action="<?php echo site_url('/LihatInformasi/comment')?>" method="post">
                                            <input type="hidden" value="<?php echo $row->id_informasi?>" name="id_informasi">
<!--                                            <textarea id="komentar" class="form-control"></textarea>-->
                                            <textarea name="isiKomentar" id="isiKomentar" class="form-control"></textarea>
                                            <button type="submit" class="btn btn-primary">
                                                <span class="btn-label"><i class="fa fa-comment"></i></span>
                                                Komentar
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach;?>
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

    });
</script>
</body>
</html>
