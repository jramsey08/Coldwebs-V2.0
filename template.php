<?php
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// COLDWEBS TEMPLATE.PHP FILE USED TO DETERMINE WHAT WOULD BE DISPLAYED ON THE VISITORS COMPUTER SCREEN DEPENDING   // 
<<<<<<< HEAD
// ON THE WEBSITE AND URL THAT IS PROVIDED. THIS FILE IS VERY ESSENTIAL TO THE FUNCTION OF THIS WEBSITE AND ANY     //
// CHANGES SHOULD ONLY BE MADE BY THOSE WHO ARE FAMILIAR TO THE COLDWEBS CONTENT MANAGEMENT SYSTEM CODING STRUCTURE //
// TO ENSURE YOUR SITE IS FULLY SAFE PLEASE ENROLL YOUR SITE AT COLDWEBS.COM TO ENSURE YOUR WEBSITE IN MONITORED    // 
// DAILY AGAINST ALL THREATS AND ARE RECEIVING ALL NEEDED UPDATES.                                                  //
// AUTHOR: CEO, JUBAR D. RAMSEY     "VISIT COLDWEBS.COM TO BECOME A COLDWEBS CMS PLATFORM DEVELOPER."               //
// FILE VERSION 2.1 LAST UPDATED ON 2016-02-13                                                                      //
=======
// ON THE WEBSITE AND URL THAT IS PROVIDED. THIS FILE IS VERY ESSENTIAL TO THE FUNCTION OF THIS WEBSITE AND ANY    //
// CHANGES SHOULD ONLY BE MADE BY THOSE WHO ARE FAMILIAR TO THE COLDWEB CONTENT MANAGEMENT SYSTEM CODING STRUCTURE. //
// TO ENSURE YOUR SITE IS FULLY SAFE PLEASE ENROLL YOUR SITE AT COLDWEBS.COM TO ENSURE YOUR WEBSITE IN MONITORED    // 
// DAILY AGAINST ALL THREATS AND ARE RECEIVING ALL NEEDED UPDATES.                                                  //
// AUTHOR: CEO, JUBAR D. RAMSEY     "VISIT COLDWEBS.COM TO BECOME A COLDWEBS CMS PLATFORM DEVELOPER."               //
// FILE VERSION 2.1 LAST UPDATED ON 2014-12-07                                                                      //
>>>>>>> origin/master
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////



// PAGE LOAD START \\
$time_start_Template = microtime_float();

// SEARCH THE PAGE_STRUCTURE TABLE TO LOCATE THE DOMAIN INFORMATION PROVIDED. \\
<<<<<<< HEAD
$query = "SELECT * FROM page_template WHERE url='$Get_Url'AND active='1' AND trash='0'";
=======
$query = "SELECT * FROM page_template WHERE url='$Get_Url' AND admin='0' AND active='1' AND trash='0'";
>>>>>>> origin/master
$result = mysql_query($query) or die(mysql_error());
$row = mysql_fetch_array($result);
if($row['active'] == "1"){
    $Page_Structure_Article = $row['article'];
    if($Get_Type == ""){
        if($row['template'] == "default" OR $row['template'] == ""){
            $row['template'] = $Array['sitetheme'];
            $Structure_Template = $row['template'];
        }else{
            $Structure_Template = $row['template'];
        }
        $theme = $Structure_Template;
        $THEME = "theme/$theme";
        $Array['page']['template'] = $row;
// SEARCH THE PAGE_SETTINGS TABLE TO GATHER ANY SETTINGS THAT NEEDS TO BE APPLIED TO THE PAGE BEFORE THE DISPLAY. \\
<<<<<<< HEAD
        $query = "SELECT * FROM page_settings WHERE id='$row[setting]'";
=======
        $query = "SELECT * FROM page_settings WHERE url='$Get_Url' AND urltype='$Get_Type' AND 
        end='$Get_End' AND urlid='$Get_Id'";
>>>>>>> origin/master
        $result = mysql_query($query) or die(mysql_error());
        $row = mysql_fetch_array($result);
        $Login_Required = $row['secure'];
        $View_Ads = $row['ads'];
        $Array['page']['settings'] = $row;
<<<<<<< HEAD
// SEARCH THE PAGE_STRUCTURE TABLE TO GATHER ANY INFORMATION THAT WILL LIST HOW THE PAGE SHOULD LOOK. \\
        $query = "SELECT * FROM page_structure WHERE url='$Get_Url' AND urltype='$Get_Type'
        AND end='$Get_End' AND urlid='$Get_Id' AND active='1' AND trash='0' AND template='$Structure_Template'
        OR url='$Get_Url' AND urltype='$Get_Type' AND end='$Get_End' AND urlid='$Get_Id' AND 
=======
        $PageAdmin = $row['admin'];
// SEARCH THE PAGE_STRUCTURE TABLE TO GATHER ANY INFORMATION THAT WILL LIST HOW THE PAGE SHOULD LOOK. \\
        $query = "SELECT * FROM page_structure WHERE url='$Get_Url' AND urltype='$Get_Type'
        AND end='$Get_End' AND urlid='$Get_Id' AND active='1' AND trash='0' AND template='$Structure_Template' 
        OR url='$Get_Url' AND urltype='$Get_Type' AND admin='0' AND end='$Get_End' AND urlid='$Get_Id' AND 
>>>>>>> origin/master
        active='1' AND trash='0' AND template='default'";
        $result = mysql_query($query) or die(mysql_error());
        $row = mysql_fetch_array($result);
        $Structure_Type = $row['type'];
        $Array['page']['structure'] = $row;
<<<<<<< HEAD
        $Structure_Article = $row['article'];
=======
>>>>>>> origin/master
    }else{
        $DefaultCategorySearch = 1;
        $DefaultPostSearch = 1;
    }
}else{
    if($Get_Type == ""){
        $DefaultCategorySearch = 1;
    }else{
        $DefaultCategorySearch = 1;
        $DefaultPostSearch = 1;
    }
}

<<<<<<< HEAD


=======
>>>>>>> origin/master
//INCLUDE IMPORTANT THEME INFORMATION \\
if($theme == ""){
    $theme = $SiteInfo['theme'];
    $THEME = "theme/$theme";
}
$filename = "$THEME/settings.php";
if(file_exists($filename)){
    include("$THEME/settings.php");
}


$Page_Id = $Array['page']['structure']['article'];
$query = "SELECT * FROM articles WHERE id='$Page_Id' AND active='1' AND trash='0'";
$result = mysql_query($query) or die(mysql_error());
$row = mysql_fetch_array($result);
$row = PbUnSerial($row);
<<<<<<< HEAD
$row['other']['address'] = Cw_Address($row['other']['address']);
=======
>>>>>>> origin/master
if($row['type'] == "page"){
    $ActiveArticle = $row;
}else{

// SEARCH THE ARTICLES TABLE FOR INFORMATION NEEDED TO PULL THE REQUESTED CATEGORY INFORMATION \\
    $query = "SELECT * FROM articles WHERE id='$Page_Structure_Article' AND active='1' AND trash='0' and type='category' OR 
    url='$Get_Url' AND active='1' AND trash='0' and type='category' OR url='$Get_Url' AND active='1' AND type='root' AND trash='0'";
    $result = mysql_query($query) or die(mysql_error());
    $row = mysql_fetch_array($result);
    $row = PbUnSerial($row);
    $CategoryInfo = $row;
<<<<<<< HEAD
    if(is_array($CategoryInfo['other'])){
        if($CategoryInfo['other']['structure'] == ""){
        }else{
            $Structure_Type = $CategoryInfo['other']['structure'];
        }
=======
    if($CategoryInfo['other']['structure'] == ""){
    }else{
        $Structure_Type = $CategoryInfo['other']['structure'];
>>>>>>> origin/master
    }
    $CategoryId = $CategoryInfo['id'];
    $Array['category'] = $CategoryInfo; 
    if($CategoryId == ""){
        $CategoryId = "1";
    }

// SEARCH THE ARTICLES TABLE FOR INFORMATION NEEDED TO PULL THE REQUESTED POST INFORMATION \\
    if($Cw_Multiple_Cat['active'] == "1"){
        $query = "SELECT * FROM articles WHERE active='1' AND id='$Page_Structure_Article' AND trash='0' AND category LIKE '%-" .     
<<<<<<< HEAD
        $CategoryId . "-%' OR 
        url='$Get_Type' AND category LIKE '%-" . $CategoryId . "-%' AND active='1' AND trash='0' OR     
        id='$Page_Structure_Article' AND active='1' 
        AND trash='0' OR url='$Get_Type' AND  active='1' AND trash='0'";
    }else{
        $query = "SELECT * FROM articles WHERE id='$Get_Type' AND category='$CategoryId' AND active='1' AND trash='0' OR url='$Get_Type' AND category='$CategoryId' AND active='1' AND trash='0'OR id='$Page_Structure_Article' AND active='1' AND trash='0'";
=======
        $CategoryId . "-%' AND type='post' OR 
        url='$Get_Type' AND category LIKE '%-" . $CategoryId . "-%' AND active='1' AND trash='0' AND type='post' OR     
        id='$Page_Structure_Article' AND type='post' AND active='1' 
        AND trash='0' OR type='post' AND url='$Get_Type' AND  active='1' AND trash='0'";
    }else{
        $query = "SELECT * FROM articles WHERE id='$Page_Structure_Article' AND type='post' AND category='$CategoryId' AND active='1'    
        AND trash='0' OR 
        url='$Get_Type' AND type='post' AND category='$CategoryId'  AND active='1' AND trash='0' OR id='$Page_Structure_Article' AND   
        type='post' AND active='1' AND trash='0' OR url='$Get_Type' 
        AND active='1' AND trash='0'";
>>>>>>> origin/master
    }
    $result = mysql_query($query) or die(mysql_error());
    $row = mysql_fetch_array($result);
    $row = PbUnSerial($row);
<<<<<<< HEAD
    $row['other']['address'] = Cw_Address($row['other']['address']);
=======
>>>>>>> origin/master
    if($Cw_Multiple_Cat['active'] == "1"){
        #$row['category'] = unserialize($row['category']);
    }
    $PostInfo = $row;
<<<<<<< HEAD

    if($PostInfo['id'] != ""){
        if(is_array($PostInfo['other'])){
            if(array_key_exists('structure', $PostInfo['other'])){
                if($PostInfo['other']['structure'] != ""){
                    $Structure_Type = $PostInfo['other']['structure'];
                }
            }
        }
        $PostId = $PostInfo['id'];
        $Array['post'] = $PostInfo;
        if($DefaultCategorySearch == 1){
             $ActiveArticle = $CategoryInfo;
        }else if($DefaultPostSearch == 1){
            if($PostInfo == ""){
                $ActiveArticle = $ActiveArticle;
            }else{
                $ActiveArticle = $PostInfo;
            }
        }
        if($PostInfo['active'] == "1"){
	    if($Get_Url == "unlisted" AND $Get_Type !=""){
                $Structure_Type = DEFAULTSTRUCTUREPOST;
	    }
        }
    }
=======
    if($PostInfo['other']['structure'] == ""){
    }else{
        $Structure_Type = $PostInfo['other']['structure'];
    }
    $PostId = $PostInfo['id'];
    $Array['post'] = $PostInfo;
    if($DefaultCategorySearch == 1){
        $ActiveArticle = $CategoryInfo;
    }else if($DefaultPostSearch == 1){
        if($PostInfo == ""){
            $ActiveArticle = $ActiveArticle;
        }else{
            $ActiveArticle = $PostInfo;
        }
    }
    if($PostInfo['active'] == "1"){
	if($Get_Url == "unlisted" AND $Get_Type !=""){
		$Structure_Type = DEFAULTSTRUCTUREPOST;
	}
    }
>>>>>>> origin/master
    if($DefaultCategorySearch == "" AND $DefaultPostSearch == ""){
        if($CategoryInfo == ""){
            $ActiveArticle = $PostInfo;
        }else{
            if($PostId == ""){
                $ActiveArticle = $CategoryInfo;
            }else{
                $ActiveArticle = $PostInfo;
            }
        }
    }else{
        if($PostId == ""){
            $ActiveArticle = $CategoryInfo;
        }else{
            $ActiveArticle = $PostInfo;
        }
    }
}

<<<<<<< HEAD
// FIND POST AUTHOR IF AVAILABLE \\
if($ActiveArticle['type'] == "post"){
    $Author_Id = $ActiveArticle['other']['author'];
    $query = "SELECT * FROM articles WHERE id='$Get_Type' AND active='1' AND trash='0' AND type='author' OR url='$Get_Type' AND   active='1' AND trash='0' AND type='author' OR id='$Author_Id' AND active='1' AND trash='0' AND type='author'";
    $result = mysql_query($query) or die(mysql_error());
    $row = mysql_fetch_array($result);
    $row = PbUnSerial($row);
    $row['other']['address'] = Cw_Address($row['other']['address']);
    if($row['content']['img'] == ""){
        $row['content']['img'] = "/uploads/images/default-user-icon-profile.png";
    }
    if($Get_Url == "author"){
        $ActiveArticle = $row;
    }else{
        $Author = $row;
    }
=======

// FIND POST AUTHOR IF AVAILABLE \\
$Author_Id = $ActiveArticle['other']['author'];
$query = "SELECT * FROM articles WHERE id='$Get_Type' AND active='1' AND trash='0' AND type='author' OR url='$Get_Type' AND   active='1' AND trash='0' AND type='author' OR id='$Author_Id' AND active='1' AND trash='0' AND type='author'";
$result = mysql_query($query) or die(mysql_error());
$row = mysql_fetch_array($result);
$row = PbUnSerial($row);
if($row['content']['img'] == ""){
    $row['content']['img'] = "/uploads/images/default-user-icon-profile.png";
}
if($Get_Url == "author"){
    $ActiveArticle = $row;
}else{
    $Author = $row;
>>>>>>> origin/master
}

if($OverRight['cwmedia'] == "1"){
    $query = "SELECT * FROM articles WHERE url='$Get_Type' AND type='$OverRight[cwmediatype]' AND active='1' AND trash='0' OR 
    id='$Get_Type' AND type='$OverRight[cwmediatype]' AND active='1' AND trash='0' OR url='$Get_Type' AND active='1' AND trash='0'";
    $result = mysql_query($query) or die(mysql_error());
    $row = mysql_fetch_array($result);
    $row = PbUnSerial($row);
<<<<<<< HEAD
    $row['other']['address'] = Cw_Address($row['other']['address']);
=======
>>>>>>> origin/master
    $ActiveArticle = $row;
}

if($OverRight['preview'] == "1"){
    $query = "SELECT * FROM articles WHERE id='$Get_Type' AND trash='0'";
    $result = mysql_query($query) or die(mysql_error());
    $row = mysql_fetch_array($result);
    $row = PbUnSerial($row);
<<<<<<< HEAD
    $row['other']['address'] = Cw_Address($row['other']['address']);
=======
>>>>>>> origin/master
    $ActiveArticle = $row;
    if($row['active'] == "1" OR $row['id'] == ""){
        $OverRight['file'] = "default";
    }
}

<<<<<<< HEAD
// CATEGORY CHECK \\
    if($Get_Type == ""){
        $query = "SELECT * FROM articles WHERE url='$Get_Url' AND active='1' AND trash='0' AND type='category'";
        $result = mysql_query($query) or die(mysql_error());
        $row = mysql_fetch_array($result);
        if($row['id'] != ""){
            $row = PbUnSerial($row);
            $ActiveArticle = $row;
        }
    } 

// SETS POST/CATEGORY STRUCTURE IF NONE IS PROVIDED \\
if($ActiveArticle['type'] != "page" OR $ActiveArticle['type'] != "menu"){
=======
// SETS POST/CATEGORY STRUCTURE IF NONE IS PROVIDED \\
if($ActiveArticle['type'] == "category" OR $ActiveArticle['type'] == "post"){
>>>>>>> origin/master
    $StructureLoc = "$THEME/structure/$Structure_Type.php";
    if(file_exists($StructureLoc)){
    }else{
        $Structure_Type = "";
    }
<<<<<<< HEAD
    if($View_site == "0"){
=======
    if($View_site ==" 0"){
>>>>>>> origin/master
        if($ColdWeb_Control == "1"){
            $Structure_Show = "0";
        }else{
            $Structure_Show = "1";
        }
    }else{
        $Structure_Show = "1";
    }
    if($Structure_Show == "1"){
        if($Structure_Type == "" OR $Structure_Type == "default"){
            include("config/structure.php");
            $Default_Structure = $ActiveArticle['type'];
            $Structure_Type = $StructureDefault["$Default_Structure"];
        }
    }
}

// STATIC URL ROOT FILES \\
if($OverRight['root'] == "1"){
    $ActiveArticle['type'] = "root";
    $ActiveArticle['info'] = $OverRight['file'];
}

<<<<<<< HEAD
=======

>>>>>>> origin/master
// CHECKS AGAINST ROOT URL FILES \\
if($ActiveArticle['type'] == "root"){
    include("$ActiveArticle[info]");
}else{

    if($Array['page']['settings']['offline'] == "1"){
        $Structure_Type = "404"; 
    }else{



// COUNT THE AMOUNT OF VIEWS EACH ARTICLE RECEIVES \\
        $NewHits = $ActiveArticle['hits'] + 1;
<<<<<<< HEAD
=======
        if($NewHits > "99"){
           $NewHits = "0" . $NewHits;
        }
>>>>>>> origin/master
        $result = mysql_query("UPDATE articles SET hits='$NewHits' WHERE id='$ActiveArticle[id]'") 
        or die(mysql_error());

// SETS THE DATE FOR ANY ARTICLE THAT HAS FAILED TO SET ONE \\
        if($ActiveArticle['date'] == ""){
            $result = mysql_query("UPDATE articles SET date='$Date' WHERE id='$ActiveArticle[id]'") 
            or die(mysql_error()); 
        }

<<<<<<< HEAD
=======
//SETS THE OFFLINE ARTICLE INFO \\
        $Offline_Article_Id = $Array['siteinfo']['other']['article'];
        $query = "SELECT * FROM articles WHERE id='$Offline_Article_Id' AND active='1' AND trash='0'";
        $result = mysql_query($query) or die(mysql_error());
        $row = mysql_fetch_array($result);
        $row = PbUnSerial($row);
        $Offline_Article = $row;

>>>>>>> origin/master
// DEFAULT COMING SOON PAGE \\
        if($theme == "default"){
            $Structure_Type = "comingsoon"; 
        }

// DETECT AND LOAD MOBILE THEME \\
        if($Mobile['phone'] == "1"){
            include("$THEME/settings.php");
            if($Array['other']['mobiletheme'] == ""){
<<<<<<< HEAD
                if(TEMPLATEMOBILE != ""){
=======
                if(TEMPLATEMOBILE == ""){
                }else{
>>>>>>> origin/master
                    $theme = TEMPLATEMOBILE;
                }
            }else{
                $theme = $Array['other']['mobiletheme'];
            }
            $THEME = "theme/$theme";
        }

// DISPLAY A CERTAIN PAGE DEPENDING ON THE USER ACCESS WHEN THE WEBSITE IS OFFLINE \\
        if($UserSiteAccess['viewoffline'] == "1"){
        }else{
            if($View_site == "0"){
                if($ColdWeb_Control == "1"){
                    SiteOffline($Array);
                }else{
                    $theme = $OfflineTheme;
                    $THEME = "theme/$theme";
                    $Structure_Type = "default";
                    $ActiveArticle = $Offline_Article;
                }
            }
        }

// MANUAL URL OVERRIDE REQUESTS \\
        if($OverRight['file'] == ""){
        }else{
            if($OverRight['theme'] == "default"){
                $THEME = $THEME;
            }else{
                $THEME = $OverRight['theme'];
            }
            $Structure_Type = $OverRight['file'];
        }

<<<<<<< HEAD

=======
>>>>>>> origin/master
// USES DEFAULT SETTINGS \\
        if($theme == ""){
            if($View_site == "1"){
                $theme = CWDEFAULTTHEME;
            }else{
                $theme = CWDEFAULTOFFLINETHEME;
            }
            $THEME = "theme/$theme";
        }
        if($Structure_Type == ""){
<<<<<<< HEAD
            $error_file = "$THEME/structure/404.php";
            if(file_exists($error_file)){
                $Structure_Type = "404";
            }else{
                $Structure_Type = "default";
            }
=======
            $Structure_Type = "default";
>>>>>>> origin/master
        }

// VERIFY ALL REQUESTED STRUCTURE FILES EXISTS AND SHOW DEFAULT LAYOUTS IF NOT FOUND \\ 
        $filename = "$THEME/structure/$Structure_Type.php";
<<<<<<< HEAD
        $error_file = "$THEME/structure/404.php";
        if(file_exists($filename)){
            $Structure_Type = $Structure_Type;
        }else{
            if(file_exists($error_file)){
                $Structure_Type = "404";
            }else{
                $Structure_Type = "default";
            }
        }
=======
        if(file_exists($filename)){
            $Structure_Type = $Structure_Type;
        }else{
            $Structure_Type = "default";
        }
        
>>>>>>> origin/master
        $Array['activearticle'] = $ActiveArticle;
        $ThemeLayout = "$THEME/layout.php";

    if($ActiveArticle['id'] == ""){
        if($Get_Url == "home" OR $Get_Url == ""){
        }else{
            if($Structure_Type != "" ){
                $Structure_Type = $Structure_Type;
            }else{
<<<<<<< HEAD
                if(file_exists($error_file)){
                    $Structure_Type = "404";
                 }else{
                    $Structure_Type = "default";
                 }
=======
                $Structure_Type = "default";
>>>>>>> origin/master
            }
        }   
    }
}

<<<<<<< HEAD
=======




>>>>>>> origin/master
// CONNECT TO THE APPROPRIATE THEME AND STRUCTURE \\
    include("$THEME/functions.php");
    include("$THEME/settings.php");
    if($Login_Required == "1"){
        include("forms/logincheck.php"); 
    }else{
        if(file_exists($ThemeLayout)){
            include("$ThemeLayout");
        }else{
            include("$THEME/header/main.php");
            include("$THEME/header/extras.php");
            include("$THEME/extras/top_header.php");
            include("$THEME/structure/$Structure_Type.php");
            include("$THEME/extras/footer.php");
        }
    }
}
<<<<<<< HEAD
$time_end_Template = microtime_float();
=======
$time_end_Template = microtime_float();



>>>>>>> origin/master
