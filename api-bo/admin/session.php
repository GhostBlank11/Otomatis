<?php

session_start();
include 'koneksi.php';
$username = $_POST['username'];
$password = $_POST['password'];
$remember = 'on';

$cek = mysqli_query ($koneksi,"select * from setting where username = '$username' and password = '$password'");
$data = mysqli_fetch_array($cek);
$row = mysqli_num_rows($cek);

if ($row == 1){
	
		$_SESSION['login'] = "login";
		$_SESSION['password'] = $data['password'];
		
		
	if ($remember == 'on')
   {
      //set waktu saat ini
      $time = time();
      //set cookie
      setcookie('login', 'login', $time + 3600);
      setcookie('username', $username, $time + 3600);
      setcookie('password', $password, $time + 3600);
      setcookie('id', $data['id'], $time + 3600);
   }
		
		header('location:home');
	
}else{
	$_SESSION['login'] = 'gagal';
	header('location:login?'.$password.$username);
}

?>