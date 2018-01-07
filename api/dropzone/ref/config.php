<?php
include("../../../config/session.php");

$Website = $_SERVER['HTTP_HOST'];


$query = "SELECT * FROM info WHERE domain LIKE '%$Website%'";
$result = mysql_query($query) or die(mysql_error());
$SiteInfo = mysql_fetch_array($result);
$SiteInfo = PbUnSerial($SiteInfo);
$WebId = $SiteInfo['id'];

if($_COOKIE["manual_webid"] == ""){
    $WebId = $SiteInfo['id'];
}else{
    $WebId = $_COOKIE["manual_webid"];
    $query = "SELECT * FROM info WHERE id='$WebId'";
    $result = mysql_query($query) or die(mysql_error());
    $SiteInfo = mysql_fetch_array($result);
    $SiteInfo = PbUnSerial($SiteInfo);
}

if($WebId == ""){
    $WebId = "1";
}

?>