<?php
// INCLUDE COLDWEB DEFAULT FUNCTIONS \\
require_once("config/ini.php");
require_once("config/functions.php");
require_once("../config/encrypt.php");
require_once("../config/database.php");

<<<<<<< HEAD

=======
$session = new session();
session_set_save_handler(array(&$session,"open"), 
                         array(&$session,"close"), 
                         array(&$session,"read"), 
                         array(&$session,"write"), 
                         array(&$session,"destroy"), 
                         array(&$session,"gc")); 
>>>>>>> origin/master
session_start();
date_default_timezone_set('America/New_York'); 

if($_COOKIE["_PbRemoteSess"] == ""){
    if($PB_Remote == "1"){
        setcookie( "_PbRemoteSess", "$_GET[session]", $date_of_expiry, "/", $Website_Url_Auth);
        $PB_Remote = "1";
    }
}else{
    $PB_Remote = "1";
}

$Current_Ip = gethostbyaddr($_SERVER['REMOTE_ADDR']);
$number_of_days = 1;
$date_of_expiry = time() + 60 * 60 * 24 * $number_of_days;

// PULL CURRENT DOMAIN INFO \\
$Website_Ur = curPageURL();
$Website_Url_Auth = Website_Domain();

$Session_Cart = RandomCode(50);
$Session_Generate = $_COOKIE["_CwSess"];

if($Session_Generate == ""){
    $Session_Generate = RandomCode(25);
}

if($_COOKIE["_CwSess"] == ""){
    setcookie( "_CwSess", $Session_Generate, $date_of_expiry, "/", $Website_Url_Auth);
}

if($_COOKIE["_CwCart"] == ""){
    setcookie( "_CwCart", $Session_Cart, $date_of_expiry, "/", $Website_Url_Auth);
}

$Session['id'] = $_COOKIE["_CwSess"];
$Log_Session = $_COOKIE["_CwSess"];
$_SESSION["sessiongenerate"] = $Session_Generate;

$query = "SELECT * FROM login_session WHERE session='$Session_Generate' AND trash='0' AND ipaddress='$Current_Ip' AND active='1'";
$result = mysql_query($query) or die(mysql_error());
$row = mysql_fetch_array($result);
$Current_Admin = $row['userid'];
$_SESSION["current_user"] = $Current_Admin;


#print_r($_SESSION);

?>