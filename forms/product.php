<?php
include("forms/logincheck.php");
if($Login == "1"){

	// PULLS ALL INFORMATION FROM THE POST REQUEST FOR THE ARTICLE \\

	$Article_Id = $_POST["id"];
	$Article_Type = $_POST["imgtype"]; 
	$Article_Search = $_POST["search"];
	$Article_Name = $_POST["name"];
	$Article_Feat = $_POST["feat"];
	$Article_Trash = $_POST["trash"];
	$Article_Info = $_POST["content"];
	$ArticleTheme = $_POST["maintheme"];
	$Article_Active = $_POST["active"];
	$Article_Url = $_POST["url"];
	$Article_Date = strtotime("$_POST[date]");
	$Article_Category = $_POST["category"]; 

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
    $GalRand = $_POST['galrand'];
    $Date_Created = strtotime($_POST['date_created']);
	$GalleryRemoval = $_POST['removegal'];
    $ShortCode = $_POST['cattype'];
    $MorePending = $_POST['morepending'];
    
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
    $Article_Content['newprice'] = $_POST['newprice'];
    $Article_Content['qty'] = $_POST['qty'];
    $Article_Content['condition'] = $_POST['condition'];
    $Article_Content['meta'] = $_POST['meta'];
    $Article_Content['shortdesc'] = $_POST['shortdesc'];
    $Article_Content["brand"] = $_POST["brand"];

	$SettingsAuto = $_POST["auto"];
	$SettingsAlbum = $_POST["album"];
	$SettingsBackground = $_POST["background"];
	$SettingsDashboard = $_POST["dashboard"];
	$SettingsSecure = $_POST["secure"];

	$Article_Other["gallery"] = $POST["gallery"];
	$Article_Other["setimg"] = $_POST["setimg"];
	$Article_Other["comment"] = $_POST["comment"];
	$Article_Other["typeid"] = $_POST["typeid"];
	$Article_Other["status"] = $_POST["status"];
	$Article_Other["social"] = $_POST["social"];
	$Article_Other["tags"] = $_POST["tags"];
	$Article_Other["structure"] = $_POST["structure"];
	$Article_Other["available_from"] = $_POST["available_from"];
	$Article_Other["available_to"] = $_POST["available_to"];
	$Article_Other["sku"] = $_POST["sku"];
    $Article_Other["structure"] = "product";
    $Article_Other["layout"] = $_POST["ImgLayout"];
    $Article_Other["supplier"] = $_POST["supplier"];
    $Article_Other["suppliertype"] = $_POST["suppliertype"];    
    $Article_Other["resell"] = $_POST["resell"];
    $Article_Other["wholesale"] = $_POST["wholesale"];
    
	$Search_Name = $Article_Name;
	$Search_Sku = $Article_Other["sku"];
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
		$PostImages = Cw_Img_Resize($Array,$ImgSrc,$StructureImgSizes,$ImgName);
		$PostImages = serialize($PostImages);
	}
	$Array["mediafile"]["code"] = $Article_Content["code"];
	$Article_Content["code"] = CwMediaFile($Array,$files,$Rand);
	if(is_array($Article_Other["layout"])){
	    foreach($Article_Other["layout"] as $key => $value){
	        $row = Cw_Fetch("SELECT * FROM images WHERE id='$value'",$Array);
	        $Article_Content["Imglayout"]["$key"] = $row["img"];
	   }
	}

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
		$Article_Type = "product";
	}
	
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
	if($Article_Other["sku"] == ""){
	    $Article_Other["sku"] = RandomCode("9");
	    $Search_Sku = $Article_Other["sku"];
	}
    if($Article_Other["wholesale"]["price"] == ""){
        $Article_Other["wholesale"]["price"] = $Article_Other["resell"]["price"] * $Percent_Wholesale;
        $Article_Other["wholesale"]["price"] = number_format($Article_Other["wholesale"]["price"], 2);
    }
    if($Article_Content["prodprice"] == "" OR $Article_Content["prodprice"] <= "0"){
        $Article_Content["prodprice"] = $Article_Other["resell"]["price"] * $Percent_ProdPrice;
        $Article_Content["prodprice"] = number_format($Article_Content["prodprice"], 2);
    }    
    if($Article_Content["newprice"] == ""){
        $Article_Content["newprice"] = $Article_Content["prodprice"] * $Percent_Sales;
        if($Article_Other["resell"]["avgprice"] != ""){
            if($Article_Content["newprice"] >= $Article_Other["resell"]["avgprice"]){
                $Article_Content["newprice"] = $Article_Other["resell"]["avgprice"] * ".90";
            }
        }
        $Article_Content["newprice"] = number_format($Article_Content["newprice"], 2);
    }    


// REMOVES ALL AND ANY ILLEGAL CHARACTERS \\
	$Article_Url = CharacterRemoval($Article_Url);
	$Article_Name = CommaRemoval($Article_Name);


//////////////////////////////////////// SOCIAL/3RD PARTY PLATFORMS INTEGRATION \\\\\\\\\\\\\\\\\\\\\\\

///////////////////////////////////////////////////////////////////////////////////////////////////////

    #print_r($Article_Content);
    #print_r($Article_Other);


///////////////////// FINALIZE ALL ARRAYS FOR UPLOAD TO DATABASE \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
    $Article_Content = Cw_Filter_Array($Article_Content);
    $Article_Other = Cw_Filter_Array($Article_Other);
	$Article_Content = serialize($Article_Content); 
	$Article_Other = serialize($Article_Other);



	if($Article_Id == ""){

        $Manual_Message = "Created Product";
		Cw_Query("INSERT INTO articles(name, url, active, category, type, other, rand, date, feat, content, info, img, date_created, shortcode, webid) 
		VALUES('$Article_Name', '$Article_Url', '$Article_Active',  '$Article_Category', '$Article_Type', '$Article_Other', '$GalRand','$Article_Date', '$Article_Feat', '$Article_Content', '$Article_Info ', '$PostImages', '$Date_Created', '$ShortCode', '$WebId') ");

// PROCESS GALLERY IMAGE UPLOADS \\
		$row = Cw_Fetch("SELECT * FROM articles WHERE trash='0' AND rand='$GalRand' AND webid='$WebId'",$Array);
		$Article_Id = $row["id"];
		$result = Cw_Query("UPDATE images SET album='$Article_Id' WHERE album='$GalRand' AND webid='$WebId'");
		$result = Cw_Query("UPDATE articles SET rand='' WHERE id='$Article_Id' AND webid='$WebId'");

// UPDATE ALL TRANSFERRED ARTICLE INFORMATION \\
		$result = Cw_Query("UPDATE transfer SET trash='1' WHERE id='$TransferId' AND webid='$WebId'");
		$result = Cw_Query("UPDATE transfer SET trash='1' WHERE url='$Article_Url' AND webid='$WebId'");

// ADD ARTICLE TO SEARCH DATABASE \\
		Cw_Query("INSERT INTO cw_search(type, parent, title, other, active, webid) VALUES('$Article_Type', '$Search_Parent', '$Search_Name', '$Search_Other', '$Article_Active', '$WebId') ");
		if($Search_Sku != ""){
		    Cw_Query("INSERT INTO cw_search(type, parent, title, other, active, webid) 
		    VALUES('$Article_Type', '$Search_Parent', '$Search_Sku', '$Search_Other', '$Article_Active', '$WebId') ");
		}
		

	}else{
	    $Article = Cw_Fetch("SELECT * FROM articles WHERE id='$Article_Id'",$Array);
        $Article = Cw_Filter_Array($Article);
	    

// UPDATE INFORMATION ON SEARCH DATABASE \\
		$Row = Cw_Fetch("SELECT * FROM cw_search WHERE parent='$Search_Parent' AND webid='$WebId'",$Array);
		if($Row['id'] == ""){
			Cw_Query("INSERT INTO cw_search(type, parent, title, other, active, webid) VALUES('$Article_Type', '$Search_Parent', '$Search_Name', '$Search_Other', '$Article_Active', '$WebId') ");
		}else{
			$result = Cw_Query("UPDATE cw_search SET title='$Search_Name' WHERE parent='$Search_Parent' AND webid='$WebId'");
			$result = Cw_Query("UPDATE cw_search SET other='$Search_Other' WHERE parent='$Search_Parent' AND webid='$WebId'");
			$result = Cw_Query("UPDATE cw_search SET active='$Article_Active' WHERE parent='$Search_Parent' AND webid='$WebId'");
			$result = Cw_Query("UPDATE cw_search SET type='$Article_Type' WHERE parent='$Search_Parent' AND webid='$WebId'");
		}
		if($Search_Sku != ""){
    		$RoW = Cw_Fetch("SELECT * FROM cw_search WHERE title='$Search_Sku' AND webid='$WebId' AND parent='$Search_Parent'",$Array);
    		if($RoW['id'] == ""){
    			Cw_Query("INSERT INTO cw_search(type, parent, title, other, active, webid) VALUES('$Article_Type', '$Search_Parent', '$Search_Sku', '$Search_Other', '$Article_Active', '$WebId') ");
    		}else{
    			$result = Cw_Query("UPDATE cw_search SET title='$Search_Sku' WHERE id='$RoW[id]' AND webid='$WebId'");
    		}
		}

// UN-LINK OLD TAGS FROM ARTICLE \\
		$UnlinkTag =  explode(",", $Tags);
		$row = Cw_Fetch("SELECT * FROM articles WHERE id='$Article_Id' AND webid='$WebId'",$Array);
		$SRTags = $row["other"]["tags"];
		if($SRTags == ""){
		}else{
			$SRTags = explode(",", $SRTags);
			$TagRemove = array_delete($UnlinkTag, $SRTags);
			$Count = "0";
			foreach($TagRemove as $value){
				$Row = Cw_Fetch("SELECT * FROM cw_tags WHERE name='$value' AND webid='$WebId'",$Array);
				$ListTagId = $Row["id"];
				$ListTag = unserialize($Row["content"]);
				$Tag_key = array_search($Article_Id, $ListTag);
				unset($ListTag[$Tag_key]);
				$NewTagArray = serialize($ListTag);
				$result = Cw_Query("UPDATE cw_tags SET content='$NewTagArray' WHERE id='$ListTagId' AND webid='$WebId'");
		   }
		}


// PROCESS GALLERY IMAGE UPLOADS \\
		if($Image_Order != ""){ 
			foreach($Image_Order as $ImageO){
				$ImageId = key($Image_Order);
				$result = Cw_Query("UPDATE images SET list='$ImageO' WHERE id='$ImageId' AND webid='$WebId'");
				next($Image_Order);
			}
		}
		if($Track_Name != ""){ 
			foreach($Track_Name as $TrackN){
				$TrackId = key($Track_Name);
                if($TrackN != ""){
				    $result = Cw_Query("UPDATE images SET name='$TrackN' WHERE id='$TrackId' AND webid='$WebId'");
                }
				next($Track_Name);
			}
		}
		if($Image_Url != ""){ 
			foreach($Image_Url as $ImageU){
				$ImageUId = key($Image_Url);
				$result = Cw_Query("UPDATE images SET url='$ImageU' WHERE id='$ImageUId' AND webid='$WebId'");
				next($Image_Url);
			}
		}
		if(is_array($Image_Active)){
			foreach($Image_Active as $ImageA){
				$ImageAId = key($Image_Active);
				$result = Cw_Query("UPDATE images SET active='$ImageA' WHERE id='$ImageAId' AND webid='$WebId'");
				$result = Cw_Query("UPDATE images SET gallery='' WHERE id='$ImageAId' AND webid='$WebId'");
				next($Image_Active);
			}
		}
		if(is_array($Audio_Active)){
			foreach($Audio_Active as $AudioA){
				$AudioAId = key($Audio_Active);
				$result = Cw_Query("UPDATE images SET active='$AudioA' WHERE id='$AudioAId' AND webid='$WebId'");
				next($Audio_Active);
			}
		}
		if(is_array($Cinema_Active)){
			foreach($Cinema_Active as $CinA){
				$CinAId = key($Cinema_Active);
				$result = Cw_Query("UPDATE images SET active='$CinA' WHERE id='$CinAId' AND webid='$WebId'");
				next($Cinema_Active);
			}
		}

// UPDATE THE DATABASE WITH ANY NEW/OLD INFORMATION \\
		$result = Cw_Query("UPDATE articles SET name='$Article_Name' WHERE id='$Article_Id' AND webid='$WebId'"); 
		$result = Cw_Query("UPDATE articles SET url='$Article_Url' WHERE id='$Article_Id' AND webid='$WebId'"); 
		$result = Cw_Query("UPDATE articles SET active='$Article_Active' WHERE id='$Article_Id' AND webid='$WebId'"); 
		if($ShortCode != ""){
		    $result = Cw_Query("UPDATE articles SET shortcode='$ShortCode' WHERE id='$Article_Id' AND webid='$WebId'"); 
		}
		$result = Cw_Query("UPDATE articles SET info='$Article_Info' WHERE id='$Article_Id' AND webid='$WebId'");
		if($Article_Category != ""){
    		$result = Cw_Query("UPDATE articles SET category='$Article_Category' WHERE id='$Article_Id' AND webid='$WebId'"); 
		}
		$result = Cw_Query("UPDATE articles SET date_created='$Date_Created' WHERE id='$Article_Id' AND webid='$WebId'");
		$result = Cw_Query("UPDATE articles SET other='$Article_Other' WHERE id='$Article_Id' AND webid='$WebId'");
		$result = Cw_Query("UPDATE articles SET feat='$Article_Feat' WHERE id='$Article_Id' AND webid='$WebId'");
		$result = Cw_Query("UPDATE articles SET content='$Article_Content' WHERE id='$Article_Id' AND webid='$WebId'");
		if($PostImages == ""){ }else{
			$result = Cw_Query("UPDATE articles SET img='$PostImages' WHERE id='$Article_Id' AND webid='$WebId'");
		}

		if(is_array($GalleryRemoval)){
			foreach($GalleryRemoval as $value){
				$result = Cw_Query("UPDATE images SET trash='1' WHERE id='$value' AND webid='$WebId'");
			}
		}

#		$query = "SELECT * FROM articles WHERE id='$Article_Id' AND webid='$WebId'";
#		$result = mysqli_query($CwDb,$query);
#		$row = mysqli_fetch_assoc($result);
#       $row = CwOrganize($row);
#       print_r($row);


	}




// CONNECT INFORMATION TO TAGS SEARCH DATABASE \\
	$TagArticle = $Article_Id;
	$Tags =  explode(",", $Tags);
	foreach($Tags as $value){
		$row = Cw_Fetch("SELECT * FROM cw_tags WHERE name='$value' AND webid='$WebId'",$Array);
		$TagSearchId = $row["id"];
		if($TagSearchId == ""){
			$TagId = array("$TagArticle");
			$TagId = serialize($TagId);
			if($value == ""){
			}else{
				Cw_Query("INSERT INTO cw_tags(name, content, webid, type) VALUES('$value', '$TagId', '$WebId', '$Article_Type') ");
			}
		}else{
			$TagId = $row["content"];
			$TagId = unserialize($TagId);
			if(is_array($TagId)){
    			if(!in_array($TagArticle, $TagId)){
    				array_push($TagId, $TagArticle);
    				$NewTagArray = serialize($TagId);
    				$result = Cw_Query("UPDATE cw_tags SET content='$NewTagArray' WHERE id='$TagSearchId' AND webid='$WebId'");
    				$result = Cw_Query("UPDATE cw_tags SET type='$Article_Type' WHERE id='$TagSearchId' AND webid='$WebId'");    				
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

    if($MorePending == "1"){
    	header("Location: http://$Website_Url_Auth/admin/Ecommerce-Pending");
    }else{
        header("Location: http://$Website_Url_Auth/admin/Ecommerce-Products");
    }

}
?>