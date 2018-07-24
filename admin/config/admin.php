<?php
$DecryptId = OtarDecrypt($key,$_GET['type']);

$query = "SELECT * FROM admin WHERE type='menu' AND id='$DecryptId'";
$result = mysqli_query($CwDb,$query);
$Menu = mysqli_fetch_assoc($result);
$Menu = CwOrganize($Menu,$Array);



$query = "SELECT * FROM admin WHERE type='menu' AND url='$Get_Url' AND active='1' AND trash='0'";
$result = mysqli_query($CwDb,$query);
$Manual = mysqli_fetch_assoc($result);
$Manual = CwOrganize($Manual,$Array);
$Manual_Access = $Manual['access'];
$Manual['url'] = strtolower($Manual['url']);
$ManualTheme = $Manual['theme'];

if($ManualTheme == ""){
    $ManualTheme = $THEME;
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