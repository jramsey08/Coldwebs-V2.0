<?php
$result = mysqli_query($CwDb,"SELECT * FROM users WHERE id='$Current_Admin' AND webid='$_COOKIE[_CwOrgWebId]'") or die(mysql_error());
    $CurrentUser = mysqli_fetch_assoc($result);
    $CurrentUser = CwOrganize($CurrentUser,$Array);
    $Array['userinfo'] = $CurrentUser;
    $Current_Admin_Name = $CurrentUser['name'];
    $Current_Admin_Access = $CurrentUser['info']['access'];
    $Current_Admin_Id = $CurrentUser['id'];
    $UserSiteAccess = $CurrentUser['info']['siteaccess'];
    $result = mysqli_query($CwDb,"SELECT * FROM articles WHERE type='author' AND category='$Current_Admin' AND webid='$_COOKIE[_CwOrgWebId]'") or die(mysql_error());
    $row = mysqli_fetch_assoc($result);
    $Current_Author = $row['id'];
    if($Array['userinfo']['info']['img'] == ""){
        $Array['userinfo']['info']['img'] = "/admin/theme/cwadmin/uploads/avatar.png";
    }

if($UserSiteAccess["viewoffline"] == "1" OR $Current_Admin_Access == "0"){
    $View_site = "1";
}

?>