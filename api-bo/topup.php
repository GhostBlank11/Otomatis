<?php
header("Access-Control-Allow-Headers: Authorization, Content-Type");
header("Access-Control-Allow-Origin: *");
header('content-type: application/json; charset=utf-8');

$sender =$_GET['sender'];
$api = $_GET['api_wa'];

$wa = $_GET['wa'];
$pemilik = $_GET['pemilik'];
$pesan_pemilik = $_GET['pesan_pemilik'];
$pesan_user = $_GET['pesan_user'];

$ket= $_GET['ket'];
// Notif ke pemilik
if ($ket == "0"){
$data = [
'api_key' => $api,
'sender' => $sender,
'number' => $pemilik,
'message' => $pesan_pemilik

    ];
    $curl = curl_init();
    
    curl_setopt_array($curl, array(
     CURLOPT_URL => 'http://wa.botgateway.my.id/send-message',
     CURLOPT_RETURNTRANSFER => true,
     CURLOPT_ENCODING => '',
     CURLOPT_MAXREDIRS => 10,
     CURLOPT_TIMEOUT => 0,
     CURLOPT_FOLLOWLOCATION => true,
     CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
     CURLOPT_CUSTOMREQUEST => 'POST',
     CURLOPT_POSTFIELDS => json_encode($data),
     CURLOPT_HTTPHEADER => array(
     'Content-Type: application/json'
      ),
        ));
    
    $response = curl_exec($curl);
                                                    
    curl_close($curl);
    echo $response;
}else{
// Notif Ke USER

$datawa = [
'api_key' => $api,
'sender' => $sender,
'number' => $wa,
'message' => $pesan_user 
// $header.PHP_EOL.PHP_EOL.$metode.PHP_EOL.$jumlah.PHP_EOL.$footer
    ];
    $curl = curl_init();
    
    curl_setopt_array($curl, array(
     CURLOPT_URL => 'http://wa.botgateway.my.id/send-message',
     CURLOPT_RETURNTRANSFER => true,
     CURLOPT_ENCODING => '',
     CURLOPT_MAXREDIRS => 10,
     CURLOPT_TIMEOUT => 0,
     CURLOPT_FOLLOWLOCATION => true,
     CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
     CURLOPT_CUSTOMREQUEST => 'POST',
     CURLOPT_POSTFIELDS => json_encode($datawa),
     CURLOPT_HTTPHEADER => array(
     'Content-Type: application/json'
      ),
        ));
    
    $response = curl_exec($curl);
                                                    
    curl_close($curl);
    echo $response;
}
echo "ok";
    
                                                    
                                                    ?>