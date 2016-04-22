<?php

$Item_Id = $_POST['item_id'];
$Item_Cart = $_POST['cart_item'];
$Item_Qty = $_POST['qty'];
$Item_Price = $_POST['price'];

$Item_Content['size'] = $_POST['size'];
$Item_Content['color'] = $_POST['color'];
$Item_Content = serialize($Item_Content);



if($Item_Cart == ""){
    $query = "SELECT * FROM cw_cart WHERE item='$Item_Id' AND active='1' AND trash='0' AND content='$Item_Content' AND session='$Session[cart]'";
    $result = mysql_query($query) or die(mysql_error());
    $row = mysql_fetch_array($result);
    if($row['id'] != ""){
        $Item_Cart = $row['id'];
    }
    $Item_Qty = $Item_Qty + $row['qty'];
}


$query = "SELECT * FROM articles WHERE id='$Item_Id' AND active='1' AND trash='0'";
$result = mysql_query($query) or die(mysql_error());
$row = mysql_fetch_array($result);
$row = PbUnSerial($row);
if($Item_Qty >= $row['content']['qty']){
    $Item_Qty = $row['content']['qty'];
}
if($Item_Qty == "" OR $Item_Qty <= "0"){
    $Item_Qty = "0";
}


if($Item_Cart == ""){
    if($Item_Qty <= "0"){
    }else{
        mysql_query("INSERT INTO cw_cart(session, item, price, content, qty) VALUES('$Session[cart]', '$Item_Id', '$Item_Price', '$Item_Content', '$Item_Qty' ) ") 
        or die(mysql_error());
    }
}else{
    if($Item_Qty <= "0"){
        $result = mysql_query("UPDATE cw_cart SET active='0' WHERE id='$Item_Cart'")
        or die(mysql_error());
        $result = mysql_query("UPDATE cw_cart SET qty='0' WHERE id='$Item_Cart'")
        or die(mysql_error());
    }else{
        $result = mysql_query("UPDATE cw_cart SET content='$Item_Content' WHERE id='$Item_Cart'")
        or die(mysql_error());
        $result = mysql_query("UPDATE cw_cart SET qty='$Item_Qty' WHERE id='$Item_Cart'")
        or die(mysql_error());
        $result = mysql_query("UPDATE cw_cart SET price='$Item_Price' WHERE id='$Item_Cart'")
        or die(mysql_error());
    }
}



$REDIRECT = "/?ItemAdded=1";
$Domain = $Array["siteinfo"]["domain"];
header("Location: $Domain/$REDIRECT");
?>