<?php

if($Get_Url == "shop"){
    $Url_Redirect = "http://shop.parallelmagz.com";
}




if($Url_Redirect == ""){
}else{
    header("Location: $Url_Redirect");
}
?>