<?php

if($Get_Url == "product"){
    if($Get_Type != ""){
        $query = "SELECT * FROM articles WHERE type='product' AND active='1' AND trash='0' AND url='$Get_Type'  AND webid='$WebId' OR type='product' AND 
        active='1' AND trash='0' AND id='$Get_Type' AND webid='$WebId'";
        $result = mysqli_query($CwDb, $query);
        $row = mysqli_fetch_assoc($result);
        $row = CwOrganize($row,$Array);
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

////////////////////////////// SET DEFAULT SHIPPING METHOD \\\\\\\\\\\\\\\\\\\\\\\\\\\
$query = "SELECT * FROM settings WHERE type='shipping' AND def='1' AND webid='$WebId'";
$result = mysqli_query($CwDb, $query);
$row = mysqli_fetch_assoc($result);
$row = CwOrganize($row,$Array);
$Default_Shipping_Id = $row["content"]["post"];
$query = "SELECT * FROM cwoptions WHERE id='$Default_Shipping_Id' AND webid='$WebId'";
$result = mysqli_query($CwDb, $query);
$row = mysqli_fetch_assoc($result);
$row = CwOrganize($row,$Array);
$Default_Shipping = $row["content"]["price"];
/////////////////////////////////////////////////////////////////////////////////////////


////////////////////////////// SET DEFAULT PAYMENT METHOD \\\\\\\\\\\\\\\\\\\\\\\\\\\
$query = "SELECT * FROM settings WHERE type='payment' AND def='1' AND webid='$WebId'";
$result = mysqli_query($CwDb, $query);
$row = mysqli_fetch_assoc($result);
$row = CwOrganize($row,$Array);
$Default_Payment_Id = $row["content"]["post"];
$query = "SELECT * FROM cwoptions WHERE id='$Default_Payment_Id' AND webid='$WebId'";
$result = mysqli_query($CwDb, $query);
$row = mysqli_fetch_assoc($result);
$row = CwOrganize($row,$Array);
$Default_Shipping = $row["content"]["price"];
/////////////////////////////////////////////////////////////////////////////////////////



////////////////////////// CALCULATE AVERAGE PRODUCT PRICES ///////////////////////////
$query = "SELECT * FROM articles WHERE active!='3' AND active='1' AND webid='$WebId' AND trash='0' AND type='post-product'";
$result = mysqli_query($CwDb,$query);
while($row = mysqli_fetch_assoc($result)){
    $row = CwOrganize($row,$Array);
    $row = Cw_Filter_Array($row);
    $Count = $Count + 1;
    $p_ProdPrice = $row["content"]["prodprice"] + $p_ProdPrice;
    $p_Sales = $row["content"]["newprice"] + $p_Sales;
    $p_WholeSale = $row["other"]["wholesale"]["price"] + $p_WholeSale;
    $p_Purchase =  $row["other"]["resell"]["price"] + $p_Purchase;
    $p_Msrp =  $row["other"]["resell"]["msrp"] + $p_Msrp;
    $p_Avg = $row["other"]["resell"]["avgprice"] + $p_Avg;
}
if($Count <= "0" OR $Count == ""){
    $p_ProdPrice = $p_ProdPrice / $Count;
    $p_Sales = $p_Sales / $Count;
    $p_WholeSale = $p_WholeSale / $Count;
    $p_Purchase = $p_Purchase / $Count;
    $p_Msrp = $p_Msrp / $Count;
    $p_Avg = $p_Avg / $Count;
    $Percent_Sales = $p_Sales/$p_ProdPrice;
    $Percent_Wholesale = $p_WholeSale/$p_Purchase;
    $Percent_ProdPrice = $p_ProdPrice/$p_Purchase;
    if($Percent_Msrp == "" OR $Percent_Msrp <= "0"){
        $Percent_Msrp = "0";
    }else{
        $Percent_Msrp = $p_ProdPrice/$Percent_Msrp;
    }
    $Percent_Avg = $Percent_Avg/$Percent_ProdPrice;
}
////////////////////////////////////////////////////////////////////////////////////////

include(CWROOT . "/config/cart.php");
?>