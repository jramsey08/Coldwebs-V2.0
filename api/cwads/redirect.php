<?php
include("../../config/encrypt.php");
include("../../config/functions.php");
include("../../config/database.php");

$Id = $_GET['id'];
$Img = $_GET['img'];

if($Img == ""){
    $query = "SELECT * FROM cw_ads WHERE id='$Id' And active='1' AND trash='0'";
    $result = mysql_query($query) or die(mysql_error());
    $row = mysql_fetch_array($result);
    $row = PbUnSerial($row);
    $Redirect = $row['other']['url'];
}else{
    $query = "SELECT * FROM images WHERE id='$Img' And active='1' AND trash='0'";
    $result = mysql_query($query) or die(mysql_error());
    $row = mysql_fetch_array($result);
    $row = PbUnSerial($row);
    $Redirect = $row['url'];
}


if($row['id'] == ""){
    $Redirect = "http://www.promoterblast.com/Advertise?error=nf";
}

if($Info['adlimit'] == "clicks"){
    $Clicks = $Info['adclicks'];
    $New_Clicks =  $row['hits'] + 1;
    $result = mysql_query("UPDATE cw_ads SET hits='$New_Clicks' WHERE id='$Id'") 
    or die(mysql_error());
    if($New_Clicks >= $Clicks){
        $result = mysql_query("UPDATE cw_ads SET active='0' WHERE id='$Id'") 
        or die(mysql_error());
    }
}

// ADD FUNCTION TO UPDATE PBLAST TABLE pb_ads_track \\


header( "Location: $Redirect" );

?>