<?php
unset($_SESSION['trans']);
unset($_COOKIE['_CwCart']);
$Session_Cart = RandomCode(100);
setcookie( "_CwCart", $Session_Cart, $date_of_expiry, "/", $Website_Url_Auth); 
?>