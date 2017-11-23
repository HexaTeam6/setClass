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
  <br>BELUT KHAS SURABAYA
  <?php
	foreach($data_cabang as $row)
  ?>
  <br><?php echo 'Cabang ' . $row->nama_cabang; ?>
  <br><?php echo $row->alamat; ?>
  <br><?php echo $row->telepon; ?>
  <center><h1 style="background-color: #D4D4D4; height:40px"><b>LAPORAN ROYALTI</b></h1></center>
  <center><h4 ><b><?php echo ' Periode : '.$t1 .' s/d '. $t2  ;?></b></h4></center>
  
 <!-- Default box -->
    <div class="box">        
       
        <!-- /.box-header -->
        <div class="box-body">
          <table id="datatable" class="table table-bordered table-hover" border=1>
            <thead>
            <tr>
			 <th style="width:5%; text-align:center">No.</th>
              <th style="width:15%; text-align:center">Cabang</th>
              <th style="width:15%; text-align:center">Tanggal</th>
              <th style="width:20%; text-align:center">Total Pendapatan</th>
              <th style="width:20%; text-align:center">Jumlah Royalti (5%)</th>
            </tr>
            </thead>
            <tbody>
                <?php 
				$no=1;
				$sum_total =0 ;
				$sum_royalti =0 ;
				foreach ($data as $row):
					$sum_subtotal = $row->total;
					$sum_total = $sum_total + $sum_subtotal;
					
					$sum_subroyalti = $row->royalti;
					$sum_royalti = $sum_royalti + $sum_subroyalti;
				?>
                    <tr>
						<tr>                              
                        <td class="no"><?php echo $no; ?></td>
						<td class="nama_cabang"><?php echo $row->nama_cabang; ?></td>
                        <td class="tanggal_transaksi"><?php echo $row->tanggal_transaksi;?></td>
                        <td class="grandtotal" style="text-align:right;"><?php echo number_format((double) $row->total, 2, '.',',');?></td>
                        <td class="total_royalti" style="text-align:right;"><?php echo number_format((double) $row->royalti, 2, '.',',');?></td>
                    </tr>
                    </tr>
                <?php 
				$no+=1;
				endforeach
				?>
				<tr style="background-color: #D4D4D4">
					<td class=""></td>
					<td class=""></td>
					<td class="tot" align=right>TOTAL</td>
					<td class="sum_total" align=right><?php echo number_format((double) $sum_total, 2, '.',','); ?></td>
					<td class="sum_royalti" align=right><?php echo number_format((double) $sum_royalti, 2, '.',','); ?></td>
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
