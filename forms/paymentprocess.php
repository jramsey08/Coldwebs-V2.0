<?php
<<<<<<< HEAD
unset($_SESSION['trans']);
unset($_COOKIE['_CwCart']);


$Session_Cart = RandomCode(100);
setcookie( "_CwCart", $Session_Cart, $date_of_expiry, "/", $Website_Url_Auth);
=======
$theme = CWDEFAULTTHEME;



$_POST['id'] = "200";
$_POST['total_order_price'] = "500";
$_POST['firstname'] = "Jubar";
$_POST['lastname'] = "Ramsey";
$_POST['email'] = "jramsey08@gmail.com";
$_POST['address'] = "6640 24th ave";
$_POST['address2'] = "apt 203";
$_POST['city'] = "Hyattsville";
$_POST['postcode'] = "20782";
$_POST['mobile'] = "2403556859";
$_POST['country'] = "united states";
$_POST['state'] = "maryland";



include("theme/$theme/structure/checkout.php");

>>>>>>> origin/master
?>