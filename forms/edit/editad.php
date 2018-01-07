<?php
// PULLS ALL INFORMATION FROM THE POST REQUEST FOR THE CWFILE REQUEST \\
include("forms/logincheck.php");
if($Login == "1"){

	$REDIRECT = $_POST['redirect'];
	$Articles = $_POST['edit'];
	$Array['pbaccess'] = $PB_Access;

	if(is_array($Articles)){

		if($Get_Id == "delete"){
			foreach($Articles as $value){
			    $Post = Cw_Quick_Info("cw_ads", $WebId, $value, $Array);
				$result = mysql_query("UPDATE cw_ads SET trash='1' WHERE id='$value' AND webid='$WebId'") 
				or die(mysql_error());
				$result = mysql_query("UPDATE cw_ads SET active='0' WHERE id='$value' AND webid='$WebId'") 
				or die(mysql_error());
				$row = Cw_Quick_Info("cw_ads", $WebId, $value, $Array);
				$row['domain'] = $Website_Url_Auth;
				Cw_Update_Ad($row,$Array);
		// TRACKS CHANGES MADE FROM USERS \\
                $Info = array();
                $Info["id"] = $value;
                $Info["type"] = "cw_ads";
                $Info["manual_message"] = "Sent cw_ads record to trash";
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
			    $Post = Cw_Quick_Info("cw_ads", $WebId, $value, $Array);
				$result = mysql_query("UPDATE cw_ads SET active='1' WHERE id='$value' AND webid='$WebId'") 
				or die(mysql_error());
				$result = mysql_query("UPDATE cw_ads SET trash='0' WHERE id='$value' AND webid='$WebId'") 
				or die(mysql_error());
                $row = Cw_Quick_Info("cw_ads", $WebId, $value, $Array);
				$row['domain'] = $Website_Url_Auth;
				Cw_Update_Ad($row,$Array);
		// TRACKS CHANGES MADE FROM USERS \\
                $Info = array();
                $Info["id"] = $value;
                $Info["type"] = "cw_ads";
                $Info["manual_message"] = "Set cw_ads record to active";
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
			    $Post = Cw_Quick_Info("cw_ads", $WebId, $value, $Array);
				$result = mysql_query("UPDATE cw_ads SET active='0' WHERE id='$value' AND webid='$WebId'") 
				or die(mysql_error());
				$result = mysql_query("UPDATE cw_ads SET trash='0' WHERE id='$value' AND webid='$WebId'") 
				or die(mysql_error());
				$row = Cw_Quick_Info("cw_ads", $WebId, $value, $Array);
				$row['domain'] = $Website_Url_Auth;
				Cw_Update_Ad($row,$Array);
		// TRACKS CHANGES MADE FROM USERS \\
                $Info = array();
                $Info["id"] = $value;
                $Info["type"] = "cw_ads";
                $Info["manual_message"] = "Set cw_ads record to In-active";
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