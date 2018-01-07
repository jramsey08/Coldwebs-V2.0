<?php
include_once("config/usersOnline.class.php"); 
$visitors_online = new usersOnline();



$query = "SELECT * FROM tracker WHERE online='1' AND webid='$WebId' GROUP BY ipaddress"; 
$result = mysql_query($query) or die(mysql_error());
while($row = mysql_fetch_array($result)){
$OnlineUsers = $OnlineUsers + 1;
}

$OnlineUsers = "1";

?>