<?php
include("forms/logincheck.php");
if($Login == "1"){

// PULLS ALL INFORMATION FROM THE POST REQUEST FOR THE SUPPLIER \\


	$Article_Content["url"] = $_POST["url"];
	$Article_Content["date"] = strtotime("now");
	$Article_Content["type"] = $_POST["type"];
	$Article_Content["website"] = $_POST["website"];
	$Article_Content["info"] = $_POST["content"];	
	$Article_Content["img"] = $_POST["img"];
	$Article_Content["returns"] = $_POST["returns"];
	
	$Article_Id = $_POST["id"];
	$Article_Name = $_POST["name"];
	$Article_Type = $_POST["imgtype"];
	$Article_Active = $_POST["active"];
	$Article_Redir = $_POST["redir"];
	
	$files = new UploadedFiles($_FILES);
	$StructureImgSizes = OtarDecrypt($key,$_POST['imgsizes']);
	
	
/////////////////////////////////////// PROCESSES ALL MEDIA UPLOADS \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
	$Array["profilepic"]["img"] = $Article_Content["img"];
	$ImgArray = CwProfilePic($Array,$files,$Rand);
	$Article_Content["img"] = $ImgArray["file"];
	if($_POST["img"] == $Article_Content["img"]){
	}else{
		foreach($files['profilepic'] as $file){
			$ImgName = $file["name"];
		}
		$ImgSrc = $ImgArray["loc"];
		if(is_array($StructureImgSizes)){
		    $PostImages = Cw_Img_Resize($Array,$ImgSrc,$StructureImgSizes,$ImgName);
		}
	}
	$Array["mediafile"]["code"] = $Article_Content["code"];
	$Article_Content["code"] = CwMediaFile($Array,$files,$Rand);

////////////////////////////////// PULL 3RD-PARTY CONTENT INFORMATION \\\\\\\\\\\\\\\\\\\\\\\\\\\\



/////////////////////////////////// SETS DEFAULT VARIABLE VALUES \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\

	if($Article_Url == ""){
		$Article_Url = $Article_Name;
	}

	// REMOVES ALL AND ANY ILLEGAL CHARACTERS \\
	$Article_Url = CharacterRemoval($Article_Url);
	$Article_Name = CommaRemoval($Article_Name);


/////////////////////////////// SOCIAL/3RD PARTY PLATFORMS INTEGRATION \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\

///////////////////////////////////////////////////////////////////////////////////////////////////////



///////////////////// FINALIZE ALL ARRAYS FOR UPLOAD TO DATABASE \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
    $Article_Content = Cw_Filter_Array($Article_Content);
	$Article_Content = serialize($Article_Content); 



	if($Article_Id == ""){
	    $Manual_Message = "Created ecommerce variable";
	    
		mysqli_query($CwDb,"INSERT INTO cwoptions(name, type, active, content, webid) 
		VALUES('$Article_Name', '$Article_Type', '$Article_Active',  '$Article_Content', '$WebId') ")or die(mysql_error());
		
		
	}else{
        $query = "SELECT * FROM cwoptions WHERE id='$Article_Id'";
        $result = mysqli_query($CwDb, $query);
        $Article = mysqli_fetch_assoc($result);
    	$Article = CwOrganize($Article,$Array);
        $Article = Cw_Filter_Array($Article);

// UPDATE THE DATABASE WITH ANY NEW/OLD INFORMATION \\
		$result = mysqli_query($CwDb,"UPDATE cwoptions SET name='$Article_Name' WHERE id='$Article_Id' AND webid='$WebId'") 
		or die(mysqli_error()); 
		$result = mysqli_query($CwDb,"UPDATE cwoptions SET active='$Article_Active' WHERE id='$Article_Id' AND webid='$WebId'") 
		or die(mysqli_error()); 
		$result = mysqli_query($CwDb,"UPDATE cwoptions SET content='$Article_Content' WHERE id='$Article_Id' AND webid='$WebId'") 
		or die(mysqli_error()); 
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