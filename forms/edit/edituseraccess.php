<?php
// PULLS ALL INFORMATION FROM THE POST REQUEST FOR THE CWFILE REQUEST \\
include("forms/logincheck.php");
if($Login == "1"){

	$REDIRECT = $_POST['redirect'];
	$Articles = $_POST['edit'];

	if(is_array($Articles)){
		if($Get_Id == "delete"){
			foreach($Articles as $value){
			    $Post = Cw_Quick_Info("cwoptions", $WebId, $value, $Array);
				$result = mysql_query("UPDATE cwoptions SET trash='1' WHERE id='$value' AND webid='$WebId'") 
				or die(mysql_error());
		// TRACKS CHANGES MADE FROM USERS \\
                $Info = array();
                $Info["id"] = $value;
                $Info["type"] = "cwoptions";
                $Info["manual_message"] = "Sent cwoptions record to trash";
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
			    $Post = Cw_Quick_Info("cwoptions", $WebId, $value, $Array);
				$result = mysql_query("UPDATE cwoptions SET active='1' WHERE id='$value' AND webid='$WebId'") 
				or die(mysql_error());
				$result = mysql_query("UPDATE cwoptions SET trash='0' WHERE id='$value' AND webid='$WebId'") 
				or die(mysql_error());
		// TRACKS CHANGES MADE FROM USERS \\
                $Info = array();
                $Info["id"] = $value;
                $Info["type"] = "cwoptions";
                $Info["manual_message"] = "Set cwoptions record to active";
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
			    $Post = Cw_Quick_Info("cwoptions", $WebId, $value, $Array);
				$result = mysql_query("UPDATE cwoptions SET active='0' WHERE id='$value' AND webid='$WebId'") 
				or die(mysql_error());
		// TRACKS CHANGES MADE FROM USERS \\
                $Info = array();
                $Info["id"] = $value;
                $Info["type"] = "cwoptions";
                $Info["manual_message"] = "Set cwoptions record to In-active";
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