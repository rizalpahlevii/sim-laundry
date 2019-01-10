	<?php 
	include 'system/proses.php';
 ?>
<div class="container-fluid">
	<ol class="breadcrumb">
        <li class="breadcrumb-item">
       		<a href="#">Laporan</a>
        </li>
        <li class="breadcrumb-item active">Overview</li>
    </ol>
    

    <div class="container">
    	<h3 class="text-center">Laporan Per Tahun</h3>
    	<hr>
    	<br>
    	<div class="row">
    		<form action="manager.php?p=laporan_pertahun" method="POST">
    			<div class="form-inline">
				    
				    <label for="tahun">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Tahun&nbsp;&nbsp;&nbsp;</label>
				    <select name="tahun" id="tahun" class="form-control" style="width: 200px;">
						<?php 
							$qr = $db->get("TGL_transaksi","transaksi"," GROUP BY DATE_FORMAT(TGL_transaksi, '%Y')");
						while($d=$qr->fetch()) :
						$data = explode('-', $d['TGL_transaksi']);
						$tahun = $data[0];
								 ?>
						<option value="<?php echo $tahun; ?>"><?php echo $tahun; ?></option>
							<?php endwhile; ?>
					</select>
				    &nbsp;
				    <button type="submit" name="cari" class="btn btn-primary"><i class="fa fa-search"></i>&nbsp;Cari</button>
				    &nbsp;
				   
				   
				    <?php 
				    	if(isset($_POST['cari'])){
				    		$hidd_ctk = "";
				    	}else{
				    		$hidd_ctk="hidden";
				    	}
				     ?>


				    <button onclick="cetak_tahun()" class="btn btn-danger" <?php 	echo $hidd_ctk; ?>><i class="fa fa-print"></i>&nbsp; Cetak</button>
				</div>
    		</form>
    	</div>
    	<br>
		<table class="table table-hover table-bordered" >
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
				
				if(isset($_POST['cari'])){
					$tahun=$_POST['tahun'];
					$qw = $db->get("transaksi.no_transaksi, transaksi.TGL_transaksi,jasa.nama_jasa,jasa.harga,tb_order.berat_cucian,tb_order.total_harga,pelanggan.nama_pelanggan","transaksi","INNER JOIN tb_order on transaksi.nomer_order=tb_order.nomer_order INNER JOIN petugas ON transaksi.kode_PTG=petugas.kode_PTG INNER JOIN jasa ON tb_order.kode_jasa=jasa.kode_jasa INNER JOIN pelanggan on pelanggan.kode_pelanggan=tb_order.kode_pelanggan WHERE year(transaksi.TGL_transaksi)='$tahun'");
				}else{
					$qw = $db->get("transaksi.no_transaksi, transaksi.TGL_transaksi,jasa.nama_jasa,jasa.harga,tb_order.berat_cucian,tb_order.total_harga,pelanggan.nama_pelanggan","transaksi","INNER JOIN tb_order on transaksi.nomer_order=tb_order.nomer_order INNER JOIN petugas ON transaksi.kode_PTG=petugas.kode_PTG INNER JOIN jasa ON tb_order.kode_jasa=jasa.kode_jasa INNER JOIN pelanggan on pelanggan.kode_pelanggan=tb_order.kode_pelanggan");
				}
				
				$no=1;
				foreach($qw as $data){
			 ?>
			<tr>
				<td><center><?php echo $no; ?></center></td>
				<td><center><?php echo $data['no_transaksi'] ?></center></td>
				<td><center><?php echo $data['TGL_transaksi'] ?></center></td>
				<td><center><?php echo $data['nama_pelanggan'] ?></center></td>
				<td><center><?php echo $data['nama_jasa'] ?></center></td>
				<td><center><?php echo $data['harga'] ?></center></td>
				<td><center><?php echo $data['berat_cucian'] ?></center></td>
				<td><center><?php echo $data['total_harga'] ?></center></td>
			</tr>
			<?php 
			$no++;
			} 
			?>
		</table>
	</div>

    
</div>
<script type="text/javascript">
	function cetak_tahun(){
		
		tahun = $('#tahun').val();

		window.open("content_m/print_pertahun.php?tahun="+tahun);
	}
</script>

