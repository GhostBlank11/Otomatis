<?php
include '../koneksi.php';

$id = $_POST['id'];
$kode = $_POST['kode'];
$website = $_POST['website'];
$kategori = $_POST['kategori'];
$kategori1 = $_POST['kategori1'];
$kategori2= $_POST['kategori2'];
$kategori3 = $_POST['kategori3'];
$kategori4 = $_POST['kategori4'];
$kategori5 = $_POST['kategori5'];
$kategori6 = $_POST['kategori6'];


$update = mysqli_query($koneksi,"update pulsa set kode = '$kode', web = '$website', kategori = '$kategori', kategori1 = '$kategori1', kategori2 = '$kategori2', kategori3 = '$kategori3', kategori4 = '$kategori4', kategori5 = '$kategori5', kategori6 = '$kategori6' where id = '$id'");

if ($update){
    header('location:../edit_aktivasi?status=Sukses&id='.$id);
    exit();
}else{
    header('location:../edit_aktivasi?status=Gagal&id='.$id);
    exit();
}