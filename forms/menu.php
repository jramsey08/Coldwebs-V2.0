<?php
include("forms/logincheck.php");
if($Login == "1"){

// PULLS ALL INFORMATION FROM THE POST REQUEST FOR THE ARTICLE \\

	$Article_Type = $_POST["imgtype"];
	$Article_Search = $_POST["search"];
	$Article_Feat = $_POST["feat"];
	$Article_Category = $_POST["category"];
	$Article_Shortcode = $_POST["shortcode"];
	$Article_Trash = $_POST["trash"];
	$Image_Order = $_POST["ImageOrder"];
	$ArticleTheme = $_POST["maintheme"];
	$Article_Active = $_POST["active"];
	$Article_Url = $_POST["url"];
	$Article_List = $_POST["list"];
	$Article_Name = $_POST["name"];
	$Article_Date = strtotime("now");
	$Article_Id = $_POST["id"];
	
	$Article_Content["external"] = $_POST["external"];
	$Article_Content["img"] = $_POST["img"];
	$Article_Content["revised"] = strtotime("now");
	$Article_Content["code"] = $_POST["code"];
	$Article_Content["codetype"] = $_POST["codetype"];
	$Article_Content["embedcode"] = $_POST["embedcode"];

	$Article_Info = $_POST["content"];

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

	$PageIds = $_POST["PageIds"];
	$PageIds = OtarDecrypt($key, $PageIds);
	$StructureId = $PageIds["structure"];
	$SettingsId = $PageIds["settings"];
	$TemplateId = $PageIds["template"];
	$FunctionId = $PageIds["funct"];
	$DynamicId = $PageIds["dynamic"];
	$PageInfo = $_POST["pageinfo"];
	$PageInfo = OtarDecrypt($key, $PageInfo);
	$StructureArticle = $Pageinfo[pagestructure][article];
	$StructureImgSizes = OtarDecrypt($key,$_POST[imgsizes]);
	$files = new UploadedFiles($_FILES);
	$Rand = rand(100,100000000);
	$TransferId = $_POST["transferid"];
	$Tags = $_POST["tags"];
	$GalRand = $_POST['galrand'];

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
		$Article_Url = $Article_Name;
	}
	if($Article_Content['code'] == ""){
		$Article_Content["code"] = $Article_Content["embedcode"]; 
	}
	if($Article_Type == ""){
		$Article_Category = "post";
	}

	// REMOVES ALL AND ANY ILLEGAL CHARACTERS \\
	$Article_Url = CharacterRemoval($Article_Url);
	$Article_Name = CommaRemoval($Article_Name);


//////////////////////////////////////// SOCIAL/3RD PARTY PLATFORMS INTEGRATION \\\\\\\\\\\\\\\\\\\\\\\

///////////////////////////////////////////////////////////////////////////////////////////////////////



	///////////////////// FINALIZE ALL ARRAYS FOR UPLOAD TO DATABASE \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
    $Article_Content = Cw_Filter_Array($Article_Content);
    $Article_Other = Cw_Filter_Array($Article_Other);
    $Article_Content = serialize($Article_Content); 
	$Article_Other = serialize($Article_Other);


	if($Article_Id == ""){
	    $Manual_Message = "Cresated Message";
        $PostImages = serialize($PostImages);
		mysql_query("INSERT INTO articles(name, url, active, category, type, other, rand, date, feat, content, info, img, list, webid) 
		VALUES('$Article_Name', '$Article_Url', '$Article_Active',  '$Article_Category', '$Article_Type', '$Article_Other', '$GalRand','$Article_Date', '$Article_Feat', '$Article_Content', '$Article_Info', '$PostImages','$Article_List', '$WebId') ")or die(mysql_error());

// PROCESS GALLERY IMAGE UPLOADS \\
		$query = "SELECT * FROM articles WHERE trash='0' AND rand='$Rand' AND webid='$WebId'";
		$result = mysql_query($query) or die(mysql_error());
		$row = mysql_fetch_array($result);
		$Album = $row[id];
		$result = mysql_query("UPDATE images SET album='$Album' WHERE album='$GalRand' AND webid='$WebId'") 
        or die(mysql_error());
		$result = mysql_query("UPDATE articles SET rand='' WHERE id='$Album' AND webid='$WebId'") 
		or die(mysql_error());

// UPDATE ALL TRANSFERRED ARTICLE INFORMATION \\
		$result = mysql_query("UPDATE transfer SET trash='1' WHERE id='$TransferId' AND webid='$WebId'") 
		or die(mysql_error());
		$result = mysql_query("UPDATE transfer SET trash='1' WHERE url='$Article_Url' AND webid='$WebId'") 
		or die(mysql_error());



	}else{

        $query = "SELECT * FROM articles WHERE id='$Article_Id'";
    	$result = mysql_query($query) or die(mysql_error());
    	$Article = mysql_fetch_array($result);
    	$Article = CwOrganize($Article,$Array);
        $Article = Cw_Filter_Array($Article);

// UN-LINK OLD TAGS FROM ARTICLE \\
		$UnlinkTag =  explode(",", $Tags);
		$query = "SELECT * FROM articles WHERE id='$Article_Id' AND webid='$WebId'";
		$result = mysql_query($query) or die(mysql_error());
		$row = mysql_fetch_array($result);
		$row = CwOrganize($row,$Array);
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
				$ListTag = unserialize($Row["content"]);
				$Tag_key = array_search($Article_Id, $ListTag);
				unset($ListTag[$Tag_key]);
				$NewTagArray = serialize($ListTag);
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
		$result = mysql_query("UPDATE articles SET feat='$Article_Feat' WHERE id='$Article_Id' AND webid='$WebId'") 
		or die(mysql_error());
		$result = mysql_query("UPDATE articles SET shortcode='$Article_Shortcode' WHERE id='$Article_Id' AND webid='$WebId'") 
		or die(mysql_error());
		$result = mysql_query("UPDATE articles SET content='$Article_Content' WHERE id='$Article_Id' AND webid='$WebId'") 
		or die(mysql_error());
		$result = mysql_query("UPDATE articles SET list='$Article_List' WHERE id='$Article_Id' AND webid='$WebId'") 
		or die(mysql_error());
		$result = mysql_query("UPDATE articles SET name='$Article_Name' WHERE id='$Article_Id' AND webid='$WebId'") 
		or die(mysql_error());
        if(is_array($PostImages)){
            $PostImages = serialize($PostImages);
		    $result = mysql_query("UPDATE articles SET img='$PostImages' WHERE id='$Article_Id' AND webid='$WebId'") 
		    or die(mysql_error());
        }


	}



// CONNECT INFORMATION TO TAGS SEARCH DATABASE \\
	$TagArticle = $Article_Id;
	$Tags =  explode(",", $Tags);
	foreach($Tags as $value){
		$query = "SELECT * FROM cw_tags WHERE name='$value' AND webid='$WebId'"; 
		$result = mysql_query($query) or die(mysql_error());
		$row = mysql_fetch_array($result);
		$TagSearchId = $row["id"];
		if($TagSearchId == ""){
			$TagId = array("$TagArticle");
			$TagId = serialize($TagId);
			if($value == ""){
			}else{
				mysql_query("INSERT INTO cw_tags
				(name, content, webid) VALUES('$value', '$TagId', '$WebId') ")or die(mysql_error());
			}
		}else{
			$TagId = $row["content"];
			$TagId = unserialize($TagId);
			if(is_array($TagId)){
    			if(!in_array($TagArticle, $TagId)){
    				array_push($TagId, $TagArticle);
    				$NewTagArray = serialize($TagId);
    				$result = mysql_query("UPDATE cw_tags SET content='$NewTagArray' WHERE id='$TagSearchId' AND webid='$WebId'")
    				or die(mysql_error());
    			}
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


	header("Location: http://$Website_Url_Auth/admin/Menu");

}
?>