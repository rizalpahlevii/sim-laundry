<?php 
	include 'system/proses.php';
		$connect = mysqli_connect("localhost", "root", "", "db_laundry");
		$query = "SELECT max(kode_PTG) as maxKode FROM petugas";
		$hasil = mysqli_query($connect, $query);
		$data = mysqli_fetch_array($hasil);
		$kodebarang = $data['maxKode'];
		$nourut = (int) substr($kodebarang, 3, 3);
		$nourut++;
		$char = "PTG";
		$nomot = $char . sprintf("%03s", $nourut);
 ?>
<div class="container-fluid">
	<ol class="breadcrumb">
        <li class="breadcrumb-item">
       		<a href="#">Petugas</a>
        </li>
        <li class="breadcrumb-item active">Overview</li>
    </ol>
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo" style="margin-left: 20px;margin-bottom: 15px;">Tambah Data</button>




	<!-- Modal -->
    	<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title" id="exampleModalLabel">Input Petugas</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		      <div class="modal-body">
		        <form action="crud/simpan_petugas.php" method="POST">
		          <div class="form-group">
		            <label for="kode_petugas" class="col-form-label">Kode Petugas</label>
		            <input type="text" class="form-control" id="kode_petugas" name="kode_petugas" value="<?php echo $nomot; ?>" readonly>
		          </div>

		          <div class="form-group">
		            <label for="nama_petugas" class="col-form-label">Nama Petugas</label>
		            <input type="text" class="form-control" id="nama_petugas" name="nama_petugas" required="" autocomplete="off">
		          </div>

		          <div class="form-group">
		            <label for="password_petugas" class="col-form-label">Password</label>
		            <input type="password" class="form-control" id="password_petugas" name="password_petugas" required="" autocomplete="off">
		          </div>

		          <div class="form-group">
		            <label for="password_konf" class="col-form-label">Konfirmasi Password</label>
		            <input type="password" class="form-control" id="password_konf" name="password_konf" required="" autocomplete="off" onkeyup="cekpass()">
		          </div>

		          <div class="form-group">
		            <label for="status" class="col-form-label">Status</label>
		            <select name="status" id="status" class="form-control">
		            	<option disabled selected>Pilih Status</option>
		            	<option value="admin">Admin</option>
		            	<option value="manager">Manager</option>
		            	<option value="kasir">Kasir</option>
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
					<th><center>Kode Petugas</center></th>
					<th><center>Nama Petugas</center></th>
					<th><center>Password</center></th>
					<th><center>Status</center></th>
					<th><center>Action</center></th>
					
				</tr>
			</thead>
			<tbody>
				<?php 
					$qw=$db->get("*","petugas","WHERE kode_PTG LIKE 'PTG%' ORDER BY kode_PTG ASC");
					foreach($qw as $tamp_petugas) {


			 	?>
				<tr>				
					<td><center><?php echo $tamp_petugas['kode_PTG']; ?></center></td>
					<td><center><?php echo $tamp_petugas['nama_PTG']; ?></center></td>
					<td><center><?php echo md5($tamp_petugas['password_PTG']); ?></center></td>
					<td><center><?php echo $tamp_petugas['status']; ?></center></td>
					<td>
						<center>
							<a href="#myModalptg" class="btn btn-warning" id="custId" data-toggle="modal" data-id="<?= $tamp_petugas['kode_PTG']; ?>" style="color: #fff;"><i class="fa fa-pencil-alt"></i></a>


							
							<a href="crud/hapus_petugas.php?id=<?= $tamp_petugas['kode_PTG']; ?>" class="btn btn-danger" onclick="return confirm('Yakin Ingin Menghapus ?')"><i class="fa fa-trash-alt"></i></a>
						</center>
					</td>
				</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
</div>
<div class="modal fade" id="myModalptg" role="dialog">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				
				<h4 class="modal-tittle">
					Edit Petugas
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

