	<?php 
	include 'system/proses.php';
		error_reporting(0);
 ?>
<div class="container-fluid">
	<ol class="breadcrumb">
        <li class="breadcrumb-item">
       		<a href="#">Laporan</a>
        </li>
        <li class="breadcrumb-item active">Overview</li>
    </ol>
    

    <div class="container">
    	<h3 class="text-center">Laporan Per Bulan</h3>

    	<hr>
    	<br>
    	<div class="row">
    		<form action="manager.php?p=laporan_perbulan" method="POST">
    			<div class="form-inline">
				    <label for="bulan">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Bulan&nbsp;&nbsp;&nbsp;</label>
				  			<select name="bulan" id="bulan" class="form-control">
								<option <?php if($_POST['bulan']=="01"){echo "selected";} ?> value="01">Januari</option>
								<option <?php if($_POST['bulan']=="02"){echo "selected";} ?> value="02" >Februari</option>
								<option <?php if($_POST['bulan']=="03"){echo "selected";} ?>  value="03" >Maret</option>
								<option <?php if($_POST['bulan']=="04"){echo "selected";} ?> value="04" >April</option>
								<option <?php if($_POST['bulan']=="05"){echo "selected";} ?> value="05" >Mei</option>
								<option <?php if($_POST['bulan']=="06"){echo "selected";} ?> value="06" >Juni</option>
								<option <?php if($_POST['bulan']=="07"){echo "selected";} ?> value="07" >Juli</option>
								<option <?php if($_POST['bulan']=="08"){echo "selected";} ?> value="08" >Agustus</option>
								<option <?php if($_POST['bulan']=="09"){echo "selected";} ?> value="09" >September</option>
								<option <?php if($_POST['bulan']=="10"){echo "selected";} ?> value="10" >Oktober</option>
								<option <?php if($_POST['bulan']=="11"){echo "selected";} ?> value="11" >November</option>
								<option <?php if($_POST['bulan']=="12"){echo "selected";} ?> value="12" >Desember</option>
							</select>
				    
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
				    <a href="#" class="btn btn-danger" onclick="cetak_bulan()" <?php echo $hidd_ctk; ?>><i class="fa fa-print"></i>&nbsp; Cetak</a>
				   	&nbsp;
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
					$bulan=$_POST['bulan'];
				    $tahun=$_POST['tahun'];
					$qw = $db->get("transaksi.no_transaksi, transaksi.TGL_transaksi,jasa.nama_jasa,jasa.harga,tb_order.berat_cucian,tb_order.total_harga,pelanggan.nama_pelanggan","transaksi","INNER JOIN tb_order on transaksi.nomer_order=tb_order.nomer_order INNER JOIN petugas ON transaksi.kode_PTG=petugas.kode_PTG INNER JOIN jasa ON tb_order.kode_jasa=jasa.kode_jasa INNER JOIN pelanggan on pelanggan.kode_pelanggan=tb_order.kode_pelanggan WHERE month(transaksi.TGL_transaksi) = '$bulan' AND year(transaksi.TGL_transaksi)='$tahun'");
					
				}else{
					$qw = $db->get("transaksi.no_transaksi, transaksi.TGL_transaksi,jasa.nama_jasa,jasa.harga,tb_order.berat_cucian,tb_order.total_harga,pelanggan.nama_pelanggan","transaksi","INNER JOIN tb_order on transaksi.nomer_order=tb_order.nomer_order INNER JOIN petugas ON transaksi.kode_PTG=petugas.kode_PTG INNER JOIN jasa ON tb_order.kode_jasa=jasa.kode_jasa INNER JOIN pelanggan on pelanggan.kode_pelanggan=tb_order.kode_pelanggan");
				}
				$valid_baris=$qw->rowCount();
				if($valid_baris===0){
					$notif="Data Yang Anda Cari Tidak Ada !";
				}else{
					$notif="";
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
			<tr>
				<td colspan="8">
					<center><?php echo $notif; ?></center>
				</td>
			</tr>
		</table>
	</div>

    
</div>
<script type="text/javascript">
	function cetak_bulan(){
		bulan = $('#bulan').val();
		tahun = $('#tahun').val();

		window.open("content_m/print_perbulan.php?bulan="+bulan+"&"+"tahun="+tahun);
	}
</script>

