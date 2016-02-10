<?php


$query = "SELECT * FROM session_clear WHERE active='1' AND trash='0' AND computerinfo='$Computer_Name' AND ipaddress='$Ip' AND browser_name='$Browser_Name' AND browser_version='$Browser_Version' AND country='$Country' AND city='$City' AND state='$State' AND timezone='$TimeZone' AND browser_platform='$Browser_Platform' AND browser_pattern='$Browser_Pattern' AND browser_useragent='$Browser_User_Agent' AND lat='$Latitude' AND lon='$Longitude' AND countrycode='$Country_Code'";
$result = mysql_query($query) or die(mysql_error());
$row = mysql_fetch_array($result);
$Session_Id = $row['session'];
$Session_User = $row['userid'];


if($Session_Id == ""){
$Session_Clear = 1;
}else{
$Session_Clear = 0;

$Verify_Login = 0;
$_SESSION['loggedin'] = "";
$_SESSION['accountid'] = "";
$result = mysql_query("UPDATE users SET login='0' WHERE id='$Session_User'") 
or die(mysql_error());
$result = mysql_query("UPDATE login_session SET active='0' WHERE userid='$Session_User'") 
or die(mysql_error());

}



?>