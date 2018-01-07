<?php
include("api/freegoip/req.php");
$TrackAdminId = $_SESSION['accountid'];
if($TrackAdminId == ""){
    $TrackAdminId = NULL;
}

$pageURL = 'http';
if($_SERVER["HTTPS"] == "on"){
    $pageURL .= "s";
}
$pageURL .= "://";
if($_SERVER["SERVER_PORT"] != "80"){
    $pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
}else{
    $pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
}


$Tracker_User = $Current_Admin_Id;

$TrackerIp = getenv("REMOTE_ADDR");
$TrackerDate = date("D M j G:i T Y");
$TrackerPage = "$_SERVER[REQUEST_URI]";
$TrackerPageName = $ActiveArticle['content']['name'];
$TrackerDate2 = date("m-d-y");
$TrackerDate3 = date("m.y");
$TrackerDate4 = strtotime("now");
$Session_Id = $Array['fullsession']['sessiongenerate'];
$_SESSION['trackerpage'] = $TrackerPage;
$RandKey = RandomCode("40");

$Referer = $_SERVER['HTTP_REFERER'];
if($Referer == ""){
    $Referer = $Site_Domain;
}

$query = "SELECT * FROM tracker WHERE date='$TrackerDate' AND ipaddress='$TrackerIp' AND page='$TrackerPage' AND webid='$WebId'";
$result = mysql_query($query) or die(mysql_error());
$row = mysql_fetch_array($result);
$Check_Submission = $row['ipaddress'];

$query = "SELECT * FROM tracker WHERE ipaddress='$TrackerIp' AND webid='$WebId'"; 
$result = mysql_query($query) or die(mysql_error());
$row = mysql_fetch_array($result);
$Check_New = $row['ipaddress'];

if($Check_New == ""){
    mysql_query("INSERT INTO tracker_new (ipaddress, date, date2, webid) VALUES('$TrackerIp', '$TrackerDate3', '$TrackerDate2', '$WebId') ")
    or die(mysql_error());
}

$time_end = microtime_float();
$Cw_LoadTime = $time_end - $time_start;
$Cw_LoadTime_Template = $time_end_Template - $time_start_Template;
$Cw_LoadTime_Top = $time_end_Top - $time_start;
$Other['template'] = $Cw_LoadTime_Template;
$Other['top'] = $Cw_LoadTime_Top;
$Other = serialize($Other);
$Page_Info = array();
$Load_Date = strtotime("now");
$New_Date = date("m-d-Y",$Load_Date);

$Valid_Tracker = Cw_Tracker_Validate($TrackerPage);
if($Check_Submission == ""){
if($Valid_Tracker == "1"){
    mysql_query("INSERT INTO tracker (session, ref, ipaddress, date, page, pagename, countrycode, country, state, city, zipcode, lat, lon, timezone, mobile, user, date2, date3, arrival, browser_platform, browser_version, browser_pattern, browser_useragent, browser_name, online, expire, randkey, loadtime,webid) VALUES('$Session_Id', '$Referer', '$TrackerIp', '$TrackerDate', '$TrackerPage', '$TrackerPageName', '$Tracker_CountryCode', '$Tracker_CountryName', '$Tracker_RegionCode', '$Tracker_City', '$Tracker_ZipCode', '$Tracker_Latitude', '$Tracker_Longitude', '$Tracker_TimeZone', '$Tracker_Mobile', '$Temp_User', '$TrackerDate2', '$TrackerDate3', '$TrackerDate4', '$Browser_Platform', '$Browser_Version', '$Browser_Pattern', '$Browser_User_Agent', '$Browser_Name', '0', '$time_check', '$RandKey', '$Cw_LoadTime', '$WebId') ") or die(mysql_error());
    $AddHits = 1;
    $query = "SELECT * FROM tracker WHERE randkey='$RandKey' AND webid='$WebId'";
    $result = mysql_query($query) or die(mysql_error());
    $row = mysql_fetch_array($result);
    $Load_Sess = $row['id'];
    $result = mysql_query("UPDATE tracker SET randkey='' WHERE id='$Load_Sess'  AND webid='$WebId'") or die(mysql_error());
}}

if($Load_Sess != ""){
    if($Cw_LoadTime!= ""){
        mysql_query("INSERT INTO tracker_load (loadtime, date, page, sessid, other, dat2, webid) VALUES('$Cw_LoadTime', '$Load_Date', '$Page_Info', '$Load_Sess','$Other', '$New_Date', '$WebId') ") 
        or die(mysql_error()); 
    }
}


?>