<?php

$Website = $_SERVER['HTTP_HOST'];


$query = "SELECT * FROM info WHERE domain='' AND active='1' AND webid='$WebId'";
$result = mysqli_query($CwDb, $query);
$row = mysqli_fetch_assoc($result);
$row['COUNT(ipaddress)'];


?>