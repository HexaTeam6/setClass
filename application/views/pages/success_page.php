<!DOCTYPE html>
<html lang="en" style="background-color: #F2F2F2">
<head>
    <title>setClass</title>
    <?php $this->load->view('partials/_css'); ?>
</head>

<body>
<?php $this->load->view('partials/_preloader'); ?>

<div id="main-wrapper" style="background-color: #F2F2F2;">
    <div class="card text-center col-md-6" style="margin: 5% 25% 0% 25%;">
        <h2 class="card-header font-weight-bold">
            Pendaftaran berhasil!
        </h2>
        <div class="card-body">
            <h4 class="card-title label label-light-info">Account info</h4>
            <table align="center" width="60%" style="margin-bottom: 20px; text-align: left;">
                <?php foreach ($user as $row): ?>
                    <tr>
                        <td align="center" colspan="2">
                            <img width="100px" height="100px" src="<?php echo base_url('/assets/img/userProfile/').$row->foto?>" alt="User Picture"
                            style="border-radius: 100%;">
                        </td>
                    </tr>
                    <tr>
                        <td width="30%"><b>Nama </b></td>
                        <td align="left"><?php echo $row->nama; ?></td>
                    </tr>
                    <tr>
                        <td width="30%"><b>Kode User </b></td>
                        <td align="left"><?php echo $row->kode_user; ?></td>
                    </tr>
                    <tr>
                        <td width="30%"><b>Email </b></td>
                        <td align="left"><?php echo $row->email; ?></td>
                    </tr>
                    <tr>
                        <td width="30%"><b>Jabatan </b></td>
                        <td align="left"><?php echo $row->jabatan; ?></td>
                    </tr>
                    <tr>
                        <td width="30%"><b>Kode Kelas </b></td>
                        <td align="left"><?php echo $row->kode_kelas; ?></td>
                    </tr>
                    <tr>
                        <td width="30%"><b>Status akun </b></td>
                        <td align="left"><i
                                    class="<?php echo ($row->status == "Confirmed" ? "text-info" : "text-danger")?> font-weight-bold">
                                    <?php echo $row->status; ?></i></td>
                    </tr>
                    <tr style="padding-top: 20px">
                        <?php echo ($row->status == "Unconfirmed" ? "<td colspan=\"2\"><span class=\"label label-light-danger\">Tunggu agar akun anda dikonfirmasi <b>Wali Kelas</b> untuk melakukan login.</span>" : "")?>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2"><span class="label label-light-warning"><b>!</b> Sebarkan <b>kode kelas</b> tersebut hanya pada anggota kelas anda.</span>
                        </td>
                    </tr>
                <?php endforeach;?>
            </table>
            <a href="<?php echo site_url('Auth/masuk')?>" class="btn btn-info btn-rounded waves waves-effect waves-light">Back to Login</a>
        </div>
        <div class="card-footer text-muted">
            &copy;2017 setClass.
        </div>
    </div>
</div>

<?php $this->load->view('partials/_javascripts'); ?>
</body>
</html>