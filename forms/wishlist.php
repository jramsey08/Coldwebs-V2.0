<?php
$User = $Current_Admin_Id;
$Item = $_GET["item"];
$Domain = $Array['siteinfo']['domain'];

$row = Cw_Fetch("SELECT * FROM articles WHERE trash='0' AND active='1' AND type='wishlist' AND other='$Item' AND info='$User' AND webid='$WebId'",$Array);

if($row['id'] != ""){
    $NewHist = $row['hits'] + 1;
    $result = Cw_Query("UPDATE articles SET hits='$NewHits' WHERE id='$row[id]' AND webid='$WebId'");
}else{
    Cw_Query("INSERT INTO articles (info, other, type, hits, webid) VALUES('$User', '$Item', 'wishlist', '1', '$WebId') "); 
}	



header("Location: http://$Website_Url_Auth/My-Wishlist");

?>