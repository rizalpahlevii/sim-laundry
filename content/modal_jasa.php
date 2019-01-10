<?php 
include '../system/proses.php';

$id = $_POST['rowid'];

$data = $db->get("*","jasa","WHERE kode_jasa='$id'")->fetch();



?>
<form action="crud/simpan_jasa.php" method="POST">
	<div class="form-group">
		<label for="kode_jasa" class="col-form-label">Kode Jasa</label>
		<input type="text" class="form-control" id="kode_jasa" name="kode_jasa" value="<?php echo $id ?>" readonly >
	</div>

	<div class="form-group">
		<label for="nama_jasa" class="col-form-label">Nama Jasa</label>
		<input type="text" class="form-control" id="nama_jasa" name="nama_jasa" value="<?php echo $data['nama_jasa']; ?>" required="" autocomplete="off">
	</div>

	<div class="form-group">
		<label for="harga" class="col-form-label">Harga</label>
		<input type="text" class="form-control" id="harga" name="harga" value="<?php echo $data['harga']; ?>" required="" autocomplete="off"> 
	</div>
	<input type="submit" name="edit_jasa" value="Edit" class="btn btn-primary">
	<!-- <button type="submit" name="edit_jasa" class="btn btn-success">Update</button> -->
	<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
</form>