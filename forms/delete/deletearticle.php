<?php
// PULLS ALL INFORMATION FROM THE POST REQUEST FOR THE CWFILE REQUEST \\
include("forms/logincheck.php");
if($Login == "1"){

	$REDIRECT = $_POST['redirect'];
	$Articles = $_POST['edit'];

	if(is_array($Articles)){
		if($Get_Id == "delete"){
			foreach($Articles as $value){
			    $Post = Cw_Quick_Info("articles", $WebId, $value, $Array);
                $Info["images"] = Cw_Pull_Post_Images($value,$WebId,$Array);
				$result = mysql_query("DELETE FROM articles WHERE id='$value' AND webid='$WebId'") 
				or die(mysql_error());
				$result = mysql_query("DELETE FROM images WHERE album='$value' AND webid='$WebId'")
				or die(mysql_error());
        // TRACKS CHANGES MADE FROM USERS \\
                $Info = array();
                $Info["id"] = $value;
                $Info["type"] = "articles";
                $Info["manual_message"] = "Perm Deleted Post from records";
                $Info["webid"] = $WebId;
                $Info["user"] = $Current_Admin_Id;
                $Info["error"] = $error;
                $Info["tracker"] = $Load_Sess;
                Cw_Changes($Info, $Post, $Array);
        /////////////////////////////////////////
			}

		}
		if($Get_Id == "restore"){
			foreach($Articles as $value){
			    $Post = Cw_Quick_Info("articles", $WebId, $value, $Array);
				$result = mysql_query("UPDATE articles set trash='0' WHERE id='$value' AND webid='$WebId'") 
				or die(mysql_error());
				$result = mysql_query("UPDATE images set trash='0' WHERE album='$value' AND webid='$WebId'")
				or die(mysql_error());
        // TRACKS CHANGES MADE FROM USERS \\
                $Info = array();
                $Info["id"] = $value;
                $Info["type"] = "articles";
                $Info["manual_message"] = "Sent Post to trash";
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