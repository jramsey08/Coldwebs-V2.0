<?php
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// COLDWEBS OFFLINE.PHP FILE IS USED TO SET HANDLE ANY ISSUES THAT WOULD CAUSE THE SITE TO BE OFFLINE. THIS FILE IS  //
// VERY ESSENTIAL TO THE FUNCTION OF THIS WEBSITE AND ANY CHANGES SHOULD ONLY BE MADE BY THOSE WHO ARE FAMILIAR      //
// WITH THE COLDWEB CONTENT MANAGENEMT SYSTEM CODING STRUCTURE. TO ENSURE YOUR SITE IS FULLY SAFE PLEASE ENROLL      //
// YOUR SITE AT COLDWEBS.COM TO ENSURE YOUR WEBSITE IN MONITORED DAILY AGAINST ALL THREATS AND ARE RECEIVING ALL     // 
// NEEDED UPDATES.                                                                                                   //
// AUTHOR: CEO, JUBAR D. RAMSEY     "VISIT COLDWEBS.COM TO BECOME A COLDWEBS CMS PLATFORM DEVELOPER."                //
// FILE VERSION 2.1 LAST UPDATED ON 2017-09-22                                                                       //
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////



// PULL SELECTED WEBSITE INFORMATION \\
$Website = $_SERVER['HTTP_HOST'];
$Website = str_replace("www.","","$Website");


// WEBSITE GENERAL INFORMATION \\
$query = "SELECT * FROM info WHERE domain LIKE '%$Website%'";
$result = mysql_query($query) or die(mysql_error());
$row = mysql_fetch_array($result);
$row = PbUnSerial($row);
$Array['siteactual'] = $row;

if($_COOKIE["manual_webid"] == ""){
    $WebId = $row['id'];
}else{
    $WebId = $_COOKIE["manual_webid"];
    $query = "SELECT * FROM info WHERE id='$WebId'";
    $result = mysql_query($query) or die(mysql_error());
    $row = mysql_fetch_array($result);
    $row = PbUnSerial($row);
    if($row["other"]["manualdb"] == "1"){
        if($Admin_Use != "1"){
            mysql_connect($row["other"]["db"]["host"], $row["other"]["db"]["user"], $row["other"]["db"]["pw"]) or die(mysql_error());
            mysql_select_db($row["other"]["db"]["name"]) or die(mysql_error());
            $WebId = "1";
        }
    }
}

if($WebId == ""){
    $WebId = "1";
}

$Array['webid'] = $WebId;
if($row['theme'] == ""){
    $row['theme'] = "cwdefault";
}

$SiteStatus = $row['status'];
$SiteInfo = $row;
$Array['siteinfo'] = $row;
$Array['sitetheme'] = $row['theme'];
$Array['key'] = $key;
$Array['sitestatus'] = $SiteStatus;

if(is_array($row['other'])){
    if($row['other']['paypalemail'] == ""){ 
        $row['other']['paypalemail'] = $row['other']['email'];
        $PayPal_Email =  $row['other']['paypalemail'];
    }
    $Cw_Offline = $row['status']['offline'];
    $OfflineTheme = $row['other']['offline'];
    $CustomerLogin = $row['other']['clogin'];
    $Array['shopping']['active'] = $row['other']['shopping'];
}
if($row['status']['offline'] == "0"){
    $View_site = "1";
}else{
    $View_site = "0";
}

$Cw_Show_Date = Cw_Settings("hide_date", $Array);
$Cw_Show_Ads = Cw_Settings("show_ads", $Array);
$Cw_Multiple_Cat = Cw_Settings("multiple_cat", $Array);
$Cw_Restrict_White_Space = Cw_Settings("show_white_space", $Array);
$Cw_Preview_Songs = Cw_Settings("preview_songs", $Array);

$Array['multi_cat'] = $Cw_Multiple_Cat;

// LOAD USER ACCOUNT INFORMATION \\
include(ROOTPATH . "/userinfo.php");
$GeneralSite = "1";
include(ROOTPATH . "/access.php");
if($UserSiteAccess["viewoffline"] == "1" OR $Current_Admin_Access == "0"){
    $View_site = "1";
}

// CHECK ALL BROWSER LIMITATIONS \\
$BrowserStatus = CwLimitBrowser($Array);
$Browser_View_Site = $BrowserStatus['View_site'];
$OfflineError = $BrowserStatus['status'];

if($View_site == "0"){
    $theme = $row['other']['offline'];
}else{
    $theme = $row['theme'];
    $View_site = $Browser_View_Site;
}

if($OfflineByPass == "1"){
    $View_site = "1";
}

if($Array['shopping']['active'] == ""){
    $Array['shopping']['active'] = "0";
}

$THEME = "theme/$theme";
$Array['shopping']['active'] = "1";
if($PB_Remote == "1"){
    $View_site = "1";
}

if($SiteInfo['id'] == ""){
     $View_site = "0";
     $CwFail = "1";
     $Array['error'] = "cwfail";
}

$result = mysql_query("SELECT COUNT(id) FROM info") or die(mysql_error());
$row = mysql_fetch_array( $result );
$Hosted_Sites = $row['0'];

?>
