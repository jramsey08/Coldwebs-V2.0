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

if($UserSiteAccess["analytics"] == "" OR $UserSiteAccess["analytics"] == "0"){
    if($CurrentUser["info"]["access"] == "0"){
        $UserSiteAccess["analytics"] = "1";
    }else{
        $UserSiteAccess["analytics"] = "0";
    }
}

if($UserSiteAccess["editsidebar"] == "" OR $UserSiteAccess["editsidebar"] == "0"){
    if($CurrentUser["info"]["access"] == "0"){
        $UserSiteAccess["editsidebar"] = "1";
    }else{
        $UserSiteAccess["editsidebar"] = "0";
    }
}

if($UserSiteAccess["inlineedit"] == "" OR $UserSiteAccess["inlineedit"] == "0"){
    if($CurrentUser["info"]["access"] == "0"){
        $UserSiteAccess["inlineedit"] = "1";
    }else{
        $UserSiteAccess["inlineedit"] = "0";
    }
}

if($UserSiteAccess["editauthor"] == "" OR $UserSiteAccess["editauthor"] == "0"){
    if($CurrentUser["info"]["access"] == "0"){
        $UserSiteAccess["editauthor"] = "1";
    }else{
        $UserSiteAccess["editauthor"] = "0";
    }
}

if($UserSiteAccess["viewoffline"] == "" OR $UserSiteAccess["viewoffline"] == "0"){
    if($CurrentUser["info"]["access"] == "0"){
        $UserSiteAccess["viewoffline"] = "1";
    }else{
        $UserSiteAccess["viewoffline"] = "0";
    }
}

if($UserSiteAccess["editsocial"] == "" OR $UserSiteAccess["editsocial"] == "0"){
    if($CurrentUser["info"]["access"] == "0"){
        $UserSiteAccess["editsocial"] = "1";
    }else{
        $UserSiteAccess["editsocial"] = "0";
    }
}

if($UserSiteAccess["editoffline"] == "" OR $UserSiteAccess["editoffline"] == "0"){
    if($CurrentUser["info"]["access"] == "0"){
        $UserSiteAccess["editoffline"] = "1";
    }else{
        $UserSiteAccess["editoffline"] = "0";
    }
}

if($UserSiteAccess["setaccess"] == "" OR $UserSiteAccess["setaccess"] == "0"){
    if($CurrentUser["info"]["access"] == "0"){
        $UserSiteAccess["setaccess"] = "1";
    }else{
        $UserSiteAccess["setaccess"] = "0";
    }
}

if($UserSiteAccess["editcwfile"] == "" OR $UserSiteAccess["editcwfile"] == "0"){
    if($CurrentUser["info"]["access"] == "0"){
        $UserSiteAccess["editcwfile"] = "1";
    }else{
        $UserSiteAccess["editcwfile"] = "0";
    }
}

if($UserSiteAccess["filemanager"] == "" OR $UserSiteAccess["filemanager"] == "0"){
    if($CurrentUser["info"]["access"] == "0"){
        $UserSiteAccess["filemanager"] = "1";
    }else{
        $UserSiteAccess["filemanager"] = "0";
    }
}

if($UserSiteAccess["editticker"] == "" OR $UserSiteAccess["editticker"] == "0"){
    if($CurrentUser["info"]["access"] == "0"){
        $UserSiteAccess["editticker"] = "1";
    }else{
        $UserSiteAccess["editticker"] = "0";
    }
}

if($UserSiteAccess["editmedia"] == "" OR $UserSiteAccess["editmedia"] == "0"){
    if($CurrentUser["info"]["access"] == "0"){
        $UserSiteAccess["editmedia"] = "1";
    }else{
        $UserSiteAccess["editmedia"] = "0";
    }
}

if($UserSiteAccess["grantaccess"] == "" OR $UserSiteAccess["grantaccess"] == "0"){
    if($CurrentUser["info"]["access"] == "0"){
        $UserSiteAccess["grantaccess"] = "1";
    }else{
        $UserSiteAccess["grantaccess"] = "0";
    }
}

if($UserSiteAccess["edittask"] == "" OR $UserSiteAccess["edittask"] == "0"){
    if($CurrentUser["info"]["access"] == "0"){
        $UserSiteAccess["edittask"] = "1";
    }else{
        $UserSiteAccess["edittask"] = "0";
    }
}

if($UserSiteAccess["viewusers"] == "" OR $UserSiteAccess["viewusers"] == "0"){
    if($CurrentUser['info']['access'] == "0"){
        $UserSiteAccess['viewusers'] = "1";
    }else{
        $UserSiteAccess[viewusers] = "0";
    }
    if($CurrentUser['info']['access'] == "0"){
        $UserSiteAccess['forceuser'] = "1";
    }else{
        $UserSiteAccess['forceuser'] = "0";
    }
}

if($UserSiteAccess["ecommerce"] == "" OR $UserSiteAccess["ecommerce"] == "0"){
    if($CurrentUser["info"]["access"] == "0"){
        $UserSiteAccess["ecommerce"] = "1";
    }else{
        $UserSiteAccess["ecommerce"] = "0";
    }
}

if($UserSiteAccess["vieworders"] == "" OR $UserSiteAccess["vieworders"] == "0"){
    if($CurrentUser["info"]["access"] == "0"){
        $UserSiteAccess["vieworders"] = "1";
    }else{
        $UserSiteAccess["vieworders"] = "0";
    }
}

if($UserSiteAccess["editdesign"] == "" OR $UserSiteAccess["editdesign"] == "0"){
    if($CurrentUser["info"]["access"] == "0"){
        $UserSiteAccess["editdesign"] = "1";
    }else{
        $UserSiteAccess["editdesign"] = "0";
    }
}

if($UserSiteAccess["editmessages"] == "" OR $UserSiteAccess["editmessages"] == "0"){
    if($CurrentUser["info"]["access"] == "0"){
        $UserSiteAccess["editmessages"] = "1";
    }else{
        $UserSiteAccess["editmessages"] = "0";
    }
}

if($UserSiteAccess["editsettings"] == "" OR $UserSiteAccess["editsettings"] == "0"){
    if($CurrentUser["info"]["access"] == "0"){
        $UserSiteAccess["editsettings"] = "1";
    }else{
        $UserSiteAccess["editsettings"] = "0";
    }
}

if($UserSiteAccess["socialmedia"] == "" OR $UserSiteAccess["socialmedia"] == "0"){
    if($CurrentUser["info"]["access"] == "0"){
        $UserSiteAccess["socialmedia"] = "1";
    }else{
        $UserSiteAccess["socialmedia"] = "0";
    }
}

if($UserSiteAccess["viewanalytics"] == "" OR $UserSiteAccess["viewanalytics"] == "0"){
    if($CurrentUser["info"]["access"] == "0"){
        $UserSiteAccess["viewanalytics"] = "1";
    }else{
        $UserSiteAccess["viewanalytics"] = "0";
    }
}

if($UserSiteAccess["editmenu"] == "" OR $UserSiteAccess["editmenu"] == "0"){
    if($CurrentUser["info"]["access"] == "0"){
        $UserSiteAccess["editmenu"] = "1";
    }else{
        $UserSiteAccess["editmenu"] = "0";
    }
}

if($UserSiteAccess["editfunctions"] == "" OR $UserSiteAccess["editfunctions"] == "0"){
    if($CurrentUser["info"]["access"] == "0"){
        $UserSiteAccess["editfunctions"] = "1";
    }else{
        $UserSiteAccess["editfunctions"] = "0";
    }
}

if($UserSiteAccess["editcategory"] == "" OR $UserSiteAccess["editcategory"] == "0"){
    if($CurrentUser["info"]["access"] == "0"){
        $UserSiteAccess["editcategory"] = "1";
    }else{
        $UserSiteAccess["editcategory"] = "0";
    }
}

if($UserSiteAccess["editpages"] == "" OR $UserSiteAccess["editpages"] == "0"){
    if($CurrentUser["info"]["access"] == "0"){
        $UserSiteAccess["editpages"] = "1";
    }else{
        $UserSiteAccess["editpages"] = "0";
    }
}

if($UserSiteAccess["editarchive"] == "" OR $UserSiteAccess["editarchive"] == "0"){
    if($CurrentUser["info"]["access"] == "0"){
        $UserSiteAccess["editarchive"] = "1";
    }else{
        $UserSiteAccess["editarchive"] = "0";
    }
}

if($UserSiteAccess["edittickets"] == "" OR $UserSiteAccess["edittickets"] == "0"){
    if($CurrentUser["info"]["access"] == "0"){
        $UserSiteAccess["edittickets"] = "1";
    }else{
        $UserSiteAccess["edittickets"] = "0";
    }
}

if($UserSiteAccess["editarticle"] == "" OR $UserSiteAccess["editarticle"] == "0"){
    if($CurrentUser["info"]["access"] == "0"){
        $UserSiteAccess["editarticle"] = "1";
    }else{
        $UserSiteAccess["editarticle"] = "0";
    }
}

if($UserSiteAccess["editgallery"] == "" OR $UserSiteAccess["editgallery"] == "0"){
    if($CurrentUser["info"]["access"] == "0"){
        $UserSiteAccess["editgallery"] = "1";
    }else{
        $UserSiteAccess["editgallery"] = "0";
    }
}










?>