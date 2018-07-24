<?php
include("config/learningcenter.php");


if($Get_Url == "register"){
    $OverRight['theme'] = $THEME;
    $OverRight['file'] = "register";
}

if($Get_Url == ""){
    $OverRight['theme'] =  $THEME;
    $OverRight['file'] = "dashboard";
}

if($Get_Url == "filemanager"){
    $OverRight['theme'] =  $THEME;
    $OverRight['file'] = "filemanager";
}

if($UserSiteAccess['editfunctions'] == "1"){
    if($Get_Url == "functions"){
        $OverRight['theme'] =  $THEME;
        $OverRight['file'] = "functions";
    }
}

if($Get_Url == "team"){
    $OverRight['theme'] = $THEME;
    if($Get_Type == ""){ 
        $OverRight['file'] = "team";
    }else{
        $OverRight['file'] = "listteam";
    }
}

if($UserSiteAccess['setaccess'] == "1"){
    if($Get_Url == "cwaccess"){
        $OverRight['theme'] =  $THEME;
        if($Get_Type == ""){
            $OverRight['file'] = "cwaccess";
        }else{
            if($Get_Type == "copy"){
               $OverRight['file'] = "listaccess";
            }else{
                $OverRight['file'] = "listaccess";
            }
        }
    }
}

if($UserSiteAccess['editcwfile'] == "1"){
    if($Get_Url == "cwfile"){
        $OverRight['theme'] = $THEME;
        if($Get_Type == ""){
            $OverRight['file'] = "cwfile";
        }else{
            if($Get_Type == "copy"){
               $OverRight['file'] = "listcwfile";
            }else{
                $OverRight['file'] = "listcwfile";
            }
        }
    }
}

if($UserSiteAccess['editsidebar'] == "1"){
    if($Get_Url == "sidebar"){
        $OverRight['theme'] =  $THEME;
        if($Get_Type == ""){
            $OverRight['file'] = "sidebar";
        }else{
            if($Get_Type == "copy"){
               $OverRight['file'] = "listsidebar";
            }else{
                $OverRight['file'] = "listsidebar";
            }
        }
    }
}

if($UserSiteAccess['editarticle'] == "1"){
    if($Get_Url == "blog"){
        if($Get_Type == "trash"){
            $OverRight['theme'] =  $THEME;
            $OverRight['file'] = "archive";
        }else if($Get_Type == ""){
            $OverRight['theme'] =  $THEME;
            $OverRight['file'] = "blog";
        }else{
            $OverRight['theme'] =  $THEME;
            $OverRight['file'] = "listarticle";
        }
    }
}

if($UserSiteAccess['socialmedia'] == "1"){
    if($Get_Url == "social"){
        $OverRight['theme'] =  $THEME;
        $OverRight['file'] = "social";
    }
}

if($Get_Url == "login"){
    $OverRight['theme'] = $THEME;
    $OverRight['file'] = "login";
}

if($UserSiteAccess['editarticle'] == "1"){
    if($UserSiteAccess['editarchive'] == "1"){
        if($Get_Url == "archive"){
            $OverRight['theme'] =  $THEME;
            $OverRight['file'] = "archive";
        }
    }
}

if($UserSiteAccess['editsettings'] == "1"){
    if($Get_Url == "settings"){
        $OverRight['theme'] =  $THEME;
        $OverRight['file'] = "settings";
    }
}

if($UserSiteAccess['editoffline'] == "1"){
    if($Get_Url == "offline"){
        $OverRight['theme'] = $THEME;
        $OverRight['file'] = "offline";
        $OverRight['article'] = "3";
    }
}

if($UserSiteAccess['viewusers'] == "1"){
    if($UserSiteAccess['forceuser'] == "1"){
        if($Get_Url == "force"){
           $OverRight['theme'] = $THEME;
           $OverRight['file'] = "forceuser";
        }
    }
}
if($UserSiteAccess['viewusers'] == "1"){
    if($Get_Url == "users"){
        if($Get_Type == ""){
            $OverRight['theme'] = $THEME;
            $OverRight['file'] = "users";
        }else{
            $OverRight['theme'] = $THEME;
            $OverRight['file'] = "listuser";
        }
    }
}


if($UserSiteAccess['editdesign'] == "1"){
    if($Get_Url == "design"){
        if($Get_Type == ""){
            $OverRight['theme'] = $THEME;
            $OverRight["file"] = "theme/themes";
        }else{
            if($Get_Id == ""){
                $OverRight['theme'] = $THEME;
                $OverRight["file"] = "theme/listtheme";
            }else{
                if($Get_Id == "functions"){
                    if($Get_End == ""){
                        $OverRight['theme'] = $THEME;
                        $OverRight["file"] = "theme/themefunctions";
                    }else{
                        $OverRight[theme] = $THEME;
                        $OverRight["file"] = "theme/listthemefunctions";
                    }
                }
                if($Get_Id == "gallery"){
                    $OverRight['theme'] = $THEME;
                    $OverRight["file"] = "theme/themegallery";
                }
                if($Get_Id == "layouts"){
                    $OverRight['theme'] = $THEME;
                    $OverRight["file"] = "theme/themelayouts";
                }
                if($Get_Id == "filemanager"){
                    $OverRight['theme'] = $THEME;
                    $OverRight["file"] = "theme/themefilemanager";
                }
            }
        }
        if($Get_Type == "upload"){
            $OverRight['theme'] = $THEME;
            $OverRight["file"] = "theme/themeupload";
        }
    }
}

if($UserSiteAccess['editmessages'] == "1"){
    if($Get_Url == "messages"){
        if($Get_Type == "inbox"){
            if($Get_Id == ""){
                $OverRight['file'] = "mail/mail";
            }else{
                $OverRight['file'] = "mail/viewmail";
            }
            $OverRight['theme'] = $THEME;
         }
        if($Get_Type == ""){
            $OverRight['theme'] = $THEME;
            $OverRight['file'] = "mail/mail";
         }
         if($Get_Type == "sent"){
            $OverRight['theme'] = $THEME;
            $OverRight['file'] = "mail/mailsent";
         }
         if($Get_Type == "trash"){
            $OverRight['theme'] = $THEME;
            $OverRight['file'] = "mail/mailtrash";
         }
         if($Get_Type == "compose"){
            $OverRight['theme'] = $THEME;
            $OverRight['file'] = "mail/mailcompose";
         }
         if($Get_Type == "reply"){
            $OverRight['theme'] = $THEME;
            $OverRight['file'] = "mail/mailcompose";
         }
    }
}

if($UserSiteAccess['editarticle'] == "1"){
    if($Get_Url == "trash"){
        $OverRight['theme'] = $THEME;
        if($Get_Type == ""){
            $OverRight['file'] = "delete/trash";
        }else{
            if($Get_Type == "blog"){
               $OverRight['file'] = "delete/article";
            }
        }
    }
}

if($UserSiteAccess['edituseraccess'] == "1"){
    if($Get_Url == "useraccess"){
        $OverRight['theme'] = $THEME;
        if($Get_Type == ""){
            $OverRight['file'] = "access";
        }else{
            $OverRight['file'] = "listuseraccess";
        }
    }
}

if($UserSiteAccess['bgmenu'] == "1"){
    if($Get_Url == "bg-menu"){
        $OverRight['theme'] = $THEME;
        if($Get_Type == ""){
            $OverRight['file'] = "bgmenu";
        }else{
            $OverRight['file'] = "listbgmenu";
        }
    }
}

if($UserSiteAccess['viewanalytics'] == "1"){
    if($Get_Url == "analytics"){
        $OverRight['theme'] = $THEME;
        if($Get_Type == ""){ 
            $OverRight['file'] = "analytics/dash";
        }
    }
}

#if($UserSiteAccess['tracker'] == "1"){
    if($Get_Url == "tracker"){
        $OverRight['theme'] = $THEME;
        if($Get_Type == ""){ 
            $OverRight['file'] = "tracker/session";
        }
    }
#}

#if($UserSiteAccess['soc'] == "1"){
    if($Get_Url == "socialmedia"){
        $OverRight['theme'] = $THEME;
        if($Get_Type == ""){ 
            $OverRight['file'] = "socialmedia/main";
        }else if($Get_Type == "callback"){ 
            $OverRight['file'] = "socialmedia/callback";
        }else{
            $OverRight['file'] = "socialmedia/listsocial";
        }
    }
#}

    if($Get_Url == "imgrotate"){
        $OverRight['theme'] = $THEME;
        $OverRight['file'] = "images/rotate";
    }



    if($Get_Url == "tracker"){
        $OverRight['theme'] = $THEME;
        if($Get_Type == ""){
            $OverRight['file'] = "tracker/dash";
        }
        if($Get_Type == "notification"){
            if($Get_Id == ""){
                $OverRight['file'] = "tracker/notification";
            }else{
                $OverRight['file'] = "tracker/listnot";
            }
        }
        if($Get_Type == "session"){
            if($Get_Id == ""){
                $OverRight['file'] = "tracker/session";
            }else{
                if($Get_End == ""){
                    $OverRight['file'] = "tracker/listsess";
                }else{
                    $OverRight['file'] = "tracker/extrasess";
                }
            }
        }
    }














if($UserSiteAccess['ecommerce'] == "1"){
    if($Get_Url == "ecommerce-delivery"){
        $OverRight['theme'] = $THEME;
        if($Get_Type == ""){ 
            $OverRight['file'] = "ecommerce/delivery";
        }else{
            $OverRight['file'] = "ecommerce/listdelivery";
        }
    }
    if($Get_Url == "ecommerce-payment"){
        $OverRight['theme'] = $THEME;
        if($Get_Type == ""){ 
            $OverRight['file'] = "ecommerce/payment";
        }else{
            $OverRight['file'] = "ecommerce/listpayment";
        }
    }
    if($Get_Url == "ecommerce-attributes"){
        $OverRight['theme'] = $THEME;
        if($Get_Type == ""){ 
            $OverRight['file'] = "ecommerce/attributes";
        }else{
            $OverRight['file'] = "ecommerce/listatt";
        }
    }
    if($Get_Url == "ecommerce-products"){
        $OverRight['theme'] = $THEME;
        if($Get_Type == ""){ 
            $OverRight['file'] = "ecommerce/products";
        }else{
            $OverRight['file'] = "ecommerce/listproduct";
        }
    }
    if($Get_Url == "ecommerce-orders"){
        $OverRight['theme'] = $THEME;
        if($Get_Type == ""){ 
            $OverRight['file'] = "ecommerce/orders";
        }else{
            $OverRight['file'] = "ecommerce/listorder";
        }
    }
    if($Get_Url == "ecommerce-category"){
        $OverRight['theme'] = $THEME;
        if($Get_Type == ""){ 
            $OverRight['file'] = "ecommerce/cat";
        }else{
            $OverRight['file'] = "ecommerce/listcat";
        }
    }
    if($Get_Url == "ecommerce-supplier"){
        $OverRight['theme'] = $THEME;
        if($Get_Type == ""){
            $OverRight['file'] = "ecommerce/supplier";
        }else{
            $OverRight['file'] = "ecommerce/listsupplier";
        }
    }
    if($Get_Url == "ecommerce-brand"){
        $OverRight['theme'] = $THEME;
        if($Get_Type == ""){ 
            $OverRight['file'] = "ecommerce/brand";
        }else{
            $OverRight['file'] = "ecommerce/listbrand";
        }
    }
    if($Get_Url == "ecommerce-customer"){
        $OverRight['theme'] = $THEME;
        if($Get_Type == ""){ 
            $OverRight['file'] = "ecommerce/customer";
        }else{
            $OverRight['file'] = "ecommerce/listcustomer";
        }
    }    
    if($Get_Url == "ecommerce-settings"){
        $OverRight['theme'] = $THEME;
        if($Get_Type == ""){ 
            $OverRight['file'] = "ecommerce/settings";
        }
    }
    if($Get_Url == "ecommerce-import"){
        $OverRight['theme'] = $THEME;
        if($Get_Type == ""){ 
            $OverRight['file'] = "ecommerce/import";
        }
    }
    if($Get_Url == "ecommerce-pending"){
        $OverRight['theme'] = $THEME;
        if($Get_Type == ""){ 
            $OverRight['file'] = "ecommerce/pending";
        }
    }
    if($Get_Url == "ecommerce-trash"){
        $OverRight['theme'] = $THEME;
        if($Get_Type == ""){ 
            $OverRight['file'] = "ecommerce/trash";
        }
    }
    if($Get_Url == "ecommerce-tax"){
        $OverRight['theme'] = $THEME;
        if($Get_Type == ""){ 
            $OverRight['file'] = "ecommerce/tax";
        }else{
            $OverRight['file'] = "ecommerce/listtax";
        }
    }
}
?>