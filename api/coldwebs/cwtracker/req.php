<?php
include("../../config/session.php");


$Url =$_GET['url'];
$Req = $_GET['req'];
$Sess = $_GET['session'];
$Page = $_GET['page'];
$Idle = $_GET['idle'];

$Date = strtotime("now");

$Content['url'] = $Url;
$Content['time'] = $Date;
$Content = serialize($Content);

$query = "SELECT * FROM ws_sessions WHERE session='$Sess' AND user='$Temp_User'";
$result = mysql_query($query) or die(mysql_error());
$row = mysql_fetch_array($result);
if($row['id'] == ""){
    if($Sess != ""){
        mysql_query("INSERT INTO ws_sessions (session, user, content, page, date, idle) VALUES('$Sess', '$Temp_User', '$Content', '$Page', '$Date', '$Idle' ) ") or die(mysql_error());
    }
}

if($Req == "0"){
    $result = mysql_query("UPDATE ws_sessions SET active='0' WHERE session='$Sess' AND user='$Temp_User'")or die(mysql_error());
    $result = mysql_query("UPDATE ws_sessions SET page='external' WHERE session='$Sess' AND user='$Temp_User'")or die(mysql_error());
}else if($Req == "1"){
    $result = mysql_query("UPDATE ws_sessions SET active='1' WHERE session='$Sess' AND user='$Temp_User'")or die(mysql_error());
    $result = mysql_query("UPDATE ws_sessions SET page='$Page' WHERE session='$Sess' AND user='$Temp_User'")or die(mysql_error());
}

$result = mysql_query("UPDATE ws_sessions SET content='$Content' WHERE session='$Sess' AND user='$Temp_User'")or die(mysql_error());
$result = mysql_query("UPDATE ws_sessions SET idle='$Idle' WHERE session='$Sess' AND user='$Temp_User'")or die(mysql_error());



?>