<?php
include '../simple_html_dom.php';
include 'kon.php';
$web = $_GET['link'];
$produk = $_GET['produk'];
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
    $ch = curl_init(); 
    
    curl_setopt($ch, CURLOPT_URL, $web."/produk/".$produk);
    
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
    $output = curl_exec($ch); 
    curl_close($ch); 
    // echo $output;




$html = str_get_html($output);
$data = $html->find('info-wrap');
foreach($html->find('h1') as $element) {
    if ($element->class === 'titleproduk') {
        $title[] = $element->innertext;
       
    }
}
foreach($html->find('div') as $element) {
    if ($element->class === 'carousel-inner') {
        foreach($element->find('img') as $elem) {
       $foto[] = $elem->src ;
       }
       
    }
}
foreach($html->find('p') as $element) {
    if ($element->class === 'price-detail h3') {
        $harga[] = $element->innertext;
       
    }
}

foreach($html->find('h4') as $element) {
    if ($element->style === 'font-size:1rem;font-weight:normal;margin-top:5px;font-style: italic;') {
        $desk[] = $element->innertext;
       
    }
}

foreach($html->find('article') as $element) {
    if ($element->class === 'content-body') {
        $children = $element->children; 
        foreach ($children AS $child) {
    $child->outertext = ''; 
}
        $desk1[] = $element->innertext;
       
    }
}




for ($a = 0 ; $a < 1; $a++){
    $url = $web."/produk/".str_replace("/produk/","",$link[$a]);

    $json[] = array( 
    "id" => $a,
    "foto1"=> $foto[0],
    "foto2"=> $foto[1],
    "foto3"=> $foto[2],
    "foto4"=> $foto[3],
    "foto5"=> $foto[4],
    "foto6"=> $foto[5],
    "Judul"=> $title[0],
    "harga" => $harga[0],
    "desk" => str_replace("/produk/","",$desk[0]),
    "desk1" => str_replace("/produk/","",$desk1[0]),
    
    );
} echo json_encode($json);

}

?>
