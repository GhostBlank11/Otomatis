<?php
include 'kon.php';
include 'simple_html_dom.php';
$user = $_GET['user'];
$link = $_GET['link'];
$aktivasi = $_GET['token'];
$ok = mysqli_query($koneksi,"select * from aktivasi where kode = '$aktivasi' and website = '$link'");
$ok = mysqli_num_rows($ok);
if ($ok != 0){
$data = mysqli_query($koneksi,"select * from user_id where id_user = '$user'");
$cek = mysqli_num_rows($data);
if ($cek == 0){
   

}else{
    
$data = mysqli_fetch_array($data);
$username = $data['email'];
$password = $data['password'];


$url=$link."/akun/login/"; 
$postinfo = "email=".$username."&password=".$password;

$cookie_file_path = $path."/cookie.txt";

$ch = curl_init();
curl_setopt($ch, CURLOPT_HEADER, false);
curl_setopt($ch, CURLOPT_NOBODY, false);
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);

curl_setopt($ch, CURLOPT_COOKIEJAR, $cookie_file_path);
//set the cookie the site has for certain features, this is optional
curl_setopt($ch, CURLOPT_COOKIE, "cookiename=0");
curl_setopt($ch, CURLOPT_USERAGENT,
    "Mozilla/5.0 (Windows; U; Windows NT 5.0; en-US; rv:1.7.12) Gecko/20050915 Firefox/1.0.7");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_REFERER, $_SERVER['REQUEST_URI']);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 0);

curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $postinfo);
curl_exec($ch);

//page with the content I want to grab
curl_setopt($ch, CURLOPT_URL, $link."/akun/?page=transaksi");
//do stuff with the info with DomDocument() etc
$html = curl_exec($ch);
curl_close($ch);




$html = str_get_html($html);
foreach($html->find('div') as $element) {
    if ($element->class === 'col-md-4') {
        foreach($element->find('h6') as $h6) {
            $title[] = $h6->innertext;
        }
        
        
       
    }
}
foreach($html->find('b') as $element) {
    if ($element->class === 'd-inline-block mr-3') {
        $nomor[] = $element->innertext;
    }
}
foreach($html->find('span') as $element) {
    if ($element->class === 'float-right') {
        $waktu[] = $element->innertext;
    }
    
}

foreach($html->find('div') as $element) {
   if ($element->class === 'col-md-4 mb-2 mt-3') {
        foreach($element->find('h6') as $h6) {
            $status[] = $h6->innertext;
        }
    }
}




for ($a = 0 ; $a < count($title); $a++){
   
  $tanggal[] = str_replace("Last update:","",$waktu[$a]);
  $tanggal2[] = str_replace("</small>","",$tanggal[$a]);
    $json[] = array( 
    
    "id" => $a,
    "Judul"=> $title[$a],
    "nomor_trx" => str_replace("Nomor Transaksi: #","",$nomor[$a]),
    "tanggal" => str_replace("<small>","",$tanggal2[$a]), 
    "status"=> $status[$a+1]
    
    );
} echo json_encode($json);
}
}else{
     echo "gagal";
}