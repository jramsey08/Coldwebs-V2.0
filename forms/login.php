<?php
// THIS PAGE HANDLES THE LOGIN PROCESS. UNLESS REFERRING FROM THE COLDWEBS DOCUMENTATION, ALTERING OR REMOVING ANY CODE FROM
// THIS FILE CAN AND WILL CAUSE MANY ERRORS WITHIN YOUR SITE.
    
    
// VARIABLES NEEDED DURING THE LOGIN PROCESS \\
unset($_GET['logout']);
$Facebook_Link = $_POST['fblink'];
$Facebook_Id = $_POST['facebookid'];
$Post_Username = $_POST['log'];
$Post_Password = $_POST['pwd'];
$Post_Username_Encrypt = PbEncrypt($key, $Post_Username);
$Post_Password_Encrypt = PbEncrypt($key, $Post_Password);
$Post_Redirect = $_POST['redirect'];
$Post_Auto_Login = $_POST['autologin'];
$username = strtolower($username);
$Computer_Name = gethostbyaddr($_SERVER['REMOTE_ADDR']);
$User_Ip = gethostbyaddr($_SERVER['REMOTE_ADDR']);
$Country_Code =  $locations['countryCode'];
$Country =  $locations['countryName'];
$State =  $locations['regionName'];
$City =  $locations['cityName'];
$Zipcode =  $locations['zipCode'];
$Latitude =  $locations['latitude'];
$Longitude =  $locations['longitude'];
$TimeZone =  $locations['timeZone'];
$Browser_User_Agent = $ua['userAgent'];
$Browser_Name = $ua['name'];
$Browser_Version = $ua['version'];
$Browser_Platform = $ua['platform'];
$Browser_Pattern = $ua['pattern'];
$SessionCookie = $Array['session']['cookie'];

// CURRENT LOGIN VERIFICATION \\
if($_SESSION['current_user'] == ""){

// EXCEPTION STATEMENTS \\
    if($Post_Username == ""){
        $Login = 0; $Array['error'] = "111";
    }
    if($Post_Password == ""){ 
        $Login = 0; $Array['error'] = "111";
    }
    
// SOCIAL AND 3RD PARTY LOGIN SCRIPTS \\
    

// STANDARD LOGIN PROCESS
    if($Login == "0"){
        $REDIRECT = "Login?error=$Array[error]";
    }else{
        $query = "SELECT * FROM users WHERE email='$Post_Username' OR username='$Post_Username'";
        $result = mysql_query($query) or die(mysql_error());
        $row = mysql_fetch_array($result);
        $row = PbUnserial($row);
        $row['url'] = strtolower($row['url']);
        $row['email'] = strtolower($row['email']);
        $Access = $row['info']['access'];
        $User_Info = $row['info'];
        $UserId = $row['id'];
        $UserOther = $row['other'];
        $Actual_Pw = $row['password'];
        if($UserId == ""){ 
            $Login = 0; 
            $Array['error'] = "112";
            $REDIRECT = "Login?error=112"; 
        }else{ 
            $Login = 1;
        }  
        if($User_Info['block'] == "1" OR $User_Info['status'] == "3"){ 
            $Login = 0;
            $Array['error'] = "113";
            $REDIRECT = "Login?error=113";
        }
        if($Actual_Pw == $Master_Password){ 
             $Login = 1;
             $Login_Type = "201"; 
        }else{
             if($Actual_Pw == $Post_Password_Encrypt){ 
                  $Login = 1;
                  $Login_Type = "200"; 
             }else{
                  $Login = 0;
                  $Array['error'] = "112";
                  $REDIRECT = "Login?error=112"; 
             }
        }

        if($Login == 1){
            $result = mysql_query("UPDATE login_session SET trash='1' WHERE userid='$UserId'") 
            or die(mysql_error());
            $result = mysql_query("UPDATE login_session SET active='0' WHERE userid='$UserId'") 
            or die(mysql_error());
            $_SESSION['accountid'] = $UserId;
            $_SESSION['current_user'] = $UserId;
            $UserOther = array();
            $UserOther['login'] = "1";
            $UserOther['lastlogin'] = $Date;
            $result = mysql_query("UPDATE users SET other='$UserOther' WHERE id='$UserId'") or die(mysql_error());
       mysql_query("INSERT INTO login_session(active, session, date, computerinfo, ipaddress, userid, browser_name, browser_useragent, browser_version, browser_platform, browser_pattern, country, state, city, zip, lat, lon, countrycode, timezone, session_generate, cookie) VALUES('1', '$Session_Generate', '$Date', '$Computer_Name', '$User_Ip', '$UserId', '$Browser_Name', '$Browser_User_Agent', '$Browser_Version', '$Browser_Platform', '$Browser_Pattern', '$Country', '$State', '$City', '$Zipcode', '$Latitude', '$Longitude', '$Country_Code', '$TimeZone', '$Session_Generate', '$Session_Generate' ) ")or die(mysql_error());
       $REDIRECT = "admin/";
            if($Access >= "3"){
                $Array['error'] = "114"; $REDIRECT = "Dashboard/";
            }else{
                $Array['error'] = "114"; $REDIRECT = "admin/";
            }
        }
    }
}else{
    $query = "SELECT * FROM users WHERE id='$_SESSION[current_user]'";
    $result = mysql_query($query) or die(mysql_error());
    $row = mysql_fetch_array($result);
    $row = PbUnserial($row);
    $Access = $row['info']['access'];
    if($Access >= "3"){
        $Array['error'] = "114"; $REDIRECT = "Dashboard/";
    }else{
        $Array['error'] = "114"; $REDIRECT = "admin/";
    }
}

$Domain = $Array["siteinfo"]["domain"];
header("Location: $Domain/$REDIRECT");

?>