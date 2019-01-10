<?php 
session_start();
require "proses.php";

if(isset($_POST['submit'])){
	$username = $_POST['username'];
	$password = $_POST['password'];
	$result = $db->get("*","petugas","WHERE kode_PTG='$username' AND password_PTG='$password'");
	$row = $result->rowCount();
	$data = $result->fetch();
	if( $row > 0){
		if($data['status']==="admin"){
			echo "<script>document.location.href='../index.php'</script>";
			$_SESSION['login_ldr'] = true;
			$_SESSION['kode_ptg'] = $data['kode_PTG'];
			$_SESSION['nama_ptg'] = $data['nama_PTG'];
			$_SESSION['level_ptg'] = $data['status'];
		}elseif ($data['status']==="manager") {
			echo "<script>document.location.href='../manager.php'</script>";
			$_SESSION['login_ldr'] = true;
			$_SESSION['kode_ptg'] = $data['kode_PTG'];
			$_SESSION['nama_ptg'] = $data['nama_PTG'];
			$_SESSION['level_ptg'] = $data['status'];
		}else{
			echo "<script>document.location.href='../kasir.php'</script>";
			$_SESSION['login_ldr'] = true;
			$_SESSION['kode_ptg'] = $data['kode_PTG'];
			$_SESSION['nama_ptg'] = $data['nama_PTG'];
			$_SESSION['level_ptg'] = $data['status'];
		}
		
	}else{
		echo "<script>alert('Username atau Password Salah')</script>";
		echo "<script>document.location.href='../login.php'</script>";
	}
}
?>
