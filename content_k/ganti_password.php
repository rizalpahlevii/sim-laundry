<?php 
	$nama_ptg=$_SESSION['nama_ptg'];
	$kode_ptg=$_SESSION['kode_ptg'];
 ?>
<div class="container-fluid">
	<ol class="breadcrumb">
        <li class="breadcrumb-item">
       		<a href="#">Ganti Passowrd</a>
        </li>
        <li class="breadcrumb-item active">Overview</li>
    </ol>
   




    <div class="container">
		<form action="crud/gp.php" method="POST">
			<div class="row">
				<div class="col-sm-4">
					<div class="form-group">
						<label for="kode_petugas">Kode Petugas</label></center>
						<input type="text" name="kode_petugas" id="kode_petugas" class=" form-control" readonly required="" value="<?php echo $kode_ptg; ?>">
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-4">
					<div class="form-group">
						<label for="nama_petugas">Nama Petugas</label></center>
						<input type="text" name="nama_petugas" id="nama_petugas" class=" form-control" required="" value="<?php echo $nama_ptg; ?>">
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-4">
					<div class="form-group">
						<label for="password_old">Password Lama</label></center>
						<input type="text" name="password_old" id="password_old" class=" form-control" required="">
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-4">
					<div class="form-group">
						<label for="password_new">password Baru</label></center>
						<input type="text" name="password_new" id="password_new" class=" form-control" required="">
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-4">
					<div class="form-group">
						<label for="password_konf">Password Konfirmasi</label></center>
						<input type="text" name="password_conf" id="password_konf" class=" form-control" required="">
					</div>
				</div>
			</div>
			<div class="row">
				<input type="submit" name="ganti" class="btn btn-primary" value="Ubah" style="margin-left: 20px;">
			</div>
		</form>
	</div>
</div>

