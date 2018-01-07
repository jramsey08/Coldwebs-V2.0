<?php

// DEFAULT VARIABLE VALUES \\
$Qty = $_POST['qty'];
$TransId = RandomCode("200");
$Delivery = $_POST['delivery_option'];
$Type = $_POST['type'];
$Cart = $_POST['cart'];
$CartTotal = $_POST['carttotal'];

$Other['firstname'] = $_POST['firstname'];
$Other['lastname'] = $_POST['lastname'];
$Other['email'] = $_POST['email'];
$Other['address'] = $_POST['address'];
$Other['message'] = $_POST['message'];
$Other = serialize($Other);

if($CwCartTotal == ""){
    $CwCartTotal = "0.00";
}

if($Type == ""){
    $Type = "General Merchandise";
}

// SELECT PAYMENT METHOD \\
$Method = $_POST['method'];
$Redirect = $_POST['method'];

// CHECK FOR PREVIOUS TRANSACTION LISTING \\

if($Prev_Trans == "1"){
    $TransId = "";
}else{
// CREATE TRANSACTION INFO \\
    mysql_query("INSERT INTO trans
    (user, id, status, method, type, price, typeid, cart, delivery_option, other, webid) VALUES('$Current_Admin_Id', '$TransId', 'Pending', '$Method', '$Type', '$CartTotal', '$Id', '$Cart', '$Delivery', '$Other', '$WebId') ") 
    or die(mysql_error());
}
$TransId = OtarEncrypt($key,$TransId);
?>
<form action="/Checkout" id='payment' method="post" name="paymentmethod">
<input type='hidden' name='trans' value='<?php echo $TransId; ?>'>
<script type="text/javascript">
document.getElementById("payment").submit();
</script>