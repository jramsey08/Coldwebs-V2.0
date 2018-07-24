<?php
include("forms/logincheck.php");
if($Login == "1"){

// PULLS ALL INFORMATION FROM THE POST REQUEST FOR THE SUPPLIER \\


	$Business = $_POST["business"];
	
	$Article_Id = $_POST["id"];
	$Article_Name = $_POST["name"];
	$Article_Type = $_POST["imgtype"];
	$Article_Active = $_POST["active"];
	$Article_Redir = $_POST["redir"];
	
	$files = new UploadedFiles($_FILES);
	$StructureImgSizes = OtarDecrypt($key,$_POST['imgsizes']);
 


/////////////////////////////////// SETS DEFAULT VARIABLE VALUES \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\

	if($Article_Url == ""){
		$Article_Url = $Article_Name;
	}

	// REMOVES ALL AND ANY ILLEGAL CHARACTERS \\
	$Article_Url = CharacterRemoval($Article_Url);
	$Article_Name = CommaRemoval($Article_Name);


///////////////////// FINALIZE ALL ARRAYS FOR UPLOAD TO DATABASE \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
    $Business = Cw_Filter_Array($Business);
	$Business = serialize($Business); 

        $query = "SELECT * FROM cwoptions WHERE type='business'";
        $result = mysqli_query($CwDb, $query);
        $Article = mysqli_fetch_assoc($result);
    	

	if($Article['id'] == ""){
	    $Manual_Message = "Created ecommerce variable";
	    
		mysqli_query($CwDb,"INSERT INTO cwoptions(name, type, active, content, webid) 
		VALUES('$Article_Name', 'business', '$Article_Active',  '$Business', '$WebId') ")or die(mysqli_error());
		
	}else{
        $query = "SELECT * FROM cwoptions WHERE id='$Article_Id'";
        $result = mysqli_query($CwDb, $query);
        $Article = mysqli_fetch_assoc($result);
    	$Article = CwOrganize($Article,$Array);
        $Article = Cw_Filter_Array($Article);

// UPDATE THE DATABASE WITH ANY NEW/OLD INFORMATION \\
		$result = mysqli_query($CwDb,"UPDATE cwoptions SET content='$Business' WHERE type='business' AND webid='$WebId'") 
		or die(mysql_error()); 
	}

// TRACKS CHANGES MADE FROM USERS \\
    $Info = array();
    $Info["webid"] = $WebId;
    $Info["user"] = $Current_Admin_Id;
    $Info["error"] = $error;
    $Info["tracker"] = $Load_Sess;
    $Info["manual_message"] = $Manual_Message;
    $Info["id"] = $Article_Id;
    $Info["type"] = "cwoptions";
    Cw_Changes($Info, $Article, $Array);
/////////////////////////////////////////

	header("Location: http://$Website_Url_Auth/$Article_Redir");

}
?>