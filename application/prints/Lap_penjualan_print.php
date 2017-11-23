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
  <center><h1 style="background-color: #D4D4D4"><b>LAPORAN PENJUALAN</b></h1></center>
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
              <th>No. Faktur Jual</th>
              <th>Tanggal</th>
              <th>Kasir</th>
              <th>Jenis Penjualan</th>
              <th>Jenis Pembayaran</th>
              <th>Total</th>
              <th>Pajak</th>
              <th>Grandtotal</th>
            </tr>
            </thead>
            <tbody>
                <?php 
				$no=1;
				$sum_total =0 ;
				$sum_pajak =0 ;
				$sum_grandtotal =0 ;
				foreach ($data as $row):
					$sum_subtotal = $row->total;
					$sum_total = $sum_total + $sum_subtotal;
					
					$sum_subpajak = $row->total_pajak;
					$sum_pajak = $sum_pajak + $sum_subpajak;
					
					$sum_subgrandtotal = $row->grandtotal;
					$sum_grandtotal = $sum_grandtotal + $sum_subgrandtotal;
				?>
                    <tr>
						<td class="no"><?php echo $no; ?></td>
						<td class="nama_cabang"><?php echo $row->nama_cabang; ?></td>
                        <td class="no_faktur_jual"><?php echo $row->no_faktur_jual;?></td>
                        <td class="tanggal_transaksi"><?php echo $row->tanggal_transaksi;?></td>
                        <td class="nama_kasir"><?php echo $row->nama_kasir;?></td>
                        <td class="jenis_penjualan"><?php echo $row->jenis_penjualan;?></td>
                        <td class="jenis_pembayaran"><?php echo $row->jenis_pembayaran;?></td>
                        <td class="total" style="text-align:right;"><?php echo number_format((double) $row->total, 2, '.',',');?></td>
                        <td class="total_pajak" style="text-align:right;"><?php echo number_format((double) $row->total_pajak, 2, '.',',');?></td>
                        <td class="grandtotal" style="text-align:right;"><?php echo number_format((double) $row->grandtotal, 2, '.',',');?></td>
                    </tr>
                <?php 
				$no+=1;
				endforeach
				?>
				<tr style="background-color: #D4D4D4">
					<td class=""></td>
					<td class=""></td>
					<td class=""></td>
					<td class=""></td>
					<td class=""></td>
					<td class=""></td>
					<td class="total" align=right>TOTAL</td>
					<td class="sum_total" align=right><?php echo number_format((double) $sum_total, 2, '.',','); ?></td>
					<td class="sum_pajak" align=right><?php echo number_format((double) $sum_pajak, 2, '.',','); ?></td>
					<td class="sum_grandtotal" align=right><?php echo number_format((double) $sum_grandtotal, 2, '.',','); ?></td>
				</tr>
            </tbody>
          </table>
        </div>
    </div><!-- /.box -->
  <!-- /.content -->
</div>
<!-- ./wrapper -->
</body>
</html>
