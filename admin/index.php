<?php
require_once("config/settings.php");
if($UserSiteAccess["backend"] == "1"){
<<<<<<< HEAD
    include("config/admin.php");
    include("template.php");
}else{
    $Domain = $Array["siteinfo"]["domain"];
    header("Location: $Domain/Process/Logout?redirect=login&error=na");
=======
    include("template.php");
}else{
    $Domain = $Array["siteinfo"]["domain"];
    header("Location: $Domain/Logout?redirect=login&error=na");
>>>>>>> origin/master
}
?>