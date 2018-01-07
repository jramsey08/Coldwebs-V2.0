<?php
include("../../config/encrypt.php");
include("../../config/functions.php");
include("../../config/database.php");


$Date = strtotime("now");


$Month = date("m", $Date);
$Day = date("d", $Date);
$Year = date("y", $Date);

$sDate = "$Month.$Year";


$query = "SELECT browser_name, COUNT(id) FROM tracker WHERE date3='$sDate' GROUP BY browser_name";
$result = mysql_query($query) or die(mysql_error());
while($row = mysql_fetch_array($result)){
    $Count = $Count + 1;
    $lCount = $row['COUNT(id)'];

    $Data["$Count"]["count"] = $lCount;
    $Data["$Count"]["name"] = $row['browser_name'];
}

?>

var <?php echo $_GET['name']; ?> = [
<?php
if(is_array($Data)){
    foreach($Data as $value){
        $Countw = $Countw + 1;
        echo "{ label: " . '"' . $value['name'] . '", data: ' . $value['count'] . "}";
        if($Countw != $Count){
            echo ",";
        }
        echo "\n";
    }
}
?>];
