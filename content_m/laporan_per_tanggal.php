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
    	<h3 class="text-center">Laporan Per Tanggal</h3>
    	<hr>
    	<br>
    	<div class="row">
    		<form action="manager.php?p=laporan_per_tanggal" method="POST">
    			<div class="form-inline">
				    <label for="tgl_awal">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Tanggal Awal&nbsp;&nbsp;&nbsp;</label>
				    <input type="date" name="tgl_awal" class="form-control" id="tgl_awal"  value="<?php echo $_POST['tgl_awal']; ?>" required="">
				    
				    <label for="tgl_akhir">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Tanggal Akhir&nbsp;&nbsp;&nbsp;</label>
				    <input type="date" name="tgl_akhir" class="form-control" id="tgl_akhir"  value="<?php echo $_POST['tgl_akhir']; ?>" required="">
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
				   
				    <a href="#" class="btn btn-danger" onclick="cetak_tanggal()" <?php echo $hidd_ctk; ?>><i class="fa fa-print"></i>&nbsp; Cetak</a>
				   	&nbsp;
				    <input type="reset" name="reset" value="Reset" class="btn btn-warning" style="color: #fff;">
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

						$tgl_awal=$_POST['tgl_awal'];
						$tgl_akhir=$_POST['tgl_akhir'];
						$qw = $db->get("transaksi.no_transaksi, transaksi.TGL_transaksi,jasa.nama_jasa,jasa.harga,tb_order.berat_cucian,tb_order.total_harga,pelanggan.nama_pelanggan","transaksi","INNER JOIN tb_order on transaksi.nomer_order=tb_order.nomer_order INNER JOIN petugas ON transaksi.kode_PTG=petugas.kode_PTG INNER JOIN jasa ON tb_order.kode_jasa=jasa.kode_jasa INNER JOIN pelanggan on pelanggan.kode_pelanggan=tb_order.kode_pelanggan WHERE transaksi.TGL_transaksi >= '$tgl_awal' AND transaksi.TGL_transaksi <= '$tgl_akhir'");
					
					

				}else{
					$qw = $db->get("transaksi.no_transaksi, transaksi.TGL_transaksi,jasa.nama_jasa,jasa.harga,tb_order.berat_cucian,tb_order.total_harga,pelanggan.nama_pelanggan","transaksi","INNER JOIN tb_order on transaksi.nomer_order=tb_order.nomer_order INNER JOIN petugas ON transaksi.kode_PTG=petugas.kode_PTG INNER JOIN jasa ON tb_order.kode_jasa=jasa.kode_jasa INNER JOIN pelanggan on pelanggan.kode_pelanggan=tb_order.kode_pelanggan ORDER BY transaksi.TGL_transaksi ASC");
				}
				$valid_baris=$qw->rowCount();
				$no=1;
				if($valid_baris===0){
					$notif="Data Yang Anda Cari Tidak Ada !";
				}else{
					$notif="";
				}
				foreach($qw as $data){
			 ?>
			<tr>
				<td><center><?php echo $no; ?></center></td>
				<td><center><?php echo $data['no_transaksi'] ?></center></td>
				<td><center><?php echo $data['TGL_transaksi'] ?></center></td>
				<td><center><?php echo $data['nama_pelanggan'] ?></center></td>
				<td><center><?php echo $data['nama_jasa'] ?></center></td>
				<td><center><?php echo "Rp. " . number_format($data['harga'],2,',','.'); ?></center></td>
				<td><center><?php echo $data['berat_cucian'] ?></center></td>
				<td><center><?php echo "Rp. " . number_format($data['total_harga'],2,',','.'); ?></center></td>
			</tr>
			
			<?php 
			$no++;
			} 
			?>
			<tr>
				<td colspan="8">
					<center><?php echo $notif; ?></center>
				</td>
			</tr>
		</table>
	</div>

    
</div>
<script type="text/javascript">
	function cetak_tanggal(){
		tl = $('#tgl_awal').val();
		tg = $('#tgl_akhir').val();

		window.open("content_m/print_pertanggal.php?tgl_awal="+tl+"&"+"tgl_akhir="+tg);
	}
</script>

