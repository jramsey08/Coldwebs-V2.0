<?php
// PULLS ALL INFORMATION FROM THE POST REQUEST FOR THE CWFILE REQUEST \\
include("forms/logincheck.php");
if($Login == "1"){

	$REDIRECT = $_POST['redirect'];
	$Articles = $_POST['edit'];

	if(is_array($Articles)){
		if($Get_Id == "delete"){
		    foreach($Articles as $value){
			    if($UserSiteAccess['notification'] == "1"){
    			    if($UserSiteAccess['cross_domain'] == "1"){
        				$result = mysqli_query($CwDb,"UPDATE cw_alerts SET trash='1' WHERE id='$value'") or die(mysql_error());
    			    }else{
        				$result = mysqli_query($CwDb,"UPDATE cw_alerts SET trash='1' WHERE id='$value' AND webid='$WebId'") or die(mysqli_error());
    			    }
			    }
			}
		}
		if($Get_Id == "active"){
			foreach($Articles as $value){
			    if($UserSiteAccess['notification'] == "1"){
			        $Post = Cw_Quick_Info("articles", $WebId, $value, $Array);
    			    if($UserSiteAccess['cross_domain'] == "1"){
        				$result = mysqli_query($CwDb,"UPDATE cw_alerts SET active='1' WHERE id='$value'") or die(mysqli_error());
        				$result = mysqli_query($CwDb,"UPDATE cw_alerts SET trash='0' WHERE id='$value'") or die(mysqli_error());
    			    }else{
    			        $result = mysqli_query($CwDb,"UPDATE cw_alerts SET active='1' WHERE id='$value' AND webid='$WebId'") or die(mysqli_error());
        				$result = mysqli_query($CwDb,"UPDATE cw_alerts SET trash='0' WHERE id='$value' AND webid='$WebId'") or die(mysqli_error());
    			    }
			    }
		// TRACKS CHANGES MADE FROM USERS \\
                $Info = array();
                $Info["id"] = $value;
                $Info["type"] = "cw_alerts";
                $Info["manual_message"] = "Restored Notification record from trash";
                $Info["webid"] = $WebId;
                $Info["user"] = $Current_Admin;
                $Info["error"] = $error;
                $Info["tracker"] = $Load_Sess;
                Cw_Changes($Info, $Post, $Array);
        /////////////////////////////////////////
			}
		}
	}
	header("Location: $REDIRECT");
}