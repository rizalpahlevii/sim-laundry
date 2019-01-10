<?php 
	include 'system/proses.php';
		$connect = mysqli_connect("localhost", "root", "", "db_laundry");
		$query = "SELECT max(kode_pelanggan) as maxKode FROM pelanggan";
		$hasil = mysqli_query($connect, $query);
		$data = mysqli_fetch_array($hasil);
		$kodebarang = $data['maxKode'];
		$nourut = (int) substr($kodebarang, 4, 4);
		$nourut++;
		$char = "PLG";
		$nomot = $char . sprintf("%04s", $nourut);
 ?>
<div class="container-fluid">
	<ol class="breadcrumb">
        <li class="breadcrumb-item">
       		<a href="#">Pelanggan</a>
        </li>
        <li class="breadcrumb-item active">Overview</li>
    </ol>
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo" style="margin-left: 20px;margin-bottom: 15px;">Tambah Data</button>




	<!-- Modal -->
    	<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title" id="exampleModalLabel">Input Pelanggan</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		      <div class="modal-body">
		        <form action="crud/simpan_pelanggan.php" method="POST">
		          <div class="form-group">
		            <label for="kode_pelanggan" class="col-form-label">Kode Pelanggan</label>
		            <input type="text" class="form-control" id="kode_pelanggan" name="kode_pelanggan" value="<?php echo $nomot; ?>" readonly>
		          </div>

		          <div class="form-group">
		            <label for="nama_pelanggan" class="col-form-label">Nama Pelanggan</label>
		            <input type="text" class="form-control" name="nama_pelanggan" required="" autocomplete="off">
		          </div>

		          <div class="form-group">
		            <label for="alamat" class="col-form-label">Alamat</label>
		            <input type="text" class="form-control" id="alamat" name="alamat" required="" autocomplete="off">
		          </div>

		           <div class="form-group">
		            <label for="telp" class="col-form-label">No Telephone</label>
		            <input type="text" class="form-control" id="telp" name="telp" required="" autocomplete="off">
		          </div>
					
				 <div class="form-group">
				 	<label for="status" class="col-form-label">Status</label>
		            <select name="status" id="status" class="form-control">
		            	<option disabled selected>Pilih Status</option>
		            	<option value="aktif">Aktif</option>
		            	<option value="tidak aktif">Tidak Aktif</option>
		            </select>
		          </div>
		          	<input type="submit" name="submit" class="btn btn-primary" value="Simpan">
					 <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
		       		 
		        </form>
		      </div>
		      
		    </div>
		  </div>
		</div>
		<!-- Akhir Modal -->




    <div class="container">
		<table class="table table-striped table-bordered table-hover" id="tb-petugas">
			<thead>
				<tr>			
					<th><center>Kode Pelanggan</center></th>
					<th><center>Nama Pelanggan</center></th>
					<th><center>Alamat</center></th>
					<th><center>Telephon</center></th>
					<th><center>Status Pelanggan</center></th>
					<th><center>Action</center></th>
					
				</tr>
			</thead>
			<tbody>
				<?php 
					$qw=$db->get("*","pelanggan","WHERE kode_pelanggan LIKE 'PLG%' ORDER BY kode_pelanggan ASC");
					foreach($qw as $tamp_pelanggan) {


			 	?>
				<tr>				
					<td><center><?php echo $tamp_pelanggan['kode_pelanggan']; ?></center></td>
					<td><center><?php echo $tamp_pelanggan['nama_pelanggan']; ?></center></td>
					<td><center><?php echo $tamp_pelanggan['alamat']; ?></center></td>
					<td><center><?php echo $tamp_pelanggan['no_telp']; ?></center></td>
					<td><center><?php echo $tamp_pelanggan['status_pelanggan']; ?></center></td>
					<td>
						<center>
							<a href="#myModalplg" class="btn btn-warning" id="custId" data-toggle="modal" data-id="<?= $tamp_pelanggan['kode_pelanggan']; ?>" style="color: #fff;"><i class="fa fa-pencil-alt"></i></a>


							<a href="crud/hapus_pelanggan.php?id=<?= $tamp_pelanggan['kode_pelanggan']; ?>" class="btn btn-danger" onclick="return confirm('Yakin Ingin Menghapus ?')"><i class="fa fa-trash-alt"></i></a>
						</center>
					</td>
				</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
</div>
<div class="modal fade" id="myModalplg" role="dialog">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				
				<h4 class="modal-tittle">
					Edit Pelanggan
				</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
			</div>
			<div class="modal-body">
				<div class="fatched-data">
					
				</div>
			</div>
			
		</div>
	</div>
</div>
