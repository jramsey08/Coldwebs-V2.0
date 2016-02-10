<?php
require_once("config/settings.php");
if($UserSiteAccess["backend"] == "1"){
    include("template.php");
}else{
    $Domain = $Array["siteinfo"]["domain"];
    header("Location: $Domain/Logout?redirect=login&error=na");
}
?>