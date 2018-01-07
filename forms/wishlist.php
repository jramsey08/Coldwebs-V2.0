<?php
$User = $Current_Admin_Id;
$Item = $_GET["item"];
$Domain = $Array['siteinfo']['domain'];

$query = "SELECT * FROM articles WHERE trash='0' AND active='1' AND type='wishlist' AND other='$Item' AND info='$User' AND webid='$WebId'";
$result = mysql_query($query) or die(mysql_error());
$row = mysql_fetch_array($result);
$row = PbUnSerial($row);

if($row['id'] != ""){
    $NewHist = $row['hits'] + 1;
    $result = mysql_query("UPDATE articles SET hits='$NewHits' WHERE id='$row[id]' AND webid='$WebId'")or die(mysql_error());
}else{
    mysql_query("INSERT INTO articles (info, other, type, hits, webid) VALUES('$User', '$Item', 'wishlist', '1', '$WebId') ") or die(mysql_error()); 
}	



header("Location: http://$Website_Url_Auth/My-Wishlist");

?>