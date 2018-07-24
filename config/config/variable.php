<?php
if($IndexUse != "1"){
    $_GET = OtarDecrypt($key, $_GET['info']);
}

$PB_Remote = $_GET['remoteaccess'];
if($_GET['url'] == ""){ 
    $_GET['url'] = "Home"; 
}

    $actual_link = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

    $Get_Ip = getenv('REMOTE_ADDR');
    $Array['urlinfo'] = $_GET;
    $Get_Url = $_GET['url'];
    $Get_Id = $_GET['id'];
    $Get_Type = $_GET['type'];
    $Get_End = $_GET['end'];
    
    if($Get_Url == "dark"){
        $Get_Url = $_GET['type'];
        $Get_Type = $_GET['id'];
        $Get_Id = $_GET['end'];
    }
    
    $Get_S = strtolower($_GET['s']);
    $Get_Idle = $_GET['idle'];
    $Get_End = strtolower($Get_End);
    $Get_Id = strtolower($Get_Id);
    $Get_Type = strtolower($Get_Type);
    $Get_Url = strtolower($Get_Url);
    $Get_Vid = $_GET["vid"];
    $Get_Error = $_GET["error"];
    $Get_View = $_GET["view"];
    $Get_Template = $_GET["template"];
    $getpage = $_GET["pg"];
    $getaid = $_GET["aid"];
    $getshow = $_GET["show"];
    $getgid = $_GET["gid"];
    $getglid = $_GET["glid"];
    $getvid = $_GET["vid"];
    $Get_View = $_GET["view"];
    $getpagenumber = $_GET["p"];
    $Next_Page = $getpagenumber + 1;
    $Prev_Page = $getpagenumber - 1;
    $getlist = $_GET["list"];
    $Date = strtotime("now");
    $UsersOnlinetime=time();
    $time_check = $UsersOnlinetime + "300";
    
// PATH LOCATIONS \\
    $ThemePath = "theme";
    $Scart_Session = $_SESSION["COOKIEPHPSESSID"];
    
// SESSION VARIABLES
    $AccountId = $_SESSION['accountid'];
    $Log_Session = $_SESSION['sessionid'];
    $Session_Generate = $_SESSION['sessiongenerate'];
    if($getpagenumber == ""){ 
        $getpagenumber = 1; 
    }
    if($getpagenumber == 0){ 
        $getpagenumber = 1; 
    }
    if($getpage == ""){ 
    }else{ 
        if(is_numeric($getlist)){
        }else{
            $getlist="all"; 
        }
    }
    if($getlist == ""){
        $getlist = "9"; 
    }
    $start_from = ($getpagenumber - 1) * $getlist;
    $Stop_at = $getlist * $getpagenumber;
if($Get_Url == "home" OR $Get_Url == ""){
    $getlist = "13";
}

$Array['websiteid'] = $Website_Id;


$_POST = Cw_Filter_Array($_POST);
?>