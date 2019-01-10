<?php 
include '../system/proses.php';

$id = $_POST['rowid'];


$data = $db->get("*","petugas","WHERE kode_PTG='$id'")->fetch();




?>
<form action="crud/simpan_petugas.php" method="POST">
	<div class="form-group">
		<label for="kode_petugas" class="col-form-label">Kode Petugas</label>
		<input type="text" class="form-control" id="kode_petugas" name="kode_petugas" value="<?php echo $id; ?>" readonly>
	</div>

	<div class="form-group">
		<label for="nama_petugas" class="col-form-label">Nama Petugas</label>
		<input type="text" class="form-control" id="nama_petugas" name="nama_petugas" required="" autocomplete="off" value="<?php echo $data['nama_PTG'] ?>">
	</div>

	<div class="form-group">
		<label for="password_petugas" class="col-form-label">Password</label>
		<input type="text" class="form-control" id="password_petugas" name="password_petugas" required="" autocomplete="off" value="<?php echo $data['password_PTG'] ?>">
	</div>

	<div class="form-group">
		<label for="status" class="col-form-label">Password</label>
		<select name="status" id="status" class="form-control">
			<option disabled selected>Pilih Status</option>
			<option value="admin" <?php if($data['status']=="admin"){echo "selected";} ?>>Admin</option>
			<option value="manager" <?php if($data['status']=="manager"){echo "selected";} ?>>Manager</option>
			<option value="kasir" <?php if($data['status']=="kasir"){echo "selected";} ?>>Kasir</option>
		</select>
	</div>
	<input type="submit" name="edit_ptg" value="Edit" class="btn btn-primary">
	<!-- <button type="submit" name="edit_jasa" class="btn btn-success">Update</button> -->
	<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
</form>