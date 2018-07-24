<?php
include("forms/logincheck.php");
if($Login == "1"){
	$MainTheme = $_POST['maintheme'];
	$Settings_Name = $_POST['name'];
	$Settings_Slogan = $_POST['slogan'];
	$Settings_Domain = $_POST['domain'];
	$Settings_Logo = $_POST['logo'];
	$Settings_BgImg = $_POST['bgimg'];
	$Settings_Content = $_POST['content'];
	$Settings_Status['offline'] = $_POST['offline'];

	$row = Cw_Fetch("SELECT * FROM info WHERE id='$WebId'",$Array);
    if(is_array($row['other'])){
        $Settings_Other = $row['other'];
    }
	$Settings_Other['phone'] = $_POST['phone'];
	$Settings_Other['cwsettings'] = $_POST['cwsettings'];
	$Settings_Other['admin_theme'] = $_POST['admin_theme'];
	$Settings_Other['article'] = "3";
	$Settings_Other['email'] = $_POST['email'];
	$Settings_Other['social'] = $_POST['social'];
	$Settings_Other['offline'] = $_POST['offlinetheme'];
	$Settings_Other['whitespace'] = $_POST['whitespace'];
	$Settings_Other['menustatus'] = $_POST['menustatus'];
	$Settings_Other['clogin'] = $_POST['clogin'];
    $Settings_Other['google_analytics'] = $_POST['google_analytics'];
	$Settings_Other['tags'] = $_POST['tags'];
	$Settings_Other['subscribe'] = $_POST['subscribe'];
	$Settings_Other['paypalemail'] = $_POST['paypalemail'];

	$CurrentMainTheme = $Array['siteinfo']['theme'];
	#$CurrentAdminTheme = $Array['sitetheme']['admin'];

	$FbAuto = $_POST['fbautopost'];
	$TwAuto = $_POST['twautopost'];
	$files = new UploadedFiles($_FILES);
	$Rand = rand(100,5000);
	
	
	$query = "SELECT * FROM info WHERE id='$WebId'";
    $result = mysqli_query($CwDb,$query);
    $Article = mysqli_fetch_assoc($result);
    $Article = CwOrganize($Article,$Array);
    $Article = Cw_Filter_Array($Article);
	
	
	if($files['profilepic']){
		 foreach($files['profilepic'] as $file){
			 $Gallery_Img = "./uploads/images/$Rand" . $file['name'];
			 if($file['name'] == ""){ }else{ 
				 $Settings_Logo = "http://$Website_Url_Auth/uploads/images/$Rand" . $file['name'];
				 move_uploaded_file($file['tmp_name'], $Gallery_Img);
			 }
		 }
	}
	if($files['subscribeimg]']){
		 foreach($files['subscribeimg'] as $file){
			 $Gallery_Img = "./uploads/images/$Rand" . $file['name'];
			 if($file['name'] == ""){ }else{ 
				 $Settings["subscribe"]["img"] = "http://$Website_Url_Auth/uploads/images/$Rand" . $file['name'];
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
	$result = Cw_Query("UPDATE page_template SET template='$MainTheme' WHERE template='$CurrentMainTheme' AND webid='$WebId'");

// UPDATES THE AUTO POSTING FOR SOCIAL MEDIA SITES \\
	$Array['facebook']['autopost'] = $FbAuto;
	$FbUpdate = $Array['facebook'];
	$FbUpdate = serialize($FbUpdate);
	#$Array['twitter']['autopost'] = $TwAuto;
	$TwUpdate = $Array['twitter'];
	$result = Cw_Query("UPDATE settings SET content='$FbUpdate' WHERE name='facebook' AND webid='$WebId'");
	$result = Cw_Query("UPDATE settings SET content='$TwUpdate' WHERE name='twitter' AND webid='$WebId'");
//GENERAL SITE SETTINGS UPDATE \\
	if(isset($Settings_Name)){
		$result = Cw_Query("UPDATE info SET name='$Settings_Name' WHERE id='$WebId'");
	}
	if(isset($Settings_Slogan)){
		$result = Cw_Query("UPDATE info SET slogan='$Settings_Slogan' WHERE id='$WebId'");
	}	
	if(isset($Settings_Mp)){
		$result = Cw_Query("UPDATE info SET mp='$Settings_Mp' WHERE id='$WebId'");
	}	
	if(isset($Settings_Domain)){
		#$result = Cw_Query("UPDATE info SET domain='$Settings_Domain' WHERE id='$WebId'");
	}	
	if(isset($Settings_Other)){
		$result = Cw_Query("UPDATE info SET other='$Settings_Other' WHERE id='$WebId'");
	}
	if(isset($Settings_Status)){
		$result = Cw_Query("UPDATE info SET status='$Settings_Status' WHERE id='$WebId'");
	}
	if(isset($Settings_Logo)){
		$result = Cw_Query("UPDATE info SET logo='$Settings_Logo' WHERE id='$WebId'");
	}
	if(isset($MainTheme)){
		$result = Cw_Query("UPDATE info SET theme='$MainTheme' WHERE id='$WebId'");
	}
	if(isset($Settings_Content)){
		$result = Cw_Query("UPDATE info SET info='$Settings_Content' WHERE id='$WebId'");
	}
	
// TRACKS CHANGES MADE FROM USERS \\
    $Info = array();
    $Info["webid"] = $WebId;
    $Info["user"] = $Current_Admin_Id;
    $Info["error"] = $error;
    $Info["tracker"] = $Load_Sess;
    $Info["manual_message"] = $Manual_Message;
    $Info["id"] = $WebId;
    $Info["type"] = "info";
    Cw_Changes($Info, $Article, $Array);
/////////////////////////////////////////
	header("Location: http://$Website_Url_Auth/admin/Settings");
}
?>