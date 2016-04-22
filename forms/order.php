<?php
include("forms/logincheck.php");
if($Login == "1"){
    $Domain = $Array["siteinfo"]["domain"];
    $Cart = $_POST['cart_id'];
    $Trans = $_SESSION['trans'];
    $Message = $_POST['message'];
    $Redir = $_GET['redir'];
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


    if($Get_Id == "address"){
        if($Trans != ""){
	    $query = "SELECT * FROM trans WHERE id='$Trans'";
	    $result = mysql_query($query) or die(mysql_error());
	    $row = mysql_fetch_array($result);
            $row['other'] = unserialize($row[other]);
            $row['other']['message'] = $Message;
            $row['other']['address'] = $CurrentUser['info']['address'];
            $row['other'] = serialize($row[other]);
            $result = mysql_query("UPDATE trans SET other='$row[other]' WHERE id='$Trans'") 
            or die(mysql_error());
        }else{
            $Redir = "Cart";
        }
    }

    if($Get_Id == "shipping"){
        if($Trans != ""){
            $result = mysql_query("UPDATE trans SET delivery_option='$Trans_Delivery' WHERE id='$Trans'") 
            or die(mysql_error());
        }else{
            $Redir = "Cart";
        }
    }

    if($Get_Id == "payment-process"){
        if($Trans != ""){
            $Cart_New = CwCartTotal($_SESSION['cart']);
            $Cart_Total = $Cart_New['total'];
            $query = "SELECT * FROM cw_coupon WHERE cart='$_SESSION[cart]'";
	    $result = mysql_query($query) or die(mysql_error());
	    $row = mysql_fetch_array($result);
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
                $result = mysql_query("UPDATE cw_cart SET active='0' WHERE id='$value'") 
	        or die(mysql_error());
                $Q = "0";
            }
            $result = mysql_query("UPDATE cw_cart SET qty='$Q' WHERE id='$value'") 
	    or die(mysql_error());
            $Prod_Count = $Prod_Count + $Q;
        }
        $Cart_New = CwCartTotal($Cart);
        $Cart_Total = $Cart_New['total'];
        $query = "SELECT * FROM cw_coupon WHERE cart='$Cart'";
	$result = mysql_query($query) or die(mysql_error());
	$row = mysql_fetch_array($result);
        if($row['type'] == "percent"){
            $Discount = $row['amount'] / "100";
            $Cart_Discount = $row['amount'] * $Discount;
        }else{
            $Cart_Discount = $row['amount'];
        }
        $Cart_Total = $Cart_Total - $Cart_Discount;
        $Trans_Other['message'] = "";
        $Trans_Other = serialize($Trans_Other);
        if($Trans == ""){
            mysql_query("INSERT INTO trans(type, method, user, status, price, transid, typeid, other, notes, attend, img, qty, guest, cart, session, delivery_option) VALUES('$Trans_Type',  
            '$Trans_Method', '$Trans_User', '$Trans_Status', '$Cart_Total', '$Trans_Ref', '$Trans_Type_Id', '$Trans_Other', '$Trans_Notes', '$Trans_Attend ', '$Trans_Img', '$Prod_Count', 
            '$Trans_Guest', '$Cart', '$Trans_Session', '$Trans_Delivery')")or die(mysql_error());
	    $query = "SELECT * FROM trans WHERE cart='$Cart' AND session='$Session[id]' AND active='1' AND trash='0'";
	    $result = mysql_query($query) or die(mysql_error());
	    $row = mysql_fetch_array($result);
            $_SESSION['trans'] = $row['id'];
        }else{
	    $result = mysql_query("UPDATE trans SET qty='$Prod_Count' WHERE id='$Trans'") 
	    or die(mysql_error());
	    $result = mysql_query("UPDATE trans SET price='$Cart_Total' WHERE id='$Trans'") 
	    or die(mysql_error());
        }
    }








    header("Location: $Domain/$Redir");
}