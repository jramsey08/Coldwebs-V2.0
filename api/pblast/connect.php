<?php
include("api/pblast/ref/main.php");
include("api/pblast/config.php");


$Request = $_REQUEST['request'];
$Request = OtarDecrypt($PB_Access, $Request);
$Secured = $Request['secured'];
$Info = $Secured['info'];

$RequestId = $Secured['requestid'];
$Requestor = $Request['website'];
$Redirect = $Secured['redirect'];
$Type = $Secured['type'];
$Redirect = "https://www.facebook.com/dialog/oauth/?scope=email,user_birthday,user_about_me,user_groups,user_subscriptions,user_website,user_events,user_notes,user_photos,user_status,user_videos,friends_events,publish_actions,user_online_presence,friends_online_presence,manage_pages,publish_stream,read_mailbox,offline_access,create_event,rsvp_event,read_friendlists,read_requests,manage_notifications,read_insights,ads_management&client_id=211454322200654&redirect_uri=$Redirect&response_type=token";
$Social = $Secured['social'];
#$Social = strtuopper($Social);
$Userid = $Secured['userid'];

if($Type == "login"){
    $query = "SELECT * FROM tasks WHERE requestid='$RequestId'";
    $result = mysql_query($query) or die(mysql_error());
    $row = mysql_fetch_array($result);
    if($row[id] == ""){
            $Content = "Oh snap! Link Your $Social Account.";
            mysql_query("INSERT INTO tasks 
            (type, website, url, info, requestid, content, social, user) VALUES('$Type', '$Requestor', '$Redirect', '$Info', '$RequestId', '$Content', '$Social', '$Userid') ") 
             or die(mysql_error());
    }
}

if($Type == "task"){
$result = mysql_query("UPDATE tasks SET active='0' WHERE social='$Social' AND user='$Userid'") 
or die(mysql_error());
}