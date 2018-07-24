<?php
include("forms/logincheck.php");
if($Login == "1"){

	$REDIRECT = $_POST['redirect'];
	$Articles = $_POST['edit'];
	
	if(is_array($Articles)){

		if($Get_Id == "delete"){
			foreach($Articles as $value){
				#$result = mysqli_query($CwDb,"UPDATE articles SET trash='1' WHERE id='$value' AND webid='$WebId'") or die(mysqli_error());
				#$result = mysqli_query($CwDb,"UPDATE images SET trash='1' WHERE album='$value' AND webid='$WebId'")or die(mysqli_error());
			}
		}

		if($Get_Id == "active"){
			foreach($Articles as $value){
			    $Post = Cw_Quick_Info("users", $WebId, $value, $Array);
				$Stats = $Post['info'];
				$Stats['status'] = "1";
				$Stats = serialize($Stats);
				$result = mysqli_query($CwDb,"UPDATE users SET info='$Stats' WHERE id='$value' AND webid='$WebId'") or die(mysqli_error());
		// TRACKS CHANGES MADE FROM USERS \\
                $Info = array();
                $Info["id"] = $value;
                $Info["type"] = "users";
                $Info["manual_message"] = "Set users record to active";
                $Info["webid"] = $WebId;
                $Info["user"] = $Current_Admin_Id;
                $Info["error"] = $error;
                $Info["tracker"] = $Load_Sess;
                Cw_Changes($Info, $Post, $Array);
        /////////////////////////////////////////
			}
		}

		if($Get_Id == "limit"){
			foreach($Articles as $value){
			    $Post = Cw_Quick_Info("users", $WebId, $value, $Array);
				$Stats = $Post['info'];
				$Stats['status'] = "3";
				$Stats = serialize($Stats);
				$result = mysqli_query($CwDb,"UPDATE users SET info='$Stats' WHERE id='$value' AND webid='$WebId'") or die(mysqli_error());
		// TRACKS CHANGES MADE FROM USERS \\
                $Info = array();
                $Info["id"] = $value;
                $Info["type"] = "users";
                $Info["manual_message"] = "Limited User record";
                $Info["webid"] = $WebId;
                $Info["user"] = $Current_Admin_Id;
                $Info["error"] = $error;
                $Info["tracker"] = $Load_Sess;
                Cw_Changes($Info, $Post, $Array);
        /////////////////////////////////////////
			}
		}

		if($Get_Id == "suspend"){
			foreach($Articles as $value){
			    $Post = Cw_Quick_Info("users", $WebId, $value, $Array);
				$Stats = $Post['info'];
				$Stats['status'] = "0";
				$Stats = serialize($Stats);
				$result = mysqli_query($CwDb,"UPDATE users SET info='$Stats' WHERE id='$value' AND webid='$WebId'") or die(mysqli_error());
		// TRACKS CHANGES MADE FROM USERS \\
                $Info = array();
                $Info["id"] = $value;
                $Info["type"] = "users";
                $Info["manual_message"] = "Suspended User record";
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