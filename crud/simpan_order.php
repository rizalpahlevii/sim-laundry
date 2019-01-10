<?php 
	include '../system/proses.php';
	// Cek kode Pelanggan
	if(empty($_POST['id_pelanggan'])){
		$kp = "Non Pelanggan";
	}else{
		$kp = $_POST['id_pelanggan'];
	}


	
		$simpan = $db->insert("tb_order","'$_POST[no_order]',
											'$_POST[tgl_masuk]',
											'$_POST[tgl_selesai]',
											'$_POST[berat]',
											'$_POST[total]',
											'$_POST[status]',
											'$kp',
											'$_POST[kode_ptg]',
											'$_POST[kode_jasa]'");
		if( $simpan ){
			echo "Data Berhasil Ditambahkan !";
		}else{
			echo "Data Gagal Ditambahkan !";
			
		}
	
 ?>