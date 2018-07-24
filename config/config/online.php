<?php
include_once("config/usersOnline.class.php"); 
$visitors_online = new usersOnline();



$query = "SELECT * FROM tracker WHERE online='1' AND webid='$WebId' GROUP BY ipaddress"; 
$result = mysqli_query($CwDb, $query);
while($row = mysqli_fetch_assoc($result)){
$OnlineUsers = $OnlineUsers + 1;
}

$OnlineUsers = "1";

?>