<!-- ============================================================== -->
<!-- Topbar header - style you can find in pages.scss -->
<!-- ============================================================== -->
<header class="topbar" style="position: fixed; top: 0px; width: 100%;">
    <nav class="navbar top-navbar navbar-expand-md navbar-light">
        <!-- ============================================================== -->
        <!-- Logo -->
        <!-- ============================================================== -->
        <div class="navbar-header">
            <a class="navbar-brand" href="<?php echo site_url()?>">
                <!-- Logo icon -->
                <b>
                    <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                    <!-- Dark Logo icon -->
                    <!--                    <img src="../assets/images/logo-icon.png" alt="homepage" class="dark-logo"/>-->
                    <!-- Light Logo icon -->
                    <img src="<?php echo base_url('assets/img/setClass.png') ?>" alt="setClass" class="light-logo"
                         width="45px"/>
                </b>
                <!--End Logo icon -->
                <!-- Logo text -->
                <span style="color: white; font-family: Roboto; font-size: 20px; font-weight: 100; letter-spacing: 7px;">set<b>C</b>lass</span>
            </a>
        </div>
        <!-- ============================================================== -->
        <!-- End Logo -->
        <!-- ============================================================== -->
        <div class="navbar-collapse">
            <!-- ============================================================== -->
            <!-- toggle and nav items -->
            <!-- ============================================================== -->
            <ul class="navbar-nav mr-auto mt-md-0">
                <!-- This is  -->
                <li class="nav-item"><a class="nav-link nav-toggler hidden-md-up text-muted waves-effect waves-dark"
                                        href="javascript:void(0)"><i class="mdi mdi-menu"></i></a></li>
                <li class="nav-item"><a
                            class="nav-link sidebartoggler hidden-sm-down text-muted waves-effect waves-dark"
                            href="javascript:void(0)"><i class="ti-menu"></i></a></li>
                <!-- ============================================================== -->
                <!-- Search -->
                <!-- ============================================================== -->
                <li class="nav-item hidden-sm-down search-box">
                    <a class="nav-link hidden-sm-down text-muted waves-effect waves-dark" href="javascript:void(0)"><i
                                class="ti-search"></i></a>
                    <form class="app-search">
                        <input type="text" class="form-control" placeholder="Search & enter"> <a class="srh-btn"><i
                                    class="ti-close"></i></a></form>
                </li>
            </ul>

            <!-- ============================================================== -->
            <!-- User profile and search -->
            <!-- ============================================================== -->
            <ul class="navbar-nav my-lg-0">
                <!-- ============================================================== -->
                <!-- Comment -->
                <!-- ============================================================== -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-muted text-muted waves-effect waves-dark" href="#"
                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i
                                class="mdi mdi-alert-circle"></i>
                        <?php
                        if ($mark > 0){
                            echo '<div class="notify"><span class="heartbit"></span> <span class="point"></span></div>';
                        }
                        ?>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right mailbox scale-up">
                        <ul>
                            <li>
                                <div class="drop-title">Pemberitahuan</div>
                            </li>
                            <li>
                                <div class="message-center">
                                    <!--new message-->
                                    <?php foreach ($new as $row):?>
                                        <a style="background-color: #f2f4f8"
                                           href="<?php echo site_url('/Logs/getNewLogs/').$row->link.'/'.$row->id; ?>">
                                            <div class="btn btn-<?php echo $row->color?> btn-circle">
                                                <i class="mdi <?php echo $row->icon; ?>"></i>
                                            </div>
                                            <div class="mail-contnet">
                                                <h5 data-placement='right' data-toggle="tooltip" data-title="<?php echo $row->jabatan?>">
                                                    <?php echo $row->nama?>
                                                </h5>
                                                <span class="mail-desc"><?php echo $row->message?></span>
                                                <span class="time">
                                                    <i class="mdi mdi-clock"></i>
                                                    <?php
                                                    $notif_created = get_timeago(strtotime($row->created_at));
                                                    echo $notif_created;
                                                    ?> <label class="label label-inverse" style=" font-size: 10px; cursor: pointer">Baru</label>
                                                </span>
                                            </div>
                                        </a>
                                    <?php endforeach;?>

                                    <!-- Message -->
                                    <?php foreach ($notif as $row):?>
                                    <a href="<?php echo site_url('/').$row->link; ?>">
                                        <div class="btn btn-<?php echo $row->color?> btn-circle">
                                            <i class="mdi <?php echo $row->icon; ?>"></i>
                                        </div>
                                        <div class="mail-contnet">
                                            <h5 data-placement='right' data-toggle="tooltip" data-title="<?php echo $row->jabatan?>">
                                                <?php echo $row->nama?>
                                            </h5>
                                            <span class="mail-desc"><?php echo $row->message?></span>
                                            <span class="time">
                                                <i class="mdi mdi-clock"></i>
                                                <?php
                                                    $notif_created = get_timeago(strtotime($row->created_at));
                                                    echo $notif_created;
                                                ?>
                                            </span>
                                        </div>
                                    </a>
                                    <?php endforeach;?>
                                </div>
                            </li>
                            <li>
                                <a class="nav-link text-center" href="<?php echo site_url('/Logs')?>">
                                    <strong>Lihat semua pemberitahuan</strong>
                                    <i class="fa fa-angle-right"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <!-- ============================================================== -->
                <!-- End Comment -->
                <!-- ============================================================== -->

                <!-- ============================================================== -->
                <!-- Profile -->
                <!-- ============================================================== -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href="#"
                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img src="<?php echo base_url('/assets/img/userProfile/').$_SESSION['foto'] ?>" alt="user"
                             class="profile-pic" style="width: 30px; height: 30px;"/></a>
                    <div class="dropdown-menu dropdown-menu-right scale-up">
                        <ul class="dropdown-user">
                            <li>
                                <div class="dw-user-box">
                                    <div class="u-img">
                                        <img src="<?php echo base_url('/assets/img/userProfile/').$_SESSION['foto'] ?>" alt="user">
                                    </div>
                                    <div class="u-text">
                                        <label class="label label-light-danger"><?php echo $_SESSION['jabatan']?></label>
                                        <h4><?php echo $_SESSION['nama']; ?></h4>
                                        <p class="text-muted"><?php echo $_SESSION['email']; ?></p>
                                        <?php if ($_SESSION['kode_akses'] == 1){
                                            echo '<a href="'.site_url('/BackupDatabase/backup').'" class="btn btn-danger">
                                            <span class="btn-label"><i class="mdi mdi-database"></i></span>
                                            Backup Database
                                            </a>';
                                        }else{
                                            echo '<a href="'.site_url('/UserProfile').'" class="btn btn-rounded btn-danger btn-sm">
                                            Lihat Profil
                                            </a>';
                                        }?>
                                    </div>
                                </div>
                            </li>
                            <li role="separator" class="divider"></li>
                            <li><a href="#"><i class="ti-user"></i> My Profile</a></li>
                            <li><a href="#"><i class="ti-wallet"></i> My Balance</a></li>
                            <li><a href="#"><i class="ti-email"></i> Inbox</a></li>
<!--                            <li role="separator" class="divider"></li>-->
<!--                            <li><a href="#"><i class="ti-settings"></i> Account Setting</a></li>-->
                            <li role="separator" class="divider"></li>
                            <li><a href="<?php echo site_url('Auth/logout')?>"><i class="fa fa-power-off"></i> Keluar</a></li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
</header>
<div style="position: relative; width: 1349px; height: 70px; display: block; vertical-align: baseline; float: none;"></div>
<!-- ============================================================== -->
<!-- End Topbar header -->
<!-- ============================================================== -->