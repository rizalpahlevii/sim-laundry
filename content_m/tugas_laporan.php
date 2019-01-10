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
    	<h3 class="text-center">Tugas Laporan</h3>
    	<hr>
    	<br>
    	
    	<br>
		<table class="table table-hover table-bordered">
			<tr>
				<th><center>No</center></th>
				<th><center>Nama Pelanggan</center></th>
				<th><center>Nama Jasa</center></th>
				<th><center>Harga</center></th>
				<th><center>Berat</center></th>
				<th><center>Total</center></th>
				<th><center>Status</center></th>
			</tr>
			<?php
				
			
						$qw = $db->get("pelanggan.nama_pelanggan,jasa.nama_jasa,jasa.harga,tb_order.berat_cucian,tb_order.total_harga,tb_order.status_cucian","jasa","INNER JOIN tb_order ON tb_order.kode_jasa=jasa.kode_jasa INNER JOIN pelanggan ON pelanggan.kode_pelanggan=tb_order.kode_pelanggan WHERE tb_order.kode_jasa='JS003' AND tb_order.berat_cucian>10");
					
					

				$no=1;
				foreach($qw as $data){
			 ?>
			<tr>
				<td><center><?php echo $no; ?></center></td>
				<td><center><?php echo $data['nama_pelanggan']; ?></center></td>
				<td><center><?php echo $data['nama_jasa'] ?></center></td>
				<td><center><?php echo $data['harga'] ?></center></td>
				<td><center><?php echo $data['berat_cucian'] ?></center></td>
				<td><center><?php echo $data['total_harga'] ?></center></td>
				<td><center><?php echo $data['status_cucian'] ?></center></td>
			</tr>
			
			<?php 
			$no++;
			} 
			?>
			
		</table>
	</div>

    
</div>
<script type="text/javascript">


