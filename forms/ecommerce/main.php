<?php


switch ($Get_Id) {
    case "supplier":
        include("forms/ecommerce/supplier.php");
        break;
    case "orders":
        include("forms/ecommerce/orders.php");
        break;
    case "delivery":
        include("forms/ecommerce/delivery.php");
        break;
    case "payment":
        include("forms/ecommerce/payment.php");
        break;
    case "settings":
        include("forms/ecommerce/settings.php");
        break;
    case "import":
        include("forms/ecommerce/import.php");
        break;
    case "tax":
        include("forms/ecommerce/tax.php");
        break;
    case "":
        header("Location: http://$Website_Url_Auth/admin/");
        break;
}
