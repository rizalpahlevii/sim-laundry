<?php
	include '../system/proses.php';
	if(isset($_POST['ganti'])){
		$id_petugas = $_POST['kode_petugas'];
		$username = $_POST['nama_petugas'];
		$password_old = $_POST['password_old'];
		$password_new = $_POST['password_new'];
		$password_conf =$_POST['password_conf'];
		$result = $db->get("*","petugas","WHERE kode_PTG='$id_petugas'");
		$data = $result->fetch();
		

		if($password_old==$data['password_PTG']){
			if(strlen($password_new)>=5){
				if($password_new==$password_conf){
					$edit = $db->update("petugas","password_PTG='$password_new',nama_PTG='$username'","kode_PTG='$id_petugas'");
					if($edit){
						echo "<script>alert('Password Berhasil Diubah')</script>";
						echo "<script>document.location.href='../kasir.php?p=ganti_password'</script>";
					}else{
						echo "<script>alert('Password Gagal Diubah')</script>";
						echo "<script>document.location.href='../kasir.php?p=ganti_password'</script>";
					}
				}else{
					echo "<script>alert('Password Konfirmasi Tidak Sesuai')</script>";
					echo "<script>document.location.href='../kasir.php?p=ganti_password'</script>";
				}
			}else{
				echo "<script>alert('Minimal Password Baru 5 Karakter')</script>";
				echo "<script>document.location.href='../kasir.php?p=ganti_password'</script>";
			}
		}else{
			echo "<script>alert('Password Lama Tidak Sesuai')</script>";
			echo "<script>document.location.href='../kasir.php?p=ganti_password'</script>";
		}
	}
 ?>