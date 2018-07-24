<?php
// PULLS ALL INFORMATION FROM THE POST REQUEST FOR THE CWFILE REQUEST \\
include("forms/logincheck.php");
if($Login == "1"){

	$REDIRECT = $_POST['redirect'];
	$Articles = $_POST['edit'];

	if(is_array($Articles)){
	    
		if($Get_Id == "paid"){
			foreach($Articles as $value){
			    $Post = Cw_Quick_Info("trans", $WebId, $value, $Array);
                $Status['status'] = "1";
                $Status['date'] = strtotime("now");
		        $Other = $Post['other'];
                if(!is_array($Other['history'])){
                    $Other['history'] = array();
                    $Other['history']['0'] = $Status;
                }else{
                    array_push($Other['history'],$Status);
                }
                $Other = serialize($Other);
		        $result = mysqli_query($CwDb,"UPDATE trans SET other='$Other' WHERE id='$value' AND webid='$WebId'") or die(mysqli_error());
		        $result = mysqli_query($CwDb,"UPDATE trans SET status='1' WHERE id='$value' AND webid='$WebId'") or die(mysqli_error());
		// TRACKS CHANGES MADE FROM USERS \\
                $Info = array();
                $Info["id"] = $value;
                $Info["type"] = "trans";
                $Info["manual_message"] = "Changed trans record status to paid";
                $Info["webid"] = $WebId;
                $Info["user"] = $Current_Admin_Id;
                $Info["error"] = $error;
                $Info["tracker"] = $Load_Sess;
                Cw_Changes($Info, $Post, $Array);
        /////////////////////////////////////////
			}
		}
		
		if($Get_Id == "process"){
			foreach($Articles as $value){
			    $Post = Cw_Quick_Info("trans", $WebId, $value, $Array);
                $Status['status'] = "2";
                $Status['date'] = strtotime("now");
                $Other = $Post['other'];
                if(!is_array($Other['history'])){
                    $Other['history'] = array();
                    $Other['history']['0'] = $Status;
                }else{
                    array_push($Other['history'],$Status);
                }
                $Other = serialize($Other);
		        $result = mysqli_query($CwDb,"UPDATE trans SET other='$Other' WHERE id='$value' AND webid='$WebId'") or die(mysqli_error());
		        $result = mysqli_query($CwDb,"UPDATE trans SET status='2' WHERE id='$value' AND webid='$WebId'") or die(mysqli_error());
		// TRACKS CHANGES MADE FROM USERS \\
                $Info = array();
                $Info["id"] = $value;
                $Info["type"] = "trans";
                $Info["manual_message"] = "Changed trans record status to processing";
                $Info["webid"] = $WebId;
                $Info["user"] = $Current_Admin_Id;
                $Info["error"] = $error;
                $Info["tracker"] = $Load_Sess;
                Cw_Changes($Info, $Post, $Array);
        /////////////////////////////////////////
			}
		}
		
		if($Get_Id == "shipped"){
			foreach($Articles as $value){
			    $Post = Cw_Quick_Info("trans", $WebId, $value, $Array);
                $Status['status'] = "3";
                $Status['date'] = strtotime("now");
                $Other = $Post['other'];
                if(!is_array($Other['history'])){
                    $Other['history'] = array();
                    $Other['history']['0'] = $Status;
                }else{
                    array_push($Other['history'],$Status);
                }
                $Other = serialize($Other);
		        $result = mysqli_query($CwDb,"UPDATE trans SET other='$Other' WHERE id='$value' AND webid='$WebId'") or die(mysqli_error());
		        $result = mysqli_query($CwDb,"UPDATE trans SET status='3' WHERE id='$value' AND webid='$WebId'") or die(mysqli_error());
		// TRACKS CHANGES MADE FROM USERS \\
                $Info = array();
                $Info["id"] = $value;
                $Info["type"] = "trans";
                $Info["manual_message"] = "Changed trans record status to Shipped";
                $Info["webid"] = $WebId;
                $Info["user"] = $Current_Admin_Id;
                $Info["error"] = $error;
                $Info["tracker"] = $Load_Sess;
                Cw_Changes($Info, $Post, $Array);
        /////////////////////////////////////////
			}
		}
		
		if($Get_Id == "deliver"){
			foreach($Articles as $value){
                $Post = Cw_Quick_Info("trans", $WebId, $value, $Array);
                $Status['status'] = "4";
                $Status['date'] = strtotime("now");
                $Other = $Post['other'];
                if(!is_array($Other['history'])){
                    $Other['history'] = array();
                    $Other['history']['0'] = $Status;
                }else{
                    array_push($Other['history'],$Status);
                }
                $Other = serialize($Other);
		        $result = mysqli_query($CwDb,"UPDATE trans SET other='$Other' WHERE id='$value' AND webid='$WebId'") or die(mysqli_error());
		        $result = mysqli_query($CwDb,"UPDATE trans SET status='4' WHERE id='$value' AND webid='$WebId'") or die(mysqli_error());
		// TRACKS CHANGES MADE FROM USERS \\
                $Info = array();
                $Info["id"] = $value;
                $Info["type"] = "trans";
                $Info["manual_message"] = "Changed trans record status to Delivered";
                $Info["webid"] = $WebId;
                $Info["user"] = $Current_Admin_Id;
                $Info["error"] = $error;
                $Info["tracker"] = $Load_Sess;
                Cw_Changes($Info, $Post, $Array);
        /////////////////////////////////////////
			}
		}
		
        if($Get_Id == "customer"){
			foreach($Articles as $value){
                $Post = Cw_Quick_Info("trans", $WebId, $value, $Array);
                $Status['status'] = "5";
                $Status['date'] = strtotime("now");
                $Other = $Post['other'];
                if(!is_array($Other['history'])){
                    $Other['history'] = array();
                    $Other['history']['0'] = $Status;
                }else{
                    array_push($Other['history'],$Status);
                }
                $Other = serialize($Other);
		        $result = mysqli_query($CwDb,"UPDATE trans SET other='$Other' WHERE id='$value' AND webid='$WebId'") or die(mysqli_error());
		        $result = mysqli_query($CwDb,"UPDATE trans SET status='5' WHERE id='$value' AND webid='$WebId'") or die(mysqli_error());
		// TRACKS CHANGES MADE FROM USERS \\
                $Info = array();
                $Info["id"] = $value;
                $Info["type"] = "trans";
                $Info["manual_message"] = "Changed trans record status to Info Needed";
                $Info["webid"] = $WebId;
                $Info["user"] = $Current_Admin_Id;
                $Info["error"] = $error;
                $Info["tracker"] = $Load_Sess;
                Cw_Changes($Info, $Post, $Array);
        /////////////////////////////////////////
			}
		}
		
        if($Get_Id == "cancel"){
			foreach($Articles as $value){
                $Post = Cw_Quick_Info("trans", $WebId, $value, $Array);
                $Status['status'] = "6";
                $Status['date'] = strtotime("now");
                $Other = $Post['other'];
                if(!is_array($Other['history'])){
                    $Other['history'] = array();
                    $Other['history']['0'] = $Status;
                }else{
                    array_push($Other['history'],$Status);
                }
                $Other = serialize($Other);
		        $result = mysqli_query($CwDb,"UPDATE trans SET other='$Other' WHERE id='$value' AND webid='$WebId'") or die(mysqli_error());
		        $result = mysqli_query($CwDb,"UPDATE trans SET status='6' WHERE id='$value' AND webid='$WebId'") or die(mysqli_error());
	    // TRACKS CHANGES MADE FROM USERS \\
                $Info = array();
                $Info["id"] = $value;
                $Info["type"] = "trans";
                $Info["manual_message"] = "Changed trans record status to Canceled";
                $Info["webid"] = $WebId;
                $Info["user"] = $Current_Admin_Id;
                $Info["error"] = $error;
                $Info["tracker"] = $Load_Sess;
                Cw_Changes($Info, $Post, $Array);
        /////////////////////////////////////////
			}
		}

        if($Get_Id == "refund"){
			foreach($Articles as $value){
                $Post = Cw_Quick_Info("trans", $WebId, $value, $Array);
                $Status['status'] = "7";
                $Status['date'] = strtotime("now");
                $Other = $Post['other'];
                if(!is_array($Other['history'])){
                    $Other['history'] = array();
                    $Other['history']['0'] = $Status;
                }else{
                    array_push($Other['history'],$Status);
                }
                $Other = serialize($Other);
		        $result = mysqli_query($CwDb,"UPDATE trans SET other='$Other' WHERE id='$value' AND webid='$WebId'") or die(mysqli_error());
		        $result = mysqli_query($CwDb,"UPDATE trans SET status='7' WHERE id='$value' AND webid='$WebId'") or die(mysqli_error());
	    // TRACKS CHANGES MADE FROM USERS \\
                $Info = array();
                $Info["id"] = $value;
                $Info["type"] = "trans";
                $Info["manual_message"] = "Changed trans record status to Refunded";
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
?>