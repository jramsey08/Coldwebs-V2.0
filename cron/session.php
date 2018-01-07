<?php
include("../config/session.php");


$Date = strtotime("- 5 minutes");


$query = "SELECT * FROM ws_sessions WHERE date < $Date ";
$resulT = mysql_query($query) or die(mysql_error());
while($row = mysql_fetch_array($resulT)){
    $Id = $row['id'];
    $result = mysql_query("UPDATE ws_sessions SET idle='1' WHERE id='$Id' ") 
    or die(mysql_error());
    $result = mysql_query("UPDATE ws_sessions SET active='0' WHERE id='$Id'") 
    or die(mysql_error());
}
?>