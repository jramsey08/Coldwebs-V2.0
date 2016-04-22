<?php
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// COLDWEBS OFFLINE.PHP FILE IS USED TO SET HANDLE ANY ISSUES THAT WOULD CAUSE THE SITE TO BE OFFLINE. THIS FILE IS  //
// VERY ESSENTIAL TO THE FUNCTION OF THIS WEBSITE AND ANY CHANGES SHOULD ONLY BE MADE BY THOSE WHO ARE FAMILIAR      //
// WITH THE COLDWEB CONTENT MANAGENEMT SYSTEM CODING STRUCTURE. TO ENSURE YOUR SITE IS FULLY SAFE PLEASE ENROLL      //
<<<<<<< HEAD
// YOUR SITE AT COLDWEBS.COM TO ENSURE YOUR WEBSITE IN MONITORED DAILY AGAINST ALL THREATS AND ARE RECEIVING ALL     // 
=======
// YOUR SITE AT COLDWEBS.COM TO ENSURE YOUR WEBSITE IN MONITORED DAILY AGAINST ALL THREATS AND ARE RECEIVING ALL     //
>>>>>>> origin/master
// NEEDED UPDATES.                                                                                                   //
// AUTHOR: CEO, JUBAR D. RAMSEY     "VISIT COLDWEBS.COM TO BECOME A COLDWEBS CMS PLATFORM DEVELOPER."                //
// FILE VERSION 2.1 LAST UPDATED ON 2015-01-20                                                                       //
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


// WEBSITE GENERAL INFORMATION \\
$query = "SELECT * FROM info";
$result = mysql_query($query) or die(mysql_error());
$row = mysql_fetch_array($result);
if($row['other'] == ""){}else{ $row['other'] = unserialize($row['other']); }
if($row['status'] == ""){}else{ $row['status'] = unserialize($row['status']); }
if($row['other']['paypalemail'] == ""){ $row['other']['paypalemail'] = $row['other']['email']; }
$View_site = $row['status']['offline'];
<<<<<<< HEAD
if($View_site != "1"){
    $View_site = "0";

}

=======
if($View_site == "1"){
    $View_site = "0";
}else{
    if($View_site == "0"){
        $View_site = "1";
    }
}


>>>>>>> origin/master
$SiteStatus = $row['status'];
$SiteInfo = $row;
$Array['siteinfo'] = $row;
$Array['sitetheme'] = $row['theme'];
$OfflineTheme = $row['other']['offline'];
$CustomerLogin = $row['other']['clogin'];
$Array['key'] = $key;
$Array['sitestatus'] = $SiteStatus;
$Array['shopping']['active'] = $row['other']['shopping'];



$Cw_Show_Date = Cw_Settings("hide_date");
$Cw_Show_Ads = Cw_Settings("show_ads");
$Cw_Multiple_Cat = Cw_Settings("multiple_cat");
$Cw_Restrict_White_Space = Cw_Settings("show_white_space");
<<<<<<< HEAD
$Cw_Preview_Songs = Cw_Settings("preview_songs");
=======

>>>>>>> origin/master

// LOAD USER ACCOUNT INFORMATION \\
include("config/userinfo.php");
$GeneralSite = "1";
include("config/access.php");


if($UserSiteAccess["viewoffline"] == "1"){
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

if($_GET['url'] == "login" OR $_GET['url'] == "Login"){
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




?>