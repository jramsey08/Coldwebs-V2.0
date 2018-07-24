<?php
include("../config/session.php");

$Date = strtotime("- 5 minutes");


$result = mysqli_query($CwDb,"UPDATE ws_sessions SET idle='1' WHERE date < $Date ") 
or die(mysql_error());
$result = mysqli_query($CwDb,"UPDATE ws_sessions SET active='0' WHERE date < $Date") 
or die(mysql_error());

?>