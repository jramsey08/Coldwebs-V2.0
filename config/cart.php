<?php

$Cart_Session = $_SESSION['COOKIEPHPSESSID'];
$Cart_Session = "123";
$SearchCart = OtarDecrypt($key,$_GET['type']);
$Trans = OtarDecrypt($key,$_POST['trans']);


$query = "SELECT * FROM cw_cart WHERE active='1' AND trash='0' AND session='$Cart_Session'"; 
$result = mysql_query($query) or die(mysql_error());
while($row = mysql_fetch_array($result)){
    $CwCart['id'] = $row['id'];
    $CwCart['session'] = $row['session'];
    $CwCart['cart'] = $row['cart'];
    $CwCart['item'] = $row['item'];
    $CwCart['user'] = $row['user'];
    $CwCart['qty'] = $row['qty'];
    $CwCart['active'] = $row['active'];
    $CwCart['trash'] = $row['trash'];
    $CwCart['other'] = $row['other'];
    $CwCart['price'] = $row['price'];
    $CwCart['other'] = unserialize($CwCart['other']);
    $CwTotal = $row['price'] * $row['qty'];
    $CwCartTotal = $CwCartTotal + $CwTotal;
}

$Cw_Tax = $CwCartTotal * $Cw_Tax;
$CwCartTotal = $CwCartTotal + $Cw_Tax;
$CwCartTotal = $CwCartTotal + $Cw_Shipping;
$CwCartTotal = $CwCartTotal - $Cw_Discount;

if($Get_Url == "orders"){
    $query = "SELECT * FROM trans WHERE active='1' AND trash='0' AND cart='$SearchCart'";
}else{
    $query = "SELECT * FROM trans WHERE active='1' AND trash='0' AND id='$Trans'";
}
$result = mysql_query($query) or die(mysql_error()); while($row = mysql_fetch_array($result)){
    $TransInfo['id'] = $row['id'];
    $TransInfo['method'] = $row['method'];
    $TransInfo['type'] = $row['type'];
    $TransInfo['user'] = $row['user'];
    $TransInfo['status'] = $row['status'];
    $TransInfo['price'] = $row['price'];
    $TransInfo['active'] = $row['active'];
    $TransInfo['trash'] = $row['trash'];
    $TransInfo['session'] = $row['session'];
    $TransInfo['typeid'] = $row['typeid'];
    $TransInfo['other'] = $row['other'];
    $TransInfo['notes'] = $row['notes'];
    $TransInfo['attend'] = $row['attend'];
    $TransInfo['guest'] = $row['guest'];
    $TransInfo['cart'] = $row['cart'];
    $TransInfo['delivery_option'] = $row['delivery_option'];

    $TransInfo['other'] = unserialize($TransInfo['other']);
    $query = "SELECT * FROM cw_cart WHERE active='1' AND trash='0' AND session='$Cart_Session'"; 
    $result = mysql_query($query) or die(mysql_error());
    while($row = mysql_fetch_array($result)){
        $CartInfo['id'] = $row['id'];
        $CartInfo['session'] = $row['session'];
        $CartInfo['cart'] = $row['cart'];
        $CartInfo['item'] = $row['item'];
        $CartInfo['user'] = $row['user'];
        $CartInfo['qty'] = $row['qty'];
        $CartInfo['active'] = $row['active'];
        $CartInfo['trash'] = $row['trash'];
        $CartInfo['other'] = $row['other'];
        $CartInfo['price'] = $row['price'];
        $CartInfo['other'] = unserialize($CartInfo['other']);
    }
}


?>