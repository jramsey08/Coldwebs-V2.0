<?php
$Cart_Session = $Session['cart'];
$SearchCart = OtarDecrypt($key,$_GET['type']);
$Trans = $_SESSION['trans'];

$TransData = CwTransInfo($Trans,$Array);
$Cw_Shipping = $TransData["shipping"]; 

if($Cw_Shipping == ""){
    $Cw_Shipping = $Default_Shipping;
}

$Cart_Info = CwCartTotal($Cart_Session);
$CartCount = $Cart_Info['count'];
$CwCartSubTotal = $Cart_Info['total'];

$query = "SELECT * FROM cw_coupon WHERE cart='$Cart_Session' AND webid='$WebId'";
$result = mysql_query($query) or die(mysql_error());
$row = mysql_fetch_array($result);
$row = CwOrganize($row,$Array);
if($row['type'] == "percent"){
    $Discount = $row['amount'] / "100";
    $Cw_Discount = $CwCartSubTotal * $Discount;
}else{
    $Cw_Discount = $row['amount'];
}

if($Cw_Discount == ""){
    $Cw_Discount = "0";
}
$Cw_Discount = number_format($Cw_Discount, "2");
if($Cw_Tax == ""){
    $Cw_Tax = "0";
}
if($CwCartTotal == ""){
    $CwCartTotal = "0";
}
if($Cw_Shipping == ""){
    $Cw_Shipping = "0";
}

$Cw_Tax = $CwCartSubTotal * $Cw_Tax;
$CwCartTotal = $CwCartSubTotal + $Cw_Tax;
$CwCartTotal = $CwCartTotal + $Cw_Shipping;
$CwCartTotal = $CwCartTotal - $Cw_Discount;
$CwCartTotal = number_format("$CwCartTotal", 2);
if($CartCount <= "0" OR $CartCount == ""){
    $CwCartTotal = "0";
    $CartCount == "0";
}
if($Cw_Shipping == "0"){
    $Cw_Shipping = "Free";
}

if($Get_Url == "checkout"){
    $TransInfo = Cw_Quick_Info("trans",$WebId,$Trans,$Array);
    $Billing = $TransInfo["other"]["billing"];
    $CheckOTher = $TransInfo["other"];
    if($Billing["firstname"] != ""){
        $CurrentUser["info"]["firstname"] = $Billing["firstname"];
    }
    if($Billing["lastname"] != ""){
        $CurrentUser["info"]["lastname"] = $Billing["lastname"];;
    }
    if($Billing["company"] != ""){
        $CurrentUser["info"]["address"]["company"] = $Billing["company"];
    }
    if($CheckOTher["address"]["1"] != ""){
        $CurrentUser["info"]["address"]["1"] = $CheckOTher["address"]["1"];
    }
    if($CheckOTher["address"]["2"] != ""){
        $CurrentUser["info"]["address"]["2"] = $CheckOTher["address"]["2"];
    }   
    if($CheckOTher["address"]["3"] != ""){
        $CurrentUser["info"]["address"]["3"] = $CheckOTher["address"]["3"];
    }        
    if($CheckOTher["address"]["4"] != ""){
        $CurrentUser["info"]["address"]["4"] = $CheckOTher["address"]["4"];
    }        
    if($CheckOTher["address"]["5"] != ""){
        $CurrentUser["info"]["address"]["5"] = $CheckOTher["address"]["5"];
    }        
    if($CheckOTher["address"]["6"] != ""){
        $CurrentUser["info"]["address"]["6"] = $CheckOTher["address"]["6"];
    }    
    if($Billing["telephone"] != ""){
        $CurrentUser["info"]["address"]["telephone"]= $Billing["telephone"];
    }     
    if($Billing["fax"] != ""){
        $CurrentUser["info"]["address"]["fax"]= $Billing["fax"];
    }
}


if($Get_Url == "my-orders" AND $Get_Type !=""){
    $OrderId = OtarDecrypt($key,$_GET["type"]);
    $query = "SELECT * FROM trans WHERE active='1' AND trash='0' AND user='$Current_Admin_Id' AND id='$OrderId' AND webid='$WebId'";
    $result = mysql_query($query) or die(mysql_error());
    $OrderInfo = $row = mysql_fetch_array($result);
    $OrderInfo = CwOrganize($OrderInfo,$Array);
    $OrderOther = $OrderInfo["other"];
    $BillingInfo = $OrderOther["billing"];
    $ShipingMethod = Cw_Quick_Info("cwoptions",$WebId,$OrderInfo["delivery_option"],$Array);
    $PaymentMethod = Cw_Quick_Info("cwoptions",$WebId,$OrderInfo["method"],$Array);
    $Trans_Cart = CwCartTotal($OrderInfo["cart"]);
    $Trans_Delivery = $OrderInfo["other"]["delivery"];
}

$query = "SELECT * FROM trans WHERE active='1' AND trash='0' AND id='$Trans' AND webid='$WebId'";
$result = mysql_query($query) or die(mysql_error());
while($row = mysql_fetch_array($result)){
    $TransInfo = CwTransInfo($TransInfo,$Array);
    if($TransInfo['date'] == ""){
        $TransInfo['date'] = strtotime("yesterday");
    }
    $query = "SELECT * FROM cw_cart WHERE active='1' AND trash='0' AND session='$Cart_Session' AND webid='$WebId'";
    $result = mysql_query($query) or die(mysql_error());
    while($row = mysql_fetch_array($result)){
        $row = CwOrganize($row,$Array);
        $Ccount = $Ccount + 1;
        $CartInfo["$Ccount"]['id'] = $row['id'];
        $CartInfo["$Ccount"]['session'] = $row['session'];
        $CartInfo["$Ccount"]['cart'] = $row['cart'];
        $CartInfo["$Ccount"]['item'] = $row['item'];
        $CartInfo["$Ccount"]['user'] = $row['user'];
        $CartInfo["$Ccount"]['qty'] = $row['qty'];
        $CartInfo["$Ccount"]['active'] = $row['active'];
        $CartInfo["$Ccount"]['trash'] = $row['trash'];
        $CartInfo["$Ccount"]['other'] = $row['other'];
        $CartInfo["$Ccount"]['price'] = $row['price'];
        $CartInfo["$Ccount"]['other'] = unserialize($CartInfo['other']);
    }
}


if($_GET['cwedit'] != ""){
    $Cart_Item['id'] = OtarDecrypt($key,$_GET['cwedit']);
    $query = "SELECT * FROM cw_cart WHERE active='1' AND trash='0' AND id='$Cart_Item[id]' AND webid='$WebId'"; 
    $result = mysql_query($query) or die(mysql_error());
    $row = mysql_fetch_array($result);
    $row = CwOrganize($row,$Array);
    $Cart_Item['color'] = $row['content']['color'];
    $Cart_Item['size'] = $row['content']['size'];
    $Cart_Item['price'] = $row['price'];
    $Cart_Item['qty'] = $row['qty'];
}
?>