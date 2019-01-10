<?php 
	include "../system/proses.php";

	if( isset($_POST['submit']) ){
		$simpan=$db->insert("pelanggan","'$_POST[kode_pelanggan]',
									'$_POST[nama_pelanggan]',
									'$_POST[alamat]',
									'$_POST[telp]',
									'$_POST[status]'");
		if( $simpan ){
			echo "<script>alert('Data Berhasil Disimpan')</script>";
			echo "<script>document.location.href='../index.php?p=pelanggan'</script>";
		}else{
			echo "<script>alert('Data Gagal Disimpan')</script>";
			echo "<script>document.location.href='../index.php?p=pelanggan'</script>";
		}
	}else{
		$edit=$db->update("pelanggan","kode_pelanggan='$_POST[kode_pelanggan]',
									nama_pelanggan='$_POST[nama_pelanggan]',
									alamat='$_POST[alamat]',
									no_telp='$_POST[telp]',
									status_pelanggan='$_POST[status]'","kode_pelanggan='$_POST[kode_pelanggan]'");
		if( $edit ){
			echo "<script>alert('Data Berhasil Di Update')</script>";
			echo "<script>document.location.href='../index.php?p=pelanggan'</script>";
		}else{
			echo "<script>alert('Data Gagal Di Update')</script>";
			echo "<script>document.location.href='../index.php?p=pelanggan'</script>";
		}
	}


 ?>