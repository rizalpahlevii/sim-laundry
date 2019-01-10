<?php 
include "../system/proses.php";
$query = $db->get("*","jasa","WHERE kode_jasa = '$_POST[kode_jasa]'");
$tampil = $query->fetch();
$hasilnya = array('nama_jasa'=>$tampil['nama_jasa'],
	'harga_jasa'=>$tampil['harga']);
echo json_encode($hasilnya);
?>