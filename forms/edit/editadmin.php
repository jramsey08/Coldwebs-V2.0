<?php
// PULLS ALL INFORMATION FROM THE POST REQUEST FOR THE CWFILE REQUEST \\
include("forms/logincheck.php");
if($Login == "1"){

	$REDIRECT = $_POST['redirect'];
	$Articles = $_POST['edit'];


	if(is_array($Articles)){
		if($Get_Id == "delete"){
			foreach($Articles as $value){
			    $Post = Cw_Quick_Info("admin", $WebId, $value, $Array);
				$result = mysql_query("UPDATE admin SET trash='1' WHERE id='$value'") 
				or die(mysql_error());
				$result = mysql_query("UPDATE admin SET active='0' WHERE id='$value'") 
				or die(mysql_error());
		// TRACKS CHANGES MADE FROM USERS \\
                $Info = array();
                $Info["id"] = $value;
                $Info["type"] = "admin";
                $Info["manual_message"] = "Sent admin record to trash";
                $Info["webid"] = $WebId;
                $Info["user"] = $Current_Admin_Id;
                $Info["error"] = $error;
                $Info["tracker"] = $Load_Sess;
                Cw_Changes($Info, $Post, $Array);
        /////////////////////////////////////////
			}
		}

		if($Get_Id == "active"){
			foreach($Articles as $value){
			    $Post = Cw_Quick_Info("admin", $WebId, $value, $Array);
				$result = mysql_query("UPDATE admin SET active='1' WHERE id='$value'") 
				or die(mysql_error());
				$result = mysql_query("UPDATE admin SET trash='0' WHERE id='$value'") 
				or die(mysql_error());
		// TRACKS CHANGES MADE FROM USERS \\
                $Info = array();
                $Info["id"] = $value;
                $Info["type"] = "admin";
                $Info["manual_message"] = "Restored admin record from trash";
                $Info["webid"] = $WebId;
                $Info["user"] = $Current_Admin_Id;
                $Info["error"] = $error;
                $Info["tracker"] = $Load_Sess;
                Cw_Changes($Info, $Post, $Array);
        /////////////////////////////////////////
			}
		}

		if($Get_Id == "inactive"){
			foreach($Articles as $value){
			    $Post = Cw_Quick_Info("admin", $WebId, $value, $Array);
				$result = mysql_query("UPDATE admin SET active='0' WHERE id='$value'") 
				or die(mysql_error());
				$result = mysql_query("UPDATE admin SET trash='0' WHERE id='$value'") 
				or die(mysql_error());
		// TRACKS CHANGES MADE FROM USERS \\
                $Info = array();
                $Info["id"] = $value;
                $Info["type"] = "admin";
                $Info["manual_message"] = "Changed admin record to In-active";
                $Info["webid"] = $WebId;
                $Info["user"] = $Current_Admin_Id;
                $Info["error"] = $error;
                $Info["tracker"] = $Load_Sess;
                Cw_Changes($Info, $Post, $Array);
        /////////////////////////////////////////
			}
		}
		
	}

	header("Location: $REDIRECT");

}