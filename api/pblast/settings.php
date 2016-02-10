<?php

$Request['website'] = $Website_Url_Auth;
$Request['api'] = $Pblast_Api;

$Secured['type'] = "settings";
$Secured = PbEncrypt($Pblast_Secret,$Secured);
$Request['secured'] = $Secured;
$Request = OtarEncrypt($PB_Access,$Request);
#    $body ="?request=$Request";
#    $url = 'http://www.pblast.in/';
#    $ch = curl_init();
#    curl_setopt($ch, CURLOPT_URL, $url . $body);
#    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
#    curl_setopt($ch, CURLOPT_TIMEOUT, '3');
#    $content = trim(curl_exec($ch));
#    curl_close($ch);
#    $content = OtarDecrypt($key,$content);


 



$ColdWeb_Control = "0";

?>