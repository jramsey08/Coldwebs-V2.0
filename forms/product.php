<?php
include("forms/logincheck.php");
if($Login == "1"){

	// PULLS ALL INFORMATION FROM THE POST REQUEST FOR THE ARTICLE \\

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

	$Image_Order = $_POST["ImageOrder"];
	$Rand = rand(100,100000000);
	$TransferId = $_POST["transferid"];
	$Tags = $_POST["tags"];
	$StructureImgSizes = OtarDecrypt($key,$_POST['imgsizes']);
	$files = new UploadedFiles($_FILES);

	$Article_Content["name"] = $_POST["name"];
	$Article_Content["img"] = $_POST["img"];
	$Article_Content["revised"] = strtotime("now");
	$Article_Content["code"] = $_POST["code"];
	$Article_Content["codetype"] = $_POST["codetype"];
	$Article_Content["embedcode"] = $_POST["embedcode"];
	$Article_Content['color'] = $_POST['color'];
	$Article_Content['size'] = $_POST['size'];
	$Article_Content['gender'] = $_POST['gender'];
	$Article_Content['prodprice'] = $_POST['prodprice'];

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
		$PostImages = Cw_Img_Resize($Array,$ImgSrc,$StructureImgSizes,$ImgName);
		$PostImages = serialize($PostImages);
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
		$Article_Category = "post";
	}

// REMOVES ALL AND ANY ILLEGAL CHARACTERS \\
	$Article_Url = CharacterRemoval($Article_Url);
	$Article_Content[name] = CommaRemoval($Article_Content['name']);


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
		$Album = $row[id];
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



	}else{



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
				$ListTagId = $Row["id"];
				$ListTag = OtarDecrypt($key,$Row[content]);
				$Tag_key = array_search($Article_Id, $ListTag);
				unset($ListTag[$Tag_key]);
				$NewTagArray = OtarEncrypt($key,$ListTag);
				$result = mysql_query("UPDATE cw_tags SET content='$NewTagArray' WHERE id='$ListTagId'")
				or die(mysql_error());
		   }
		}

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
			$result = mysql_query("UPDATE articles SET img='$PostImages' WHERE id='$Article_Id'") 
			or die(mysql_error());
		}


	}




// CONNECT INFORMATION TO TAGS SEARCH DATABASE \\
	$TagArticle = $Article_Id;
	$Tags =  explode(",", $Tags);
	foreach($Tags as $value){
		$query = "SELECT * FROM cw_tags WHERE name='$value'"; 
		$result = mysql_query($query) or die(mysql_error());
		$row = mysql_fetch_array($result);
		$TagSearchId = $row["id"];
		if($TagSearchId == ""){
			$TagId = array("$TagArticle");
			$TagId = OtarEncrypt($key,$TagId);
			if($value == ""){
			}else{
				mysql_query("INSERT INTO cw_tags
				(name, content) VALUES('$value', '$TagId') ")or die(mysql_error());
			}
		}else{
			$TagId = $row["content"];
			$TagId = OtarDecrypt($key,$TagId);
			if(in_array($TagArticle, $TagId)){
			}else{
				array_push($TagId, $TagArticle);
				$NewTagArray = OtarEncrypt($key,$TagId);
				$result = mysql_query("UPDATE cw_tags SET content='$NewTagArray' WHERE id='$TagSearchId'")
				or die(mysql_error());
			}
		}
	}


//UPDATES THE PAGE_SETTINGS TABLE
	if($SettingsId == ""){
	#    mysql_query("INSERT INTO page_settings (url, urlid, urltype, end, secure, autoplay, background, dashboard, active) VALUES('$Article_Url', '$Article_UrlId', '$Article_UrlType', '$Article_End', '$SettingsSecure', '$SettingsAuto', #'$SettingsBackground', '$SettingsDashboard', '$Article_Active') ") or die(mysql_error());    
	}else{
		#$result = mysql_query("UPDATE page_settings SET url='$Article_Url' WHERE id='$SettingsId'")
		#or die(mysql_error());
		#$result = mysql_query("UPDATE page_settings SET autoplay='$SettingsAuto' WHERE id='$SettingsId'")
		#or die(mysql_error());
		#$result = mysql_query("UPDATE page_settings SET album='$SettingsAlbum' WHERE id='$SettingsId'")
		#or die(mysql_error());
		#$result = mysql_query("UPDATE page_settings SET background='$SettingsBackground' WHERE id='$SettingsId'")
		#or die(mysql_error());
		#$result = mysql_query("UPDATE page_settings SET end='$Article_End' WHERE id='$SettingsId'")
		#or die(mysql_error());
		#$result = mysql_query("UPDATE page_settings SET urlid='$Article_Urlid' WHERE id='$SettingsId'")
		#or die(mysql_error());
		#$result = mysql_query("UPDATE page_settings SET urltype='$Article_UrlType' WHERE id='$SettingsId'")
		#or die(mysql_error());
		#$result = mysql_query("UPDATE page_settings SET secure='$SettingsSecure' WHERE id='$SettingsId'")
		#or die(mysql_error());
		#$result = mysql_query("UPDATE page_settings SET dashboard='$SettingsDashboard' WHERE id='$SettingsId'")
		#or die(mysql_error());
		#$result = mysql_query("UPDATE page_settings SET active='$Article_Active' WHERE id='$SettingsId'")
		#or die(mysql_error());
	}



	$REDIRECT = "admin/Products";
	$Domain = $Array["siteinfo"]["domain"];
	header("Location: $Domain/$REDIRECT");

}
?>