<?php
// PULLS ALL INFORMATION FROM THE POST REQUEST FOR THE ARTICLE \\
include("forms/logincheck.php");
if($Login == "1"){
	$Article_Type = $_POST["imgtype"];
	$Article_Name = $_POST["name"];
	$Article_Active = $_POST["active"];
	$Article_Content = $_POST["content"];
	$PageIds = $_POST["PageIds"];
	$PageIds = OtarDecrypt($key, $PageIds);
	$Article_Id = $PageIds["article"];

// REMOVES ALL AND ANY ILLEGAL CHARACTERS \\
	$Article_Code = CharacterRemoval($Article_Code);
	$Article_Name = CommaRemoval($Article_Name);
	
	if($Article_Id == ""){
// CREATE A NEW LISTING WITH THE INFORMATION PROVIDED \\
		mysqli_query($CwDb,"INSERT INTO cwoptions(type, active, name, content, webid) 
		VALUES('access', '$Article_Active',  '$Article_Name', '$Article_Content', '$WebId') ")or die(mysqli_error());
	}else{
	    $query = "SELECT * FROM cwoptions WHERE id='$Article_Id'";
    	$result = mysqli_query($CwDb,$query) or die(mysqli_error());
    	$Article = mysqli_fetch_assoc($result);
    	$Article = CwOrganize($Article,$Array);
        $Article = Cw_Filter_Array($Article);
        
// UPDATE THE DATABASE WITH ANY NEW/OLD INFORMATION \\
		$result = mysqli_query($CwDb,"UPDATE cwoptions SET name='$Article_Name' WHERE id='$Article_Id' AND webid='$WebId'") or die(mysqli_error()); 
		$result = mysqli_query($CwDb,"UPDATE cwoptions SET content='$Article_Content' WHERE id='$Article_Id' AND webid='$WebId'") or die(mysqli_error()); 
		$result = mysqli_query($CwDb,"UPDATE cwoptions SET active='$Article_Active' WHERE id='$Article_Id' AND webid='$WebId'") or die(mysqli_error()); 
	}

// TRACKS CHANGES MADE FROM USERS \\
    $Info = array();
    $Info["webid"] = $WebId;
    $Info["user"] = $Current_Admin_Id;
    $Info["error"] = $error;
    $Info["tracker"] = $Load_Sess;
    $Info["id"] = $Article_Id;
    $Info["type"] = "cwoptions";
    Cw_Changes($Info, $Article, $Array);
/////////////////////////////////////////
	$REDIRECT = "admin/CwAccess";
	header("Location: http://$Website_Url_Auth/$REDIRECT");
}
?>