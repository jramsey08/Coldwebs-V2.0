var musicPlayList = [
<?php
include("ref/config.php");
$Query = "SELECT * FROM articles WHERE type='album' AND active='1' AND trash='0' AND id='$Album_Id'";
$Result = mysql_query($Query) or die(mysql_error());
$Row = mysql_fetch_array($Result);
$Row = PbUnSerial($Row);

$query = "SELECT * FROM images WHERE album='$Album_Id' AND type='track' AND active='1' AND trash='0' ORDER BY LIST";
$result = mysql_query($query) or die(mysql_error());
while($row = mysql_fetch_array($result)){
$Count = $Count + 1;
if($row['img'] == ""){
    $row['img'] = $Row['content']['img'];
}
if($Count >= "2"){
    echo ",";
}
?>
{"title":"<strong class=\"title\"><?php echo $Row['content']['name']; ?><\/strong><span class=\"track-name\"><?php echo $row['name']; ?><\/span>","poster":"<?php echo $row['img']; ?>","mp3":"<?php echo $row['url']; ?>"}
<?php } ?>
];