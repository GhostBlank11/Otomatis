<?php 
include 'kon.php';
$catatan = $_GET['catatan'];
$aktivasi = $_GET['aktivasi'];
$web = $_GET['web'];
$id= $_GET['id'];

// $data = mysqli_query($koneksi,"select * from aktivasi where kode = '$aktivasi' and website = '$web'");
// $list = mysqli_fetch_array($data);
// $website = $list['website'];
// if($aktivasi != $list['kode'] | $web != $list['website']){
//     echo "kode aktivasi atau website anda tidak ditemukan silahkan hubungi admin di wa wa.me/6285156924483 atau telegram 081280224496";
    
// }else{
    // echo "$website/produk/-$id?catatan=$catatan";
    header("location:$web/produk/-$id?catatan=$catatan");
// }
?>