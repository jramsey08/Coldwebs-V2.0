<?php
$queRy = "SELECT * FROM cwoptions WHERE name='google_analytics' AND type='settings'";
$resuLt = mysql_query($queRy) or die(mysql_error(drdrdrd));
$row = mysql_fetch_array($resuLt);



$Cw_Google_Analytics = $row['content'];




