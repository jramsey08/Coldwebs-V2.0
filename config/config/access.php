<?php

$TempDate = strtotime("now");
if($TempDate <= "1433969631"){
    if($_GET['temp'] == "1"){
        $_SESSION['tempaccess'] = "1";
    }
    if($_SESSION['tempaccess'] == "1"){
        $Temp_Access = "1";
    }
}
if($Temp_Access == "1"){
    $UserSiteAccess["viewoffline"] = "1"; 
}

#if($UserSiteAccess["allaccess"] == "1"){
#    $CurrentUser["info"]["access"] = "0";
#}

if($UserSiteAccess["backend"] == "" OR $UserSiteAccess["backend"] == "0"){
    if($CurrentUser["info"]["access"] == "0"){
        $UserSiteAccess["backend"] = "1";
    }else{
        $UserSiteAccess["backend"] = "0";
        if($GeneralSite == "1"){
        }else{
            #header("Location: $Domain/Login");
        }
    }
}

if($UserSiteAccess["setaccess"] == "" OR $UserSiteAccess["setaccess"] == "0"){
    if($CurrentUser["info"]["access"] == "0"){
        $UserSiteAccess["setaccess"] = "1";
    }else{
        $UserSiteAccess["setaccess"] = "0";
    }
}

$result = mysqli_query($CwDb,"SELECT * FROM cwoptions WHERE type='access'") or die(mysql_error());
while($row = mysqli_fetch_assoc($result)){
    $Select_Access = $row['content'];
    if(array_key_exists("$Select_Access",$UserSiteAccess)){
    }else{
        $UserSiteAccess["$Select_Access"] = "";
    }
    if($UserSiteAccess["$Select_Access"] == "" OR $UserSiteAccess["$Select_Access"] == "0"){
        if($CurrentUser["info"]["access"] == "0"){
            $UserSiteAccess["$Select_Access"] = "1";
        }else{
           $UserSiteAccess["$Select_Access"] = "0";
        }
    }
}



?>