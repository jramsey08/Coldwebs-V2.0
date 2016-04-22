<?php
include("../../../config/encrypt.php");
include("../../../config/functions.php");
include("../../../config/database.php");

$query = "SELECT * FROM info";
$result = mysql_query($query) or die(mysql_error());
$SiteInfo = mysql_fetch_array($result);
$SiteInfo = PbUnSerial($SiteInfo);

?>