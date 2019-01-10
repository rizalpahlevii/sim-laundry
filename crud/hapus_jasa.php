<?php 
	

	
	include "../system/proses.php";
	$id = $_GET['id'];
	$hapus = $db->delete("jasa","kode_jasa='$id'");
	if( $hapus ){
		echo "<script>alert('Data Berhasil Dihapus')</script>";
		echo "<script>document.location.href='../index.php?p=jasa'</script>";
	}else{
		echo "<script>alert('Data Gagal Dihapus')</script>";
		echo "<script>document.location.href='../index.php?p=jasa'</script>";
	}
 ?>