<?php 
$ReturnComplete[id] = $_POST[transid];
$ReturnComplete[status] = "1";
$ReturnComplete = OtarEncrypt($Array,$ReturnComplete);
$ReturnCanceled[id] = $_POST[transid];
$ReturnCanceled[status] = "0";
$ReturnCanceled = OtarEncrypt($Array,$ReturnCanceled);
?>
<form action="https://secure.paypal.com/uk/cgi-bin/webscr" id='camceleb' method="post" name="paypal">
<!-- Pre Populate the Paypal Checkout Page With Customer Details, -->
<input type="hidden" name="first_name" value="<?php echo $_POST[firstname]; ?>">
<input type="hidden" name="last_name" value="<?php echo $_POST[lastname]; ?>">
<input type="hidden" name="email" value="<?php echo $_POST[email]; ?>">
<input type="hidden" name="address1" value="<?php echo $_POST[address]; ?>">
<input type="hidden" name="address2" value="<?php echo $_POST[address2]; ?>">
<input type="hidden" name="city" value="<?php echo $_POST[city]; ?>">
<input type="hidden" name="zip" value="<?php echo $_POST[postcode]; ?>">
<input type="hidden" name="day_phone_a" value="<?php echo $_POST[homephone]; ?>">
<input type="hidden" name="day_phone_b" value="<?php echo $_POST[mobile]; ?>">

<!-- We dont need to use _ext-enter anymore to prepopulate pages -->
<!-- cmd = _xclick will automatically pre populate pages -->                                                  
<!-- More Info: https://www.x.com/docs/DOC-1332 -->
<input type="hidden" name="cmd" value="_xclick" />
<input type="hidden" name="business" value="<?php echo $Array[siteinfo][other][paypalemail]; ?>" />
<input type="hidden" name="cbt" value="Return to <?php echo $Array[siteinfo][name]; ?>" />

<!-- Allow customer to enter desired quantity -->
<input type="hidden" name="quantity" value="<?php echo $_POST[itemqty]; ?>" />
<input type="hidden" name="item_name" value="<?php echo $_POST[itemname]; ?>" />

<!-- Custom Value You want to send and process back in the IPN -->
<input type="hidden" name="custom" value="<?php echo session_id(); ?>" /> 

<input type="hidden" name="shipping" value="<?php echo $_POST[shipping]; ?>" />
<input type="hidden" name="invoice" value="<?php echo $_POST[transid]; ?>" />
<input type="hidden" name="amount" value="<?php echo $_POST[total_order_price]; ?>" />
<input type="hidden" name="return" value="http://<?php echo $_SERVER['SERVER_NAME']?>/Proces/Paypal/Return/<?php echo $ReturnComplete ; ?>"/>
<input type="hidden" name="cancel_return" value="http://<?php echo $_SERVER['SERVER_NAME']?>/Process/Paypal/Return/<?php echo $ReturnCanceled; ?>" />

<!-- Where to send the paypal IPN to. -->
<input type="hidden" name="notify_url" value="http://<?php echo $_SERVER['SERVER_NAME']?>/Process/Paypal/IPN" />

<script type="text/javascript">
document.getElementById("camceleb").submit();
</script>