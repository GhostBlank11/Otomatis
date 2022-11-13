<?php
include '../koneksi.php';


$kode = $_POST['kode'];
$website = $_POST['website'];
$kategori = $_POST['kategori'];
$kategori1 = $_POST['kategori1'];
$kategori2= $_POST['kategori2'];
$kategori3 = $_POST['kategori3'];
$kategori4 = $_POST['kategori4'];
$kategori5 = $_POST['kategori5'];
$kategori6 = $_POST['kategori6'];


$update = mysqli_query($koneksi,"insert into pulsa values('','$kode','$website','$kategori','$kategori1', '$kategori2','$kategori3','$kategori4','$kategori5','$kategori6')");

if ($update){
    header('location:../home?status=Sukses');
    exit();
}else{
    header('location:../home?status=Gagal');
    exit();
}