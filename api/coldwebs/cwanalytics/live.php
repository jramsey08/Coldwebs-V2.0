<?php
include("../../config/encrypt.php");
include("../../config/functions.php");
include("../../config/database.php");
?>

var liveusers = [
<?php
$Date = strtotime("now");

$Month = date("m", $Date);
$Day = date("d", $Date);
$Year = date("y", $Date);

$sDate = "$Month.$Year";
$nDate = "$Month-$Day-$Year";

$query = "SELECT *, COUNT(id) FROM tracker WHERE date2='$nDate' GROUP BY id";
$result = mysql_query($query) or die(mysql_error());
while($row = mysql_fetch_array($result)){
    $Count = $Count + 1;
    $lCount = rand(2,400);
    $rand = rand(2,400);
    $lCount = $row['online'];
    if($Count == "1"){
        echo "[1, $lCount]";
    }else{
        echo ",[1, $lCount]";
    }
}
?>
];