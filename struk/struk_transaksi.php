<?php 
	include '../system/proses.php';
	$id=$_GET['id'];
	$data1 = $db->get("transaksi.TGL_transaksi,transaksi.bayar,transaksi.kembali, transaksi.no_transaksi,transaksi.nomer_order,petugas.nama_PTG","transaksi","INNER JOIN tb_order on tb_order.nomer_order=transaksi.nomer_order INNER JOIN petugas on transaksi.kode_PTG=petugas.kode_PTG WHERE transaksi.no_transaksi='$id'")->fetch();
	$data2 = $db->get("pelanggan.nama_pelanggan","pelanggan","INNER JOIN tb_order on pelanggan.kode_pelanggan=tb_order.kode_pelanggan INNER JOIN transaksi on transaksi.nomer_order=tb_order.nomer_order WHERE transaksi.no_transaksi='$id'")->fetch();
	$data3 = $db->get("jasa.nama_jasa,tb_order.berat_cucian,tb_order.total_harga,jasa.harga","tb_order","INNER JOIN jasa ON tb_order.kode_jasa=jasa.kode_jasa INNER JOIN transaksi ON tb_order.nomer_order=transaksi.nomer_order WHERE transaksi.no_transaksi='$id'")->fetch();

 ?>
<!DOCTYPE html>
<html>
<head>
	<title>STRUK</title>
	<style type="text/css">
	
	.kotak-struk{
		float: left;
		width: 380px;
		height: auto;
		margin-left: -25px;
		margin-top: -15px;
		font-size: 15px;
		font-family: Courier New;
	}
	.kotak-struk .head p {
		text-align: center;
		font-size: 17px;
	}
	.kotak-struk .logo{
		font-weight: bold;
	}
	.kotak-struk .logo,.almt,.notelp{
		font-family: 'tahoma';
		line-height: 15px;
	}
	.kotak-struk .tabel1{
		margin: 0px 30px;
	}
	.kotak-struk .tabel1 tr td{
		font-family: 'tahoma';
		line-height: 25px;
	}
	.kotak-struk .tabel2{
		margin: 0px 30px;
	}
	.kotak-struk .tabel2 tr td{
		font-family: 'tahoma';
		line-height: 25px;
	}
	.kotak-struk .tabel3{
		float: right;
		margin: 0px 30px;
	}
	.kotak-struk .tabel3 tr td{
		text-align: right;
		font-family: 'tahoma';
		line-height: 25px;
	}
	.kotak-struk .tabel4{
		float: right;
		margin: 0px 30px;
	}
	.kotak-struk .tabel4 tr td{
		text-align: right;
		font-family: 'tahoma';
	}
	.kotak-struk .foot{
		float: left;
		text-align: center;
		line-height: 10px;
		margin: 0px 40px;
		margin-top: 10px;
		font-family: 'tahoma';
	}


</style>
</head>
<body>
	<div class="kotak-struk">
		<div class="head">
			
			<p class="logo">LAUNDRY </p>
			<p class="almt">Jl. Raya Pati - Cluwak No 21A</p>
			<p class="notelp">081327551680</p>
		</div>
	<div class="isi">
		<table class="tabel1">
			<tr>
				<td>Tanggal</td>
				<td>:</td>
				<td><?php echo $data1['TGL_transaksi'] ?></td>
			</tr>
			<tr>
				<td>No Transaksi</td>
				<td>:</td>
				<td><?php echo $data1['no_transaksi'] ?></td>
			</tr>
			<tr>
				<td>No Order</td>
				<td>:</td>
				<td><?php echo $data1['nomer_order'] ?></td>
			</tr>
			<tr>
				<td>Operator</td>
				<td>:</td>
				<td><?php echo $data1['nama_PTG']; ?></td>
			</tr>
			
			<tr>
				<td>Pelanggan</td>
				<td>:</td>
				<td><?php echo $data2['nama_pelanggan'] ?></td>
			</tr>
				
			<tr>
				<td colspan="4">=============================</td>
			</tr>
		</table>
		<table class="tabel2">
			<tr>
				<td><center>Nama Jasa</center></td>
				<td><center>Harga</center></td>
				<td><center>Berat Cucian</center></td>
				<td><center>Total</center></td>
			</tr>
			 <tr>
			 	<td><center><?php echo $data3['nama_jasa'] ?></center></td>
			 	<td><center><?php echo $data3['harga'] ?></center></td>
			 	<td><center><?php echo $data3['berat_cucian'] ?></center></td>
			 	<td><center><?php echo $data3['total_harga'] ?></center></td>
			 </tr>
		
			<tr>
				<td colspan="4">=============================</td>
			</tr>
		</table>
		<table class="tabel3">
			<tr>
				<td>Bayar</td>
				<td>:</td>
				<td><?php echo $data1['bayar'] ?></td>
			</tr>
			<tr>
				<td>Kembali</td>
				<td>:</td>
				<td><?php echo $data1['kembali'] ?></td>
			</tr>
			<tr>
				<td>Total</td>
				<td>:</td>
				<td><?php echo $data3['total_harga'] ?></td>
			</tr>
			
			
			<tr>
				<td colspan="4">======================</td>
			</tr>
		</table>
		
		<div class="foot">
			<p> Terimakasih Atas Kunjungan Anda</p>
			<p> Semoga Anda Puas Dengan Layanan Anda</p>
			<p>-----------------------------</p>
		</div>
	</div>
</div>

</body>
</html>