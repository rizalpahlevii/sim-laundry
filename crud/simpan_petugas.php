<?php 
	include "../system/proses.php";

	if( isset($_POST['submit']) ){
		if($_POST['password_petugas']===$_POST['password_konf']){

			$simpan=$db->insert("petugas","'$_POST[kode_petugas]',
									'$_POST[nama_petugas]',
									'$_POST[password_petugas]',
									'$_POST[status]'");
			if( $simpan ){
				echo "<script>alert('Data Berhasil Disimpan')</script>";
				echo "<script>document.location.href='../index.php?p=petugas'</script>";
			}else{
				echo "<script>alert('Data Gagal Disimpan')</script>";
				echo "<script>document.location.href='../index.php?p=petugas'</script>";
			}
		}else{
			echo "<script>alert('Password Konfirmasi Tidak Sesuaili')</script>";
			echo "<script>document.location.href='../index.php?p=petugas'</script>";
		}

	}else{
		$edit=$db->update("petugas","kode_PTG='$_POST[kode_petugas]',
									nama_PTG='$_POST[nama_petugas]',
									password_PTG='$_POST[password_petugas]',
									status='$_POST[status]'",
									"kode_PTG = '$_POST[kode_petugas]'");

		if( $edit ){
			echo "<script>alert('Data Berhasil Diupdate')</script>";
			echo "<script>document.location.href='../index.php?p=petugas'</script>";
		}else{
			echo "<script>alert('Data Gagal Diupdate')</script>";
			echo "<script>document.location.href='../index.php?p=petugas'</script>";
		}

	}


 ?>