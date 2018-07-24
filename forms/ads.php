<?php
include("forms/logincheck.php");

if($Login == "1"){

	$Ad_Id = $_POST['id'];
	$Ad_Name = $_POST['name'];
	$Ad_Type = $_POST['type'];
	$Ad_Feat = $_POST['feat'];
	$Ad_Location = $_POST['location'];
	$Ad_Limit = $_POST['adlimit'];
	$Ad_Height = $_POST['height'];
	$Ad_Width = $_POST['width'];
	$Ad_Pb = $_POST['pb'];
	$Ad_Active = $_POST['active'];
	$Ad_Img = $_POST['img'];
	
	$Ad_Code_Type = $_POST['mediacodetype'];
	$Ad_Code = $_POST['mediacode'];
	
	$Image_Order = $_POST["ImageOrder"];
	$Image_Url = $_POST["ImageUrl"];
	$Image_Active = $_POST["Imageactive"];
	$files = new UploadedFiles($_FILES);
	$Cw_QuickPost = $POST['qucikpost'];
	$GalleryRemoval = $_POST['removegal'];
	$Rand = RandomCode(20);
	
	$Ad_Other['manualadloc'] = $_POST['manualadloc'];
	$Ad_Other['adclicks'] = $_POST['adclicks'];
	$Ad_Other['adtime'] = $_POST['adtime'];
	$Ad_Other['adclicks'] = $_POST['adclicks'];
	$Ad_Other['adviews'] = $_POST['adviews'];
	$Ad_Other['pbmarketing'] = $_POST['pbmarketing'];
	$Ad_Other['adpaymentstatus'] = $_POST['adpaymentstatus'];
	$Ad_Other['adpayment'] = $_POST['adpayment'];
	$Ad_Other['url'] = $_POST['url'];
        $Ad_Other['usetitle'] = $_POST['usetitle'];

	$Ad_Info['pbstatus'] = $_POST['pbstatus'];
	$Ad_Info['content'] = $_POST['content'];

	if($Ad_Info['content'] == ""){
		$Ad_Info['content'] = "advertisement";
	}
        if($Ad_Location == "x"){
            $Ad_Location = $_POST['manualadloc'];
        }

	
////////////////////////////////// PULL 3RD-PARTY CONTENT INFORMATION \\\\\\\\\\\\\\\\\\\\\\\\\\\\
	if($Ad_Code_Type == "youtube"){
		 $YtCount = strlen($Ad_Code);
		 if($YtCount >= "12"){
			  $Ad_Code = youtube_id_last_chance($Ad_Code);
			  if($Ad_Code == ""){
				   $Ad_Code = "";
			  }
		 }
	}
	
	$Ad_Other['mediacodetype'] = $Ad_Code_Type;
	$Ad_Other['mediacode'] = $Ad_Code;
	

/////////////////////////////////////// PROCESSES ALL MEDIA UPLOADS \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
	$Array["profilepic"]["img"] = $Ad_Img;
	$ImgArray = CwProfilePic($Array,$files,$Rand);
	$Ad_Img = $ImgArray["file"];
	if($_POST["img"] == $Ad_Img){
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
	if($Ad_Img == ""){
		$Ad_Img = $_POST['img'];
	}else{
		$Ad_Img = $Ad_Img;
	}
	$Array["mediafile"]["code"] = $Article_Content["code"];
	$Ad_Other["file"] = CwMediaFile($Array,$files,$Rand);
	
// PREPARES ARRAYS FOR DATABASE STORAGE \\
    $Ad_Other_Request = $Ad_Other;
        $Ad_Info = Cw_Filter_Array($Ad_Info);
        $Ad_Other = Cw_Filter_Array($Ad_Other);
    	$Ad_Info = serialize($Ad_Info); 
    	$Ad_Other = serialize($Ad_Other);
    


	if($Ad_Id == ""){
	    $Manual_Message = "Created Advertisement";
	
//CREATES ROW FOR NEW ADVERTISEMENT \\
		mysqli_query($CwDb,"INSERT INTO cw_ads(name, type, feat, location, adlimit, height, width, img, pb, other, info, rand, active, webid) VALUES('$Ad_Name', '$Ad_Type', '$Ad_Feat', '$Ad_Location', '$Ad_Limit', '$Ad_Height', '$Ad_Width', '$Ad_Img', '$Ad_Pb', '$Ad_Other', '$Ad_Info', '$Rand', '$Ad_Active', '$WebId') ")or die(mysqli_error());
		$query = "SELECT * FROM cw_ads WHERE rand='$Rand'";
        $result = mysqli_query($CwDb, $query);
        $row = mysqli_fetch_assoc($result);
		$row = Cw_Filter_Array($row);
		$Ad_Id = $row['id'];
		$result = mysqli_query($CwDb,"UPDATE cw_ads SET rand='' WHERE id='$Ad_Id'") or die(mysqli_error());
// PROCESS GALLERY IMAGE UPLOADS \\
		$Array["galleryupload"]["id"] = $Ad_Id;
		$Upload = $files["gallery"];
		CwGallery($Array,$files);
		$result = mysqli_query($CwDb,"UPDATE cw_ads SET rand='' WHERE id='$Album'") or die(mysqli_error());
		
		
	}else{
	    $Manual_Message = "Updated Advertisement";

            $query = "SELECT * FROM cw_ads WHERE id='$Ad_Id'";
    		$result = mysql_query($CwDb,$query);
    		$Article = mysql_fetch_array($result);
    		$Article = CwOrganize($Article,$Array);
            $Article = Cw_Filter_Array($Article);
	
//// GENERAL SITE ADVERTISEMENT UPDATE \\\\
		$result = mysqli_query($CwDb,"UPDATE cw_ads SET name='$Ad_Name' WHERE id='$Ad_Id' AND webid='$WebId'") or die(mysqli_error());
		$result = mysqli_query($CwDb,"UPDATE cw_ads SET type='$Ad_Type' WHERE id='$Ad_Id' AND webid='$WebId'") or die(mysqli_error());
		$result = mysqli_query($CwDb,"UPDATE cw_ads SET feat='$Ad_Feat' WHERE id='$Ad_Id' AND webid='$WebId'") or die(mysqli_error());
		$result = mysqli_query($CwDb,"UPDATE cw_ads SET location='$Ad_Location' WHERE id='$Ad_Id' AND webid='$WebId'") or die(mysqli_error());
		$result = mysqli_query($CwDb,"UPDATE cw_ads SET adlimit='$Ad_Limit' WHERE id='$Ad_Id' AND webid='$WebId'") or die(mysqli_error());
		$result = mysqli_query($CwDb,"UPDATE cw_ads SET height='$Ad_Height' WHERE id='$Ad_Id' AND webid='$WebId'") or die(mysqli_error());
		$result = mysqli_query($CwDb,"UPDATE cw_ads SET width='$Ad_Width' WHERE id='$Ad_Id' AND webid='$WebId'") or die(mysqli_error());
		$result = mysqli_query($CwDb,"UPDATE cw_ads SET img='$Ad_Img' WHERE id='$Ad_Id' AND webid='$WebId'") or die(mysqli_error());
		$result = mysqli_query($CwDb,"UPDATE cw_ads SET pb='$Ad_Pb' WHERE id='$Ad_Id' AND webid='$WebId'") or die(mysqli_error());
		$result = mysqli_query($CwDb,"UPDATE cw_ads SET other='$Ad_Other' WHERE id='$Ad_Id' AND webid='$WebId'") or die(mysqli_error());
		$result = mysqli_query($CwDb,"UPDATE cw_ads SET info='$Ad_Info' WHERE id='$Ad_Id' AND webid='$WebId'") or die(mysqli_error());
		$result = mysqli_query($CwDb,"UPDATE cw_ads SET active='$Ad_Active' WHERE id='$Ad_Id' AND webid='$WebId'") or die(mysqli_error());
		
		$Array["galleryupload"]["id"] = $Ad_Id;
		CwGallery($Array,$files);
		if($Image_Order != ""){ 
			foreach($Image_Order as $ImageO){
				$ImageId = key($Image_Order);
				$result = mysqli_query($CwDb,"UPDATE images SET list='$ImageO' WHERE id='$ImageId' AND webid='$WebId'") or die(mysqli_error());
				$result = mysqli_query($CwDb,"UPDATE images SET gallery='ads' WHERE id='$ImageId' AND webid='$WebId'") or die(mysqli_error());
				next($Image_Order);
			}
		}
		if($Image_Url != ""){
			foreach($Image_Url as $ImageU){
				$ImageUId = key($Image_Url);
				$result = mysqli_query($CwDb,"UPDATE images SET url='$ImageU' WHERE id='$ImageUId' AND webid='$WebId'") or die(mysqli_error());
				$result = mysqli_query($CwDb,"UPDATE images SET gallery='ads' WHERE id='$ImageId' AND webid='$WebId'") or die(mysqli_error());
				next($Image_Url);
			}
		}
// REMOVE REQUESTED EXTRA IMAGES \\
		if(is_array($GalleryRemoval)){
			foreach($GalleryRemoval as $value){
				$result = mysqli_query($CwDb,"UPDATE images SET trash='1' WHERE id='$value' AND webid='$WebId'")or die(mysqli_error());
			}
		}
		if(is_array($Image_Active)){
			foreach($Image_Active as $ImageA){
				$ImageAId = key($Image_Active);
				$result = mysqli_query($CwDb,"UPDATE images SET active='$ImageA' WHERE id='$ImageAId' AND webid='$WebId'") or die(mysqli_error());
				$result = mysqli_query($CwDb,"UPDATE images SET gallery='ads' WHERE id='$ImageAId' AND webid='$WebId'") or die(mysqli_error());
				next($Image_Active);
			}
		}
		
		
	}


	// UPDATE THE ADVERTISEMENT INFORMATION ON PBLAST.IN \\
	$Ad_Secret = $Array['pblast']['secret'];
	$Info['postid'] = $Ad_Id;
	$Info['name'] = $Ad_Name;
	$Info['img'] = $Ad_Img;
	$Info['adtype'] = $_POST['type'];
	$Info['active'] = $_POST['active'];
	$Info['feat'] = $_POST['feat'];
	$Info['location'] = $_POST['location'];
	$Info['adlimit'] = $_POST['adlimit'];
	$Info['height'] = $_POST['height'];
	$Info['width'] = $_POST['width'];
	$Info['code'] = $_POST['code'];
	$Info['codetype'] = $_POST['codetype'];
	$Info['adinfo'] = $Ad_Other_Request;
	$Info = OtarEncrypt($Ad_Secret,$Info);
	$Method['service'] = "advertisement";
	$Method['id'] = "";
	$Method['website'] = "";
	$Request['info'] = $Info;
	$Request['appid'] = $Array['pblast']['appid'];
	$Request['method'] = $Method;
	$Request['website'] = $Website_Url_Auth;
	$Request = OtarEncrypt($PB_Access,$Request);
	
	$Loc = "uploads/temp/";
	$file = $Loc . "Ad-" . $Ad_Id . ".txt";
	$myfile = fopen("$file", "w") or die("Unable to open file!");
        fwrite($myfile, $Request);
        fclose($myfile);
	$Loc = $Array['siteinfo']['domain'] . "/" . $file;
	$Loc = OtarEncrypt($PB_Access,$Loc);
	
	
	$url = "http://pblast.in/api/request.php?request=file&loc=$Loc";
	$ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_TIMEOUT, '3');
        $content = trim(curl_exec($ch));
        curl_close($ch);

// TRACKS CHANGES MADE FROM USERS \\
    $Info = array();
    $Info["webid"] = $WebId;
    $Info["user"] = $Current_Admin_Id;
    $Info["error"] = $error;
    $Info["tracker"] = $Load_Sess;
    $Info["manual_message"] = $Manual_Message;
    $Info["id"] = $Ad_Id;
    $Info["type"] = "cw_ads";
    Cw_Changes($Info, $Article, $Array);
/////////////////////////////////////////

    #$curl = curl_init();
    #curl_setopt ($curl, CURLOPT_URL, "http://www.pblast.in/api/request.php");
    #curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    #$result = curl_exec ($curl);
    #curl_close ($curl);
    #print $result;


		#$result = mysqli_query($CwDb,"UPDATE cw_ads SET pb='$content' WHERE id='$Ad_Id' AND webid='$WebId'") or die(mysqli_error());
		#unlink($file);
	#unset($content);

	header("Location: http://$Website_Url_Auth/admin/Advertisement");
}




?>