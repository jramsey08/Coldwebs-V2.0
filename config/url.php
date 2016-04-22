<?php
if($Get_Url == "register"){
    if($CustomerLogin == "1"){
    }else{
        $OverRight['theme'] = "admin/theme/cwadmin";
        $OverRight['file'] = "register";
    }
}

if($Get_Url == "login"){
    if($CustomerLogin == "1"){
<<<<<<< HEAD
        $OverRight['theme'] = "default";
        $OverRight['file'] = "login";
=======
>>>>>>> origin/master
    }else{
        $OverRight['theme'] = "admin/theme/cwadmin";
        $OverRight['file'] = "login";
    }
}

if($Get_Url == "logout"){
    $OverRight['root'] = "1";
    $OverRight['file'] = "forms/logout.php";
}

if($Get_Url == "author"){
    $OverRight['theme'] = "default";
    $OverRight['file'] = "author";
}

if($Get_Url == "cwpreview"){
    $OverRight['theme'] = "default";
    $OverRight['file'] = "rightsidebar";
    $OverRight['preview'] = "1";
}

if($Get_Url == "checkout"){
    $OverRight['theme'] = "default";
    $OverRight['file'] = "checkout";
}

if($Get_Url == "summary"){
    $OverRight['theme'] = "default";
    $OverRight['file'] = "summary";
}

if($Get_Url == "cart"){
    $OverRight['theme'] = "default";
    $OverRight['file'] = "cart";
}

if($Get_Url == "billing"){
    $OverRight['theme'] = "default";
    $OverRight['file'] = "billing";
}

if($Get_Url == "tags"){
    $OverRight['theme'] = "default";
    $OverRight['file'] = "tags";
}

if($Get_Url == "search"){
    $OverRight['theme'] = "default";
    $OverRight['file'] = "search";
}

<<<<<<< HEAD
if($Get_Url == "reset_pw"){
    $OverRight['theme'] = "default";
    $OverRight['file'] = "resetpw";
}

=======
>>>>>>> origin/master
if($Get_Url == "archive"){
    $OverRight['theme'] = "default";
    $OverRight['file'] = "archive";
}

if($Get_Url == "cwvmedia"){
    $OverRight['theme'] = "default";
    $OverRight['file'] = "video";
    $OverRight['cwmedia'] = "1";
    $OverRight['cwmediatype'] = "video";
}

if($Get_Url == "cwamedia"){
    $OverRight['theme'] = "default";
    $OverRight['file'] = "audio";
    $OverRight['cwmedia'] = "1";
    $OverRight['cwmediatype'] = "audio";
}

if($Get_Url == "portfolio"){
    if($Get_Type == ""){
    }else{
        $cwdefault = "1";
        $OverRight['theme'] = "default";
        $OverRight['file'] = "portfolio";
        $OverRight['cwmedia'] = "1";
        $OverRight['cwdefaultype'] = "portfolio";
    }
}

if($Get_Url == "services"){
    if($Get_Type == ""){
    }else{
        $cwdefault = "1";
        $OverRight['theme'] = "default";
        $OverRight['file'] = "post";
        $OverRight['cwmedia'] = "1";
        $OverRight['cwdefaultype'] = "post";
    }
}

if($Get_Url == "shop"){
    if($Get_Type == ""){
<<<<<<< HEAD
        $Get_Url = "shop";
=======
>>>>>>> origin/master
    }else{
        $cwdefault = "1";
        $OverRight['theme'] = "default";
        $OverRight['file'] = "product";
        $OverRight['cwmedia'] = "0";
        $OverRight['cwdefaultype'] = "product";
    }
}

if($Get_Url == "dashboard"){
    if($Get_Type == "address"){
        $OverRight['theme'] = "default";
        $OverRight['file'] = "address";
    }
    if($Get_Type == "account"){
        $OverRight['theme'] = "default";
        $OverRight['file'] = "account";
    } 
    if($Get_Type == "orders"){
        $OverRight['theme'] = "default";
        $OverRight['file'] = "orders";
    }
    if($Get_Type == "wishlist"){
        $OverRight['theme'] = "default";
        $OverRight['file'] = "wishlist";
    }
    if($Get_Type == "messages"){
        $OverRight['theme'] = "default";
        $OverRight['file'] = "messages";
    }
}

<<<<<<< HEAD
$E_Commerce = "1";



if($E_Commerce == "1"){

    if($Get_Url == "my-account"){
        $OverRight['theme'] = "default";
        $OverRight['file'] = "account";
    }

    if($Get_Url == "my-orders"){
        if($Get_Type == ""){
            $OverRight['theme'] = "default";
            $OverRight['file'] = "orders";
        }else{
            $OverRight['theme'] = "default";
            $OverRight['file'] = "listorder";
        }
    }

    if($Get_Url == "my-info"){
        $OverRight['theme'] = "default";
        $OverRight['file'] = "myinfo";
    }

    if($Get_Url == "my-address"){
        $OverRight['theme'] = "default";
        $OverRight['file'] = "myaddress";
    }

    if($Get_Url == "my-wishlist"){
        $OverRight['theme'] = "default";
        $OverRight['file'] = "mywishlist";
    }

    if($Get_Url == "order-confirm"){
        if($Get_Type == ""){
            header("Location: $Domain/My-Account");
        }else{
            $Trans_Id = OtarDecrypt($key,$_GET['type']);
            $query = "SELECT * FROM trans WHERE id='$Trans_Id'";
            $result = mysql_query($query) or die(mysql_error());
            $Trans_Confirm = mysql_fetch_array($result);
            $Trans_Confirm = PbUnSerial($Trans_Confirm);
            $Trans_Ref = $Trans_Confirm['transid'];
            if($Trans_Confirm['id'] != ""){
                $OverRight['theme'] = "default";
                $OverRight['file'] = "confirmation";
            }else{
                header("Location: $Domain/My-Orders"); 
            }
        }
    }

    if($Get_Url == "cwpayment"){
        $OverRight['root'] = "1";
        $OverRight['file'] = "forms/cwpayment.php";
    }



}
=======








>>>>>>> origin/master
?>