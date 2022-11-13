<?php
include '../simple_html_dom.php';
include 'kon.php';
$web = $_GET['link'];
$kategori = $_GET['kategori'];
$token = $_GET['token'];
$tag = $_GET['tag'];
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
    
    curl_setopt($ch, CURLOPT_URL, $web."/kategori/".$kategori);
    
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
    $output = curl_exec($ch); 
    curl_close($ch); 
    // echo $output;




$html = str_get_html($output);
$data = $html->getElementById($tag);

  
      foreach($data->find('a') as $sub) {
        if ($sub->class === 'list-group-item') {
             
        $judul[] = $sub->innertext;
        $link[] = $sub->getAttribute('href');
        
        
        }
        }
  

 



for ($a = 0 ; $a <  count($judul) ; $a++){
   
    $json[] = array( 
    "id" => $a,
    "Judul"=> $judul[$a],
    "link"=> str_replace("/kategori/","",$link[$a]),
    
    
    );
} 
echo json_encode($json);

}
