<?php
include("forms/logincheck.php");
if($Login == "1"){
	$Id = $_POST["PageIds"];
	$Id = OtarDecrypt($key,$Id);
	$Id = $Id['user'];

	if($CurrentAdmin == $Id){
		$Allow = "1";
	}else{
		if($Current_Access <= "2"){
			$Allow = "1";
		}
	}
	$Rand = rand("0","100000");

	if($Allow == "1"){
		$files = new UploadedFiles($_FILES);
		$FullName = $_POST['name'];
		$SplitName = explode(" ",$FullName);

		$Info['lastname'] = $_POST["lastname"];
		$Info['firstname'] = $_POST["firstname"];
		$Info['access'] = $_POST["access"];
		$Info['status'] = $_POST["status"];
		$Info['siteaccess'] = $_POST['siteaccess'];
		$Img = $_POST['img'];

		$Array["profilepic"]["img"] = $Img;
		$ImgArray = CwProfilePic($Array,$files,$Rand);
		$Info['img'] = $ImgArray["file"];

		$Array['mediafile']['code'] = $Info['code'];
		$Info['code'] = CwMediaFile($Array,$files,$Rand);
		if($Info['firstname'] == ""){
			$Info['firstname'] = $SplitName['0'];
		}
		if($Info['lastname'] == ""){
			$Info['lastname'] = $SplitName['1'];
		}
		
		$Other['social'] = $_POST["social"];
		$Other['webid'] = $_POST["webid"];

			
		$Email = $_POST["email"];
		$Username = $_POST["username"];
		$pword = $_POST["pword"];
		if($Other["webid"] != ""){
		    $WebId = $Other["webid"];
		}
		if($pword['1'] == "" OR $pword['2'] == ""){
		}else{
			if($pword['1'] == $pword['2']){
				$Password = PbEncrypt($key,$pword['1']);
			}else{
				$Password = $_POST['passphrase'];
			}
		}
		
/////Finalize all Variables \\\\\\\\
        $Info = Cw_Filter_Array($Info);
        $Other = Cw_Filter_Array($Other);
    	$Info = serialize($Info); 
    	$Other = serialize($Other);
//////////////////////////////////////
		if($Id == ""){
		    $Manual_Message = "Created User Account";
            $Info = unserialize($Info);
			$Row = Cw_Fetch("SELECT * FROM cwoptions WHERE category='$_POST[access]' AND type='useraccess' AND active='1' AND trash='0'",$Array);
            $LevelAccess = $Row['content'];
			$Row = Cw_Fetch("SELECT * FROM cwoptions WHERE category='4' AND type='useraccess' AND active='1' AND trash='0'",$Array);
            if($_POST['siteaccess'] == $Row['content']){
                $Info['siteaccess'] = $LevelAccess;
            }
            $Info = serialize($Info);
			$row = Cw_Fetch("SELECT * FROM users WHERE email='$Email' OR username='$Username'",$Array);
			if($row['email'] != $Email AND $row['username'] != $Username){
				Cw_Query("INSERT INTO users
				(name, email, other, info, password, username, webid) VALUES('$FullName', '$Email', '$Other', '$Info', '$Password', '$Username', '$WebId' ) ");
			}else{
				$UserRedir = OtarEncrypt($key,$row['id']);
				$Redirect = "admin/Users/$UserRedir";
			}
		}else{
		    
		    $Article = Cw_Fetch("SELECT * FROM users WHERE id='$Id'",$Array);
            $Article = Cw_Filter_Array($Article);
            
            
			if(isset($Info)){
				$result = Cw_Query("UPDATE users SET info='$Info' WHERE id='$Id'");
			}
			if(isset($Other)){
				$result = Cw_Query("UPDATE users SET other='$Other' WHERE id='$Id'");
			}
			if(isset($Password)){
				$result = Cw_Query("UPDATE users SET password='$Password' WHERE id='$Id'");
			}
			if(isset($Username)){
				$result = Cw_Query("UPDATE users SET username='$Username' WHERE id='$Id'");
			}
			if(isset($FullName)){
				$result = Cw_Query("UPDATE users SET name='$FullName' WHERE id='$Id'");
			}
			if(isset($Email)){
				$result = Cw_Query("UPDATE users SET email='$Email' WHERE id='$Id'");
			}
			$Redirect = "admin/Users";
		}
	}
	if($Redirect == ""){
		$Redirect = "admin/Users";
	}
// TRACKS CHANGES MADE FROM USERS \\
    $Info = array();
    $Info["webid"] = $WebId;
    $Info["user"] = $Current_Admin_Id;
    $Info["error"] = $error;
    $Info["tracker"] = $Load_Sess;
    $Info["manual_message"] = $Manual_Message;
    $Info["id"] = $Id;
    $Info["type"] = "users";
    Cw_Changes($Info, $Article, $Array);
/////////////////////////////////////////
	header("Location: http://$Website_Url_Auth/$Redirect");
}
?>