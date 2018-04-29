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
                    <h3 class="text-themecolor m-b-0 m-t-0">Dashboard</h3>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->

            <!-- ============================================================== -->
            <!-- Start Page Content -->
            <!-- ============================================================== -->
            <div class="row">
                <?php if ($_SESSION['kode_akses'] != 2 && $_SESSION['kode_akses'] != 1 && $_SESSION['kode_akses'] != 1){?>
                <div class="col-lg-3 col-md-6">
                    <div class="card card-danger" data-toggle="tooltip"
                         data-title="<?php echo ($_SESSION['kode_akses'] == 4)? 'Akumulasi anak anda tidak masuk': 'Akumulasi anda tidak masuk'?>">
                        <div class="card-body" >
                            <div class="d-flex flex-row">
                                <div class="round round-lg align-self-center round-danger"><i class="mdi mdi-package-up"></i></div>
                                <div class="m-l-10 align-self-center">
                                    <h4 class="m-b-0 moneyChart" style="color: white;">
                                        <?php if ($_SESSION['kode_akses'] == 4){
                                            echo ($tidakMasukAnak != '')? $tidakMasukAnak.' hari': '0 hari';
                                        }else{
                                            echo ($tidakMasuk != '')? $tidakMasuk.' hari' : '0 hari';
                                        } ?>
                                    </h4>
                                    <h6 class="m-b-0 font-light" style="color: white;">Tidak Masuk</h6></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="card card-primary" data-toggle="tooltip"
                         data-title="<?php echo ($_SESSION['kode_akses'] == 4)? 'Total kas yang anak anda bayarkan': 'Total kas yang anda bayarkan'?>">
                        <div class="card-body">
                            <div class="d-flex flex-row">
                                <div class="round round-lg align-self-center round-primary"><i class="ti-wallet"></i></div>
                                <div class="m-l-10 align-self-center">
                                    <h4 class="m-b-0 moneyChart" style="color: white;">
                                        <?php if ($_SESSION['kode_akses'] == 4){
                                            echo 'Rp '.number_format(($kasAnak != '')? $kasAnak : '0',2,',','.');
                                            echo '</h4>
                                                    <h6 class="m-b-0 font-light" style="color:white;">Kas anak anda</h6>';
                                        }else{
                                            echo 'Rp'.number_format(($kasPribadi != '')? $kasPribadi : '0',2,',','.');
                                            echo '</h4>
                                                    <h6 class="m-b-0 font-light" style="color:white;">Kas anda</h6>';
                                        } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="card card-info" data-toggle="tooltip"
                             data-title="<?php echo ($_SESSION['kode_akses'] == 4)? 'Total tabungan yang anak anda bayarkan': 'Total tabungan yang anda bayarkan'?>">
                            <div class="card-body">
                                <div class="d-flex flex-row">
                                    <div class="round round-lg align-self-center round-info"><i class="ti-wallet"></i></div>
                                    <div class="m-l-10 align-self-center">
                                        <h4 class="m-b-0 moneyChart" style="color: white;">
                                            <?php if ($_SESSION['kode_akses'] == 4){
                                                echo 'Rp '.number_format(($tabunganAnak != '')? $tabunganAnak : '0',2,',','.');
                                                echo '</h4>
                                                    <h6 class="m-b-0 font-light" style="color:white;">Tabungan anak</h6>';
                                            }else{
                                                echo 'Rp '.number_format(($tabunganPribadi != '')? $tabunganPribadi : '0',2,',','.');
                                                echo '</h4>
                                                    <h6 class="m-b-0 font-light" style="color:white;">Tabungan anda</h6>';
                                            } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php }?>
                <?php if ($_SESSION['kode_akses'] != 1){?>
                <div class="col-lg-3 col-md-6">
                    <div class="card card-warning" data-toggle="tooltip"
                         data-title="Total tabungan yang dimiliki kelas">
                        <div class="card-body">
                            <div class="d-flex flex-row">
                                <div class="round round-lg align-self-center round-warning"><i class="mdi mdi-cash-multiple"></i></div>
                                <div class="m-l-10 align-self-center">
                                    <h4 class="m-b-0 moneyChart" style="color: white;"><?php echo 'Rp '.number_format(($tabunganKelas != '')? $tabunganKelas : '0',2, ',', '.')?></h4>
                                    <h6 class="m-b-0 font-light" style="color: white;">Total tabungan</h6></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Informasi Terbaru</h4>
                            <div class="table-responsive m-t-20">
                                <table class="table stylish-table">
                                    <thead>
                                    <tr>
                                        <th>Dibuat</th>
                                        <th>Untuk</th>
                                        <th>Keterangan</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach ($informasi as $row):?>
                                    <tr>
                                        <td>
                                            <h6><?php echo $row->nama?></h6><small class="text-muted"><?php echo $row->jabatan?></small>
                                        </td>
                                        <td><label class="label label-inverse"><?php switch ($row->akses_jabatan){
                                                case 3: echo 'Ketua Kelas';
                                                    break;
                                                case 4: echo 'Sekertaris';
                                                    break;
                                                case 5: echo 'Bendahara';
                                                    break;
                                                case 0: echo 'Semua anggota';
                                                    break;
                                                default: echo 'tidak ditentukan';
                                            }?></label></td>
                                        <td><label class="label label-light-success"><?php echo 'Dibuat '.get_timeago(strtotime($row->created_at));?></label></td>
                                        <td align="center">
                                            <a href="<?php echo site_url('/LihatInformasi/info/').$row->id_informasi;?>">
                                                <span data-placement='top' data-toggle='tooltip' title data-original-title='Lihat'>
                                                    <button class='btn btn-xs btn-rounded btn-info waves waves-effect waves-light' data-title="Edit" id="btnEdit" data-toggle="modal" data-target="#AddModal">
                                                        <span class='fa fa-paper-plane'></span>
                                                    </button>
                                                </span>
                                            </a>
                                        </td>
                                    </tr>
                                    <?php endforeach;?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12">
                    <div class="card">
                        <div class="card-body bg-info">
                            <h4 class="text-white card-title"><?php
                                 switch(date('l')){
                                     case 'Monday': echo'Senin';
                                        break;
                                     case 'Tuesday': echo'Selasa';
                                         break;
                                     case 'Wednesday': echo'Rabu';
                                         break;
                                     case 'Thursday': echo'Kamis';
                                         break;
                                     case 'Friday': echo"Jum'at";
                                         break;
                                     case 'Saturday': echo'Sabtu';
                                         break;
                                     case 'Monday': echo'Minggu';
                                         break;
                                     default: echo'Tidak terdefinisi';
                                 }
                                ?></h4>
                            <h6 class="card-subtitle text-white m-b-0 op-5">Jadwal pelajaran hari ini</h6> </div>
                        <div class="card-body">
                            <div class="message-box contact-box">
                                <div class="message-widget contact-widget">
                                    <!-- Message -->
                                    <?php foreach ($jadwal as $row):?>
                                    <a href="#">
                                        <div class="mail-contnet" style="width: 100%">
                                            <h5><?php echo $row->nama_matapelajaran?></h5>
                                            <span class="mail-desc"><?php $jamMulai = explode(':',$row->jam_mulai);
                                                $jamSelesai = explode(':',$row->jam_selesai);
                                                echo $jamMulai[0].':'.$jamMulai[1].' - '.$jamSelesai[0].':'.$jamSelesai[1] ?><div style="position: relative; float: right"><?php echo $row->nama_guru?></div></span>
                                        </div>
                                    </a>
                                    <?php endforeach;?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php }?>
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
