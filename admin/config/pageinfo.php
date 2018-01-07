<?php

if($Get_Url == "ecommerce-orders"){
    $PageInfo = $Trans;
}
if($Get_Url == "useraccess"){
    $PageInfo = $UserAccess;
}
if($ProductId !=""){
    $PageInfo = $ProductInfo;
}
if($TransferId !=""){
    $PageInfo = $TransferInfo;
}
if($Get_Url == "users" AND $Get_Type!="" OR $Get_Url == "force" AND $Get_Type!=""){
    $PageInfo = $ListedUser;
}

if($PageInfo["id"] == ""){
    $QuEry = "SELECT * FROM admin WHERE url='$Get_Url'"; 
    $ReSult = mysql_query($QuEry) or die(mysql_error());
    $PageInfo = mysql_fetch_array($ReSult);
}

if($PageInfo["name"] == ""){
    $PageInfo["name"] = "UnDefined Page";
}
?>