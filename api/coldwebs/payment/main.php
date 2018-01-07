<?php

if(file_exists($Method)){
    include("$Method");
}else{
    switch($Method){
    case "wepay":
        include("api/wepay/coldwebs/checkout.php");
        break;
    }
}

if($Redir = ""){
    $Redir = "Checkout";
}

?>