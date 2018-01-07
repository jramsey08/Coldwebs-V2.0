<?php
// PULLS ALL INFORMATION FROM THE POST REQUEST FOR THE CWFILE REQUEST \\
include("forms/logincheck.php");
if($Login == "1"){

	$REDIRECT = $_POST['redirect'];
	$Articles = $_POST['edit'];

	if($Get_Id == "active"){
	    if(is_array($Articles)){
		    foreach($Articles as $value){
                $_SESSION["manual_webid"] = $value;
                setcookie( "manual_webid", $value, $date_of_expiry, "/",$Website_Url_Auth);
		    }
		}
	}

// TRACKS CHANGES MADE FROM USERS \\
    $Info = array();
    $Info["webid"] = $WebId;
    $Info["user"] = $Current_Admin_Id;
    $Info["error"] = $error;
    $Info["tracker"] = $Load_Sess;
    $Info["manual_message"] = "Switched Hosted Website";
    $Info["id"] = $value;
    $Info["type"] = "info";
    Cw_Changes($Info, $Article, $Array);
/////////////////////////////////////////
}

	header("Location: http://$Website_Url_Auth/admin/HostedSites");