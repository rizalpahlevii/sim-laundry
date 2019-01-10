<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Print Per Tahun</title>
	<link href="../assets/vendor/bootstrap/css/bootstrap.css" rel="stylesheet">
</head>
<body>
	<br>
	<h2 class="text-center">Laporan Keuangan Laundry</h2>
	<h5 class="text-center">Print Per Tahun <?php echo $_GET['tahun'] ?></h5>
	<hr>
	<table class="table table-hover table-bordered" style="width: 90%;" align="center">
		<tr>
			<th><center>No.</center></th>
			<th><center>ID Transaksi</center></th>
			<th><center>Tgl. Transaksi</center></th>
			<th><center>Nama Pelanggan</center></th>
			<th><center>Nama Jasa</center></th>
			<th><center>Harga</center></th>
			<th><center>Berat Cucian</center></th>
			<th><center>Total</center></th>
		</tr>
		<?php 
			include '../system/proses.php';
			
			$tahun = $_GET['tahun'];
			$qw = $db->get("transaksi.no_transaksi, transaksi.TGL_transaksi,jasa.nama_jasa,jasa.harga,tb_order.berat_cucian,tb_order.total_harga,pelanggan.nama_pelanggan","transaksi","INNER JOIN tb_order on transaksi.nomer_order=tb_order.nomer_order INNER JOIN petugas ON transaksi.kode_PTG=petugas.kode_PTG INNER JOIN jasa ON tb_order.kode_jasa=jasa.kode_jasa INNER JOIN pelanggan on pelanggan.kode_pelanggan=tb_order.kode_pelanggan WHERE year(transaksi.TGL_transaksi)='$tahun'");
			$jml=0;
			$no=1;
			foreach($qw as $data){
				$jml=$jml+$data['total_harga'];
		 ?>
		<tr>
				<td><center><?php echo $no; ?></center></td>
				<td><center><?php echo $data['no_transaksi'] ?></center></td>
				<td><center><?php echo $data['TGL_transaksi'] ?></center></td>
				<td><center><?php echo $data['nama_pelanggan'] ?></center></td>
				<td><center><?php echo $data['nama_jasa'] ?></center></td>
				<td><center><?php echo $data['harga'] ?></center></td>
				<td><center><?php echo $data['berat_cucian'] ?></center></td>
				<td><center><?php echo "Rp. " . number_format($data['total_harga'],2,',','.'); ?></center></td>
		</tr>
		<?php 
		$no++;
		} 
		?>
		<tr>
			<td colspan="7" style="font-weight: bold;"><center>Total</center></td>
			<td style="font-weight: bold;"><center><?php echo "Rp. " . number_format($jml,2,',','.'); ?></center></td>
		</tr>
	</table>
	<br><br><br><br>
	<p class="text-right" style="margin-right: 100px;">Pati , <?php echo date('d-M-Y'); ?></p>
	<h3 class="text-right" style="margin-right: 100px;">Manager</h3>
	<br><br>
	<p class="text-right" style="margin-right: 70px;"><?php echo $_SESSION['nama_ptg']; ?></p>
	
</body>
</html>
 <script src="../assets/vendor/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>