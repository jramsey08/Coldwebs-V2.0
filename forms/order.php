<?php

$Domain = $Array["siteinfo"]["domain"];
$Cart = $_POST['cart_id'];
$Trans = $_SESSION['trans'];
$Message = $_POST['message'];
$Address = $_POST['address'];
$Redir = $_REQUEST['redir'];
$Payment = $_POST['payment'];
$Checkout_Price = $_POST["checkout_price"];

if($theme == ""){
    $THEME = "theme/" . CWDEFAULTTHEME;
}
if($_GET['coupon'] == ""){
    $Coupon = $_SESSION['coupon'];
}else{
    $_SESSION['coupon'] = $_GET['coupon'];
    $Coupon = $_GET['coupon'];
}

$Qty = $_POST['qty'];
$Coupon = $_GET['qty'];

$Trans_Type = $_GET['trans_type'];
$Trans_Method = $_GET['trans_method'];
$Trans_User = $Current_Admin;
$Trans_Status = "0";
$Trans_Session = $Session['id'];
$Trans_Ref = RandomCode("10");
$Trans_Type_Id = "";
$Trans_Other = array();
$Trans_Notes = $_GET['trans_notes'];
$Trans_Attend = $_GET['trans_attend'];
$Trans_Img = $_GET['trans_img'];
$Trans_Guest = $_GET['trans_guest'];
$Trans_Delivery = $_GET['delivery_option'];

$Checkout_Payment = $_POST["payment_option"];
$Checkout_Delivery = $_POST["delivery_option"];
$Checkout_Date = strtotime("now");





/////////////////////////// FINALIZE ALL ARRAYS FOR UPLOAD TO DATABASE \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\



if($Get_Id == "address"){
    if($Trans != ""){
        $row = Cw_Quick_Info("trans",$WebId,$Trans,$Array);
        $row['other']['message'] = $Message;
        if($CurrentUser['info']['address'] == ""){
            $row['other']['address'] = $Address;
        }else{
            $row['other']['address'] = $CurrentUser['info']['address'];
        }
        $Other = serialize($row[other]);
        $result = mysqli_query($CwDb,"UPDATE trans SET other='$Other' WHERE id='$Trans' AND webid='$WebId'") or die(mysqli_error());
    }else{
        $Redir = "Cart";
    }
}

if($Get_Id == "shipping"){
    if($Trans != ""){
        $result = mysqli_query($CwDb,"UPDATE trans SET delivery_option='$Trans_Delivery' WHERE id='$Trans' AND webid='$WebId'") or die(mysqli_error());
    }else{
        $Redir = "Cart";
    }
}

if($Get_Id == "order-message"){
    $Subject = "Message about an Order";
    $Priority = "2";
    $Message = $_POST['message'];
    $Name = $CurrentUser['info']['firstname'] . $CurrentUser['info']['lastname'];
    $Other = $_POST['id_order'];
    mysqli_query($CwDb,"INSERT INTO messages(other,message,subject,name,user,priority,webid,type) VALUES('$Other', '$Message', 
    '$Subject', '$Name', '$Current_Admin', '$Priority', '$WebId', 'inbox')")or die(mysqli_error());
    $Redir = "My-Account";
}

if($Get_Id == "payment-process"){
    if($Trans != ""){
        $Cart_New = CwCartTotal($_SESSION['cart']);
        $Cart_Total = $Cart_New['total'];
        $query = "SELECT * FROM cw_coupon WHERE cart='$_SESSION[cart]' AND webid='$WebId'";
        $result = mysqli_query($CwDb,$query) or die(mysqli_error());
        $row = mysqli_fetch_assoc($result);
        $row = CwOrganize($row,$Array);
        if($row['type'] == "percent"){
            $Discount = $row['amount'] / "100";
            $Cart_Discount = $row['amount'] * $Discount;
        }else{
            $Cart_Discount = $row['amount'];
        }
        $Cart_Total = $Cart_Total - $Cart_Discount;
        $Cw_Shipment = "10";
        $Structure_Type = "payment-process";
        include("$THEME/layout.php");
        include("api/paypal/payment.php");
    }else{
        $Redir = "Cart";
    }
}

if($Get_Id == "cart"){
    $_SESSION['cart'] = $Cart;
    foreach($Qty as $value => $Q){
        if($Q <= "0"){
            $result = mysqli_query($CwDb,"UPDATE cw_cart SET active='0' WHERE id='$value' AND webid='$WebId'") or die(mysqli_error());
            $Q = "0";
        }
        $result = mysqli_query($CwDb,"UPDATE cw_cart SET qty='$Q' WHERE id='$value' AND webid='$WebId'") or die(mysqli_error());
        $Prod_Count = $Prod_Count + $Q;
    }
    $Cart_New = CwCartTotal($Cart);
    $Cart_Total = $Cart_New['total'];
    $query = "SELECT * FROM cw_coupon WHERE cart='$Cart' AND webid='$WebId'";
    $result = mysqli_query($CwDb,$query) or die(mysqli_error());
    $row = mysqli_fetch_assoc($result);
    $row = CwOrganize($row,$Array);
    if($row['type'] == "percent"){
        $Discount = $row['amount'] / "100";
        $Cart_Discount = $Cart_Total * $Discount;
    }else{
        $Cart_Discount = $row['amount'];
    }
    $Cart_Total = $Cart_Total - $Cart_Discount;
    $Trans_Other['message'] = "";
    $Trans_Other = serialize($Trans_Other);
    if($Trans == ""){
        mysqli_query($CwDb,"INSERT INTO trans(type, method, user, status, price, transid, typeid, other, notes, attend, img, qty, guest, cart, session, delivery_option,webid) VALUES('$Trans_Type',  
        '$Trans_Method', '$Trans_User', '$Trans_Status', '$Cart_Total', '$Trans_Ref', '$Trans_Type_Id', '$Trans_Other', '$Trans_Notes', '$Trans_Attend ', '$Trans_Img', '$Prod_Count', 
        '$Trans_Guest', '$Cart', '$Trans_Session', '$Trans_Delivery', '$WebId')")or die(mysqli_error());
    $query = "SELECT * FROM trans WHERE cart='$Cart' AND session='$Session[id]' AND active='1' AND trash='0' AND webid='$WebId'";
    $result = mysqli_query($CwDb,$query) or die(mysqli_error());
    $row = mysqli_fetch_assoc($result);
        $_SESSION['trans'] = $row['id'];
    }else{
    $result = mysqli_query($CwDb,"UPDATE trans SET qty='$Prod_Count' WHERE id='$Trans' AND webid='$WebId'") or die(mysqli_error());
    $result = mysqli_query($CwDb,"UPDATE trans SET price='$Cart_Total' WHERE id='$Trans' AND webid='$WebId'") or die(mysqli_error());
    }
}


if($Get_Id == "process-complete"){
    if($Trans != ""){
        $row = Cw_Quick_Info("trans",$WebId,$Trans,$Array);
        $row['other']['message'] = $Message;
        if($CurrentUser['info']['address'] == ""){
            $row['other']['address'] = $Address;
        }else{
            $row['other']['address'] = $CurrentUser['info']['address'];
        }
        $Other = serialize($row['other']);
        $result = mysqli_query($CwDb,"UPDATE trans SET other='$Other' WHERE id='$Trans' AND webid='$WebId'") or die(mysqli_error());
        $result = mysqli_query($CwDb,"UPDATE trans SET delivery_option='$Trans_Delivery' WHERE id='$Trans' AND webid='$WebId'") or die(mysqli_error());
        include("api/coldwebs/payment/main.php");
    }else{
        $Redir = "Cart";
    } 
}


if($Get_Id == "checkout"){
    $Trans = $_SESSION['trans'];
    $row = Cw_Quick_Info("trans",$WebId,$Trans,$Array);
    $Delivery = Cw_Quick_Info("cwoptions",$WebId,$Checkout_Delivery,$Array);
    $DeliveryPrice = $Delivery["content"]["price"];
    $Checkout_Other = $row["other"];
    $Checkout_Other["address"] = $_POST["address"];
    $Checkout_Other["billing"] = $_POST["billing"];
    $Checkout_Other["delivery"]["price"] = $DeliveryPrice;
    $Checkout_Other["delivery"]["option"] = $Checkout_Delivery;
    $Checkout_Other = Cw_Filter_Array($Checkout_Other);
    $Checkout_Other = serialize($Checkout_Other);
    $Price = $Trans["price"];
    $TotalPrice = $Checkout_Price + $DeliveryPrice;
    $result = mysqli_query($CwDb,"UPDATE trans SET price='$TotalPrice' WHERE id='$Trans' AND webid='$WebId'") or die(mysqli_error());
    $result = mysqli_query($CwDb,"UPDATE trans SET delivery_option='$Checkout_Delivery' WHERE id='$Trans' AND webid='$WebId'") or die(mysqli_error());
    $result = mysqli_query($CwDb,"UPDATE trans SET method='$Checkout_Payment' WHERE id='$Trans' AND webid='$WebId'") or die(mysqli_error());
    $result = mysqli_query($CwDb,"UPDATE trans SET other='$Checkout_Other' WHERE id='$Trans' AND webid='$WebId'") or die(mysqli_error());
    $result = mysqli_query($CwDb,"UPDATE trans SET date='$Checkout_Date' WHERE id='$Trans' AND webid='$WebId'") or die(mysqli_error());
    $Api = Cw_Quick_Info("cwoptions",$WebId,$Checkout_Payment,$Array);
    $Method = $Api["content"]["api"];
    include("api/coldwebs/payment/main.php");
    $TransId = Otarencrypt($key,$Trans);
}


if($Get_Id == "donate"){
    if($_SESSION["donate_id"] == ""){ 
        $Item_Content = RandomCode(100);
        mysqli_query($CwDb,"INSERT INTO cw_cart(session, item, price, content, qty, webid) VALUES('$Session[cart]', 'donate', '$_POST[donate_amnt]', '$Item_Content', '1', '$WebId' ) ") or die(mysqli_error());
        $query = "SELECT * FROM cw_cart WHERE content='$Item_Content' AND webid='$WebId'";
        $result = mysqli_query($CwDb,$query) or die(mysqli_error());
        $row = mysqli_fetch_assoc($result);
        $_SESSION["donate_id"] = $row["id"];
    }else{
        $result = mysqli_query($CwDb,"UPDATE cw_cart SET price='$_POST[donate_amnt]' WHERE id='$_SESSION[donate_id]' AND webid='$WebId'") or die(mysqli_error());
        $result = mysqli_query($CwDb,"UPDATE cw_cart SET active='0' WHERE !id='$_SESSION[donate_id]' AND session='$Session[cart]' AND webid='$WebId'") or die(mysqli_error());
    }
    $Cart_New = CwCartTotal($Session["cart"]);
    $Cart_Total = $_POST["donate_amnt"];
    $CwCartTotal = $_POST["donate_amnt"];
    $Trans_Type = "donate";
    $Trans_Other['message'] = "Donation";
    $Trans_Guest["name"] = $_POST["name"];
    $Trans_Guest["email"] = $_POST["email"];
    $Trans_Guest = serialize($Trans_Guest);
    $Trans_User = $_POST["email"];
    $Trans_Notes = "Basic Donation";
    $Trans_Delivery = "n/a";
    $Trans_Other = serialize($Trans_Other);
    if($Trans == ""){
        mysqli_query($CwDb,"INSERT INTO trans(type, method, user, status, price, transid, typeid, other, notes, attend, img, qty, guest, cart, session, delivery_option, webid) VALUES('$Trans_Type',  
        '$Trans_Method', '$Trans_User', '$Trans_Status', '$Cart_Total', '$Trans_Ref', '$Trans_Type_Id', '$Trans_Other', '$Trans_Notes', '$Trans_Attend ', '$Trans_Img', '1', 
        '$Trans_Guest', '$Cart', '$Trans_Session', '$Trans_Delivery', '$WebId')")or die(mysqli_error());
    $query = "SELECT * FROM trans WHERE cart='$Cart' AND session='$Session[id]' AND active='1' AND trash='0' AND webid='$WebId'";
    $result = mysqli_query($CwDb,$query) or die(mysqli_error());
    $row = mysqli_fetch_assoc($result);
        $_SESSION['trans'] = $row['id'];
        $TransId = $_SESSION['trans'];
    }else{
        $result = mysqli_query($CwDb,"UPDATE trans SET price='$Cart_Total' WHERE id='$Trans' AND webid='$WebId'") or die(mysqli_error());
        $TransId = $_SESSION['trans'];
    }
    #$Api = Cw_Quick_Info("cwoptions",$WebId,$Checkout_Payment,$Array);
    #$Method = $Api["content"]["api"];
    #include("api/coldwebs/payment/main.php");
    #$TransId = Otarencrypt($key,$Trans);
    include("api/paypal/payment.php");
}


if($Root_Redir != "1"){
    header("Location: http://$Website_Url_Auth/$Redir");
}else{
    header("Location: http://$Website_Url_Auth/CwCheckoutFramePayment?trans=$TransId");
}
