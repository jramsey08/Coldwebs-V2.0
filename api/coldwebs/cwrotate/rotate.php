<?php

$Domain = $_SERVER['HTTP_HOST'];
$Url = $_REQUEST["url"];
$Url = str_replace($Domain,"", $Url);
$Url = str_replace("www.","", $Url);
$Url = str_replace("http://","", $Url);
$Url = str_replace("https://","", $Url);
$Url = str_replace("/uploads", "uploads", $Url);
 
$Url = "../../../" . $Url;

function Cw_ImgRotate($Url){
    $imagick = new imagick(); 
    $imagick->readImage($Url); 
    $imagick->rotateImage(new ImagickPixel('none'), 90);
    $imagick->writeImage($Url); 
    $imagick->clear(); 
    $imagick->destroy(); 
}

Cw_ImgRotate("$Url");
?>