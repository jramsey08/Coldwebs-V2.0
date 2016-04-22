<?php

$PB_Remote = $_GET['remoteaccess'];


if($_GET['url'] == ""){ 
    $_GET['url'] = "Home"; 
}
    $Get_Ip = getenv('REMOTE_ADDR');
    $Array['urlinfo'] = $_GET;
    $Get_Url = $_GET['url'];
    $Get_S = strtolower($_GET['s']);
    $Get_Idle = $_GET['idle'];
    $Get_Id = $_GET['id'];
    $Get_Type = $_GET['type'];
    $Get_End = $_GET['end'];
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
        $getlist = 10; 
    }
    
    $start_from = ($getpagenumber - 1) * $getlist;
    $Stop_at = $getlist * $getpagenumber;

<<<<<<< HEAD
if($Get_Url == "home" OR $Get_Url == ""){
    $getlist = "13";
}

$Home_Zero = $getlist * $getpagenumber;
$Home_Zero = $Home_Zero - "13";
$Home_One = $getlist * $getpagenumber;
$Home_One = $Home_One - "12";
$Home_Two = $getlist * $getpagenumber;
$Home_Two = $Home_Two - "11";
$Home_Three = $getlist * $getpagenumber;
$Home_Three = $Home_Three - "10";
$Home_Four = $getlist * $getpagenumber;
$Home_Four = $Home_Four - "9";
$Home_Five = $getlist * $getpagenumber;
$Home_Five = $Home_Five - "8";
$Home_Six = $getlist * $getpagenumber;
$Home_Six = $Home_Six - "7";
$Home_Seven = $getlist * $getpagenumber;
$Home_Seven = $Home_Seven - "6";
$Home_Eight = $getlist * $getpagenumber;
$Home_Eight = $Home_Eight - "5";
$Home_Nine = $getlist * $getpagenumber;
$Home_Nine = $Home_Nine - "4";
$Home_Ten = $getlist * $getpagenumber;
$Home_Ten = $Home_Ten - "3";
$Home_Eleven = $getlist * $getpagenumber;
$Home_Eleven = $Home_Eleven - "2";
$Home_Twelve = $getlist * $getpagenumber;
$Home_Twelve = $Home_Twelve - "1";
$Home_Thirteen = $getlist * $getpagenumber;
$Home_Thirteen = $Home_Thirteen - "0";

=======
$Home_One = $getlist * $getpagenumber;
$Home_One = $Home_One - $getlist;
$Home_Two = $getlist * $getpagenumber;
$Home_Two = $Home_Two - "8";
$Home_Three = $getlist * $getpagenumber;
$Home_Three = $Home_Three - "7";
$Home_Four = $getlist * $getpagenumber;
$Home_Four = $Home_Four - "6";
$Home_Five = $getlist * $getpagenumber;
$Home_Five = $Home_Five - "5";
$Home_Six = $getlist * $getpagenumber;
$Home_Six = $Home_Six - "4";
$Home_Seven = $getlist * $getpagenumber;
$Home_Seven = $Home_Seven - "3";
$Home_Eight = $getlist * $getpagenumber;
$Home_Eight = $Home_Eight - "2";
$Home_Nine = $getlist * $getpagenumber;
$Home_Nine = $Home_Nine - "1";
$Home_Ten = $getlist * $getpagenumber;
$Home_Ten = $Home_Ten - "0";
>>>>>>> origin/master

$Array['websiteid'] = $Website_Id;
?>