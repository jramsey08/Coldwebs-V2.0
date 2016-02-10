<?php
include("forms/logincheck.php");
if($Login == "1"){
	include("forms/logincheck.php");

	$MainTheme = $_POST['maintheme'];
	$Settings_Name = $_POST['name'];
	$Settings_Slogan = $_POST['slogan'];
	$Settings_Domain = $_POST['domain'];
	$Settings_Logo = $_POST['logo'];
	$Settings_BgImg = $_POST['bgimg'];
	$Settings_Content = $_POST['content'];
	$Settings_Status['offline'] = $_POST['offline'];
	$Settings_Extra = $_POST['cwsettings'];
	$Settings_Other['phone'] = $_POST['phone'];
	$Settings_Other['article'] = "3";
	$Settings_Other['email'] = $_POST['email'];
	$Settings_Other['social'] = $_POST['social'];
	$Settings_Other['offline'] = "3";
	$Settings_Other['whitespace'] = $_POST['whitespace'];
	$Settings_Other['menustatus'] = $_POST['menustatus'];
	$Settings_Other['clogin'] = $_POST['clogin'];
        $Settings_Other['google_analytics'] = $_POST['google_analytics'];
	$Settings_Other['tags'] = $_POST['tags'];
	$CurrentMainTheme = $Array['siteinfo']['theme'];
	#$CurrentAdminTheme = $Array['sitetheme']['admin'];
	$FbAuto = $_POST['fbautopost'];
	$TwAuto = $_POST['twautopost'];
	$files = new UploadedFiles($_FILES);
	$Rand = rand(100,5000);




	if($files['profilepic']){
		 foreach($files['profilepic'] as $file){
			 $Gallery_Img = "./uploads/images/$Rand" . $file['name'];
			 if($file['name'] == ""){ }else{ 
				 $Settings_Logo = "http://$Website_Url_Auth/uploads/images/$Rand" . $file['name'];
				 move_uploaded_file($file['tmp_name'], $Gallery_Img);
			 }
		 }
	}

	if($files['logotwo']){
		 foreach($files['logotwo'] as $file){
			 $Gallery_Img = "./uploads/images/$Rand" . $file['name'];
			 if($file['name'] == ""){ }else{ 
				 $Settings_LogoTwo = "http://$Website_Url_Auth/uploads/images/$Rand" . $file['name'];
				 move_uploaded_file($file['tmp_name'], $Gallery_Img);
			 }
		 }
	}

	if($files['bgimg']){
		 foreach($files['bgimg'] as $file){
			 $Gallery_Img = "./uploads/images/$Rand" . $file['name'];
			 if($file['name'] == ""){ }else{ 
				 $Settings_Bg = "http://$Website_Url_Auth/uploads/images/$Rand" . $file['name'];
				 move_uploaded_file($file['tmp_name'], $Gallery_Img);
			 }
		 }
	}

	if($Settings_Bg == ""){
		$Settings_Bg = $Settings_BgImg;
	}

	$Settings_Other['bgimg'] = $Settings_Bg;
	$Settings_Other['logotwo'] = $Settings_LogoTwo;


#print_r($Settings_Other);


	$Settings_Other = serialize($Settings_Other);
	$Settings_Status = serialize($Settings_Status);

//CHANGES THE THEME ON ALL PAGES THAT WAS USING THE CURRENT THEME
	$result = mysql_query("UPDATE page_template SET template='$MainTheme' WHERE template='$CurrentMainTheme'") 
	or die(mysql_error());

// CREATE ALL NECESSARY DATABASE INFORMATION NEEDED FOR NEW THEMES.
	$queRy = "SELECT * FROM page_structure WHERE template='$CurrentMainTheme'";
	$resuLt = mysql_query($queRy) or die(mysql_error(drdrdrd));
	while($row = mysql_fetch_array($resuLt)){
		$TableName = $row['name'];
		$TableId = $row['id'];
		$TableUrl = $row['url'];
		$TableActive = $row['active'];
		$TableTrash = $row['trash'];
		$TableArticle = $row['article'];
		$TableType = $row['type'];
		$TableComments = $row['comments'];
		$TableEnd = $row['end'];
		$TableUrlId = $row['urlid'];
		$TableUrlType = $row['urltype'];
		#$result = mysql_query("UPDATE page_structure SET active='0' WHERE id='$TableId'") 
		#or die(mysql_error());
		$Query = "SELECT * FROM page_structure WHERE template='$MainTheme' AND url='$TableUrl' AND end='$TableEnd' AND urlid='$TableUrlId' AND urltype='$TableUrlType'";
		$Result = mysql_query($Query) or die(mysql_error());
		$Row = mysql_fetch_array($Result);
		$MainRowId = $Row['id'];
		if($MainRowId == ""){
			#mysql_query("INSERT INTO page_structure 
			#(name, url, article, type, comments, end, urlid, urltype, template) VALUES('$TableName', '$TableUrl', '$TableArticle', '$TableType', '$TableComments', '$TableEnd', '$TableUrlId', '$TableUrlType', '$MainTheme' ) ") 
			#or die(mysql_error()); 
		}else{
			#$result = mysql_query("UPDATE page_structure SET active='1' WHERE id='$MainRowId'")
			#or die(mysql_error());
		}
	}

// UPDATES THE AUTO POSTING FOR SOCIAL MEDIA SITES \\

	$Array['facebook']['autopost'] = $FbAuto;
	$FbUpdate = $Array['facebook'];
	$FbUpdate = serialize($FbUpdate);

	#$Array['twitter']['autopost'] = $TwAuto;
	$TwUpdate = $Array['twitter'];
	$result = mysql_query("UPDATE settings SET content='$FbUpdate' WHERE name='facebook'") 
	or die(mysql_error());
	$result = mysql_query("UPDATE settings SET content='$TwUpdate' WHERE name='twitter'") 
	or die(mysql_error());

// UPDATES THE EXTRA WEBSITE SETTINGS COLUMN FOR CWOPTIONS \\
	if(is_array($Settings_Extra)){
		foreach($Settings_Extra as $key => $value){
			$queRy = "SELECT * FROM cwoptions WHERE name='$key' AND type='settings'";
			$resuLt = mysql_query($queRy) or die(mysql_error(drdrdrd));
			$row = mysql_fetch_array($resuLt);
			$Setting_Type = $row['category'];
			if($Setting_Type != "text"){
				$result = mysql_query("UPDATE cwoptions SET active='$value' WHERE name='$key' AND type='settings'") 
				or die(mysql_error());
			}else{
				$result = mysql_query("UPDATE cwoptions SET content='$value' WHERE name='$key' AND type='settings'") 
				or die(mysql_error());
			}
		}
	}


#echo $Settings_Other;

//GENERAL SITE SETTINGS UPDATE \\
	if(isset($Settings_Name)){
		$result = mysql_query("UPDATE info SET name='$Settings_Name'") 
		or die(mysql_error());
	}
	if(isset($Settings_Slogan)){
		$result = mysql_query("UPDATE info SET slogan='$Settings_Slogan'") 
		or die(mysql_error());
	}	
	if(isset($Settings_Mp)){
		$result = mysql_query("UPDATE info SET mp='$Settings_Mp'") 
		or die(mysql_error());
	}	
	if(isset($Settings_Domain)){
		$result = mysql_query("UPDATE info SET domain='$Settings_Domain'") 
		or die(mysql_error());
	}	
	if(isset($Settings_Other)){
		$result = mysql_query("UPDATE info SET other='$Settings_Other'") 
		or die(mysql_error());
	}
	if(isset($Settings_Status)){
		$result = mysql_query("UPDATE info SET status='$Settings_Status'") 
		or die(mysql_error());
	}
	if(isset($Settings_Logo)){
		$result = mysql_query("UPDATE info SET logo='$Settings_Logo'") 
		or die(mysql_error());
	}
	if(isset($MainTheme)){
		$result = mysql_query("UPDATE info SET theme='$MainTheme'") 
		or die(mysql_error());
	}
	if(isset($Settings_Content)){
		$result = mysql_query("UPDATE info SET info='$Settings_Content'") 
		or die(mysql_error());
	}
	$Domain = $Array["siteinfo"]["domain"];
	header("Location: $Domain/admin/Settings");

}
?>