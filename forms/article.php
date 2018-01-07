<?php
// PULLS ALL INFORMATION FROM THE POST REQUEST FOR THE ARTICLE \\

include("forms/logincheck.php");
if($Login == "1"){
    #if() == "1"){

    	$Article_Id = $_POST["id"];
    	$Article_Type = $_POST["imgtype"];
    	$Article_Search = $_POST["search"];
    	$Article_Feat = $_POST["feat"];
    	$Article_Name = $_POST["name"];
    	$Article_Category = $_POST["category"];
    	$Article_Trash = $_POST["trash"];
    	$Article_Info = $_POST["content"];
    	$ArticleTheme = $_POST["maintheme"];
    	$Article_Active = $_POST["active"];
    	$Article_Url = $_POST["url"];
    	$Article_Date = strtotime("$_POST[date]");
        $RandValue = $_POST['randvalue'];
        $Date_Created = strtotime($_POST['date_created']);

    	$REDIRECT = $_POST["redirect"];
    	$Image_Order = $_POST["ImageOrder"];
    	$Track_Name = $_POST["TrackName"];
        $Image_Active = $_POST["Imageactive"];
    	$Image_Url = $_POST["ImageUrl"];
    	$Audio_Active = $_POST["audioactive"];
    	$Cinema_Active = $_POST["cinemaactive"];
    	$Rand = rand(100,100000000);
    	$TransferId = $_POST["transferid"];
    	$Tags = $_POST["tags"];
    	$StructureImgSizes = OtarDecrypt($key,$_POST['imgsizes']);
    	$files = new UploadedFiles($_FILES);
    	$Cw_QuickPost = $POST['qucikpost'];
    	$GalleryRemoval = $_POST['removegal'];
    	$GalRand = $_POST['galrand'];
    
    	$Article_Content["img"] = $_POST["img"];
    	$Article_Content["external"] = $_POST["external"];
    	$Article_Content["internal"] = $_POST["internal"];
    	$Article_Content["revised"] = strtotime("now");
    	$Article_Content["code"] = $_POST["code"];
    	$Article_Content["codetype"] = $_POST["codetype"];
    	$Article_Content["embedcode"] = $_POST["embedcode"];
    	$Article_Content["releasedate"] = strtotime($_POST["releasedate"]);
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
    	$Article_Other["author"] = $_POST["author"];
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
    	$Article_Other["price"] = $_POST["price"];
    	$Article_Other["date"] = strtotime($_POST["date"]);
        $Article_Other["datetime"] = strtotime("$_POST[date] $_POST[datetime]");
        $Article_Other["artist"] = "%-" . $_POST["artist"] . "-%";

    	$Search_Name = $Article_Name;
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
    	if($Article_Type == "post-event"){
    	    $Date_Created = $Article_Other["date"];
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
        $query = "SELECT * FROM articles WHERE trash='0' AND id='$Article_Category' AND webid='$WebId'";
    	$result = mysql_query($query) or die(mysql_error());
    	$row = mysql_fetch_array($result);
            $ShortCode = $row['shortcode'];
    
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
    	if($Article_Date == ""){
    		$Article_Date = strtotime("now");
    	}
    	if($Date_Created == ""){
    		$Date_Created = strtotime("now");
    	}
    	if($Article_Type == ""){
    		$Article_Type = "post";
    	}
            if($Article_Id != ""){
                $RandValue = $Article_Id;
            }
    
    	// REMOVES ALL AND ANY ILLEGAL CHARACTERS \\
    	$Article_Url = CharacterRemoval($Article_Url);
    	$Article_Name = CommaRemoval($Article_Name);
    
    	if($Cw_Multiple_Cat['active'] == "1"){
    	    if(is_array($Article_Category)){
    		    $Article_Category = serialize($Article_Category);
    	    }else{
    	        $Article_Category = array($Article_Category);
    	    }
    	}else{
    	    if(is_array($Article_Category)){
    	        $Article_Category = $Article_Category["0"];
    	    }
    	}
    
    //////////////////////////////////////// SOCIAL/3RD PARTY PLATFORMS INTEGRATION \\\\\\\\\\\\\\\\\\\\\\\
    
    ///////////////////////////////////////////////////////////////////////////////////////////////////////
    
    
    /////////////////////////// FINALIZE ALL ARRAYS FOR UPLOAD TO DATABASE \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
        $Article_Content = Cw_Filter_Array($Article_Content);
        $Article_Other = Cw_Filter_Array($Article_Other);
    	$Article_Content = serialize($Article_Content); 
    	$Article_Other = serialize($Article_Other);
    
    
    	if($Article_Id == ""){
    	    $Manual_Message = "Created Post";
            $PostImages = serialize($PostImages);
    		mysql_query("INSERT INTO articles(name, url, active, category, type, other, rand, date, feat, content, info, img, date_created, shortcode, webid) 
    		VALUES('$Article_Name', '$Article_Url', '$Article_Active',  '$Article_Category', '$Article_Type', '$Article_Other', '$GalRand','$Article_Date', '$Article_Feat', '$Article_Content', '$Article_Info ', '$PostImages', '$Date_Created', '$ShortCode', '$WebId') ")or die(mysql_error());
    
    // PROCESS GALLERY IMAGE UPLOADS \\
    		$query = "SELECT * FROM articles WHERE trash='0' AND rand='$GalRand' AND webid='$WebId'";
    		$result = mysql_query($query) or die(mysql_error());
    		$row = mysql_fetch_array($result);
    		$row = CwOrganize($row,$Array);
    		$Album = $row['id'];
    		$result = mysql_query("UPDATE images SET album='$Album' WHERE album='$GalRand' AND webid='$WebId'") 
            or die(mysql_error());
    		$result = mysql_query("UPDATE articles SET rand='' WHERE id='$Album' AND webid='$WebId'") 
    		or die(mysql_error());
    
    // UPDATE ALL TRANSFERRED ARTICLE INFORMATION \\
    		$result = mysql_query("UPDATE transfer SET trash='1' WHERE id='$TransferId' AND webid='$WebId'") 
    		or die(mysql_error());
    		$result = mysql_query("UPDATE transfer SET trash='1' WHERE url='$Article_Url' AND webid='$WebId'") 
    		or die(mysql_error());
    
    // ADD ARTICLE TO SEARCH DATABASE \\
    		mysql_query("INSERT INTO cw_search(type, parent, title, other, active, webid) 
    		VALUES('$Article_Type', '$Search_Parent', '$Search_Name', '$Search_Other', '$Article_Active', '$WebId') ")or die(mysql_error());
    
    
    	}else{
    
            $query = "SELECT * FROM articles WHERE id='$Article_Id'";
    		$result = mysql_query($query) or die(mysql_error());
    		$Article = mysql_fetch_array($result);
    		$Article = CwOrganize($Article,$Array);
            $Article = Cw_Filter_Array($Article);
    
    // UPDATE INFORMATION ON SEARCH DATABASE \\
    		$Query = "SELECT * FROM cw_search WHERE parent='$Search_Parent' AND webid='$WebId'";
    		$Result = mysql_query($Query) or die(mysql_error());
    		$Row = mysql_fetch_array($Result);
    		if($Row['id'] == ""){
    			mysql_query("INSERT INTO cw_search(type, parent, title, other, active, webid) 
    			VALUES('$Article_Type', '$Search_Parent', '$Search_Name', '$Search_Other', '$Article_Active', '$WebId') ")or die(mysql_error());
    		}else{
    			$result = mysql_query("UPDATE cw_search SET title='$Search_Name' WHERE parent='$Search_Parent' AND webid='$WebId'") 
    			or die(mysql_error());
    			$result = mysql_query("UPDATE cw_search SET other='$Search_Other' WHERE parent='$Search_Parent' AND webid='$WebId'") 
    			or die(mysql_error());
    			$result = mysql_query("UPDATE cw_search SET active='$Article_Active' WHERE parent='$Search_Parent' AND webid='$WebId'") 
    			or die(mysql_error());
    			$result = mysql_query("UPDATE cw_search SET type='$Article_Type' WHERE parent='$Search_Parent' AND webid='$WebId'") 
    			or die(mysql_error());
    		}
    
    
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
    		if($Image_Order != ""){ 
    			foreach($Image_Order as $ImageO){
    				$ImageId = key($Image_Order);
    				$result = mysql_query("UPDATE images SET list='$ImageO' WHERE id='$ImageId' AND webid='$WebId'") 
    				or die(mysql_error());
    				next($Image_Order);
    			}
    		}
    		if($Track_Name != ""){ 
    			foreach($Track_Name as $TrackN){
    				$TrackId = key($Track_Name);
                                    if($TrackN != ""){
    				    $result = mysql_query("UPDATE images SET name='$TrackN' WHERE id='$TrackId' AND webid='$WebId'") 
    				    or die(mysql_error());
                                    }
    				next($Track_Name);
    			}
    		}
    		if($Image_Url != ""){ 
    			foreach($Image_Url as $ImageU){
    				$ImageUId = key($Image_Url);
    				$result = mysql_query("UPDATE images SET url='$ImageU' WHERE id='$ImageUId' AND webid='$WebId'") 
    				or die(mysql_error());
    				next($Image_Url);
    			}
    		}
    		if(is_array($Image_Active)){
    			foreach($Image_Active as $ImageA){
    				$ImageAId = key($Image_Active);
    				$result = mysql_query("UPDATE images SET active='$ImageA' WHERE id='$ImageAId' AND webid='$WebId'") 
    				or die(mysql_error());
    				$result = mysql_query("UPDATE images SET gallery='ads' WHERE id='$ImageAId' AND webid='$WebId'") 
    				or die(mysql_error());
    				next($Image_Active);
    			}
    		}
    		if(is_array($Audio_Active)){
    			foreach($Audio_Active as $AudioA){
    				$AudioAId = key($Audio_Active);
    				$result = mysql_query("UPDATE images SET active='$AudioA' WHERE id='$AudioAId' AND webid='$WebId'") 
    				or die(mysql_error());
    				next($Audio_Active);
    			}
    		}
    		if(is_array($Cinema_Active)){
    			foreach($Cinema_Active as $CinA){
    				$CinAId = key($Cinema_Active);
    				$result = mysql_query("UPDATE images SET active='$CinA' WHERE id='$CinAId' AND webid='$WebId'") 
    				or die(mysql_error());
    				next($Cinema_Active);
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
    		$result = mysql_query("UPDATE articles SET type='$Article_Type' WHERE id='$Article_Id' AND webid='$WebId'") 
    		or die(mysql_error()); 
    		$result = mysql_query("UPDATE articles SET name='$Article_Name' WHERE id='$Article_Id' AND webid='$WebId'") 
    		or die(mysql_error()); 
    		$result = mysql_query("UPDATE articles SET other='$Article_Other' WHERE id='$Article_Id' AND webid='$WebId'") 
    		or die(mysql_error());
    		$result = mysql_query("UPDATE articles SET feat='$Article_Feat' WHERE id='$Article_Id' AND webid='$WebId'") 
    		or die(mysql_error());
    		$result = mysql_query("UPDATE articles SET content='$Article_Content' WHERE id='$Article_Id' AND webid='$WebId'") 
    		or die(mysql_error());
    		$result = mysql_query("UPDATE articles SET date_created='$Date_Created' WHERE id='$Article_Id' AND webid='$WebId'") 
    		or die(mysql_error());
    		$result = mysql_query("UPDATE articles SET date='$Article_Date' WHERE id='$Article_Id' AND webid='$WebId'") 
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
    #}else{
        $error = "Not Authorized";
    #}

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


	if($REDIRECT == ""){
		$REDIRECT = "admin/Blog";
	}

	if($Cw_QuickPost == "1"){
		$REDIRECT = "admin/";
	}


	header("Location: http://$Website_Url_Auth/$REDIRECT");
	
}