<?php
include("../../../config/session.php");

$Id = $_REQUEST['adid'];
$Img = $_REQUEST['img'];

if($Img == ""){
    $query = "SELECT * FROM cw_ads WHERE id='$Id' And active='1' AND trash='0' AND webid='$WebId'";
    $result = mysql_query($query) or die(mysql_error());
    $row = mysql_fetch_array($result);
    $row = CwOrganize($row,$Array);
    $Redirect = $row['other']['url'];
}else{
    $query = "SELECT * FROM images WHERE id='$Img' And active='1' AND trash='0' AND webid='$WebId'";
    $result = mysql_query($query) or die(mysql_error());
    $row = mysql_fetch_array($result);
    $row = CwOrganize($row,$Array);
    $Redirect = $row['url'];
}

if($row['id'] == ""){
    $Redirect = "http://www.promoterblast.com/Advertise?error=nf";
}

if($Info['adlimit'] == "clicks"){
    $Clicks = $Info['adclicks'];
    $New_Clicks =  $row['hits'] + 1;
    $result = mysql_query("UPDATE cw_ads SET hits='$New_Clicks' WHERE id='$Id' AND webid='$WebId'") 
    or die(mysql_error());
    if($New_Clicks >= $Clicks){
        $result = mysql_query("UPDATE cw_ads SET active='0' WHERE id='$Id' AND webid='$WebId'") 
        or die(mysql_error());
    }
}

// ADD FUNCTION TO UPDATE PBLAST TABLE pb_ads_track \\


header( "Location: $Redirect" );

?>