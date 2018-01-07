<?php
// PULLS ALL INFORMATION FROM THE POST REQUEST FOR THE CWFILE REQUEST \\
include("forms/logincheck.php");
if($Login == "1"){
	$Article_Id = $_POST["id"];
	$Article_Type = $_POST["imgtype"];
	$Article_Trash = $_POST["trash"];
	$Article_Info = $_POST["content"];
	$Article_Active = $_POST["active"];
	$Article_Url = $_POST["url"];
	$Article_Date = strtotime("now");
	$Article_Name = $_POST["name"];
	$Article_Content["name"] = $_POST["name"];
	$Article_Content["img"] = $_POST["img"];
	
	$REDIRECT = $_POST["redirect"];
	$Image_Order = $_POST["ImageOrder"];
	$Image_Url = $_POST["ImageUrl"];
	$Rand = rand(100,100000000);
	$StructureImgSizes = OtarDecrypt($key,$_POST['imgsizes']);
	$files = new UploadedFiles($_FILES);
	$GalleryRemoval = $_POST['removegal'];
	$Recipients = $_POST['recipient'];
	$CwFileUrl = $_POST['cwfileurl'];
	$EncryptArticle = $_POST['encryptid'];
	$GalRand = $_POST['galrand'];
	
	$SettingsAuto = $_POST["auto"];
	$SettingsAlbum = $_POST["album"];
	$SettingsBackground = $_POST["background"];
	$SettingsDashboard = $_POST["dashboard"];
	$SettingsSecure = $_POST["secure"];

	$Article_Other["gallery"] = $POST["gallery"];
	$Article_Other["client"] = $_POST["client"];
	$Article_Other["cwfilecode"] = $_POST["cwfilecode"];
	$Article_Other["password"] = $_POST["password"];
	$Article_Other["term"] = $_POST["term"];
	$Article_Other["protect"] = $_POST["protect"];
	$Article_Other["duration"] = $_POST["duration"];
	$Article_Other["specificdate"] = strtotime($_POST['specificdate']);

	$Search_Name = $Article_Content["name"];
	$Search_Parent = $_POST["id"];
	$Search_Other = "";



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
	
	
/////////////////////////////////// SETS DEFAULT VARIABLE VALUES \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
	if($Article_Url == ""){
		$Article_Url = $Article_Content["name"];
	}
	if($Article_Content['code'] == ""){
		$Article_Content["code"] = $Article_Content["embedcode"]; 
	}
	if($Article_Date == ""){
		$Article_Date = strtotime("now");
	}

// REMOVES ALL AND ANY ILLEGAL CHARACTERS \\
	$Article_Content['name'] = CommaRemoval($Article_Content['name']);

// SET THE CWFILE DOCUMENTS SETTINGS\\
	$CwFileTerm = $_POST["term"];
	$CwFileDuration = $_POST["duration"];
	$CwFileSpecific = $_POST["specificdate"];
	$CwFilePassword = $_POST["password"];
	$CwFileMessage = $_POST["content"];
	if($Article_Other["cwfilecode"] == ""){
		$CwFileCode = CwFileCode($Website_Id);
		$Article_Other["cwfilecode"] = $CwFileCode;
	}else{
		$CwFileCode = $Article_Other["cwfilecode"];
	}
	if($CwFileCount == "" OR $CwFileCount == "1"){
		$query = "SELECT * FROM images WHERE album='$Article_Id' AND active='1' AND trash='0'";
		$result = mysql_query($query) or die(mysql_error());
		while($row = mysql_fetch_array($result)){
			$CwFileCount = $CwFileCount + "1";
		}
	}else{
		$CwFileCount = count($files);
	}
	if($_POST["term"] == "specific"){
		$CwFileExpire = strtotime("$CwFileSpecific");
	}else{
		$CwFileExpire = strtotime("+ $CwFileDuration $CwFileTerm");
	}


//////////////////////////////////////// SOCIAL/3RD PARTY PLATFORMS INTEGRATION \\\\\\\\\\\\\\\\\\\\\\\

///////////////////////////////////////////////////////////////////////////////////////////////////////



///////////////////// FINALIZE ALL ARRAYS FOR UPLOAD TO DATABASE \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
    $Article_Content = Cw_Filter_Array($Article_Content);
    $Article_Other = Cw_Filter_Array($Article_Other);
    $Article_Content = serialize($Article_Content); 
    $Article_Other = serialize($Article_Other);



	if($Article_Id == ""){
        $PostImages = serialize($PostImages);
		mysql_query("INSERT INTO articles(url, active, category, type, other, rand, date, feat, content, info, img, webid)
		VALUES('$Article_Url', '$Article_Active',  '$Article_Category', '$Article_Type', '$Article_Other', '$GalRand','$Article_Date', '$Article_Feat', '$Article_Content', '$Article_Info ', '$PostImages', '$WebId') ")or die(mysql_error());

// PROCESS GALLERY IMAGE UPLOADS \\
		$query = "SELECT * FROM articles WHERE trash='0' AND rand='$Rand' AND webid='$WebId'";
		$result = mysql_query($query) or die(mysql_error());
		$row = mysql_fetch_array($result);
		$Album = $row['id'];
		$result = mysql_query("UPDATE images SET album='$Album' WHERE album='$GalRand' AND webid='$WebId'") 
        or die(mysql_error());
		$result = mysql_query("UPDATE articles SET rand='' WHERE id='$Album' AND webid='$WebId'") 
		or die(mysql_error());


	}else{

        $query = "SELECT * FROM articles WHERE id='$Article_Id'";
    	$result = mysql_query($query) or die(mysql_error());
    	$Article = mysql_fetch_array($result);
    	$Article = CwOrganize($Article,$Array);
        $Article = Cw_Filter_Array($Article);
            
            
// PROCESS GALLERY IMAGE UPLOADS \\
		if($Image_Order == ""){ 
		}else{
			foreach($Image_Order as $ImageO){
				$ImageId = key($Image_Order);
				$result = mysql_query("UPDATE images SET list='$ImageO' WHERE id='$ImageId' AND webid='$WebId'") 
				or die(mysql_error());
				next($Image_Order);
			}
		}
		if($Image_Url == ""){ 
		}else{
			foreach($Image_Url as $ImageU){
				$ImageUId = key($Image_Order);
				$result = mysql_query("UPDATE images SET url='$ImageU' WHERE id='$ImageUId' AND webid='$WebId'") 
				or die(mysql_error());
				next($Image_Url);
			}
		}

// UPDATE THE DATABASE WITH ANY NEW/OLD INFORMATION \\
		$result = mysql_query("UPDATE articles SET active='$Article_Active' WHERE id='$Article_Id' AND webid='$WebId'") 
		or die(mysql_error()); 
		$result = mysql_query("UPDATE articles SET info='$Article_Info' WHERE id='$Article_Id' AND webid='$WebId'") 
		or die(mysql_error()); 
		$result = mysql_query("UPDATE articles SET other='$Article_Other' WHERE id='$Article_Id' AND webid='$WebId'") 
		or die(mysql_error());
		$result = mysql_query("UPDATE articles SET content='$Article_Content' WHERE id='$Article_Id' AND webid='$WebId'") 
		or die(mysql_error());
		if(is_array($PostImages)){
		    $PostImages = serialize($PostImages);
			$result = mysql_query("UPDATE articles SET img='$PostImages' WHERE id='$Article_Id' AND webid='$WebId'") 
			or die(mysql_error());
		}

		if(is_array($GalleryRemoval)){
			foreach($GalleryRemoval as $value){
				$result = mysql_query("UPDATE images SET trash='1' WHERE id='$value' AND webid='$WebId'")
				or die(mysql_error());
			}
		}


	}


// TRACKS CHANGES MADE FROM USERS \\
    $Info = array();
    $Info["webid"] = $WebId;
    $Info["user"] = $Current_Admin_Id;
    $Info["error"] = $error;
    $Info["tracker"] = $Load_Sess;
    $Info["id"] = $Article_Id;
    $Info["type"] = "articles";
    Cw_Changes($Info, $Article, $Array);
/////////////////////////////////////////



// SEND REQUEST THROUGH CWFILE.COM FOR PROCESSING \\
	include("api/cwfile/request.php");

	if($REDIRECT == ""){
		$REDIRECT = "admin/CwFile/$EncryptArticle";
	} 

	if($Cw_QuickPost == "1"){
		$REDIRECT = "admin/";
	}


	header("Location: http://$Website_Url_Auth/$REDIRECT");
}