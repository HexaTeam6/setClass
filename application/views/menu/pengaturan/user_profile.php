<!DOCTYPE html>
<html lang="en">
<head>
    <title>setClass</title>
    <!--SweetAlert, Dropify-->
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
                    <h3 class="text-themecolor m-b-0 m-t-0">Profil</h3>
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
            <div class="modal fade" id="UploadModal" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Upload</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                        aria-hidden="true">&times;</span></button>
                        </div>

                        <form method="post" id="form" enctype="multipart/form-data" action="<?php echo site_url('/UserProfile/uploadFile')?>">
                            <div class="modal-body">

                                <div class="col-md-12">
                                    <label for="input-file-now">Foto Profil</label>
                                    <input type="file" id="input-file-now" name="foto" class="dropify"
                                           data-allowed-file-extensions="jpg png jpeg" required>
                                </div>

                            </div>

                            <div class="modal-footer">
                                <input type="hidden" id="id" name="id">
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
                <?php foreach ($data as $user):?>
                <!-- Column -->
                <div class="col-lg-4 col-xlg-3 col-md-5">
                    <div class="card">
                        <div class="card-body">
                            <center class="m-t-30">
                                <div class="el-element-overlay">
                                    <div class="el-card-item" style="height: 150px;">
                                        <div class="el-card-avatar el-overlay-1"
                                             style="width: 150px; border-radius: 100%">
                                            <img src="<?php echo base_url('/assets/img/userProfile/') . $user->foto ?>"
                                                 style="width: 150px; height: 150px; border-radius: 100%" alt="user">
                                            <div class="el-overlay" style="width: 150px; border-radius: 100%">
                                                <ul class="el-info">
                                                    <li><i id="uploadImage" style="cursor: pointer;"
                                                           class="mdi mdi-cloud-upload mdi-24px"
                                                           data-toggle="modal" data-target="#UploadModal"></i></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <h4 class="card-title m-t-10"><?php echo $user->nama?></h4>
                                <h6 class="card-subtitle"><?php echo $user->jabatan?></h6>
                                <label class="label label-light-info" data-placement='top' data-toggle="tooltip" data-title="Kode Kelas"><?php echo $user->kode_kelas?></label>
                                <div class="row text-center justify-content-md-center" data-placement="top" data-toggle="tooltip" data-title="Jumlah Murid">
                                    <div class="col-4">
                                        <a href="<?php echo site_url('/MasterSiswa')?>" class="link">
                                            <i class="icon-people"></i>
                                            <font class="font-medium"><?php echo $user->jumlahSiswa?></font>
                                        </a>
                                    </div>
                                </div>
                            </center>
                        </div>
                        <hr size="12" width="100%" style="margin: 0px 0px">
                        <div class="card-body">
                            <small class="text-muted">Email</small>
                            <h6><?php echo $user->email?></h6>
                            <small class="text-muted p-t-30 db">Nomor Telepon</small>
                            <h6><?php echo $user->no_telp?></h6>
                            <small class="text-muted p-t-30 db">Alamat</small>
                            <h6><?php echo $user->alamat?></h6>
                        </div>
                    </div>
                </div>
                <!-- Column -->
                <!-- Column -->
                <div class="col-lg-8 col-xlg-9 col-md-7">
                    <div class="card">
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs profile-tab" role="tablist">
                            <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#profile" role="tab">Profil</a>
                            </li>
                            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#riwayat" role="tab">Riwayat</a>
                            </li>
                            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#settings" role="tab">Pengaturan</a>
                            </li>
                        </ul>
                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div class="tab-pane active" id="profile" role="tabpanel">
                                <div class="card-body">
                                    <div class="col-md-12" align="center" style="margin-bottom: 10px">
                                        <label class="label label-info">Profil User</label>
                                    </div>

                                    <div>
                                        <label class="col-md-3 font-weight-bold float-left">
                                            <?php switch ($_SESSION['kode_akses']){
                                                case 2 : echo 'NIP';
                                                break;
                                                case 3 : echo 'NIS';
                                                break;
                                                case 4 : echo 'NIK';
                                                break;
                                                default : echo '';
                                            }?></label>
                                        <label class="col-md-6"><?php echo $user->kode_user ?></label>
                                    </div>

                                    <?php if ($_SESSION['kode_akses'] == 3){
                                        echo '<div>
                                                <label class="col-md-3 font-weight-bold float-left">NIK</label>
                                                <label class="col-md-6">'.$user->NIK.'</label>
                                              </div>';
                                    }?>

                                    <div>
                                        <label class="col-md-3 font-weight-bold float-left">Nama</label>
                                        <label class="col-md-6"><?php echo $user->nama ?></label>
                                    </div>

                                    <div>
                                        <label class="col-md-3 font-weight-bold float-left">Email</label>
                                        <label class="col-md-6"><?php echo $user->email ?></label>
                                    </div>

                                    <div>
                                        <label class="col-md-3 font-weight-bold float-left">Jenis Kelamin</label>
                                        <label class="col-md-6"><?php echo $user->jenis_kelamin ?></label>
                                    </div>

                                    <div>
                                        <label class="col-md-3 font-weight-bold float-left">TTL</label>
                                        <label class="col-md-6"><?php echo $user->tempat_lahir.', '.$user->tanggal_lahir ?></label>
                                    </div>

                                    <div>
                                        <label class="col-md-3 font-weight-bold float-left">Nomer Telepon</label>
                                        <label class="col-md-6"><?php echo $user->no_telp ?></label>
                                    </div>

                                    <div>
                                        <label class="col-md-3 font-weight-bold float-left">Alamat</label>
                                        <label class="col-md-6"><?php echo $user->alamat ?></label>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-3">
                                            <small class="text-muted col-md-12">Mendaftar Pada</small>
                                            <br>
                                            <label class="col-md-12">
                                                <i class="mdi mdi-calendar-today"></i>
                                                <?php echo date_format(date_create($user->created_at),'d-m-Y') ?>
                                            </label>
                                        </div>

                                        <div class="col-md-6">
                                            <small class="text-muted col-md-12">Terakhir diupdate</small>
                                            <br>
                                            <label class="col-md-12">
                                                <i class="mdi mdi-clock"></i>
                                                <?php $timeago = get_timeago(strtotime($user->updated_at ));
                                                echo $timeago; ?></label>
                                        </div>
                                    </div>

                                    <hr>

                                    <div class="col-md-12" align="center" style="margin-bottom: 10px">
                                        <label class="label label-primary">Profil Kelas</label>
                                    </div>

                                    <div>
                                        <label class="col-md-3 font-weight-bold float-left">Kode Kelas</label>
                                        <label class="col-md-6"><?php echo $user->kode_kelas ?></label>
                                    </div>

                                    <div>
                                        <label class="col-md-3 font-weight-bold float-left">Nama Sekolah</label>
                                        <label class="col-md-6"><?php echo $user->nama_sekolah ?></label>
                                    </div>

                                    <div>
                                        <label class="col-md-3 font-weight-bold float-left">Alamat Sekolah</label>
                                        <label class="col-md-6"><?php echo $user->alamat_sekolah ?></label>
                                    </div>

                                    <div>
                                        <label class="col-md-3 font-weight-bold float-left">Telepon</label>
                                        <label class="col-md-6"><?php echo $user->telp_sekolah ?></label>
                                    </div>

                                    <div>
                                        <label class="col-md-3 font-weight-bold float-left">Kelas</label>
                                        <label class="col-md-6">
                                            <?php echo $user->kelas ?>
                                            <label class="label label-light-warning"><?php echo $user->jurusan ?></label>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <!--second tab-->
                            <div class="tab-pane" id="riwayat" role="tabpanel">
                                <div class="card-body">
                                    <?php foreach ($logs as $log):?>
                                        <div class="profiletimeline">
                                            <div class="sl-item">
                                                <div class="sl-right">
                                                <span class="sl-date">
                                                    <i class="fa fa-clock-o"></i>
                                                    <?php
                                                    $log_created = get_timeago(strtotime($log->created_at));
                                                    echo $log_created; ?>
                                                </span>
                                                    <p style="margin-bottom: 0;"><?php echo $log->message; ?></p>
                                                    <a class="btn btn-xs btn-success waves waves-effect waves-light"
                                                       href="<?php echo site_url('/').str_replace('Logs/getNewLogs/', '', $log->link); ?>">Lihat
                                                    </a>
                                                    <hr>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach;?>
                                </div>
                            </div>
                            <!--Third tab-->
                            <div class="tab-pane" id="settings" role="tabpanel">
                                <div class="card-body">
                                    <form class="form-horizontal form-material" method="post" action="<?php echo site_url('UserProfile/update')?>">
                                        <div class="form-group">
                                            <label class="col-md-12" for="wnama">Nama</label>
                                            <div class="col-md-12">
                                                <input type="text" placeholder="Nama"
                                                       class="form-control form-control-line"
                                                       id="wnama"
                                                       name="nama"
                                                       value="<?php echo $user->nama?>" required>
                                            </div>
                                        </div>
<!--                                        <div class="form-group">-->
<!--                                            <label for="wemail" class="col-md-12">Email</label>-->
<!--                                            <div class="col-md-12">-->
<!--                                                <input type="email" placeholder="Email"-->
<!--                                                       class="form-control form-control-line"-->
<!--                                                       name="email"-->
<!--                                                       id="wemail"-->
<!--                                                       value="--><?php //echo $user->email?><!--" required>-->
<!--                                            </div>-->
<!--                                        </div>-->
                                        <div class="form-group">
                                            <label for="wjenisKelamin" class="col-md-12"> Jenis Kelamin</label>
                                            <div class="col-md-12">
                                                <input type="hidden" id="jenis_kelamin" value="<?php echo $user->jenis_kelamin?>">
                                                <select class="form-control-line form-control"
                                                        id="wjenisKelamin"
                                                        name="jenisKelamin" required>
                                                    <option value="">Pilih Jenis Kelamin</option>
                                                    <option value="Laki Laki">Laki Laki</option>
                                                    <option value="Perempuan">Perempuan</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="wtempatLahir" class="col-md-12">Tempat Lahir</label>
                                            <div class="col-md-12">
                                                <input type="text" placeholder="Tempat Lahir"
                                                       class="form-control form-control-line"
                                                       name="tempatLahir"
                                                       id="wtempatLahir"
                                                       value="<?php echo $user->tempat_lahir?>" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="wtanggalLahir" class="col-md-12">Tanggal Lahir</label>
                                            <div class="col-md-12">
                                                <input type="date" placeholder="Tanggal Lahir"
                                                       class="form-control form-control-line"
                                                       name="tanggalLahir"
                                                       id="wtanggalLahir"
                                                       value="<?php echo $user->tanggal_lahir?>" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="wtelp" class="col-md-12">Nomer Telepon</label>
                                            <div class="col-md-12">
                                                <input type="text" placeholder="Nomer Telepon"
                                                       class="form-control form-control-line"
                                                       name="nomerTelepon"
                                                       id="wtelp"
                                                       value="<?php echo $user->no_telp?>" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="walamat" class="col-md-12">Alamat</label>
                                            <div class="col-md-12">
                                                <input type="text" placeholder="Alamat"
                                                       class="form-control form-control-line"
                                                       name="alamat"
                                                       id="walamat"
                                                       value="<?php echo $user->alamat?>" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-sm-12">
                                                <button class="btn btn-success">Update Profile</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Column -->
                <?php endforeach; ?>
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

<!--Dropify JS, InputMask Js, SweetAlert JS-->
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

        $("#wtelp").inputmask("+628-9{1,3}-9{1,3}-9{1,4}");
        $("#wjenisKelamin").val($('#jenis_kelamin').val());

        $('.dropify').dropify({
            messages: {
                'default': 'Seret gambar kesini atau klik untuk menambahkan gambar',
                'replace': 'Seret gambar kesini atau klik untuk mengganti gambar',
                'remove':  'Hapus',
                'error':   'Ada kesalahan dalam file.'
            },
            tpl: {
                message:'<div class="dropify-message"><span class="file-icon" /> <p style="text-align: center">{{ default }}</p></div>'
            }
        });

    });
</script>
</body>
</html>
