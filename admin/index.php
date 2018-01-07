<?php
$Uri = $_SERVER["REQUEST_URI"];
$Admin_Use = "1";
require_once("config/settings.php");


if($UserSiteAccess["backend"] == "1"){
    include("config/admin.php");
    include("template.php");
}else{
    $Domain = $Array["siteinfo"]["domain"];
    header("Location: $DomainProcess/Logout?redirect=$Uri&error=log");
}

?>