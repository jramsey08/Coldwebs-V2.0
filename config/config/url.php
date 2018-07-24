<?php
if($Get_Url == "register"){
    $OfflineByPass = "1";
    if($Current_Admin_Id != ""){
        header("Location: $Domain/");
    }
    if($CustomerLogin == "1"){
        $OverRight['theme'] = "default";
        $OverRight['file'] = "register";
    }else{
        $AdminTheme = CwAdminVerify("register");
        $OverRight['theme'] = $AdminTheme["theme"];
        $OverRight['file'] = $AdminTheme["file"];
    }
}

if($Get_Url == "login"){
    $OfflineByPass = "1";
    if($Current_Admin_Id != ""){
        header("Location: $Domain/");
    }
    if($SiteInfo['other']['clogin'] == "1"){
        $OverRight['theme'] = "default";
        $OverRight['file'] = "login";
    }else{
        $AdminTheme = CwAdminVerify("login");
        $OverRight['theme'] = $AdminTheme["theme"];
        $OverRight['file'] = $AdminTheme["file"];
    }
}

if($Get_Url == "password-recovery"){
    $OfflineByPass = "1";
    if($Current_Admin_Id != ""){
        header("Location: $Domain/");
    }
    if($CustomerLogin == "1"){
        $OverRight['theme'] = "default";
        $OverRight['file'] = "login";
    }else{
        $AdminTheme = CwAdminVerify("reset");
        $OverRight['theme'] = $AdminTheme["theme"];
        $OverRight['file'] = $AdminTheme["file"];
    }
}

if($Get_Url == "logout"){
    $OverRight['root'] = "1";
    $OverRight['file'] = "forms/logout.php";
    $Url_Redirect = "http://$Website_Url_Auth/Login/?redirect=" . $_GET['redirect']  . "&error=$_GET[error]";
    header("Location: $Url_Redirect");
}

if($Get_Url == "author"){
    $OverRight['theme'] = "default";
    $OverRight['file'] = "author";
}

if($Get_Url == "cwpreview"){
    $OverRight['theme'] = "default";
    $OverRight['file'] = "default";
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

if($Get_Url == "reset_pw"){
    $OverRight['theme'] = "default";
    $OverRight['file'] = "resetpw";
}

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
        $Get_Url = "shop";
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

$E_Commerce = "1";



if($E_Commerce == "1"){
    if($Get_Url == "my-account"){
        $OverRight['theme'] = "default";
        $OverRight['file'] = "myaccount";
        $OverRight['secure'] = "1";
    }
    if($Get_Url == "my-newsletter"){
        $OverRight['theme'] = "default";
        $OverRight['file'] = "mynewsletter";
        $OverRight['secure'] = "1";
    }
    if($Get_Url == "my-orders"){
        if($Get_Type == ""){
            $OverRight['theme'] = "default";
            $OverRight['file'] = "myorders";
            $OverRight['secure'] = "1";
        }else{
            $OverRight['theme'] = "default";
            $OverRight['file'] = "listorder";
            $OverRight['secure'] = "1";
        }
    }
    if($Get_Url == "my-reviews"){
        if($Get_Type == ""){
            $OverRight['theme'] = "default";
            $OverRight['file'] = "myreview";
            $OverRight['secure'] = "1";
        }else{
            $OverRight['theme'] = "default";
            $OverRight['file'] = "listewview";
            $OverRight['secure'] = "1";
        }
    }   
    if($Get_Url == "my-info"){
        $OverRight['theme'] = "default";
        $OverRight['file'] = "myinfo";
        $OverRight['secure'] = "1";
    }
    if($Get_Url == "my-address"){
        $OverRight['theme'] = "default";
        $OverRight['file'] = "myaddress";
        $OverRight['secure'] = "1";
    }
    if($Get_Url == "my-wishlist"){
        $OverRight['theme'] = "default";
        $OverRight['file'] = "mywishlist";
        $OverRight['secure'] = "1";
    }
    if($Get_Url == "order-confirm"){
        if($Get_Type == ""){
            header("Location: $Domain/My-Account");
        }else{
            $Trans_Id = OtarDecrypt($key,$_GET['type']);
            $query = "SELECT * FROM trans WHERE id='$Trans_Id' AND webid='$WebId'";
            $result = mysqli_query($CwDb, $query);
            $Trans_Confirm = mysqli_fetch_assoc($result);
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
    if($Get_Url == "cwcheckoutframepayment"){
        $OverRight['theme'] = "default";
        $OverRight['file'] = "frame";
    }
}

    if($Get_Url == "cwcontact"){
        $query = "SELECT * FROM articles WHERE url='contact' AND webid='$WebId' AND active='1' AND type='page' AND trash='0' OR url='contact-us' AND webid='$WebId' AND active='1' AND trash='0' AND type='page'";
        $result = mysqli_query($CwDb, $query);
        $row = mysqli_fetch_assoc($result);
        $row = PbUnSerial($row);
        $OverRight['theme'] = "default";
        $OverRight['file'] = "contact";
    }
?>