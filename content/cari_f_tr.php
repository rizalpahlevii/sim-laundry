<?php 
include "../system/proses.php";
$id=$_POST['no_order'];

$join_pelanggan = $db->get("tb_order.nomer_order, pelanggan.nama_pelanggan,tb_order.kode_pelanggan","tb_order","INNER JOIN pelanggan ON pelanggan.kode_pelanggan=tb_order.kode_pelanggan WHERE tb_order.nomer_order='$id' AND tb_order.status_cucian='belum diambil'")->fetch();


$join_jasa=$db->get("jasa.nama_jasa, jasa.harga, tb_order.berat_cucian, tb_order.total_harga","tb_order","INNER JOIN jasa on tb_order.kode_jasa=jasa.kode_jasa WHERE tb_order.nomer_order='$id' AND tb_order.status_cucian='belum diambil'")->fetch();

$hasilnya = array('nama_pelanggan'=>$join_pelanggan['nama_pelanggan'],
	'nama_jasa'	 	  =>$join_jasa['nama_jasa'],
	'harga'			  =>$join_jasa['harga'],
	'berat_cucian'	  =>$join_jasa['berat_cucian'],
	'total_harga' 	  =>$join_jasa['total_harga'],);
echo json_encode($hasilnya);
?>