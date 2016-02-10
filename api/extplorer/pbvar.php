<?php
include("../../config/encrypt.php");
include("../../config/functions.php");
include("../pblast/config.php");


$Incoming = $_GET['pbrequest'];
$Incoming = OtarDecrypt($PB_Access,$Incoming);


$Request['type'] = "extplorer";
$Request['api'] = $Pblast_Api;
$Request['secret'] = $Pblast_Secret;
$Request['pbsession'] = $Incoming['pbsession'];
$Request['user'] = $Incoming['user'];
$Request = OtarEncrypt($PB_Access,$Request);

$body ="?pbrequest=$Request";
$url = 'http://www.pblast.in/api/extplorer.php';
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url . $body);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_TIMEOUT, '3');
$Response = trim(curl_exec($ch));
curl_close($ch);
$Response = OtarDecrypt($key,$Response);


if($Response['type'] == "auth"){
    if($Response['error'] == ""){
        if($Response['content'] == "success"){
            $Verify = 1;
        }
    }
}


if($Verify == "1"){
    $Pb_Edit_Users = $_GET['pbchange'];
    $_SESSION['Pb_Edit_Users'] = $_GET['pbchange'];
    $User = $Incoming['account']['user'];
    $Pass = $Incoming['account']['pass'];
}



?>