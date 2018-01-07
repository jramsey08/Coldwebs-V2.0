<?php

$Website = $_SERVER['HTTP_HOST'];


$query = "SELECT * FROM info WHERE domain='' AND active='1' AND webid='$WebId'";
$result = mysql_query($query) or die(mysql_error());
$row = mysql_fetch_array($result);
$row['COUNT(ipaddress)'];


?>