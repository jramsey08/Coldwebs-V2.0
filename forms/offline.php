<?php
// PULLS ALL INFORMATION FROM THE POST REQUEST FOR THE ARTICLE \\
include("forms/logincheck.php");
if($Login == "1"){
	$Article_Id = $_POST["id"];
	$Article_Type = $_POST["imgtype"];
	$Article_Search = $_POST["search"];
	$Article_Feat = $_POST["feat"];
	$Article_Category = $_POST["category"];
	$Article_Trash = $_POST["trash"];
	$Article_Info = $_POST["content"];
	$ArticleTheme = $_POST["maintheme"];
	$Article_Active = $_POST["active"];
	$Article_Url = $_POST["url"];
	$Article_Date = strtotime("now");

	$REDIRECT = $_POST["redirect"];
	$Image_Order = $_POST["ImageOrder"];
	$Image_Url = $_POST["ImageUrl"];
	$Rand = rand(100,100000000);
	$TransferId = $_POST["transferid"];
	$Tags = $_POST["tags"];
	$StructureImgSizes = OtarDecrypt($key,$_POST['imgsizes']);
	$files = new UploadedFiles($_FILES);
	$Cw_QuickPost = $POST['qucikpost'];
	$GalleryRemoval = $_POST['removegal'];
    $GalRand = $_POST['galrand'];

	$Article_Content["name"] = $_POST["name"];
	$Article_Content["img"] = $_POST["img"];
	$Article_Content["external"] = $_POST["external"];
	$Article_Content["internal"] = $_POST["internal"];
	$Article_Content["revised"] = strtotime("now");
	$Article_Content["code"] = $_POST["code"];
	$Article_Content["codetype"] = $_POST["codetype"];
	$Article_Content["embedcode"] = $_POST["embedcode"];
	$Article_Content["releasedate"] = $_POST["releasedate"];
	$Article_Content["portfoliotype"] = $_POST["portfoliotype"];

	$SettingsAuto = $_POST["auto"];
	$SettingsAlbum = $_POST["album"];
	$SettingsBackground = $_POST["background"];
	$SettingsDashboard = $_POST["dashboard"];
	$SettingsSecure = $_POST["secure"];

	$Article_Other["gallery"] = $POST["gallery"];
	$Article_Other["setimg"] = $_POST["setimg"];
	$Article_Other["imgheight"] = $_POST["imgheight"];
	$Article_Other["imgwidth"] = $_POST["imgwidth"];
	$Article_Other["website"] = $_POST["website"];
	$Article_Other["comment"] = $_POST["comment"];
	$Article_Other["user"] = $_POST["user"];
	$Article_Other["ads"] = $_POST["ads"];
	$Article_Other["address"] = $_POST["address"];
	$Article_Other["typeid"] = $_POST["typeid"];
	$Article_Other["status"] = $_POST["status"];
	$Article_Other["phone"] = $_POST["phone"];
	$Article_Other["venu"] = $_POST["venu"];
	$Article_Other["email"] = $_POST["email"];
	$Article_Other["social"] = $_POST["social"];
	$Article_Other["model"] = $_POST["other"];
	$Article_Other["tags"] = $_POST["tags"];
	$Article_Other["structure"] = $_POST["structure"];
	$Article_Other["client"] = $_POST["client"];

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
			$PostImages = serialize($PostImages);
		}
	}
	$Array["mediafile"]["code"] = $Article_Content["code"];
	$Article_Content["code"] = CwMediaFile($Array,$files,$Rand);

////////////////////////////////// PULL 3RD-PARTY CONTENT INFORMATION \\\\\\\\\\\\\\\\\\\\\\\\\\\\
	if($Article_Content['codetype'] == "youtube"){
		 $YtCount = strlen($Article_Content['code']);
		 if($YtCount >= "12"){
			  $Article_Content["code"] = youtube_id_last_chance($Article_Content['code']);
			  if($Article_Content['code'] == ""){
				   $Article_Content["codetype"] = "";
			  }
		 }
	}
	if($Article_Content['img'] == ""){
		if($Article_Code == ""){
			$Article_Code = $Article_Content['code'];
		}
		if($Article_Content["codetype"] == "vimeo"){
			#$hash = unserialize(file_get_contents("http://vimeo.com/api/v2/video/$Article_Code.php"));
			#$Article_Content["img"] = $hash['0']['thumbnail_medium'];
			#$PostImages["0"] = $hash['0']['thumbnail_small'];
			#$PostImages["1"] = $hash['0']['thumbnail_medium'];
			#$PostImages["2"] = $hash['0']['thumbnail_large'];
		}
		if($Article_Content['codetype'] == "youtube"){
			$Article_Content["img"] = "http://img.youtube.com/vi/$Article_Code/0.jpg"; 
			$PostImages["0"] = "http://img.youtube.com/vi/$Article_Code/0.jpg";
			$PostImages["1"] = "http://img.youtube.com/vi/$Article_Code/1.jpg";
			$PostImages["2"] = "http://img.youtube.com/vi/$Article_Code/2.jpg";
			$PostImages["3"] = "http://img.youtube.com/vi/$Article_Code/3.jpg";
		}
	}

/////////////////////////////////// SETS DEFAULT VARIABLE VALUES \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
	if($Article_Category == ""){
		$Article_Category = "1";
	}
	if($Article_Url == ""){
		$Article_Url = $Article_Content["name"];
	}
	if($Article_Content['code'] == ""){
		$Article_Content["code"] = $Article_Content["embedcode"]; 
	}
	if($Article_Type == ""){
		$Article_Type = "post";
	}
	// REMOVES ALL AND ANY ILLEGAL CHARACTERS \\
	$Article_Url = CharacterRemoval($Article_Url);
	$Article_Content[name] = CommaRemoval($Article_Content['name']);
	if($Cw_Multiple_Cat['active'] == "1"){
		$Article_Category = serialize($Article_Category);
	}

//////////////////////////////////////// SOCIAL/3RD PARTY PLATFORMS INTEGRATION \\\\\\\\\\\\\\\\\\\\\\\
///////////////////////////////////////////////////////////////////////////////////////////////////////

	///////////////////// FINALIZE ALL ARRAYS FOR UPLOAD TO DATABASE \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
    $Article_Content = Cw_Filter_Array($Article_Content);
    $Article_Other = Cw_Filter_Array($Article_Other);
    $Article_Content = serialize($Article_Content); 
    $Article_Other = serialize($Article_Other);
	
	
	
	
	if($Article_Id == ""){
	    $Manual_Message = "Cresated Post";
	    $PostImages = serialize($PostImages);
		mysqli_query($CwDb,"INSERT INTO articles(url, active, category, type, other, rand, date, feat, content, info, img, webid) 
		VALUES('$Article_Url', '$Article_Active',  '$Article_Category', '$Article_Type', '$Article_Other', '$GalRand','$Article_Date', '$Article_Feat', '$Article_Content', '$Article_Info ', '$PostImages', '$WebId') ")or die(mysqli_error());
// PROCESS GALLERY IMAGE UPLOADS \\
		$query = "SELECT * FROM articles WHERE trash='0' AND rand='$Rand' AND webid='$WebId'";
		$result = mysqli_query($CwDb,$query) or die(mysqli_error());
		$row = mysqli_fetch_assoc($result);
		$Album = $row['id'];
		$result = mysqli_query($CwDb,"UPDATE images SET album='$Album' WHERE album='$GalRand' AND webid='$WebId'") or die(mysqli_error());
		$result = mysqli_query($CwDb,"UPDATE articles SET rand='' WHERE id='$Album' AND webid='$WebId'") or die(mysqli_error());

// UPDATE ALL TRANSFERRED ARTICLE INFORMATION \\
		$result = mysqli_query(mysqk,"UPDATE transfer SET trash='1' WHERE id='$TransferId' AND webid='$WebId'");
		$result = mysqli_query($CwDb,"UPDATE transfer SET trash='1' WHERE url='$Article_Url' AND webid='$WebId'") ;

// ADD ARTICLE TO SEARCH DATABASE \\
		mysqli_query($CwDb,"INSERT INTO cw_search(parent, title, other, active, webid) VALUES('$Album', '$Search_Name', '$Search_Other', '$Article_Active', '$WebId') ")or die(mysqli_error());


	}else{
	    $query = "SELECT * FROM articles WHERE id='$Article_Id'";
    	$result = mysqli_query($CwDb,$query);
    	$Article = mysqli_fetch_assoc($result);
    	$Article = CwOrganize($Article,$Array);
        $Article = Cw_Filter_Array($Article);
	    
	    
	    
// UPDATE INFORMATION ON SEARCH DATABASE \\
		$Query = "SELECT * FROM cw_search WHERE parent='$Search_Parent' AND webid='$WebId'";
		$Result = mysqli_query($CwDb,$Query) or die(mysqli_error());
		$Row = mysqli_fetch_assoc($Result);
		if($Row['id'] == ""){
			mysqli_query($CwDb,"INSERT INTO cw_search(parent, title, other, active, webid) VALUES('$Search_Parent', '$Search_Name', '$Search_Other', '$Article_Active', '$WebId') ")or die(mysqli_error());
		}else{
			$result = mysqli_query($CwDb,"UPDATE cw_search SET title='$Search_Name' WHERE parent='$Search_Parent' AND webid='$WebId'") or die(mysqli_error());
			$result = mysqli_query($CwDb,"UPDATE cw_search SET other='$Search_Other' WHERE parent='$Search_Parent' AND webid='$WebId'") or die(mysqli_error());
			$result = mysqli_query($CwDb,"UPDATE cw_search SET active='$Article_Active' WHERE parent='$Search_Parent' AND webid='$WebId'") or die(mysqli_error());
		}
		
// UN-LINK OLD TAGS FROM ARTICLE \\
		$UnlinkTag =  explode(",", $Tags);
		$query = "SELECT * FROM articles WHERE id='$Article_Id' AND webid='$WebId'";
		$result = mysqli_query($CwDb,$query) or die(mysqli_error());
		$row = mysqli_fetch_assoc($result);
		$row = PbUnSerial($row);
		$SRTags = $row["other"]["tags"];
		if($SRTags == ""){
		}else{
			$SRTags = explode(",", $SRTags);
			$TagRemove = array_delete($UnlinkTag, $SRTags);
			$Count = "0";
			foreach($TagRemove as $value){
				$Query = "SELECT * FROM cw_tags WHERE name='$value' AND webid='$WebId'";
				$Result = mysqli_query($CwDb,$Query) or die(mysqli_error());
				$Row = mysqli_fetch_assoc($Result);
				$ListTagId = $Row['id'];
				$ListTag = OtarDecrypt($key,$Row['content']);
				$Tag_key = array_search($Article_Id, $ListTag);
				unset($ListTag[$Tag_key]);
				$NewTagArray = OtarEncrypt($key,$ListTag);
				$result = mysqli_query($CwDb,"UPDATE cw_tags SET content='$NewTagArray' WHERE id='$ListTagId' AND webid='$WebId'")or die(mysqli_error());
		   }
		}
// PROCESS GALLERY IMAGE UPLOADS \\

		if($Image_Order == ""){ 
		}else{
			foreach($Image_Order as $ImageO){
				$ImageId = key($Image_Order);
				$result = mysqli_query($CwDb,"UPDATE images SET list='$ImageO' WHERE id='$ImageId' AND webid='$WebId'") or die(mysqli_error());
				next($Image_Order);
			}
		}
		if($Image_Url == ""){ 
		}else{
			foreach($Image_Url as $ImageU){
				$ImageUId = key($Image_Url);
				$result = mysqli_query($CwDb,"UPDATE images SET url='$ImageU' WHERE id='$ImageUId' AND webid='$WebId'") or die(mysqli_error());
				next($Image_Url);
			}
		}
// UPDATE THE DATABASE WITH ANY NEW/OLD INFORMATION \\
		$result = mysqli_query($CwDb,"UPDATE articles SET url='$Article_Url' WHERE id='$Article_Id' AND webid='$WebId'") or die(mysqli_error());
		$result = mysqli_query($CwDb,"UPDATE articles SET active='$Article_Active' WHERE id='$Article_Id' AND webid='$WebId'") or die(mysqli_error()); 
		$result = mysqli_query($CwDb,"UPDATE articles SET info='$Article_Info' WHERE id='$Article_Id' AND webid='$WebId'") or die(mysqli_error()); 
		$result = mysqli_query($CwDb,"UPDATE articles SET category='$Article_Category' WHERE id='$Article_Id' AND webid='$WebId'") or die(mysqli_error()); 
		$result = mysqli_query($CwDb,"UPDATE articles SET other='$Article_Other' WHERE id='$Article_Id' AND webid='$WebId'") or die(mysqli_error());
		$result = mysqli_query($CwDb,"UPDATE articles SET feat='$Article_Feat' WHERE id='$Article_Id' AND webid='$WebId'") or die(mysqli_error());
		$result = mysqli_query($CwDb,"UPDATE articles SET content='$Article_Content' WHERE id='$Article_Id' AND webid='$WebId'") or die(mysqli_error());
		if(is_array($PostImages)){
		    $PostImages = serialize($PostImages);
			$result = mysqli_query($CwDb,"UPDATE articles SET img='$PostImages' WHERE id='$Article_Id' AND webid='$WebId'") or die(mysqli_error());
		}
		if(is_array($GalleryRemoval)){
			foreach($GalleryRemoval as $value){
				$result = mysqli_query($CwDb,"UPDATE images SET trash='1' WHERE id='$value' AND webid='$WebId'")or die(mysqli_error());
			}
		}
	}
// TRACKS CHANGES MADE FROM USERS \\
    $Info = array();
    $Info["webid"] = $WebId;
    $Info["user"] = $Current_Admin_Id;
    $Info["error"] = $error;
    $Info["tracker"] = $Load_Sess;
    $Info["manual_message"] = $Manual_Message;
    $Info["id"] = $Article_Id;
    $Info["type"] = "articles";
    Cw_Changes($Info, $Article, $Array);
/////////////////////////////////////////

	header("Location: http://$Website_Url_Auth/admin/Offline");
}