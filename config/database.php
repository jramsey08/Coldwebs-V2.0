<?php
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// COLDWEBS DATABASE.PHP FILE USED TO CONNECT TO THE DATABASE. THIS FILE IS VERY ESSENTIAL TO THE FUNCTION OF THIS   //
// WEBSITE AND ANY CHANGES SHOULD ONLY BE MADE BY THOSE WHO ARE FAMILIAR TO THE COLDWEBS CONTENT MANAGEMENT SYSTEM   //
// CODING STRUCTURE. TO ENSURE YOUR SITE IS FULLY SAFE PLEASE ENROLL YOUR SITE AT COLDWEBS.COM TO ENSURE YOUR        //
// WEBSITE IN MONITORED DAILY AGAINST ALL THREATS AND ARE RECEIVING ALL NEEDED UPDATES.                              //
// AUTHOR: CEO, JUBAR D. RAMSEY     'VISIT COLDWEBS.COM TO BECOME A COLDWEBS CMS PLATFORM DEVELOPER.'                //
// FILE VERSION 2.0 LAST UPDATED ON 2016-04-05                                                                       //
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


$Website_Url_Auth = WebsiteUrlAuth();


// UNCOMMENT VARIABLES TO MANUALLY SET THE DATABASE INFORMATION. ALL COMMENTED VARIABLES WILL BE SET VIA COLDWEBS.COM \
$Website_Host = 'localhost'; 
$Website_Database = '';  
$Website_Username = ''; 
$Website_Password = ''; 

function CwDb(){
    $CwDb = mysqli_connect("127.0.0.1", "thehyst_coldweb", "MGS0[VWI2ah$", "thehyst_coldweb");
    return $CwDb;
}
$CwDb = CwDb();

///////////////////////////////////////////////////////  DO NOT EDIT ANYTHING BEYOND THIS LINE   \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\


// AUTO ASSIGN DATABASE INFORMATION \\
#$link = mysql_connect("$Website_Host", "$Website_Username", "$Website_Password");

#if(!$link){
#    $ColdWeb_Control = "1";
#    $AutoAssign = "1";
#}else{
    $AutoAssign = "0";
#}

// DATABASE INFORMATION WILL BE GIVEN BY COLDILLUSIONS.COM \\
$body ="?appid=$Website_App_Id&url=$Website_Url_Auth&autoassign=$AutoAssign";
$url = 'http://www.pblast.in/apiauth.php';
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url . $body);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_TIMEOUT, '3');
$content = trim(curl_exec($ch));
curl_close($ch);
$content = str_replace("))))==((((", "+", "$content");
$content = str_replace("((=))", "/", "$content");
$content = PbDecrypt($key,$content);
$content = unserialize($content);
if($content['dbcontrol'] == "1"){
    $Website_Host = mysql_real_escape_string($content['host']);
    $Website_Db_Setup = mysql_real_escape_string($content['dbsetup']);
    $Website_Database = mysql_real_escape_string($content['database']);
    $Website_Username = mysql_real_escape_string($content['username']);
    $Website_Password = mysql_real_escape_string($content['password']);
    $Website_Domain = mysql_real_escape_string($content['domain']);
    $Website_Id = mysql_real_escape_string($content['websiteid']);
    $Website_Offline = mysql_real_escape_string($content['offline']);
    $Site_Setup = mysql_real_escape_string($content['sitesetup']);
}
unset($content);

$CwDb = mysqli_connect($Website_Host, $Website_Username, $Website_Password, $Website_Database);

if($Website_Offline == ""){
    $Website_Offline = "0";
}else if($Website_Offline == "1"){
    $UserSiteAccess['viewoffline'] = "0";
    $View_site = 0;
    $ColdWeb_Control = "1";
}
$Website_Db_Setup = "1";

?>
