<?php
include("../../config/encrypt.php");
include("../../config/functions.php");
include("../../config/database.php");

if($_GET['type'] == "now"){
    $Date = strtotime("now");
}else if($_GET['type'] == "last"){
    $Date = strtotime("last month");
}

$Month = date("m", $Date);
$Day = date("d", $Date);
$Year = date("y", $Date);

$sDate = "$Month.$Year";


$query = "SELECT date2, COUNT(id) FROM tracker WHERE date3='$sDate' GROUP BY date2"; 
$result = mysql_query($query) or die(mysql_error());
while($row = mysql_fetch_array($result)){
    $Count = $Count + 1;
    $Lday = str_replace($Month,"",$row['date2']);
    $Lday = str_replace($Year,"",$Lday);
    $Lday = str_replace("-","",$Lday);
    $lCount = $row['COUNT(id)'];
    $Check_Value = substr("$Lday",0,1);
    if($Check_Value == "0"){
        $Lday = "-$Lday";
        $Lday = str_replace("-0","",$Lday);
    }
    $Data["$Lday"] = "[$Lday, $lCount]";
}


foreach($Data as $dat => $piece){
    $Check_Value = substr("$piece",0,2);
    if($Check_Value == "[0"){
        $Data["$dat"] = str_replace("[0","[",$piece);
    }
}


$x = "31";
$loop = "0";

if(!is_array($Data)){
    $Data = array();
}

while($loop < $x ){
    $Rand = rand(0,99);
    $loop = $loop + 1;
    if(array_key_exists($loop,$Data)){
        $Chart["$loop"] = $Data["$loop"];
    }else{
        if($No_Data == "1"){
            $Chart["$loop"] = "[$loop, $Rand]";
        }else{
            $Chart["$loop"] = "[$loop, 0]";
        }
    }
}
?>

var <?php echo $_GET['name']; ?> = [
<?php 
foreach($Chart as $value){
    $Countw = $Countw + 1;
    echo $value;
    if($Countw != "31"){
        echo ",";
    }
    echo "\n";
}
?>];