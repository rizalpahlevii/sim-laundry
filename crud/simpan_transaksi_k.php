<?php 
	include '../system/proses.php';
	if( isset($_POST['simpan']) ){
		$simpan=$db->insert("transaksi","'$_POST[no_transaksi]',
									'$_POST[tgl_ini]',
									'$_POST[bayar]',
									'$_POST[kembali]',
									'$_POST[kode_ptg]',
									'$_POST[no_order]'");
		$edit = $db->update("tb_order","status_cucian='sudah diambil'","nomer_order = '$_POST[no_order]'");


		if( $simpan || $edit ){
			
			
			echo "<script>alert('Transaksi Berhasil')</script>";
			echo "<script>window.open('../struk/struk_transaksi.php?id=$_POST[no_transaksi]')</script>";
			echo "<script>document.location.href='../kasir.php?p=transaksi'</script>";
		}else{
			echo "<script>alert('Transaksi Gagal')</script>";
			echo "<script>document.location.href='../kasir.php?p=transaksi'</script>";
		}
	}
 ?>