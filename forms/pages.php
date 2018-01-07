<?php
include("forms/logincheck.php");
if($Login == "1"){

	// PULLS ALL INFORMATION FROM THE POST REQUEST FOR THE ARTICLE \\


	$Article_Type = $_POST["imgtype"];
	$Article_Search = $_POST["search"];
	$Article_Feat = $_POST["feat"];
	$Article_Category = $_POST["category"];
	$Article_Trash = $_POST["trash"];
	$Article_Id = $_POST["article"];
	$Article_Name = $_POST["name"];
	$ArticleTheme = $_POST["maintheme"];
	$Article_Active = $_POST["active"];
	$Article_Url = $_POST["url"];
	$Article_Date = strtotime("now");	
	$Article_Info = $_POST["content"];
	
	$Image_Order = $_POST["ImageOrder"];
	$Rand = rand(100,100000000);
	$TransferId = $_POST["transferid"];
	$Tags = $_POST["tags"];
	$StructureType =  $_POST['structure'];
    $Date_Created = strtotime($_POST['date_created']);
	$GalleryRemoval = $_POST['removegal'];
    $GalRand = $_POST['galrand'];

	$Article_Content["name"] = $_POST["name"];
	$Article_Content["img"] = $_POST["img"];
	$Article_Content["revised"] = strtotime("now");
	$Article_Content["code"] = $_POST["code"];
	$Article_Content["codetype"] = $_POST["codetype"];
	$Article_Content["embedcode"] = $_POST["embedcode"];

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
    $Article_Other["secure"] = $_POST["secure"];

	$SettingsAuto = $_POST["auto"];
	$SettingsAlbum = $_POST["album"];
	$SettingsBackground = $_POST["background"];
	$SettingsDashboard = $_POST["dashboard"];
	$SettingsSecure = $_POST["secure"];
    $Settings_Type = $_POST["type"];

	$PageIds = $_POST["PageIds"];
	$PageIds = OtarDecrypt($key, $PageIds);
	$StructureId = $PageIds["structure"];
	$SettingsId = $PageIds["settings"];
	$TemplateId = $PageIds["template"];
	$FunctionId = $PageIds["funct"];
	$PageInfo = $_POST["pageinfo"];
	$PageInfo = OtarDecrypt($key, $PageInfo);
	$StructureArticle = $Pageinfo['pagestructure']['article'];
	$StructureImgSizes = OtarDecrypt($key,$_POST['imgsizes']);
	$FunctionRand = $_POST['functionid'];
	$files = new UploadedFiles($_FILES);


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
			$hash = unserialize(file_get_contents("http://vimeo.com/api/v2/video/$Article_Code.php"));
			$Article_Content["img"] = $hash['0']['thumbnail_medium'];
			$PostImages["0"] = $hash['0']['thumbnail_small'];
			$PostImages["1"] = $hash['0']['thumbnail_medium'];
			$PostImages["2"] = $hash['0']['thumbnail_large'];
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
	if($Date_Created == ""){
		$Date_Created = strtotime("now");
	}
	if($Article_Date == ""){
		$Article_Date = strtotime("now");
	}
	if($Article_Type == ""){
		$Article_Category = "post";
	}

//////////////////////////////// REMOVES ALL AND ANY ILLEGAL CHARACTERS \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
	$Article_Url = CharacterRemoval($Article_Url);
	$Article_Content['name'] = CommaRemoval($Article_Content['name']);


/////////////////////////////////////// SOCIAL/3RD PARTY PLATFORMS INTEGRATION \\\\\\\\\\\\\\\\\\\\\\\\

///////////////////////////////////////////////////////////////////////////////////////////////////////



///////////////////// FINALIZE ALL ARRAYS FOR UPLOAD TO DATABASE \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
	$Article_Content = Cw_Filter_Array($Article_Content);
    $Article_Other = Cw_Filter_Array($Article_Other);
    $Article_Content = serialize($Article_Content); 
    $Article_Other = serialize($Article_Other);


	if($Article_Id == ""){
	    $Manual_Message = "Created Page";
	    $PostImages = serialize($PostImages);
		mysql_query("INSERT INTO articles(name, url, active, category, type, other, rand, date, feat, content, info, img, date_created,webid) 
		VALUES('$Article_Name', '$Article_Url', '$Article_Active',  '$Article_Category', 'page',  '$Article_Other', '$GalRand','$Article_Date', '$Article_Feat', '$Article_Content', '$Article_Info ', '$PostImages', '$Date_Created', '$WebId') ")or die(mysql_error());
// PROCESS GALLERY IMAGE UPLOADS \\
		$query = "SELECT * FROM articles WHERE trash='0' AND rand='$GalRand' AND webid='$WebId' AND type='page'";
		$result = mysql_query($query) or die(mysql_error());
		$row = mysql_fetch_array($result);
		$Album = $row['id'];
		$Article_Id = $row['id'];
		$result = mysql_query("UPDATE images SET album='$Album' WHERE album='$GalRand' AND webid='$WebId'") 
        or die(mysql_error());
		$result = mysql_query("UPDATE articles SET rand='' WHERE id='$Album' AND webid='$WebId'") 
		or die(mysql_error());
		
		
		
	}else{
	    
	    $query = "SELECT * FROM page_template WHERE id='$TemplateId'";
    	$result = mysql_query($query) or die(mysql_error());
    	$Article = mysql_fetch_array($result);
    	$Article = CwOrganize($Article,$Array);
        $Article = Cw_Filter_Array($Article);
	    
// UN-LINK OLD TAGS FROM ARTICLE \\
		$UnlinkTag =  explode(",", $Tags);
		$query = "SELECT * FROM articles WHERE id='$Article_Id' AND webid='$WebId'";
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
				$Query = "SELECT * FROM cw_tags WHERE name='$value' AND webid='$WebId'";
				$Result = mysql_query($Query) or die(mysql_error());
				$Row = mysql_fetch_array($Result);
				$ListTagId = $Row["id"];
				$ListTag = OtarDecrypt($key,$Row['content']);
				$key = array_search(f, $ListTag);
				unset($ListTag[$key]);
				$NewTagArray = OtarEncrypt($key,$ListTag);
				$result = mysql_query("UPDATE cw_tags SET content='$NewTagArray' WHERE id='$ListTagId' AND webid='$WebId'")
				or die(mysql_error());
		   }
		}
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
// UPDATE THE DATABASE WITH ANY NEW/OLD INFORMATION \\
		$result = mysql_query("UPDATE articles SET url='$Article_Url' WHERE id='$Article_Id' AND webid='$WebId'") 
		or die(mysql_error()); 
		$result = mysql_query("UPDATE articles SET active='$Article_Active' WHERE id='$Article_Id' AND webid='$WebId'") 
		or die(mysql_error()); 
		$result = mysql_query("UPDATE articles SET info='$Article_Info' WHERE id='$Article_Id' AND webid='$WebId'") 
		or die(mysql_error()); 
		$result = mysql_query("UPDATE articles SET category='$Article_Category' WHERE id='$Article_Id' AND webid='$WebId'") 
		or die(mysql_error()); 
		$result = mysql_query("UPDATE articles SET other='$Article_Other' WHERE id='$Article_Id' AND webid='$WebId'") 
		or die(mysql_error());
		$result = mysql_query("UPDATE articles SET date_created='$Date_Created' WHERE id='$Article_Id' AND webid='$WebId'") 
		or die(mysql_error());
		$result = mysql_query("UPDATE articles SET feat='$Article_Feat' WHERE id='$Article_Id' AND webid='$WebId'") 
		or die(mysql_error());
		$result = mysql_query("UPDATE articles SET content='$Article_Content' WHERE id='$Article_Id' AND webid='$WebId'") 
		or die(mysql_error());
		$result = mysql_query("UPDATE articles SET name='$Article_Name' WHERE id='$Article_Id' AND webid='$WebId'") 
		or die(mysql_error());
        if(is_array($PostImages)){
            $PostImages = serialize($PostImages);
		    $result = mysql_query("UPDATE articles SET img='$PostImages' WHERE id='$Article_Id' AND webid='$WebId'") 
		    or die(mysql_error());
        }
	}


	if($TemplateId == ""){
	    $Query = "SELECT * FROM page_template WHERE article='$Article_Id' AND webid='$WebId'";
        $Result = mysql_query($Query) or die(mysql_error());
        $Row = mysql_fetch_array($Result);
        if($Row["id"] == ""){
		    mysql_query("INSERT INTO page_template (name, template, url, urlid, urltype, end, active, article, webid) VALUES('$Article_Name', '$ArticleTheme', '$Article_Url', '$Article_UrlId', '$Article_UrlType', '$Article_End', '$Article_Active', '$Article_Id', '$WebId') ") or die(mysql_error());
        }
        $Query = "SELECT * FROM page_template WHERE article='$Article_Id' AND webid='$WebId'";
        $Result = mysql_query($Query) or die(mysql_error());
        $Row = mysql_fetch_array($Result);
        $TemplateId = $Row["id"];
	}else{
//UPDATES THE PAGE_TEMPLATE TABLE
		$result = mysql_query("UPDATE page_template SET template='$ArticleTheme' WHERE id='$TemplateId' AND webid='$WebId'")
		or die(mysql_error());
		$result = mysql_query("UPDATE page_template SET name='$Article_Name' WHERE id='$TemplateId' AND webid='$WebId'")
		or die(mysql_error());
		$result = mysql_query("UPDATE page_template SET url='$Article_Url' WHERE id='$TemplateId' AND webid='$WebId'")
		or die(mysql_error());
		$result = mysql_query("UPDATE page_template SET urlid='$Article_UrlId' WHERE id='$TemplateId' AND webid='$WebId'")
		or die(mysql_error());
		$result = mysql_query("UPDATE page_template SET urltype='$Article_UrlType' WHERE id='$TemplateId' AND webid='$WebId'")
		or die(mysql_error());
		$result = mysql_query("UPDATE page_template SET end='$Article_End' WHERE id='$TemplateId' AND webid='$WebId'")
		or die(mysql_error());
		$result = mysql_query("UPDATE page_template SET active='$Article_Active' WHERE id='$TemplateId' AND webid='$WebId'")
		or die(mysql_error());
		$result = mysql_query("UPDATE page_template SET article='$Article_Id' WHERE id='$TemplateId' AND webid='$WebId'")
		or die(mysql_error());
	}  


			   
//UPDATES THE PAGE_SETTINGS TABLE
	if($SettingsId == ""){
	    $Query = "SELECT * FROM page_settings WHERE tempid='$TemplateId' AND article='$Article_Id' AND type='page'AND webid='$WebId' ";
        $Result = mysql_query($Query) or die(mysql_error());
        $Row = mysql_fetch_array($Result);
        if($Row["id"] == ""){
		    mysql_query("INSERT INTO page_settings (secure, autoplay, background, active, tempid, webid, article, template, type, structure, img) 
		    VALUES('$SettingsSecure', '$SettingsAuto', '$SettingsBackground', '$Article_Active', '$TemplateId', '$WebId', '$Article_Id', '$ArticleTheme', 'page', '$StructureType', '$Article_Img') ") or die(mysql_error());
        }
	}else{
		$result = mysql_query("UPDATE page_settings SET autoplay='$SettingsAuto' WHERE id='$SettingsId' AND webid='$WebId'")
		or die(mysql_error());
		$result = mysql_query("UPDATE page_settings SET background='$SettingsBackground' WHERE id='$SettingsId' AND webid='$WebId'")
		or die(mysql_error());
		$result = mysql_query("UPDATE page_settings SET secure='$SettingsSecure' WHERE id='$SettingsId' AND webid='$WebId'")
		or die(mysql_error());
		$result = mysql_query("UPDATE page_settings SET structure='$StructureType' WHERE id='$SettingsId' AND webid='$WebId'")
		or die(mysql_error());
		$result = mysql_query("UPDATE page_settings SET img='$Article_Img' WHERE id='$SettingsId' AND webid='$WebId'")
		or die(mysql_error());
		$result = mysql_query("UPDATE page_settings SET article='$Article_Id' WHERE id='$SettingsId' AND webid='$WebId'")
		or die(mysql_error());
		
	}

	if(is_array($GalleryRemoval)){
		foreach($GalleryRemoval as $value){
			$result = mysql_query("UPDATE images SET trash='1' WHERE id='$value' AND webid='$WebId'")
			or die(mysql_error());
		}
	}

// TRACKS CHANGES MADE FROM USERS \\
    $Info = array();
    $Info["webid"] = $WebId;
    $Info["user"] = $Current_Admin_Id;
    $Info["error"] = $error;
    $Info["tracker"] = $Load_Sess;
    $Info["manual_message"] = $Manual_Message;
    $Info["id"] = $TemplateId;
    $Info["type"] = "page_template";
    Cw_Changes($Info, $Article, $Array);
/////////////////////////////////////////
	header("Location: http://$Website_Url_Auth/admin/Pages");

}
?>