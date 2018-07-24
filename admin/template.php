<?php
if($Login == "1"){
    if($Current_Admin_Access <= "3"){
// FORCES USERS TO ONLY VIEW A CERTAIN PAGE \\
        if($Current_Admin_Info['id'] != ""){
            if($Current_Admin_Info['welcome'] == "0"){
                $Force_Url = $_SERVER['REQUEST_URI'];
                $Force_Url = substr($Force_Url, 1);
                $Force_Url = rtrim($Force_Url,"/");
                $query = "SELECT * FROM articles WHERE url='$Force_Url' AND type='task' AND trash='0' AND webid='$WebId'";
                $result = mysqli_query($CwDb,$query);
                $row = mysqli_fetch_assoc($result);
                $Task_Active = $row['active'];
                if($Task_Active != "1"){
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
            $PageFunction = $PageInfo['pagefunction'];
            $PageIds['article'] = $PageArticle['id'];
            $PageIds['structure'] = $PageStructure['id'];
            $PageIds['settings'] = $PageSettings['id'];
            $PageIds['template'] = $PageInfo['id'];
            $PageIds['funct'] = $PageFunction['id'];
            $PageIds = OtarEncrypt($key, $PageIds);
            $PageIn = OtarEncrypt($key, $PageInfo);
            $ArticleId = $PageArticle['id'];
            #print_r($PageInfo);
        }
        $query = "SELECT * FROM articles WHERE id='$ArticleId' AND trash='0'";
        $result = mysqli_query($CwDb,$query);
        $row = mysqli_fetch_assoc($result);
        $row = CwOrganize($row,$Array);
        if($Cw_Multiple_Cat == "1"){
            if(is_array($row['category'])){
                $row['category'] = unserialize($row['category']);
            }
        }
        if($Get_Url == "advertisement"){
            $query = "SELECT * FROM cw_ads WHERE id='$ArticleId' AND trash='0'";
            $result = mysqli_query($CwDb,$query);
            $row = mysqli_fetch_assoc($result);
            $row = CwOrganize($row,$Array);
        }
        $Article = $row;
        $Double = $Article['other']['double'];
        $Article_Id = $row['id'];
        if($Get_Url == "cwaccess"){
            $query = "SELECT * FROM cwoptions WHERE id='$ArticleId' AND trash='0'";
            $result = mysqli_query($CwDb,$query);
            $row = mysqli_fetch_assoc($result);
            $Article = $row;
        }
        if($Get_Url == "ecommerce-orders"){
            $query = "SELECT * FROM trans WHERE id='$ArticleId' AND trash='0'";
            $result = mysqli_query($CwDb,$query);
            $row = mysqli_fetch_assoc($result);
            $Trans = CwOrganize($row,$Array);
        }
        if($Get_Url == "useraccess"){
            $query = "SELECT * FROM cwoptions WHERE id='$ArticleId' AND trash='0'";
            $result = mysqli_query($CwDb,$query);
            $row = mysqli_fetch_assoc($result);
            $UserAccess = CwOrganize($row,$Array);
        }
        if($Get_Url == "offline"){
            $query = "SELECT * FROM articles WHERE id='3'";
            $result = mysqli_query($CwDb,$query);
            $row = mysqli_fetch_assoc($result);
            $Article = CwOrganize($row,$Array);
        }
        if($Get_Type == "notification"){
            $Get_Id = OtarDecrypt($key,$_GET["id"]);
            $query = "SELECT * FROM cw_alerts WHERE id='$Get_Id'";
            $result = mysqli_query($CwDb,$query);
            $row = mysqli_fetch_assoc($result);
            $Notification = CwOrganize($row,$Array);
            $Notification = Cw_Filter_Array($Notification);
            $Notification = Cw_Alerts($Notification);
        }
        if($Get_Type == "session"){
            $Get_Id = OtarDecrypt($key,$_GET["id"]);
            $query = "SELECT * FROM tracker WHERE id='$Get_Id'";
            $result = mysqli_query($CwDb,$query);
            $row = mysqli_fetch_assoc($result);
            $PullSession = CwOrganize($row,$Array);
            $PullSession = Cw_Filter_Array($PullSession);
            $PullSession = GetSessionInfo($PullSession);            
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
         $ReSult = mysqli_query($CwDb,$QuEry);
         $ProductInfo = mysqli_fetch_assoc($ReSult);
         $ProductInfo = CwOrganize($ProductInfo,$Array);

// FIND TRANSFERED ARTICLES INFORMATION \\       
        $TransferId = OtarDecrypt($key,$_GET['type']);
        $QuEry = "SELECT * FROM transfer WHERE trash='0' AND id='$TransferId'"; 
        $ReSult = mysqli_query($CwDb,$QuEry);
        $TransferInfo = mysqli_fetch_assoc($ReSult);

// PULLS SELECTED USER INFORMATION \\
        if($Get_Url == "users" AND $Get_Type!="" OR $Get_Url == "force" AND $Get_Type!="" OR $Get_Url == "ecommerce-customer"){
            $UserListedId = OtarDecrypt($key,$_GET['type']);
            $QuERY = "SELECT * FROM users WHERE id='$UserListedId' AND webid='$_COOKIE[manual_webid]'"; 
            $ReSuLT = mysqli_query($CwDb,$QuERY);
            $ListedUser = mysqli_fetch_assoc($ReSuLT);
            $ListedUser = CwOrganize($ListedUser,$Array);
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
    if($OverRight['file'] != ""){
        $THEME = $OverRight['theme'];
        $Structure_Type = $OverRight['file'];
    }
// GIVES A TOUR OF THE DASHBOARD \\
        if($Array['userinfo']['other']['tour'] != "1"){
           $Structure_Type = "tour";
           $NewOther = $Array['userinfo']['other'];
           $NewOther['tour'] = "1";
           $NewOther = serialize($NewOther);
           $result = mysqli_query($CwDb,"UPDATE users SET other='$NewOther' WHERE id='$Current_Admin_Id' AND webid='$WebId'");
        } 
    $filename = "$THEME/structure/$Structure_Type.php";
    $default_theme = "theme/cwadmin/structure/$Structure_Type.php";
    $error_file = "$THEME/structure/404.php";
    if(!file_exists($filename)){
        if(file_exists($default_theme)){
            $THEME = "theme/cwadmin";
        }else{
            if(file_exists($error_file)){
                $Structure_Type = "404";
            }else{
                if(file_exists("theme/cwadmin/structure/404.php")){ 
                    $Structure_Type = "404";
                    $THEME = "theme/cwadmin";
                }else{
                    if(file_exists("$THEME/structure/default.php")){ 
                        $Structure_Type = "default";
                    }else{
                        $Structure_Type = "default";
                        $THEME = "theme/cwadmin";
                    }
                }
            } 
        }
    }
    if($Article['date_created'] == ""){
        $Article['date_created'] = strtotime("now");
    }
// PULLS PAGE/ARTICLE INFO \\    
    include("config/pageinfo.php");
    
    if($Restrict["status"] == "1"){
        if($Restrict["state"] == "invoice" AND $Get_Url != "cw-invoice"){
            $Structure_Type = "introll/invoice";
        }
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
        if($Get_Url == "learning-center" AND $Get_Type != ""){
            include("$LearnTheme/structure/$LearnFile.php");
        }else{
            include("$THEME/structure/$Structure_Type.php");
        }
        include("$THEME/extras/footer.php");
    }
}
?>
<script type="text/javascript" src="/admin/config/cwajax.js"></script>