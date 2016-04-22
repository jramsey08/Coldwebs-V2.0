<?php
include("config/cart.php");

if($Get_Url == "product"){
    if($Get_Type != ""){
        $query = "SELECT * FROM articles WHERE type='product' AND active='1' AND trash='0' AND url='$Get_Type' OR type='product' AND 
        active='1' AND trash='0' AND id='$Get_Type'";
        $result = mysql_query($query) or die(mysql_error());
        $row = mysql_fetch_array($result);
        $row = PbUnSerial($row);
        $ActiveArticle = $row;
        if($row['id'] != ""){
            $OverRight['theme'] = "default";
            $OverRight['file'] = "product";
        }
    }
}

if($Get_Url == "billing"){
    if($Get_Type == ""){
        $OverRight['theme'] = "default";
        $OverRight['file'] = "billing";
    }else{
        switch ($Get_Type){
            case "address":
                $OverRight['theme'] = "default";
                $OverRight['file'] = "address";
                break;
            case "payment":
                $OverRight['theme'] = "default";
                $OverRight['file'] = "payment";
                break;
            case "shipping":
                $OverRight['theme'] = "default";
                $OverRight['file'] = "shipping";
                break;
            case "cart":
                $OverRight['theme'] = "default";
                $OverRight['file'] = "cart";
                break;
        }

    }
}

if($Get_Url == "dashboard"){
    $Domain = $Array["siteinfo"]["domain"] . "/My-Account";
    header("Location: $Domain/$REDIRECT");
}
?>