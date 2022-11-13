<?php
include '../simple_html_dom.php';
include 'kon.php';
$web = $_GET['link'];
$katgor = $_GET['kategori'];
$token = $_GET['token'];
$ket = $_GET['ket'];


$data = mysqli_query($koneksi,"select * from pulsa where kode = '$token' and web = '$web'");
$list = mysqli_fetch_array($data);
$website = $list['website'];
$kat = $list['kategori'];

if ($ket == ""){
if ($kat == ""){
    $katgor = $katgor;
}else{
    $katgor = $kat;
}
    
}else if ($ket == "1"){
  if ($kat == ""){
    $katgor = $katgor;
}else{
    $katgor = $list['kategori1'];
}  
}else if ($ket == "2"){
  if ($kat == ""){
    $katgor = $katgor;
}else{
    $katgor = $list['kategori2'];
}  
}else if ($ket == "3"){
  if ($kat == ""){
    $katgor = $katgor;
}else{
    $katgor = $list['kategori3'];
}  
}else if ($ket == "4"){
  if ($kat == ""){
    $katgor = $katgor;
}else{
    $katgor = $list['kategori4'];
}  
}else if ($ket == "5"){
  if ($kat == ""){
    $katgor = $katgor;
}else{
    $katgor = $list['kategori5'];
}  
}else if ($ket == "6"){
  if ($kat == ""){
    $katgor = $katgor;
}else{
    $katgor = $list['kategori6'];
}  
}
if($token != $list['kode'] | $web != $list['web']){
     $json[] = array( 
    "id" => "error",
    "Judul"=> "Kode Aktivasi salah",
    "harga" => "Hubungi Solusi Media",
    "link" => "", 
    );
    echo json_encode($json);
}else{
    $ch = curl_init(); 
    
    curl_setopt($ch, CURLOPT_URL, $web."/kategori/".$katgor."&page=1&urutan=murah");
    
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
    $output = curl_exec($ch); 
    curl_close($ch); 
    // echo $output;




$html = str_get_html($output);
$data = $html->find('info-wrap');
foreach($html->find('div') as $element) {
    if ($element->class === 'title') {
        $title[] = $element->innertext;
       
    }
}
foreach($html->find('img') as $element) {
    if ($element->class === 'produk-list-utama') {
        $foto[] = $element->src;
       
    }
}
foreach($html->find('p') as $element) {
    if ($element->class === 'price') {
        $harga[] = $element->innertext;
       
    }
}

foreach($html->find('div') as $element) {
    
    
    
    if ($element->class === 'col-md-3 col-lg-3 col-6 mb-4') {
       foreach($element->find('a') as $elem) {
       $link[] = $elem->getAttribute('href') ;
       }
    }
}


    $ch = curl_init(); 
    
    curl_setopt($ch, CURLOPT_URL, $web."/kategori/".$katgor."&page=2&urutan=murah");
    
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
    $output = curl_exec($ch); 
    curl_close($ch); 

$html = str_get_html($output);
$data = $html->find('info-wrap');
foreach($html->find('div') as $element) {
    if ($element->class === 'title') {
        $title[] = $element->innertext;
       
    }
}
foreach($html->find('p') as $element) {
    if ($element->class === 'price') {
        $harga[] = $element->innertext;
       
    }
}
foreach($html->find('img') as $element) {
    if ($element->class === 'produk-list-utama') {
        $foto[] = $element->src;
       
    }
}
foreach($html->find('div') as $element) {
    
    
    
    if ($element->class === 'col-md-3 col-lg-3 col-6 mb-4') {
       foreach($element->find('a') as $elem) {
       $link[] = $elem->getAttribute('href') ;
       }
    }
}

    $ch = curl_init(); 
    
    curl_setopt($ch, CURLOPT_URL, $web."/kategori/".$katgor."&page=3&urutan=murah");
    
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
    $output = curl_exec($ch); 
    curl_close($ch); 

$html = str_get_html($output);
$data = $html->find('info-wrap');
foreach($html->find('div') as $element) {
    if ($element->class === 'title') {
        $title[] = $element->innertext;
       
    }
}
foreach($html->find('p') as $element) {
    if ($element->class === 'price') {
        $harga[] = $element->innertext;
       
    }
}
foreach($html->find('img') as $element) {
    if ($element->class === 'produk-list-utama') {
        $foto[] = $element->src;
       
    }
}
foreach($html->find('div') as $element) {
    
    
    
    if ($element->class === 'col-md-3 col-lg-3 col-6 mb-4') {
       foreach($element->find('a') as $elem) {
       $link[] = $elem->getAttribute('href') ;
       }
    }
}


    $ch = curl_init(); 
    
    curl_setopt($ch, CURLOPT_URL, $web."/kategori/".$katgor."&page=4&urutan=murah");
    
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
    $output = curl_exec($ch); 
    curl_close($ch); 
   
$html = str_get_html($output);
$data = $html->find('info-wrap');
foreach($html->find('div') as $element) {
    if ($element->class === 'title') {
        $title[] = $element->innertext;
       
    }
}
foreach($html->find('p') as $element) {
    if ($element->class === 'price') {
        $harga[] = $element->innertext;
       
    }
}
foreach($html->find('img') as $element) {
    if ($element->class === 'produk-list-utama') {
        $foto[] = $element->src;
       
    }
}
foreach($html->find('div') as $element) {
    
    
    
    if ($element->class === 'col-md-3 col-lg-3 col-6 mb-4') {
       foreach($element->find('a') as $elem) {
       $link[] = $elem->getAttribute('href') ;
       }
    }
}



 $ch = curl_init(); 
    
    curl_setopt($ch, CURLOPT_URL, $web."/kategori/".$katgor."&page=5&urutan=murah");
    
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
    $output = curl_exec($ch); 
    curl_close($ch); 
   
$html = str_get_html($output);
$data = $html->find('info-wrap');
foreach($html->find('div') as $element) {
    if ($element->class === 'title') {
        $title[] = $element->innertext;
       
    }
}
foreach($html->find('p') as $element) {
    if ($element->class === 'price') {
        $harga[] = $element->innertext;
       
    }
}
foreach($html->find('img') as $element) {
    if ($element->class === 'produk-list-utama') {
        $foto[] = $element->src;
       
    }
}
foreach($html->find('div') as $element) {
    
    
    
    if ($element->class === 'col-md-3 col-lg-3 col-6 mb-4') {
       foreach($element->find('a') as $elem) {
       $link[] = $elem->getAttribute('href') ;
       }
    }
}


 $ch = curl_init(); 
    
    curl_setopt($ch, CURLOPT_URL, $web."/kategori/".$katgor."&page=6&urutan=murah");
    
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
    $output = curl_exec($ch); 
    curl_close($ch); 
   
$html = str_get_html($output);
$data = $html->find('info-wrap');
foreach($html->find('div') as $element) {
    if ($element->class === 'title') {
        $title[] = $element->innertext;
       
    }
}
foreach($html->find('img') as $element) {
    if ($element->class === 'produk-list-utama') {
        $foto[] = $element->src;
       
    }
}
foreach($html->find('p') as $element) {
    if ($element->class === 'price') {
        $harga[] = $element->innertext;
       
    }
}

foreach($html->find('div') as $element) {
    
    
    
    if ($element->class === 'col-md-3 col-lg-3 col-6 mb-4') {
       foreach($element->find('a') as $elem) {
       $link[] = $elem->getAttribute('href') ;
       }
    }
}


 $ch = curl_init(); 
    
    curl_setopt($ch, CURLOPT_URL, $web."/kategori/".$katgor."&page=7&urutan=murah");
    
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
    $output = curl_exec($ch); 
    curl_close($ch); 
   
$html = str_get_html($output);
$data = $html->find('info-wrap');
foreach($html->find('div') as $element) {
    if ($element->class === 'title') {
        $title[] = $element->innertext;
       
    }
}
foreach($html->find('p') as $element) {
    if ($element->class === 'price') {
        $harga[] = $element->innertext;
       
    }
}
foreach($html->find('img') as $element) {
    if ($element->class === 'produk-list-utama') {
        $foto[] = $element->src;
       
    }
}
foreach($html->find('div') as $element) {
    
    
    
    if ($element->class === 'col-md-3 col-lg-3 col-6 mb-4') {
       foreach($element->find('a') as $elem) {
       $link[] = $elem->getAttribute('href') ;
       }
    }
}


 $ch = curl_init(); 
    
    curl_setopt($ch, CURLOPT_URL, $web."/kategori/".$katgor."&page=8&urutan=murah");
    
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
    $output = curl_exec($ch); 
    curl_close($ch); 
   
$html = str_get_html($output);
$data = $html->find('info-wrap');
foreach($html->find('div') as $element) {
    if ($element->class === 'title') {
        $title[] = $element->innertext;
       
    }
}
foreach($html->find('img') as $element) {
    if ($element->class === 'produk-list-utama') {
        $foto[] = $element->src;
       
    }
}
foreach($html->find('p') as $element) {
    if ($element->class === 'price') {
        $harga[] = $element->innertext;
       
    }
}

foreach($html->find('div') as $element) {
    
    
    
    if ($element->class === 'col-md-3 col-lg-3 col-6 mb-4') {
       foreach($element->find('a') as $elem) {
       $link[] = $elem->getAttribute('href') ;
       }
    }
}

 $ch = curl_init(); 
    
    curl_setopt($ch, CURLOPT_URL, $web."/kategori/".$katgor."&page=9&urutan=murah");
    
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
    $output = curl_exec($ch); 
    curl_close($ch); 
   
$html = str_get_html($output);
$data = $html->find('info-wrap');
foreach($html->find('div') as $element) {
    if ($element->class === 'title') {
        $title[] = $element->innertext;
       
    }
}
foreach($html->find('img') as $element) {
    if ($element->class === 'produk-list-utama') {
        $foto[] = $element->src;
       
    }
}
foreach($html->find('p') as $element) {
    if ($element->class === 'price') {
        $harga[] = $element->innertext;
       
    }
}

foreach($html->find('div') as $element) {
    
    
    
    if ($element->class === 'col-md-3 col-lg-3 col-6 mb-4') {
       foreach($element->find('a') as $elem) {
       $link[] = $elem->getAttribute('href') ;
       }
    }
}

 $ch = curl_init(); 
    
    curl_setopt($ch, CURLOPT_URL, $web."/kategori/".$katgor."&page=10&urutan=murah");
    
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
    $output = curl_exec($ch); 
    curl_close($ch); 
   
$html = str_get_html($output);
$data = $html->find('info-wrap');
foreach($html->find('div') as $element) {
    if ($element->class === 'title') {
        $title[] = $element->innertext;
       
    }
}
foreach($html->find('p') as $element) {
    if ($element->class === 'price') {
        $harga[] = $element->innertext;
       
    }
}
foreach($html->find('img') as $element) {
    if ($element->class === 'produk-list-utama') {
        $foto[] = $element->src;
       
    }
}
foreach($html->find('div') as $element) {
    
    
    
    if ($element->class === 'col-md-3 col-lg-3 col-6 mb-4') {
       foreach($element->find('a') as $elem) {
       $link[] = $elem->getAttribute('href') ;
       }
    }
}
for ($a = 0 ; $a < count($harga); $a++){
    $url = $web."/produk/".str_replace("/produk/","",$link[$a]);
    // echo $url;
//   $ch = curl_init(); 
//     curl_setopt($ch, CURLOPT_URL, $web."/produk/".str_replace("/produk/","",$link[$a]));
    
//     curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
//     $outpu = curl_exec($ch); 
//     curl_close($ch); 
//     echo $outpu;
// $html = str_get_html($outpu);

// foreach($html->find('div') as $element) {
//     if ($element->class === 'desk') {
//         $desk[] = $element->innertext;
       
//     }
// }
    $json[] = array( 
    "id" => $a,
    "foto"=> $foto[$a],
    "Judul"=> $title[$a],
    "harga" => $harga[$a],
    "link" => str_replace("/produk/","",$link[$a]), 
    
    );
} echo json_encode($json);

}

?>



























