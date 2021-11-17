<?php
session_start();
include "config/inc.connection.php";

 // 	$txtUsername 	= ;
	// $txtPassword	= ;
	
	$txtUsername	= mysqli_real_escape_string($koneksi,$_POST['username']);
	$txtPassword 	= mysqli_real_escape_string($koneksi,$_POST['password']);
		
	$cekLogin		= mysqli_query($koneksi,"SELECT * FROM ms_user WHERE username_user='".$txtUsername."' AND password_user='".md5($txtPassword)."' AND status_user='Active'");

	
	if(mysqli_num_rows($cekLogin)==1){
		$login = mysqli_fetch_array($cekLogin);
		$_SESSION['kode_user'] 	= $login['kode_user'];
		
		echo '<script>window.location="media.php"</script>';
		
	}else{
		$_SESSION['pesan'] = 'Username dan password anda salah';
		echo '<script>window.location="index.php"</script>';
	}

?>