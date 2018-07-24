<?php

$OrderId = OtarDecrypt($key,$_GET["type"]);
$query = "SELECT * FROM trans WHERE active='1' AND trash='0' AND user='$Current_Admin_Id' AND id='$OrderId' AND webid='$WebId'";
$result = mysqli_query($CwDb,$query);
$OrderInfo = $row = mysqli_fetch_assoc($result);
$OrderInfo = CwOrganize($OrderInfo,$Array);
$OrderOther = $OrderInfo["other"];
$BillingInfo = $OrderOther["billing"];
$ShipingMethod = Cw_Quick_Info("cwoptions",$WebId,$OrderInfo["delivery_option"],$Array);
$PaymentMethod = Cw_Quick_Info("cwoptions",$WebId,$OrderInfo["method"],$Array);
$Trans_Cart = CwCartTotal($OrderInfo["cart"]);
$Trans_Delivery = $OrderInfo["other"]["delivery"];
$Trans_User = Cw_Quick_Info("users",$WebId,$OrderInfo["user"],$Array);
$Payment_Info = $OrderInfo["other"]["paymentinfo"];
?>