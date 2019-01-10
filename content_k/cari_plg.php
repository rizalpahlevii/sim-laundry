<?php 
	include "../system/proses.php";
	$query = $db->get("*","pelanggan","WHERE kode_pelanggan = '$_POST[id_pelanggan]'");
	$tampil = $query->fetch();
	$hasilnya = array('nama_pelanggan'=>$tampil['nama_pelanggan']);
	echo json_encode($hasilnya);
 ?>