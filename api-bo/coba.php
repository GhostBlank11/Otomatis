<?php
include '../simple_html_dom.php';
include 'kon.php';
$web = $_GET['link'];
$kategori = $_GET['kategori'];
$token = $_GET['token'];
$ket = $_GET['ket'];


$data = mysqli_query($koneksi,"select * from pulsa where kode = '$token' and web = '$web'");
$list = mysqli_fetch_array($data);
$website = $list['website'];
if($token != $list['kode'] | $web != $list['web']){
     $json[] = array( 
    "id" => "error",
    "Judul"=> "Kode Aktivasi salah",
    "harga" => "Hubungi Solusi Media",
    "link" => "", 
    );
    echo json_encode($json);
}else{
    $url= "https://20.70.234.63:81/produk/produk.php?web=".$web."&kategori=".$kategori;
    $ch = curl_init(); 
    
    curl_setopt($ch, CURLOPT_URL, $url);
    
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
    $output = curl_exec($ch); 
    curl_close($ch); 
    echo $output;
    
    $ch = curl_init(); 

    // set url 
    curl_setopt($ch, CURLOPT_URL,$url);

    // return the transfer as a string 
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 

    // $output contains the output string 
    $output = curl_exec($ch); 

    // tutup curl 
    curl_close($ch);   
    echo $output;




}

?>



























