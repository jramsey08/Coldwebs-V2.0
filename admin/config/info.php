<?php
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// COLDWEBS INFO.PHP FILE IS USED TO SET HANDLE ANY ISSUES THAT WOULD CAUSE THE SITE TO BE OFFLINE. THIS FILE IS     //
// VERY ESSENTIAL TO THE FUNCTION OF THIS WEBSITE AND ANY CHANGES SHOULD ONLY BE MADE BY THOSE WHO ARE FAMILIAR      //
// WITH THE COLDWEB CONTENT MANAGENEMT SYSTEM CODING STRUCTURE. TO ENSURE YOUR SITE IS FULLY SAFE PLEASE ENROLL      //
// YOUR SITE AT COLDWEBS.COM TO ENSURE YOUR WEBSITE IN MONITORED DAILY AGAINST ALL THREATS AND ARE RECEIVING ALL     //
// NEEDED UPDATES.                                                                                                   //
// AUTHOR: CEO, JUBAR D. RAMSEY     "VISIT COLDWEBS.COM TO BECOME A COLDWEBS CMS PLATFORM DEVELOPER."                //
// FILE VERSION 2.1 LAST UPDATED ON 2016-02-26                                                                       //
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


// WEBSITE GENERAL INFORMATION \\
$query = "SELECT * FROM info";
$result = mysql_query($query) or die(mysql_error());
$row = mysql_fetch_array($result);
if($row['other'] == ""){}else{ $row['other'] = unserialize($row['other']); }
if($row['status'] == ""){}else{ $row['status'] = unserialize($row['status']); }
if($row['other']['paypalemail'] == ""){ $row['other']['paypalemail'] = $row['other']['email']; }
$View_site = $row['status']['offline'];
if($View_site == "1"){
    $View_site = "0";
}else{
    if($View_site == "0"){
        $View_site = "1";
    }
}


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
$Cw_Preview_Songs = Cw_Settings("preview_songs");

if(in_array("tags", $Array['siteinfo']['other'])){
}else{
    $Array['siteinfo']['other']['tags'] = "";
}

?>