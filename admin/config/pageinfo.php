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
    $ReSult = mysqli_query($CwDb,$QuEry) ;
    $PageInfo = mysqli_fetch_assoc($ReSult);
}

if($PageInfo["name"] == ""){
    $PageInfo["name"] = "UnDefined Page";
}
?>