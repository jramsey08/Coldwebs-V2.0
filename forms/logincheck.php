<?php
if($_COOKIE['manual_webid'] == ""){
    $LogWebId = $WebId;
}else{
    $LogWebId = $_COOKIE["_CwOrgWebId"];
}


$Login = "0";
if($Current_Admin == ""){
    $Login = 0;
}else{
    $Login = 1;
    $query = "SELECT * FROM login_session WHERE userid='$Current_Admin' AND session='$Session_Generate' AND active='1' AND ipaddress='$Current_Ip' AND webid='$_COOKIE[_CwOrgWebId]'";
    $result = mysql_query($query) or die(mysql_error());
    $row = mysql_fetch_array($result);
    $Find_Account = $row['userid'];
    if($Find_Account == ""){
      $Login = 0;
    }
}

if($Login == "0"){
    $Session_Id = 0;
    $result = mysql_query("UPDATE login_session SET active='0' WHERE userid='$AccountId' AND session='$Session_Generate' AND ipaddress='$Current_Ip' AND webid='$_COOKIE[_CwOrgWebId]'") 
    or die(mysql_error());
    session_destroy();
    $Redirect = "Login?redirect=$_GET[redirect]&error=$_GET[error]";
    $Domain = $Siteinfo["domain"];
    header("Location: http://$Website_Url_Auth/$Redirect");
}




?>