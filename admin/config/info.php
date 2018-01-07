<?php
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// COLDWEBS INFO.PHP FILE IS USED TO SET HANDLE ANY ISSUES THAT WOULD CAUSE THE SITE TO BE OFFLINE. THIS FILE IS     //
// VERY ESSENTIAL TO THE FUNCTION OF THIS WEBSITE AND ANY CHANGES SHOULD ONLY BE MADE BY THOSE WHO ARE FAMILIAR      //
// WITH THE COLDWEB CONTENT MANAGENEMT SYSTEM CODING STRUCTURE. TO ENSURE YOUR SITE IS FULLY SAFE PLEASE ENROLL      //
// YOUR SITE AT COLDWEBS.COM TO ENSURE YOUR WEBSITE IN MONITORED DAILY AGAINST ALL THREATS AND ARE RECEIVING ALL     //
// NEEDED UPDATES.                                                                                                   //
// AUTHOR: CEO, JUBAR D. RAMSEY     "VISIT COLDWEBS.COM TO BECOME A COLDWEBS CMS PLATFORM DEVELOPER."                //
// FILE VERSION 2.1 LAST UPDATED ON 2016-10-26                                                                       //
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////



// PULL SELECTED WEBSITE INFORMATION \\
$Website = $_SERVER['HTTP_HOST'];
$Full_Url = "http://$Website";


// WEBSITE GENERAL INFORMATION \\
$query = "SELECT * FROM info WHERE domain LIKE '%$Website%'";
$result = mysql_query($query) or die(mysql_error());
$row = mysql_fetch_array($result);
$row = PbUnSerial($row);

if($_COOKIE["manual_webid"] == ""){
    $WebId = $row['id'];
}else{
    $WebId = $_COOKIE["manual_webid"];
    $query = "SELECT * FROM info WHERE id='$WebId'";
    $result = mysql_query($query) or die(mysql_error());
    $row = mysql_fetch_array($result);
    $row = PbUnSerial($row);
}

if($WebId == ""){
    $WebId = "1";
}
$Array['webid'] = $WebId;
$Array['manual_webid'] = $_COOKIE["manual_webid"];

if(is_array($row['other'])){
    if($row['other']['paypalemail'] == ""){ 
        $row['other']['paypalemail'] = $row['other']['email'];
    }
    if(in_array("tags", $row['other'])){
    }else{
        $row['other']['tags'] = "";
    }
    $View_site = $row['status']['offline'];
    $OfflineTheme = $row['other']['offline'];
    $theme = $row['other']['admin_theme'];
    $CustomerLogin = $row['other']['clogin'];
    $Array['shopping']['active'] = $row['other']['shopping'];
}else{
    $row['other'] = array();
    $row['status'] = array();
}
$THEME = "theme/$theme";

$Site_Domain = $row['domain'];
$Array['fullsession'] = $_SESSION;
$SiteStatus = $row['status'];
$SiteInfo = $row;
$Array['siteinfo'] = $row;
$Array['sitetheme'] = $row['theme'];
$Array['key'] = $key;
$Array['sitestatus'] = $SiteStatus;


if($View_site == "1"){
    $View_site = "0";
}else{
    if($View_site == "0"){
        $View_site = "1";
    }
}

$Cw_Show_Date = Cw_Settings("hide_date", $Array);
$Cw_Show_Ads = Cw_Settings("show_ads", $Array);
$Cw_Multiple_Cat = Cw_Settings("multiple_cat", $Array);
$Cw_Restrict_White_Space = Cw_Settings("show_white_space", $Array);
$Cw_Preview_Songs = Cw_Settings("preview_songs", $Array);


?>