<?php
include '../koneksi.php';

$nama = $_POST['nama'];
$url = $_POST['url'];
$username = $_POST['username'];
$password = $_POST['password'];

$kirim = mysqli_query($koneksi,"update setting set nama = '$nama', owner = '$url', username='$username', password = '$password' where id = '1'");

if($kirim){
    header('location:../setting?status=Sukses');
    exit();
}else{
    header('location:../setting?status=Gagal');
    exit();
}