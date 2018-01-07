<?php

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

$pageNAME = substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1);
$Tracker_Country_Code =  $locations['countryCode'];
$Tracker_Country =  $locations['countryName'];
$Tracker_Region =  $locations['regionName'];
$Tracker_City =  $locations['cityName'];
$Tracker_Zipcode =  $locations['zipCode'];
$Tracker_Latitude =  $locations['latitude'];
$Tracker_Longitude =  $locations['longitude'];
$Tracker_TimeZone =  $locations['timeZone'];
$Tracker_Mobile = $Mobile_Phone_Selected;
$Tracker_User = $Current_Admin_Id;

$TrackerIp = getenv("REMOTE_ADDR");
$TrackerDate = date("D M j G:i T Y");
$TrackerPage = $pageURL;
$TrackerPageName = "";
$TrackerDate2 = date("m-d-y");
$TrackerDate3 = date("m.y");
$TrackerDate4 = strtotime("now");
$Session_Id = $_SESSION['sessionid'];
$_SESSION['trackerpage'] = $TrackerPage;

$Referer = $_SERVER['HTTP_REFERER'];
if($Referer == ""){
    $Referer = $Site_Domain;
}

$query = "SELECT * FROM tracker WHERE date='$TrackerDate' AND ipaddress='$TrackerIp' AND webid='$WebId'"; 
$result = mysql_query($query) or die(mysql_error());
$row = mysql_fetch_array($result);
$Check_Submission = $row['ipaddress'];

$query = "SELECT * FROM tracker WHERE ipaddress='$TrackerIp' AND webid='$WebId'"; 
$result = mysql_query($query) or die(mysql_error());
$row = mysql_fetch_array($result);
$Check_New = $row['ipaddress'];

if($Check_New == ""){
    mysql_query("INSERT INTO tracker_new (ipaddress, date, webid) VALUES('$TrackerIp', '$TrackerDate3', $WebId) ") 
    or die(mysql_error()); 
}

if($Check_Submission == ""){
    mysql_query("INSERT INTO tracker (session, ref,ipaddress, date, page, pagename, countrycode, country, state, city, zipcode, lat, lon, timezone, mobile, user, date2, date3, arrival, browser_platform, browser_version, browser_pattern, browser_useragent, browser_name, online, expire, admin, webid) VALUES('$Session_Id', '$Referer', '$TrackerIp', '$TrackerDate', '$TrackerPage', '$TrackerPageName', '$Tracker_Country_Code', '$Tracker_Country', '$Tracker_Region', '$Tracker_City', '$Tracker_Zipcode', '$Tracker_Latitude', '$Tracker_Longitude', '$Tracker_TimeZone', '$Tracker_Mobile', '$Tracker_User', '$TrackerDate2', '$TrackerDate3', '$TrackerDate4', '$Browser_Platform', '$Browser_Version', '$Browser_Pattern', '$Browser_User_Agent', '$Browser_Name', '1', '$time_check', '1', '$WebId') ") 
    or die(mysql_error());
    $AddHits = 1;
}


?>
