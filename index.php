<?php
// THE FOLLOWING CODE IS FOR USER SESSION INFORMATION ONLY \\
define('CWROOT', __DIR__);
$IndexUse = "1";
require_once("config/ini.php");
require_once("config/session.php");


// INCLUDE DEFAULT WEBSITE CONFIGURATION \\
require_once("config/api.php");
require_once("config/default.php");
require_once("config/settings.php");


if($_GET['url'] == "Process" OR $_GET['url'] == "process"){
    include("forms/main.php");
}else{
    if($Website_Offline == "0"){
        if($View_site == "1"){
            if($CwPack == 1){
                require_once("cwpack.php");
            }else{
                $time_end_Top = microtime_float();
                require_once("template.php");
            }
        }else{

// SETS THE OFFLINE ARTICLE INFO \\
             #$Offline_Article_Id = $Array['siteinfo']['other']['article'];
$Offline_Article_Id = "3";
             $query = "SELECT * FROM articles WHERE id='$Offline_Article_Id'";
             $result = mysql_query($query) or die(mysql_error());
             $row = mysql_fetch_array($result);
             $row = PbUnSerial($row);
             $Offline_Article = $row;
             $Structure_Type = $OfflineTheme;
             $THEME = "theme/$Structure_Type";
             $Offline_Media_Code = $row['content']['code'];
             $time_end_Top = microtime_float();
             if($CwFail == "1"){
                 SiteOffline($Array);
             }else{
                 if($OfflineTheme != ""){
                     include("theme/$OfflineTheme/layout.php");
                 }else{
                     include("theme/cwdefault/offline.php");
                 }
             }
        }
        require_once("config/footer.php");
        #include_once("config/online.php");
        include_once("config/tracker.php");
    }else{
        SiteOffline($Array);
    }
}


?>