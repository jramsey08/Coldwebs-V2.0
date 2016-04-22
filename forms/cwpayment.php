<?php
$Trans_Id = OtarDecrypt($key,$_GET['type']);

$query = "SELECT * FROM trans WHERE id='$Trans_Id'"; 
$result = mysql_query($query) or die(mysql_error());
$row = mysql_fetch_array($result);

$Cw_Shipment = "10";
$Cart_Total = $row['price'];

$ReturnComplete['id'] = $Trans_Id;
$ReturnComplete['status'] = "1";
$ReturnComplete = OtarEncrypt($key,$ReturnComplete);
$ReturnCanceled['id'] = $Trans_Id;
$ReturnCanceled['status'] = "0";
$ReturnCanceled = OtarEncrypt($key,$ReturnCanceled);


$Structure_Type = "payment-process";

include("$THEME/layout.php");
include("api/paypal/payment.php");


?>