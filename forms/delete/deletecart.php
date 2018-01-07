<?php

$Page = $_GET['end'];
$Page = OtarDecrypt($key, $Page);
$Post = Cw_Quick_Info("articles", $WebId, $Page, $Array);
$result = mysql_query("UPDATE cw_cart SET trash='1' WHERE id='$Page' AND webid='$WebId'") 
or die(mysql_error());
// TRACKS CHANGES MADE FROM USERS \\
    $Info = array();
    $Info["webid"] = $WebId;
    $Info["user"] = $Current_Admin_Id;
    $Info["error"] = $error;
    $Info["tracker"] = $Load_Sess;
    $Info["id"] = $Page;
    $Info["type"] = "cw_cart";
    Cw_Changes($Info, $Article, $Array);
/////////////////////////////////////////
header("Location: http://$Website_Url_Auth/Cart");

?>