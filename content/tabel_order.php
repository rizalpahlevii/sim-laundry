<?php 
	include '../system/proses.php';

 ?>

 <table class="table table-striped table-bordered table-hover">
			
				<tr>
					
					<th><center>No Order</center></th>
					<th><center>Tgl Masuk</center></th>
					<th><center>Tgl Selesai</center></th>
					<th><center>Nama Jasa</center></th>
					<th><center>Harga</center></th>
					<th><center>Berat</center></th>
					<th><center>Total</center></th>
					<th><center>Action</center></th>
					
				</tr>
			
				<?php 
				$qr = $db->get("tb_order.nomer_order , tb_order.tanggal_order , tb_order.TGL_rencana_selesai, jasa.nama_jasa , jasa.harga , tb_order.berat_cucian, tb_order.total_harga","tb_order","INNER JOIN jasa ON tb_order.kode_jasa=jasa.kode_jasa ORDER BY nomer_order DESC LIMIT 1");
				foreach($qr as $tamp_order){
			 ?>

				<tr>
					<td><center><?php echo $tamp_order['nomer_order']; ?></center></td>
					<td><center><?php echo $tamp_order['tanggal_order']; ?></center></td>
					<td><center><?php echo $tamp_order['TGL_rencana_selesai']; ?></center></td>
					<td><center><?php echo $tamp_order['nama_jasa']; ?></center></td>
					<td><center><?php echo $tamp_order['harga']; ?></center></td>
					<td><center><?php echo $tamp_order['berat_cucian']; ?></center></td>
					<td><center><?php echo $tamp_order['total_harga']; ?></center></td>
					<td>
						<center>
							<a href="#" onclick="kp('<?php echo $tamp_order["nomer_order"]; ?>')" class="btn btn-danger"><i class="fa fa-trash-alt"></i></a>
						</center>
					</td>
					
				</tr>
				<?php } ?>
		
		</table>
