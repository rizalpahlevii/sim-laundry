<?php 
	

	
	include "../system/proses.php";
	$id = $_POST['id_order'];
	$hapus = $db->delete("tb_order","nomer_order='$id'");
	if( $hapus ){
		echo "Data Berhasil Dihapus!";
	}else{
		echo "Data Gagal Dihapus!";
	}
 ?>