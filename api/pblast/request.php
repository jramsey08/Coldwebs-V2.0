<?php
include("../../config/encrypt.php");
include("../../config/functions.php");
include("../../config/database.php");
include("config.php");

$Request = $_GET['request'];
$Request = OtarDecrypt($PB_Access,$Request);
$Request['type'] = OtarDecrypt($Pblast_Secret,$Request['type']);
$Request['pbsession'] = OtarDecrypt($Pblast_Secret,$Request['pbsession']);
$Request['user'] = OtarDecrypt($Pblast_Secret,$Request['user']);


$File = $Request['type'] . ".php";

if(file_exists($File)){
    include("$File");
}else{
    $Response['auth'] = "0";
    $Response['error'] = "file not found";
    $Response = OtarEncrypt($Pblast_Secret,$Response);
    echo $Response;
}



?>