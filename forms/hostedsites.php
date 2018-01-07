<?php
include("forms/logincheck.php");
if($Login == "1"){

// PULLS ALL INFORMATION FROM THE POST REQUEST FOR THE ARTICLE \\

	$Website_Type = $_POST["type"];
	$Website_Status['offline'] = $_POST["offline"];
	$Website_Name = $_POST["name"];
	$Website_Domain = $_POST["domain"];
	$Website_Id = $_POST["id"];
	$Website_Slogan = $PageIds["slogan"];
	$Website_Info = $_POST["content"];
	#$Website_Other = $_POST["other"];	
	
	$Website_Other["db"] = $_POST["db"];
	$Website_Other["manualdb"] = $_POST["manualdb"];
    
	$Rand = rand(100,100000000);
	$files = new UploadedFiles($_FILES);


/////////////////////////////////////// PROCESSES ALL MEDIA UPLOADS \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
	if($files['profilepic']){
		 foreach($files['profilepic'] as $file){
			 $Gallery_Img = "./uploads/images/$Rand" . $file['name'];
			 if($file['name'] == ""){ }else{ 
				 $Website_Logo = "http://$Website_Url_Auth/uploads/images/$Rand" . $file['name'];
				 move_uploaded_file($file['tmp_name'], $Gallery_Img);
			 }
		 }
	}


/////////////////////////////////// SETS DEFAULT VARIABLE VALUES \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\

	// REMOVES ALL AND ANY ILLEGAL CHARACTERS \\
	$Article_Content['name'] = CommaRemoval($Article_Content['name']);


//////////////////////////////////////// SOCIAL/3RD PARTY PLATFORMS INTEGRATION \\\\\\\\\\\\\\\\\\\\\\\

///////////////////////////////////////////////////////////////////////////////////////////////////////



///////////////////// FINALIZE ALL ARRAYS FOR UPLOAD TO DATABASE \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
    $Website_Info = Cw_Filter_Array($Website_Info);
    $Website_Other = Cw_Filter_Array($Website_Other);
    $Website_Status = Cw_Filter_Array($Website_Status);
	$Website_Info = serialize($Website_Info); 
	$Website_Other = serialize($Website_Other);
	$Website_Status = serialize($Website_Status);

	if($Website_Id == ""){
	    
	    $Manual_Message = "Created Website";
	    
// ICREATE NEW ENTRY IN DATABASE \\
		mysql_query("INSERT INTO info(name, domain, status, mp, slogan, logo, theme, other, info) 
		VALUES('$Website_Name', '$Website_Domain', '$Website_Status',  '$Website_Mp', '$Website_Slogan', '$Website_Logo', '$Website_Theme','$Website_Other', '$Website_Info') ")or die(mysql_error());

	}else{

        $query = "SELECT * FROM info WHERE id='$Website_Id'";
    	$result = mysql_query($query) or die(mysql_error());
    	$Article = mysql_fetch_array($result);
    	$Article = CwOrganize($Article,$Array);
        $Article = Cw_Filter_Array($Article);

// UPDATE THE DATABASE WITH ANY NEW/OLD INFORMATION \\
    	if(isset($Website_Name)){
    		$result = mysql_query("UPDATE info SET name='$Website_Name' WHERE id='$Website_Id'") or die(mysql_error());
    	}
    	if(isset($Website_Slogan)){
    		$result = mysql_query("UPDATE info SET slogan='$Website_Slogan' WHERE id='$Website_Id'") or die(mysql_error());
    	}
    	if(isset($Website_Mp)){
    		$result = mysql_query("UPDATE info SET mp='$Website_Mp' WHERE id='$Website_Id'") or die(mysql_error());
    	}
    	if(isset($Website_Domain)){
    		$result = mysql_query("UPDATE info SET domain='$Website_Domain' WHERE id='$Website_Id'") or die(mysql_error());
    	}
    	if(isset($Website_Other)){
    		$result = mysql_query("UPDATE info SET other='$Website_Other' WHERE id='$Website_Id'") or die(mysql_error());
    	}
    	if(isset($Website_Status)){
    		$result = mysql_query("UPDATE info SET status='$Website_Status' WHERE id='$Website_Id'") or die(mysql_error());
    	}
    	if(isset($Website_Logo)){
    		$result = mysql_query("UPDATE info SET logo='$Website_Logo' WHERE id='$Website_Id'") or die(mysql_error());
    	}
    	if(isset($Website_Theme)){
    		$result = mysql_query("UPDATE info SET theme='$Website_Theme' WHERE id='$Website_Id'") or die(mysql_error());
    	}
    	if(isset($Website_Content)){
    		$result = mysql_query("UPDATE info SET info='$Website_Content' WHERE id='$Website_Id'") or die(mysql_error());
    	}
		
		
	}
	
// TRACKS CHANGES MADE FROM USERS \\
    $Info = array();
    $Info["webid"] = $WebId;
    $Info["user"] = $Current_Admin_Id;
    $Info["error"] = $error;
    $Infi["manual_message"] = $Manual_Message;
    $Info["tracker"] = $Load_Sess;
    $Info["id"] = $Website_Id;
    $Info["type"] = "info";
    Cw_Changes($Info, $Article, $Array);
/////////////////////////////////////////

	header("Location: http://$Website_Url_Auth/admin/HostedSites");

}
?>