<?php
// THE FOLLOWING CODE IS FOR USER SESSION INFORMATION ONLY \\
    require_once("config/session.php");
    require_once("config/variables.php");

if($Website_Db_Setup == "" OR $Website_Db_Setup == "0"){
}else{

// CW-LOGIN VERIFICATION \\
    include("../forms/logincheck.php");

// LOAD USER ACCOUNT INFORMATION \\
    include("../config/userinfo.php");

// INCLUDES THE ADMIN ACCESS \\
    require_once("../config/access.php");

// INCLUDE PROMOTERBLAST API INFORMATION \\
    require_once("../api/pblast/config.php");
    
// INCLUDE ALL SOCIAL MEDIA INFORMATION \\
    require_once("../config/social.php");
        
// SHOWS THE ADMIN SECURED PAGES DURING SITE OFFLINE MODE
    $AdminSession = SessionUser($Array);
    if($WBOFF == "1"){
        if($AdminSession == "1"){
            $View_site = "1";
        }
    }
    
// THE FOLLOWING CODE IS FOR GENERAL SITE VARIABLE DEFINITIONS \\
    $Array['urlinfo'] = $_GET;
    $Get_End = strtolower($_GET['end']);
    $Get_Id = strtolower($_GET['id']);
    $Get_Type = strtolower($_GET['type']);
    $Get_Url = strtolower($_GET['url']);
    $Get_Error = $_GET["error"];
    $Get_Idle = $_GET['idle'];
    $Get_View = $_GET["view"];
    $Get_Ip = getenv("REMOTE_ADDR");
    $getpage = $_GET["pg"];
    $getpagenumber = $_GET["p"];
    $getlist = $_GET["list"];
    $Next_Page = $getpagenumber + 1;
    $Prev_Page = $getpagenumber - 1;
    $Date = strtotime("now");
    $Random = rand(1000,100000);
    
// PATH LOCATIONS
    $ThemePath = "theme";
    
// SESSION VARIABLES
    $AccountId = $_SESSION['accountid'];
    $Log_Session = $_COOKIE['__cfduid'];
    $Session_Generate = $_SESSION['sessiongenerate'];
    if($getpagenumber == ""){ $getpagenumber = 1; }
    if($getpagenumber == 0){ $getpagenumber = 1; }
    if($getpage == ""){ echo ""; }else{ if(is_numeric ($getlist)){echo "";}else{ $getlist="all"; }}
    if($Get_Template == ""){ echo ""; }else{ $_SESSION['template'] = $Get_Template; }
    if($Get_View == desktop){ $_SESSION['mobileview'] = desktop; }
    if($Get_View == mobile){ $_SESSION['mobileview'] = mobile; }
    if($getshow == ""){ echo "";}else{ $_SESSION['show'] = $getshow; }
    if($getshow == ""){$getshow = $_SESSION['show']; }
    if($getpagenumber == ""){ $getpagenumber = 1; }
    if($getlist == ""){$getlist = 9; }
    $start_from = ($getpagenumber - 1) * $getlist;
    $codelenght = 10;
    while($newcode_length < $codelenght) {
        $x=1;
        $y=3;
        $part = rand($x,$y);
        if($part==1){$a=48;$b=57;}  // Numbers
        if($part==2){$a=65;$b=90;}  // UpperCase
        if($part==3){$a=97;$b=122;} // LowerCase
        $code_part=chr(rand($a,$b));
        $newcode_length = $newcode_length + 1;
        $newcode = $newcode.$code_part;
    }
    
// WEBSITE GENERAL INFORMATION \\
    $query = "SELECT * FROM info";
    $result = mysql_query($query) or die(mysql_error());
    $row = mysql_fetch_array($result);
    if($row['other'] == ""){ }else{ $row['other'] = unserialize($row['other']); }
    if($row['status'] == ""){ }else{ $row['status'] = unserialize($row['status']); }
    $Array['siteinfo'] = $row;
    $Array['sitetheme'] = $row['theme'];
    $Site_Domain = $row['domain'];
    
    $Array['key'] = $key;
    $Array['sitestatus'] = $SiteStatus;
    $Array['fullsession'] = $_SESSION;

// HOSTING INFORMATION
    $Maxsize = "100";
    $Array['hosting']['max'] = $Maxsize;
    $HostingInfo = Hosting_Size($Array);

    include("config/url.php");

// VERIFY IF CURRENT BROWSER IS ALLOWED \\
    CwLimitBrowser($Array);

// OBTAIN CURRENT SHOPPING CART TOTAL \\
    $Cw_Cart = CwCartTotal($Array);

// LOAD MOBILE THEME IF POSSIBLE \\
    $Mobile = CwMobileDetect($Array);

// LOAD BROWSER INFORMATION \\
    $ua=getBrowser();
    $Browser_User_Agent = $ua['userAgent'];
    $Browser_Name = $ua['name'];
    $Browser_Version = $ua['version'];
    $Browser_Platform = $ua['platform'];
    $Browser_Pattern = $ua['pattern'];

// LOG ALL WEBSITE TRAFFIC \\
    #include("../config/online.php");
    #include("config/tracker.php");

// DETECT ANY ACTIVE CWPACK APPLICATION \\
    require_once("../config/loadcwpack.php");

// DETECT ANY ERROR LOGS \\
    #require_once("../error_log.php");
}
