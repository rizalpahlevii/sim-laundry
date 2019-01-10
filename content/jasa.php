	<?php 
	include 'system/proses.php';
		$connect = mysqli_connect("localhost", "root", "", "db_laundry");
		$query = "SELECT max(kode_jasa) as maxKode FROM jasa";
		$hasil = mysqli_query($connect, $query);
		$data = mysqli_fetch_array($hasil);
		$kodebarang = $data['maxKode'];
		$nourut = (int) substr($kodebarang, 3, 3);
		$nourut++;
		$char = "JS";
		$nomot = $char . sprintf("%03s", $nourut);
 ?>
<div class="container-fluid">
	<ol class="breadcrumb">
        <li class="breadcrumb-item">
       		<a href="#">Jasa</a>
        </li>
        <li class="breadcrumb-item active">Overview</li>
    </ol>
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo" style="margin-left: 20px;margin-bottom: 15px;">Tambah Data</button>




	<!-- Modal -->
    	<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title" id="exampleModalLabel">Input Jasa</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		      <div class="modal-body">
		        <form action="crud/simpan_jasa.php" method="POST" id="form-jasa">
		          <div class="form-group">
		            <label for="kode_jasa" class="col-form-label">Kode Jasa</label>
		            <input type="text" class="form-control" id="kode_jasa" name="kode_jasa" value="<?php echo $nomot; ?>" readonly>
		          </div>

		          <div class="form-group">
		            <label for="nama_jasa" class="col-form-label">Nama Jasa</label>
		            <input type="text" class="form-control" id="nama_jasaa" name="nama_jasa" required="" autocomplete="off">
		          </div>

		          <div class="form-group">
		            <label for="harga" class="col-form-label">Harga</label>
		            <input type="text" class="form-control" id="hargaa" name="harga" required="" autocomplete="off">
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
		<table id="tb-petugas" class="table table-striped table-bordered table-hover" >
			<thead>
				<tr>			
					<th><center>Kode Jasa</center></th>
					<th><center>Nama Jasa</center></th>
					<th><center>Harga</center></th>
					<th><center>Action</center></th>
					
				</tr>
			</thead>
			<tbody>
				<?php 
					$qw=$db->get("*","jasa","ORDER BY kode_jasa ASC");
					foreach($qw as $tamp_jasa) {


			 	?>
				<tr>				
					<td><center><?php echo $tamp_jasa['kode_jasa']; ?></center></td>
					<td><center><?php echo $tamp_jasa['nama_jasa']; ?></center></td>
					<td><center><?php echo $tamp_jasa['harga']; ?></center></td>
					
					<td>
						<center>
							<a href="#myModal" class="btn btn-warning" id="custId" data-toggle="modal" data-id="<?= $tamp_jasa['kode_jasa']; ?>" style="color: #fff;"><i class="fa fa-pencil-alt"></i></a>



							<a href="crud/hapus_jasa.php?id=<?= $tamp_jasa['kode_jasa']; ?>" class="btn btn-danger" onclick="return confirm('Yakin Ingin Menghapus ?')"><i class="fa fa-trash-alt"></i></a>
						</center>
					</td>
				</tr>
				<?php } ?>
			</tbody>
			
		</table>
	</div>
</div>
<div class="modal fade" id="myModal" role="dialog">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				
				<h4 class="modal-tittle">
					Edit Jasa
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

