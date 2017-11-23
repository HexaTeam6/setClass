<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Restaurant | Print</title>
  
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!--jQuery-->
  <script src="<?php echo base_url('user_guide/_static/jquery-1.11.1.js')?>"></script>
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="<?php echo base_url('assets/AdminLTE-2.3.7/bootstrap/css/bootstrap.min.css')?>">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url('assets/ionicons-2.0.1/css/ionicons.min.css')?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url('assets/AdminLTE-2.3.7/dist/css/AdminLTE.min.css')?>">
  
  <link rel="stylesheet" href="<?php echo base_url('assets/AdminLTE-2.3.7/dist/css/skins/_all-skins.min.css')?>">
  
</head>
<body onload="window.print();">
<div class="container">
  <!-- Main content -->
  <br>
  <b>BELUT KHAS SURABAYA</b>
  <?php
	foreach($data_cabang as $row)
  ?>
  <br><?php echo $row->nama_cabang; ?>
  <br><?php echo $row->alamat; ?>
  <br><?php echo $row->telepon; ?>
  <center><h1 style="background-color: #D4D4D4"><b>LAPORAN SETORAN UANG KASIR</b></h1></center>
  <center><h4 ><b><?php echo ' Periode : '.$t1 .' s/d '. $t2  ;?></b></h4></center>
  
 <!-- Default box -->
    <div class="box">        
       
        <!-- /.box-header -->
        <div class="box-body">
          <table id="datatable" class="table table-bordered table-hover">
            <thead>
            <tr>
			  <th>No.</th>
              <th>Cabang</th>
              <th>No. Setor</th>
              <th>Kasir</th>
              <th>Tanggal</th>
              <th>Modal</th>
			  <th>Pengeluaran</th>
              <th>Pendapatan</th>
              <th>Cash</th>
              <th>Debit</th>
              <th>Credit</th>
              <th>Total Setor</th>
              <th>Jumlah Uang</th>
            </tr>
            </thead>
            <tbody>
                <?php 
				$no=1;
				foreach ($data as $row):
				?>
                    <tr>
						 <td class="no"><?php echo $no; ?></td>
						<td class="nama_cabang"><?php echo $row->nama_cabang; ?></td>
                        <td class="no_penyetoran"><?php echo $row->no_penyetoran;?></td>
                        <td class="nama_kasir"><?php echo $row->nama_kasir;?></td>
                        <td class="tanggal_jam"><?php echo $row->tanggal_jam;?></td>
                        <td class="modal_kasir" style="text-align:right;"><?php echo number_format((double) $row->modal_kasir, 0, '.',',');?></td>
                        <td class="jumlah_pengeluaran" style="text-align:right;"><?php echo number_format((double) $row->jumlah_pengeluaran, 0, '.',',');?></td>
                        <td class="jumlah_pendapatan" style="text-align:right;"><?php echo number_format((double) $row->jumlah_pendapatan, 0, '.',',');?></td>
                        <td class="jumlah_cash" style="text-align:right;"><?php echo number_format((double) $row->jumlah_cash, 0, '.',',');?></td>
                        <td class="jumlah_debit" style="text-align:right;"><?php echo number_format((double) $row->jumlah_debit, 0, '.',',');?></td>
                        <td class="jumlah_credit" style="text-align:right;"><?php echo number_format((double) $row->jumlah_credit, 0, '.',',');?></td>
                        <td class="total" style="text-align:right;"><?php echo number_format((double) $row->total, 0, '.',',');?></td>
                        <td class="jumlah_uang" style="text-align:right;"><?php echo number_format((double) $row->jumlah_uang, 0, '.',',');?></td>
                    </tr>
                <?php 
				$no+=1;
				endforeach
				?>
            </tbody>
          </table>
        </div>
    </div><!-- /.box -->
  <!-- /.content -->
</div>
<!-- ./wrapper -->
</body>
</html>
