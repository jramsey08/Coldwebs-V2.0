<?php
// PULLS ALL INFORMATION FROM THE POST REQUEST FOR THE CWFILE REQUEST \\
include("forms/logincheck.php");
if($Login == "1"){
	$REDIRECT = $_POST['redirect'];
	$Articles = $_POST['edit'];
	
	if(is_array($Articles)){

		if($Get_Id == "delete"){
			foreach($Articles as $value){
			    $Post = Cw_Quick_Info("page_template", $WebId, $value, $Array);
				$Other = $Post['article'];
				$result = mysqli_query($CwDb,"UPDATE page_template SET trash='1' WHERE id='$value' AND webid='$WebId'") or die(mysqli_error());
				$result = mysqli_query($CwDb,"UPDATE articles SET trash='1' WHERE id='$Other' AND webid='$WebId'") or die(mysqli_error());
        // TRACKS CHANGES MADE FROM USERS \\
                $Info = array();
                $Info["id"] = $value;
                $Info["type"] = "page_template";
                $Info["manual_message"] = "Sent Page Temaplte record to trash";
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
			    $Post = Cw_Quick_Info("page_template", $WebId, $value, $Array);
				$Other = $Post['article'];
				$result = mysqli_query($CwDb,"UPDATE page_template SET active='1' WHERE id='$value' AND webid='$WebId'") or die(mysqli_error());
				$result = mysqli_query($CwDb,"UPDATE page_template SET trash='0' WHERE id='$value' AND webid='$WebId'") or die(mysqli_error());
				$result = mysqli_query($CwDb,"UPDATE articles SET active='1' WHERE id='$Other' AND webid='$WebId'") or die(mysqli_error());
				$result = mysqli_query($CwDb,"UPDATE articles SET trash='0' WHERE id='$Other' AND webid='$WebId'") or die(mysqli_error());
		// TRACKS CHANGES MADE FROM USERS \\
                $Info = array();
                $Info["id"] = $value;
                $Info["type"] = "page_template";
                $Info["manual_message"] = "Set page_template record to active";
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
				$Post = Cw_Quick_Info("page_template", $WebId, $value, $Array);
				$Other = $Post['article'];
				$result = mysqli_query($CwDb,"UPDATE page_template SET active='0' WHERE id='$value' AND webid='$WebId'") or die(mysqli_error());
				$result = mysqli_query($CwDb,"UPDATE articles SET active='0' WHERE id='$Other' AND webid='$WebId'") or die(mysqli_error());
		// TRACKS CHANGES MADE FROM USERS \\
                $Info = array();
                $Info["id"] = $value;
                $Info["type"] = "page_template";
                $Info["manual_message"] = "Set page_template record to In-active";
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