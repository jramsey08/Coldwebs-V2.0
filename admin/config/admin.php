<?php
$DecryptId = OtarDecrypt($key,$_GET['type']);

$query = "SELECT * FROM admin WHERE type='menu' AND id='$DecryptId'";
$result = mysql_query($query) or die(mysql_error());
$Menu = mysql_fetch_array($result);
$Menu = PbUnSerial($Menu);



$query = "SELECT * FROM admin WHERE type='menu' AND url='$Get_Url' ANd active='1' AND trash='0'";
$result = mysql_query($query) or die(mysql_error());
$Manual = mysql_fetch_array($result);
$Manual = PbUnSerial($Manual);
$Manual_Access = $Manual['access'];
$Manual['url'] = strtolower($Manual['url']);
$ManualTheme = $Manual['theme'];

if($ManualTheme == ""){
    $ManualTheme = "cwadmin";
}

if($Manual['id'] != ""){
    if($UserSiteAccess[$Manual_Access] == "1" OR $Manual['access'] == ""){
        if($Get_Url == $Manual['url']){
            $OverRight['theme'] = "theme/$ManualTheme";
            if($Get_Type == ""){
                $OverRight['file'] = $Manual['content']['url'];
            }else{
                $OverRight['file'] = $Manual['content']['type'];
            }
        }
    }
}





?>