<?php
define('ROOTPATH', __DIR__);
date_default_timezone_set('America/New_York');
if($IndexUse != "1"){
    $CWROOT = str_replace("/config", "", ROOTPATH);
    define('CWROOT', $CWROOT);
}


require_once(ROOTPATH . "/functions.php");
require_once(ROOTPATH . "/encrypt.php");
require_once(ROOTPATH . "/database.php");
require_once(ROOTPATH . "/variable.php");
require_once(ROOTPATH . "/url.php");
require_once(ROOTPATH . "/offline.php");
$time_start = microtime_float();

session_start();



if($_COOKIE["_PbRemoteSess"] == ""){
    if($PB_Remote == "1"){
        setcookie( "_PbRemoteSess", "$_GET[session]", $date_of_expiry, "/", $Website_Url_Auth);
        $PB_Remote = "1";
    }
}else{
    $PB_Remote = "1";
}
$Current_Ip = $_SERVER['REMOTE_ADDR'];
$number_of_days = 1;
$date_of_expiry = time() + 60 * 60 * 24 * $number_of_days;
// PULL CURRENT DOMAIN INFO \\
$Website_Ur = curPageURL();
$Website_Url_Auth = Website_Domain();
$Session_Cart = RandomCode(100);
$Session_Generate = $_COOKIE["_CwSess"];
if($Session_Generate == ""){
    $Session_Generate = RandomCode(100);
}
if($_COOKIE["_CwSess"] == ""){
    setcookie( "_CwSess", $Session_Generate, $date_of_expiry, "/", $Website_Url_Auth);
}
if($_COOKIE["_CwCart"] == ""){
    setcookie( "_CwCart", $Session_Cart, $date_of_expiry, "/", $Website_Url_Auth);
}

$Session['id'] = $_COOKIE["_CwSess"];
$Session['cart'] = $_COOKIE["_CwCart"];
$Log_Session = $_COOKIE["_CwSess"];
$_SESSION["sessiongenerate"] = $Session_Generate;

$query = "SELECT * FROM login_session WHERE session='$Session_Generate' AND trash='0' AND ipaddress='$Current_Ip' AND active='1' AND webid='$_COOKIE[_CwOrgWebId]'";
$result = mysql_query($query) or die(mysql_error());
$row = mysql_fetch_array($result);
$Current_Admin = $row['userid'];
$_SESSION["current_user"] = $Current_Admin;

if($Current_Admin == ""){
    $Temp_User = $Current_Ip;
}else{
    $Temp_User = $Current_Admin;
}
if($_COOKIE['manual_webid'] == ""){
    $LogWebId = $WebId;
}else{
    $LogWebId = $_COOKIE["_CwOrgWebId"];
}


if($_GET["manualsiteswitch"] == "1"){
    if($_GET["switchsite"] != ""){
        $_SESSION["manual_webid"] = $_GET["switchsite"];
        setcookie( "manual_webid", $_GET["switchsite"], $date_of_expiry, "/", $Website_Url_Auth);  
        header("Location: http://$Website_Url_Auth/");
    }
}






$query = "SELECT * FROM ws_sessions WHERE session='$Session_Generate' AND user='$Temp_User' AND webid='$WebId'";
$result = mysql_query($query) or die(mysql_error());
$row = mysql_fetch_array($result);
if($row['id'] == ""){
    if($Session_Generate != ""){
        mysql_query("INSERT INTO ws_sessions (session, user, page, date, idle, webid) VALUES('$Session_Generate', '$Temp_User', 'initial', '$Date', '0', '$WebId' ) ") or die(mysql_error());
    }else{
        $result = mysql_query("UPDATE ws_sessions SET active='1' WHERE session='$Session_Generate' AND user='$Temp_User' AND webid='$WebId'") 
	or die(mysql_error());
        $result = mysql_query("UPDATE ws_sessions SET page='refresh' WHERE session='$Session_Generate' AND user='$Temp_User' AND webid='$$WebId'") 
	or die(mysql_error());
        $result = mysql_query("UPDATE ws_sessions SET user='$Temp_User' WHERE session='$Session_Generate' AND user='' AND webid='$$WebId'") 
	or die(mysql_error());
    }
}

?>