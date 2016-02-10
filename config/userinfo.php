<?php

$result = mysql_query("SELECT * FROM users WHERE id='$Current_Admin'") or die(mysql_error());
$row = mysql_fetch_array( $result );
#$row = PbUnSerial($row);
    $row['info'] = unserialize($row['info']);
    #$row['other'] = unserialize($row['info']);
    $Array['userinfo'] = $row;
    
    $CurrentUser = $row;
    $Current_Admin_Name = $row['name'];
    $Current_Admin_Access = $row['info']['access'];
    $Current_Admin_Id = $row['id'];
    $UserSiteAccess = $row['info']['siteaccess'];


$result = mysql_query("SELECT * FROM articles WHERE type='author' AND category='$Current_Admin'") or die(mysql_error());
$row = mysql_fetch_array( $result );
    $Current_Author = $row['id'];


if($Array['userinfo']['info']['img'] == ""){
    $Array['userinfo']['info']['img'] = "http://www.vintry.com.au/wp-content/themes/company/images/default-avatar.png";
}

?>