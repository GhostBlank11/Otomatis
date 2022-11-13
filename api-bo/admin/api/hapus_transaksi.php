<?php
include '../koneksi.php';

$id=$_GET['id'];

$hapus = mysqli_query($koneksi,"delete from pulsa where id = '$id'");

if($hapus){
    header('location:../home?status=Sukses');
    exit();
}else{
    header('location:../home?status=Gagal');
    exit();
}