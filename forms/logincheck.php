<?php
$Login = "0";

if($Current_Admin == ""){
    $Login = 0;
}else{
    $Login = 1;
    $query = "SELECT * FROM login_session WHERE userid='$Current_Admin' AND session='$Session_Generate' AND active='1' AND ipaddress='$Current_Ip'";
    $result = mysql_query($query) or die(mysql_error());
    $row = mysql_fetch_array($result);
    $Find_Account = $row['userid'];
    #if($Find_Account == ""){
      #$Login = 0;
    #}
}

if($Login == "0"){
    $Session_Id = 0;
    $result = mysql_query("UPDATE login_session SET active='0' WHERE userid='$AccountId' AND session='$Session_Generate' AND ipaddress='$Current_Ip'") 
    or die(mysql_error());
    session_destroy();
    $Redirect = "Login";
    $Domain = $Siteinfo["domain"];
    header("Location: $Domain/$Redirect");
}


?>