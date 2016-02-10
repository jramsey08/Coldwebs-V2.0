<?php


$iphone = strpos($_SERVER['HTTP_USER_AGENT'],"iPhone");
$android = strpos($_SERVER['HTTP_USER_AGENT'],"Android");
$palmpre = strpos($_SERVER['HTTP_USER_AGENT'],"webOS");
$berry = strpos($_SERVER['HTTP_USER_AGENT'],"BlackBerry");
$ipod = strpos($_SERVER['HTTP_USER_AGENT'],"iPod");

if($iphone || $android || $palmpre || $ipod || $berry == true){
    $Mobile_Phone = 1;
    $Mobile_Phone_Selected = 1;
}

if($Mobile_Phone_Selected == ""){ 
    $Mobile_Phone_Selected = 0; 
}
$Select_View = $_SESSION['mobileview'];
if($Select_View == desktop){
    $Mobile_Phone = 0;
}else{
    $Mobile_Phone = 1;
}

?>
