<?php 
include '../system/proses.php';

$id = $_POST['rowid'];

		// $conn = mysqli_connect("localhost","root","","db_laundry");
		// $result = mysqli_query($conn,"SELECT * FROM pelanggan WHERE kode_pelanggan='$id'");
		// $data = mysqli_fetch_array($result);
$data = $db->get("*","pelanggan","WHERE kode_pelanggan='$id'")->fetch();





?>		
<form action="crud/simpan_pelanggan.php" method="POST">
	<div class="form-group">
		<label for="kode_pelanggan" class="col-form-label">Kode Pelanggan</label>
		<input type="text" class="form-control" id="kode_pelanggan" name="kode_pelanggan" value="<?php echo $id; ?>" readonly>
	</div>

	<div class="form-group">
		<label for="nama_pelanggan" class="col-form-label">Nama Pelanggan</label>
		<input type="text" class="form-control" id="nama_pelanggan" name="nama_pelanggan" required="" autocomplete="off" value="<?php echo $data['nama_pelanggan']; ?>">
	</div>

	<div class="form-group">
		<label for="alamat" class="col-form-label">Alamat</label>
		<input type="text" class="form-control" id="alamat" name="alamat" required="" autocomplete="off" value="<?php echo $data['alamat']; ?>">
	</div>

	<div class="form-group">
		<label for="telp" class="col-form-label">No Telephone</label>
		<input type="text" class="form-control" id="telp" name="telp" required="" autocomplete="off" value="<?php echo $data['no_telp']; ?>">
	</div>
	
	<div class="form-group">
		<label for="status" class="col-form-label">Status</label>
		<select name="status" id="status" class="form-control">
			<option disabled selected>Pilih Status</option>
			<option value="aktif" <?php if($data['status_pelanggan']=="aktif"){echo "selected";} ?>>Aktif</option>

			<option value="tidak aktif" <?php if($data['status_pelanggan']=="tidak aktif"){echo "selected";} ?>>Tidak Aktif</option>
		</select>
	</div>
	<input type="submit" name="edit_plg" class="btn btn-primary" value="Edit">
	<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
	
</form>