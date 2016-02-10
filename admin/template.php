<?php
#$Login = 1;


if($Login == "1"){
    if($Current_Admin_Access <= "2"){
    
// FORCES USERS TO ONLY VIEW A CERTAIN PAGE \\
        if($Current_Admin_Info['id'] == ""){
        }else{
            if($Current_Admin_Info['welcome'] == "0"){
            $Force_Url = $_SERVER['REQUEST_URI'];
            $Force_Url = substr($Force_Url, 1);
            $Force_Url = rtrim($Force_Url,"/");
            $query = "SELECT * FROM articles WHERE url='$Force_Url' AND type='task' AND trash='0'";
            $result = mysql_query($query) or die(mysql_error());
            $row = mysql_fetch_array($result);
            $Task_Active = $row['active'];
            if($Task_Active == "1"){
            }else{
                $Get_Url = "welcome";
            }
        }
    }

// PULL CURRENT ARTICLE INFO \\
        if(isset($Get_Type)){
            if($_GET['id'] == ""){
                $ArticleId = OtarDecrypt($key,$_GET['type']);
            }else if(isset($_GET['id'])){
                if($_GET[end] == ""){
                    $ArticleId = OtarDecrypt($key,$_GET['id']);
                }else{
                    $ArticleId = OtarDecrypt($key,$_GET['end']);
                }
            }
        }

        if($_GET['url'] == "Pages"){
            $PageInfo = PullPageInfo($Array);
            $PageArticle = $PageInfo['pagearticle'];
            $PageStructure = $PageInfo['pagestructure'];
            $PageSettings = $PageInfo['pagesettings'];
            $PageDynamic = $PageInfo['pagedynamic'];
            $PageFunction = $PageInfo['pagefunction'];
            $PageIds['article'] = $PageArticle['id'];
            $PageIds['structure'] = $PageStructure['id'];
            $PageIds['settings'] = $PageSettings['id'];
            $PageIds['template'] = $PageInfo['id'];
            $PageIds['dynamic'] = $PageDynamic['id'];
            $PageIds['funct'] = $PageFunction['id'];
            $PageIds = OtarEncrypt($key, $PageIds);
            $PageIn = OtarEncrypt($key, $PageInfo);
            $ArticleId = $PageArticle['id'];
        }

        $query = "SELECT * FROM articles WHERE id='$ArticleId' AND trash='0'";
        $result = mysql_query($query) or die(mysql_error());
        $row = mysql_fetch_array($result);
        $row = PbUnSerial($row);
        if($row['other']['tags'] == ""){
            $row['other']['tags'] = $Array['siteinfo']['other']['tags'];
        }
        if($Cw_Multiple_Cat['active'] == "1"){
            #$row['category'] = unserialize($row['category']);
        }

        if($Get_Url == "advertisement"){
            $query = "SELECT * FROM cw_ads WHERE id='$ArticleId' AND trash='0'";
            $result = mysql_query($query) or die(mysql_error());
            $row = mysql_fetch_array($result);
            $row = PbUnSerial($row);
        }


        $Article = $row;
        $Double = $Article['other']['double'];
        $Article_Id = $row['id'];

        
        if($Get_Url == "cwaccess"){
            $query = "SELECT * FROM cwoptions WHERE id='$ArticleId' AND trash='0'";
            $result = mysql_query($query) or die(mysql_error());
            $row = mysql_fetch_array($result);
            $Article = $row;
        }

        if($Get_Url == "offline"){
            $query = "SELECT * FROM articles WHERE id='3'";
            $result = mysql_query($query) or die(mysql_error());
            $row = mysql_fetch_array($result);
            $Article = PbUnserial($row);
        }

// DETECT AND LOAD MOBILE THEME \\
        if($Mobile_Phone == "1"){
            include("$THEME/settings.php");    
            if($TEMPLATEMOBILE == ""){ 
            }else{ 
                $THEME = "theme/$TEMPLATEMOBILE";
            }
        }

         $ProductId = OtarDecrypt($key,$_GET['type']);
         $QuEry = "SELECT * FROM articles WHERE trash='0' AND id='$ProductId'";
         $ReSult = mysql_query($QuEry) or die(mysql_error());
         $ProductInfo = mysql_fetch_array($ReSult);
         $ProductInfo = PbUnSerial($ProductInfo);
    
// FIND TRANSFERED ARTICLES INFORMATION \\       
         $TransferId = OtarDecrypt($key,$_GET['type']);
         $QuEry = "SELECT * FROM transfer WHERE trash='0' AND id='$TransferId'"; 
         $ReSult = mysql_query($QuEry) or die(mysql_error());
         $TransferInfo = mysql_fetch_array($ReSult);
    
// GIVES A TOUR OF THE DASHBOARD \\
         if($Get_Url == ""){
              #if($Array['userinfo']['other']['tour'] == "0"){
              #     $Structure_Type = "tour";
              #     $NewOther = $Array['userinfo']['other'];
              #     $NewOther['tour'] = "1";
              #     $NewOther = serialize($NewOther);
              #    $result = mysql_query("UPDATE users SET other='$NewOther' WHERE id='$Current_Admin_Id'") 
              #     or die(mysql_error()); 
              #     $NewOther = "";
              #}
         }

// PULLS SELECTED USER INFORMATION \\
        if($Get_Url == "users" AND $Get_Type!="" OR $Get_Url == "force" AND $Get_Type!=""){
            $UserListedId = OtarDecrypt($key,$_GET['type']);
            $QuERY = "SELECT * FROM users WHERE id='$UserListedId'"; 
            $ReSuLT = mysql_query($QuERY) or die(mysql_error());
            $ListedUser = mysql_fetch_array($ReSuLT);
            if($ListedUser['info'] == ""){ }else{ $ListedUser['info'] = unserialize($ListedUser['info']); }
            if($ListedUser['other'] == ""){ }else{ $ListedUser['other'] = unserialize($ListedUser['other']); }
            if($Current_Admin_Access >= $ListedUser['info']['access']){
                $ListedUser = array();
            }
            $Array['ListedUser'] = $ListedUser;
        }

        if($UrlOveride == "1"){
            $Structure_Type = $OverideUrl;
        }

    }else{
        $OverRight['theme'] = "theme/cwadmin";
        $OverRight['file'] = "login";
        $Get_Url = "login";
        $_GET['url'] = "login";
    }

    if($OverRight['file'] == ""){
    }else{
        $THEME = $OverRight['theme'];
        $Structure_Type = $OverRight['file'];
    }

    $filename = "$THEME/structure/$Structure_Type.php";
    if(file_exists($filename)){
        $Structure_Type = $Structure_Type;
    }else{
        $Structure_Type = "default";
        $THEME = "theme/cwadmin";
    }

    include("config/structure.php");
   if($Website_Offline == "1"){
        SiteOffline($Array);
    }else{

// CONNECT TO THE APPROPRIATE THEME \\
        include("$THEME/functions.php");
        include("$THEME/settings.php");
        include("$THEME/structure/get.php");
        include("$THEME/header/main.php");
        include("$THEME/header/extras.php");
        include("$THEME/extras/top_header.php");
        include("$THEME/structure/$Structure_Type.php");
        include("$THEME/extras/footer.php");
    }
}

?>
<script type="text/javascript" src="/admin/config/cwajax.js"></script>