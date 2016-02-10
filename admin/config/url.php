<?php
if($Get_Url == "register"){
    $OverRight['theme'] = "theme/cwadmin";
    $OverRight['file'] = "register";
}

if($Get_Url == ""){
    $OverRight['theme'] = "theme/cwadmin";
    $OverRight['file'] = "dashboard";
}

if($Get_Url == "filemanager"){
    $OverRight['theme'] = "theme/cwadmin";
    $OverRight['file'] = "filemanager";
}

if($UserSiteAccess['editticker'] == "1"){
    if($Get_Url == "ticker"){
        $OverRight['theme'] = "theme/cwadmin";
        if($Get_Type == ""){
            $OverRight['file'] = "ticker";
        }else{
            if($Get_Type == "copy"){
               $OverRight['file'] = "listticker";
            }else{
                $OverRight['file'] = "listticker";
            }
        }
    }
}

if($UserSiteAccess['editfunctions'] == "1"){
    if($Get_Url == "functions"){
        $OverRight['theme'] = "theme/cwadmin";
        $OverRight['file'] = "functions";
    }
}


if($UserSiteAccess['analytics'] == "1"){
    if($Get_Url == "analytics"){
        $OverRight['theme'] = "theme/cwadmin";
        $OverRight['file'] = "analytics/dash";
    }
}

if($UserSiteAccess['editauthor'] == "1"){
    if($Get_Url == "author"){
        $OverRight['theme'] = "theme/cwadmin";
        if($Get_Type == ""){
            $OverRight['file'] = "author";
        }else{
            if($Get_Type == "copy"){
               $OverRight['file'] = "listauthor";
            }else{
                $OverRight['file'] = "listauthor";
            }
        }
    }
}

if($UserSiteAccess['editmedia'] == "1"){
    if($Get_Url == "cinema"){
        $OverRight['theme'] = "theme/cwadmin";
        if($Get_Type == ""){
            $OverRight['file'] = "cinema";
        }else{
            if($Get_Type == "copy"){
               $OverRight['file'] = "listcinema";
            }else{
                $OverRight['file'] = "listcinema";
            }
        }
    }
}

if($UserSiteAccess['editmedia'] == "1"){
    if($Get_Url == "audio"){
        $OverRight['theme'] = "theme/cwadmin";
        if($Get_Type == ""){
            $OverRight['file'] = "audio";
        }else{
            if($Get_Type == "copy"){
               $OverRight['file'] = "listaudio";
            }else{
                $OverRight['file'] = "listaudio";
            }
        }
    }
}

if($UserSiteAccess['setaccess'] == "1"){
    if($Get_Url == "cwaccess"){
        $OverRight['theme'] = "theme/cwadmin";
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



if($UserSiteAccess['editarticle'] == "1"){
    if($Get_Url == "portfolio"){
        $OverRight['theme'] = "theme/cwadmin";
        if($Get_Type == ""){
            $OverRight['file'] = "portfolio";
        }else{
            if($Get_Type == "copy"){
               $OverRight['file'] = "viewportfolio";
            }else{
                $OverRight['file'] = "viewportfolio";
            }
        }
    }
}

if($UserSiteAccess['editcwfile'] == "1"){
    if($Get_Url == "cwfile"){
        $OverRight['theme'] = "theme/cwadmin";
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

if($UserSiteAccess['editarticle'] == "1"){
    if($Get_Url == "services"){
        $OverRight['theme'] = "theme/cwadmin";
        if($Get_Type == ""){
            $OverRight['file'] = "services";
        }else{
            if($Get_Type == "copy"){
               $OverRight['file'] = "viewservice";
            }else{
                $OverRight['file'] = "viewservice";
            }
        }
    }
}

if($UserSiteAccess['editmenu'] == "1"){
    if($Get_Url == "menu"){
        $OverRight['theme'] = "theme/cwadmin";
        if($Get_Type == ""){
            $OverRight['file'] = "menu";
        }else{
            if($Get_Type == "copy"){
               $OverRight['file'] = "listmenu";
            }else{
                $OverRight['file'] = "listmenu";
            }
       }
    }
}

if($UserSiteAccess['editgallery'] == "1"){
    if($Get_Url == "gallery"){
        $OverRight['theme'] = "theme/cwadmin";
        if($Get_Type == ""){
            $OverRight['file'] = "gallery";
        }else{
            if($Get_Type == "copy"){
               $OverRight['file'] = "listgallery";
            }else{
                $OverRight['file'] = "listgallery";
            }
        }
    }
}

if($UserSiteAccess['editsidebar'] == "1"){
    if($Get_Url == "sidebar"){
        $OverRight['theme'] = "theme/cwadmin";
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

if($Get_Url == "profile"){
    $OverRight['theme'] = "theme/cwadmin";
    $OverRight['file'] = "profile";
}

if($UserSiteAccess['editarticle'] == "1"){
    if($Get_Url == "articles"){
        if($Get_Type == "trash"){
            $OverRight['theme'] = "theme/cwadmin";
            $OverRight['file'] = "archive";
        }else if($Get_Type == ""){
            $OverRight['theme'] = "theme/cwadmin";
            $OverRight['file'] = "viewarticles";
        }else{
            $OverRight['theme'] = "theme/cwadmin";
            $OverRight['file'] = "article";
        }
    }
}

if($UserSiteAccess['ecommerce'] == "1"){
    if($Get_Url == "Transactions"){
        $OverRight['theme'] = "theme/cwadmin";
        $OverRight['file'] = "transactions";
    }
}

if($UserSiteAccess['editarticle'] == "1"){
    if($Get_Url == "transfer"){
        $OverRight['theme'] = "theme/cwadmin";
        $OverRight['file'] = "transfer";
    }
}

if($UserSiteAccess['socialmedia'] == "1"){
    if($Get_Url == "social"){
        $OverRight['theme'] = "theme/cwadmin";
        $OverRight['file'] = "social";
    }
}

if($UserSiteAccess['ecommerce'] == "1"){
    if($UserSiteAccess['edittickets'] == "1"){
        if($Get_Url == "tickets"){
            $OverRight['theme'] = "theme/cwadmin";
            $OverRight['file'] = "tickets";
        }
    }
}

if($Get_Url == "login"){
    $OverRight['theme'] = "theme/cwadmin";
    $OverRight['file'] = "login";
}

if($UserSiteAccess['editarticle'] == "1"){
    if($UserSiteAccess['editarchive'] == "1"){
        if($Get_Url == "archive"){
            $OverRight['theme'] = "theme/cwadmin";
            $OverRight['file'] = "archive";
        }
    }
}

if($UserSiteAccess['editsettings'] == "1"){
    if($Get_Url == "settings"){
        $OverRight['theme'] = "theme/cwadmin";
        $OverRight['file'] = "settings";
    }
}

if($UserSiteAccess['editoffline'] == "1"){
    if($Get_Url == "offline"){
        $OverRight['theme'] = "theme/cwadmin";
        $OverRight['file'] = "offline";
        $OverRight['article'] = "3";
    }
}

if($UserSiteAccess['ecommerce'] == "1"){
    if($Get_Url == "ecommerce"){
        $OverRight['theme'] = "theme/cwadmin";
        $OverRight['file'] = "ecommerce";
    }
}

if($UserSiteAccess['ecommerce'] == "1"){
    if($Get_Url == "products"){
        $OverRight['theme'] = "theme/cwadmin";
        if($Get_Type == ""){
            $OverRight['file'] = "products";
        }else{
            if($Get_Type == "copy"){
               $OverRight['file'] = "viewproducts";
            }else{
                $OverRight['file'] = "viewproducts";
            }
        }
    }
}

if($UserSiteAccess['editcategory'] == "1"){
    if($Get_Url == "category"){
        $OverRight['theme'] = "theme/cwadmin";
        if($Get_Type == ""){
            $OverRight['file'] = "category";
        }else{
            if($Get_Type == "copy"){
               $OverRight['file'] = "listcat";
            }else{
                $OverRight['file'] = "listcat";
            }
        }
    }
}

if($UserSiteAccess['editpages'] == "1"){
    if($Get_Url == "pages"){
        $OverRight['theme'] = "theme/cwadmin";
        if($Get_Type == ""){
            $OverRight['file'] = "page";
        }else{
            if($Get_Type == "copy"){
               $OverRight['file'] = "listpage";
            }else{
                $OverRight['file'] = "listpage";
            }
        }
    }
}

if($UserSiteAccess['ecommerce'] == "1"){
    if($Get_Url == "attributes"){
        $OverRight['theme'] = "theme/cwadmin";
        if($Get_Type == ""){
            $OverRight['file'] = "attributes";
        }else{
            $OverRight['file'] = "listatt";
        }
    }
}

if($UserSiteAccess['ecommerce'] == "1"){
    if($UserSiteAccess['vieworders'] == "1"){
        if($Get_Url == "orders"){
           $OverRight['theme'] = "theme/cwadmin";
           $OverRight['file'] = "orders";
        }
    }
}

if($UserSiteAccess['viewusers'] == "1"){
    if($UserSiteAccess['forceuser'] == "1"){
        if($Get_Url == "force"){
           $OverRight['theme'] = "theme/cwadmin";
           $OverRight['file'] = "forceuser";
        }
    }
}
if($UserSiteAccess['viewusers'] == "1"){
    if($Get_Url == "users"){
        if($Get_Type == ""){
            $OverRight['theme'] = "theme/cwadmin";
            $OverRight['file'] = "users";
        }else{
            $OverRight['theme'] = "theme/cwadmin";
            $OverRight['file'] = "listuser";
        }
    }
}

if($Get_Url == "advertisement"){
    if($Get_Type == ""){
        $OverRight['theme'] = "theme/cwadmin";
        $OverRight['file'] = "advertisement";
    }else{
        $OverRight['theme'] = "theme/cwadmin";
        $OverRight['file'] = "listads";
    }
}
if($UserSiteAccess['editdesign'] == "1"){
    if($Get_Url == "design"){
        if($Get_Type == ""){
            $OverRight['theme'] = "theme/cwadmin";
            $OverRight["file"] = "themes";
        }else{
            if($Get_Id == ""){
                $OverRight['theme'] = "theme/cwadmin";
                $OverRight["file"] = "listtheme";
            }else{
                if($Get_Id == "functions"){
                    if($Get_End == ""){
                        $OverRight['theme'] = "theme/cwadmin";
                        $OverRight["file"] = "themefunctions";
                    }else{
                        if($Get_End == "new"){
                            $OverRight['theme'] = "theme/cwadmin";
                            $OverRight["file"] = "listthemenewfunctions";
                        }else{
                            $OverRight[theme] = "theme/cwadmin";
                            $OverRight["file"] = "listthemefunctions";
                        }
                    }
                }
                if($Get_Id == "gallery"){
                    $OverRight['theme'] = "theme/cwadmin";
                    $OverRight["file"] = "themegallery";
                }
                if($Get_Id == "layouts"){
                    $OverRight['theme'] = "theme/cwadmin";
                    $OverRight["file"] = "themelayouts";
                }
                if($Get_Id == "filemanager"){
                    $OverRight['theme'] = "theme/cwadmin";
                    $OverRight["file"] = "themefilemanager";
                }
            }
        }
        if($Get_Type == "upload"){
            $OverRight['theme'] = "theme/cwadmin";
            $OverRight["file"] = "themeupload";
        }
    }
}

if($UserSiteAccess['editmessages'] == "1"){
    if($Get_Url == "messages"){
        if($Get_Type == "inbox"){
            if($Get_Id == ""){
                $OverRight['file'] = "mail";
            }else{
                $OverRight['file'] = "viewmail";
            }
            $OverRight['theme'] = "theme/cwadmin";
         }
        if($Get_Type == ""){
            $OverRight['theme'] = "theme/cwadmin";
            $OverRight['file'] = "mail";
         }
         if($Get_Type == "sent"){
            $OverRight['theme'] = "theme/cwadmin";
            $OverRight['file'] = "mailsent";
         }
         if($Get_Type == "trash"){
            $OverRight['theme'] = "theme/cwadmin";
            $OverRight['file'] = "mailtrash";
         }
         if($Get_Type == "compose"){
            $OverRight['theme'] = "theme/cwadmin";
            $OverRight['file'] = "mailcompose";
         }
    }
}









if($UserSiteAccess['editarticle'] == "1"){
    if($Get_Url == "trash"){
        $OverRight['theme'] = "theme/cwadmin";
        if($Get_Type == ""){
            $OverRight['file'] = "delete/trash";
        }else{
            if($Get_Type == "articles"){
               $OverRight['file'] = "delete/article";
            }
        }
    }
}













?>