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
<<<<<<< HEAD
	$Tags = $_POST["tags"];
=======
	#$Tags = $_POST["tags"];
>>>>>>> origin/master
	$StructureImgSizes = OtarDecrypt($key,$_POST['imgsizes']);
	$files = new UploadedFiles($_FILES);
	$Cw_QuickPost = $POST['qucikpost'];
	$GalleryRemoval = $_POST['removegal'];

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
<<<<<<< HEAD
	$Article_Other["tags"] = $_POST["tags"];
=======
	#$Article_Other["tags"] = $_POST["tags"];
>>>>>>> origin/master
	$Article_Other["structure"] = $_POST["structure"];
	$Article_Other["client"] = $_POST["client"];

	$Search_Name = $Article_Content["name"];
	$Search_Parent = $_POST["id"];
	$Search_Other = "";

<<<<<<< HEAD

=======
$Article_Id = "3";
>>>>>>> origin/master

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
	if($Article_Date == ""){
		$Article_Date = strtotime("now");
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
	$Article_Content = serialize($Article_Content); 
	$Article_Other = serialize($Article_Other);



	if($Article_Id == ""){



		mysql_query("INSERT INTO articles(url, active, category, type, other, rand, date, feat, content, info,img) VALUES('$Article_Url', '$Article_Active',  '$Article_Category', '$Article_Type', '$Article_Other', '$Rand','$Article_Date', '$Article_Feat', '$Article_Content', '$Article_Info ', '$PostImages') ")or die(mysql_error());

// PROCESS GALLERY IMAGE UPLOADS \\
		$query = "SELECT * FROM articles WHERE trash='0' AND rand='$Rand'";
		$result = mysql_query($query) or die(mysql_error());
		$row = mysql_fetch_array($result);
		$Album = $row['id'];
		$Array["galleryupload"]["id"] = $row["id"];
		$Upload = $files["gallery"];
		CwGallery($Array,$files);
		$result = mysql_query("UPDATE articles SET rand='' WHERE id='$Album'") 
		or die(mysql_error());

// UPDATE ALL TRANSFERRED ARTICLE INFORMATION \\
		$result = mysql_query("UPDATE transfer SET trash='1' WHERE id='$TransferId'") 
		or die(mysql_error());
		$result = mysql_query("UPDATE transfer SET trash='1' WHERE url='$Article_Url'") 
		or die(mysql_error());

// ADD ARTICLE TO SEARCH DATABASE \\
		mysql_query("INSERT INTO cw_search(parent, title, other, active) VALUES('$Album', '$Search_Name', '$Search_Other', '$Article_Active') ")or die(mysql_error());



	}else{



// UPDATE INFORMATION ON SEARCH DATABASE \\
		$Query = "SELECT * FROM cw_search WHERE parent='$Search_Parent'";
		$Result = mysql_query($Query) or die(mysql_error());
		$Row = mysql_fetch_array($Result);
		if($Row['id'] == ""){
			mysql_query("INSERT INTO cw_search(parent, title, other, active) VALUES('$Search_Parent', '$Search_Name', '$Search_Other', '$Article_Active') ")or die(mysql_error());
		}else{
			$result = mysql_query("UPDATE cw_search SET title='$Search_Name' WHERE parent='$Search_Parent'") 
			or die(mysql_error());
			$result = mysql_query("UPDATE cw_search SET other='$Search_Other' WHERE parent='$Search_Parent'") 
			or die(mysql_error());
			$result = mysql_query("UPDATE cw_search SET active='$Article_Active' WHERE parent='$Search_Parent'") 
			or die(mysql_error());
		}


<<<<<<< HEAD
// UN-LINK OLD TAGS FROM ARTICLE \\
		$UnlinkTag =  explode(",", $Tags);
		$query = "SELECT * FROM articles WHERE id='$Article_Id'";
		$result = mysql_query($query) or die(mysql_error());
		$row = mysql_fetch_array($result);
		$row = PbUnSerial($row);
		$SRTags = $row["other"]["tags"];
		if($SRTags == ""){
		}else{
			$SRTags = explode(",", $SRTags);
			$TagRemove = array_delete($UnlinkTag, $SRTags);
			$Count = "0";
			foreach($TagRemove as $value){
				$Query = "SELECT * FROM cw_tags WHERE name='$value'";
				$Result = mysql_query($Query) or die(mysql_error());
				$Row = mysql_fetch_array($Result);
				$ListTagId = $Row['id'];
				$ListTag = OtarDecrypt($key,$Row['content']);
				$Tag_key = array_search($Article_Id, $ListTag);
				unset($ListTag[$Tag_key]);
				$NewTagArray = OtarEncrypt($key,$ListTag);
				$result = mysql_query("UPDATE cw_tags SET content='$NewTagArray' WHERE id='$ListTagId'")
				or die(mysql_error());
		   }
		}
=======
>>>>>>> origin/master

// PROCESS GALLERY IMAGE UPLOADS \\
		$Array["galleryupload"]["id"] = $Article_Id;
		CwGallery($Array,$files);
		if($Image_Order == ""){ 
		}else{
			foreach($Image_Order as $ImageO){
				$ImageId = key($Image_Order);
				$result = mysql_query("UPDATE images SET list='$ImageO' WHERE id='$ImageId'") 
				or die(mysql_error());
				next($Image_Order);
			}
		}
		if($Image_Url == ""){ 
		}else{
			foreach($Image_Url as $ImageU){
				$ImageUId = key($Image_Url);
				$result = mysql_query("UPDATE images SET url='$ImageU' WHERE id='$ImageUId'") 
				or die(mysql_error());
				next($Image_Url);
			}
		}

// UPDATE THE DATABASE WITH ANY NEW/OLD INFORMATION \\
		$result = mysql_query("UPDATE articles SET url='$Article_Url' WHERE id='$Article_Id'") 
		or die(mysql_error());
		$result = mysql_query("UPDATE articles SET active='$Article_Active' WHERE id='$Article_Id'") 
		or die(mysql_error()); 
		$result = mysql_query("UPDATE articles SET info='$Article_Info' WHERE id='$Article_Id'") 
		or die(mysql_error()); 
		$result = mysql_query("UPDATE articles SET category='$Article_Category' WHERE id='$Article_Id'") 
		or die(mysql_error()); 
		$result = mysql_query("UPDATE articles SET other='$Article_Other' WHERE id='$Article_Id'") 
		or die(mysql_error());
		$result = mysql_query("UPDATE articles SET feat='$Article_Feat' WHERE id='$Article_Id'") 
		or die(mysql_error());
		$result = mysql_query("UPDATE articles SET content='$Article_Content' WHERE id='$Article_Id'") 
		or die(mysql_error());
		if($PostImages == ""){ }else{
<<<<<<< HEAD
			$result = mysql_query("UPDATE articles SET img='$PostImages' WHERE id='$Article_Id'") 
			or die(mysql_error());
=======
			#$result = mysql_query("UPDATE articles SET img='$PostImages' WHERE id='$Article_Id'") 
			#or die(mysql_error());
>>>>>>> origin/master
		}

		if(is_array($GalleryRemoval)){
			foreach($GalleryRemoval as $value){
				$result = mysql_query("UPDATE images SET trash='1' WHERE id='$value'")
				or die(mysql_error());
			}
		}


<<<<<<< HEAD

=======
>>>>>>> origin/master
	}



<<<<<<< HEAD



=======
>>>>>>> origin/master
	$Domain = $Array["siteinfo"]["domain"];
	header("Location: $Domain/admin/Offline");
}