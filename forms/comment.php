<?php
include("forms/logincheck.php");
if($Login == "1"){
	$Name = $_POST["name"];
	$Email = $_POST["email"];
	$Message = $_POST["message"];
	$Id = $_GET["id"];
	$Redirect = $_POST["redirect"];

	if($Email == ""){
		$Email = $CurrentUser['email'];
		$Name = $CurrentUser['name'];
	}


	$Date = strtotime("now");
	$Content['name'] = $Name;
	$Content['email'] = $Email;
	$Content = serialize($Content); 

	mysql_query("INSERT INTO articles 
	(content,info,category,type,active,date, webid) VALUES('$Content', '$Message', '$Id', 'comment', '1', '$Date', '$WebId' ) ") 
	or die(mysql_error()); 

}

// TRACKS CHANGES MADE FROM USERS \\
    $Info = array();
    $Info["webid"] = $WebId;
    $Info["user"] = $Current_Admin_Id;
    $Info["error"] = $error;
    $Info["tracker"] = $Load_Sess;
    $Info["id"] = $Article_Id;
    $Info["type"] = "articles";
    #Cw_Changes($Info, $Article, $Array);
/////////////////////////////////////////
?>

Success!, Your Message has been Submitted.