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
	$Settings_Extra = $_POST['cwsettings'];

	$queRy = "SELECT * FROM info WHERE id='$WebId'";
	$resuLt = mysql_query($queRy) or die(mysql_error(drdrdrd));
	$row = mysql_fetch_array($resuLt);
    $row = PbUnSerial($row);
    if(is_array($row['other'])){
        $Settings_Other = $row['other'];
    }
	$Settings_Other['phone'] = $_POST['phone'];
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

	$CurrentMainTheme = $Array['siteinfo']['theme'];
	#$CurrentAdminTheme = $Array['sitetheme']['admin'];

	$FbAuto = $_POST['fbautopost'];
	$TwAuto = $_POST['twautopost'];
	$files = new UploadedFiles($_FILES);
	$Rand = rand(100,5000);
	
	
	$query = "SELECT * FROM info WHERE id='$WebId'";
    $result = mysql_query($query) or die(mysql_error());
    $Article = mysql_fetch_array($result);
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
	$result = mysql_query("UPDATE page_template SET template='$MainTheme' WHERE template='$CurrentMainTheme' AND webid='$WebId'") 
	or die(mysql_error());

// UPDATES THE AUTO POSTING FOR SOCIAL MEDIA SITES \\
	$Array['facebook']['autopost'] = $FbAuto;
	$FbUpdate = $Array['facebook'];
	$FbUpdate = serialize($FbUpdate);
	#$Array['twitter']['autopost'] = $TwAuto;
	$TwUpdate = $Array['twitter'];
	$result = mysql_query("UPDATE settings SET content='$FbUpdate' WHERE name='facebook' AND webid='$WebId'") 
	or die(mysql_error());
	$result = mysql_query("UPDATE settings SET content='$TwUpdate' WHERE name='twitter' AND webid='$WebId'") 
	or die(mysql_error());
// UPDATES THE EXTRA WEBSITE SETTINGS COLUMN FOR CWOPTIONS \\
	if(is_array($Settings_Extra)){
		foreach($Settings_Extra as $key => $value){
			$queRy = "SELECT * FROM cwoptions WHERE name='$key' AND type='settings' AND webid='$WebId'";
			$resuLt = mysql_query($queRy) or die(mysql_error(drdrdrd));
			$row = mysql_fetch_array($resuLt);
			$Setting_Type = $row['category'];
			if($Setting_Type != "text"){
				$result = mysql_query("UPDATE cwoptions SET active='$value' WHERE name='$key' AND type='settings' AND webid='$WebId'") 
				or die(mysql_error());
			}else{
				$result = mysql_query("UPDATE cwoptions SET content='$value' WHERE name='$key' AND type='settings' AND webid='$WebId'") 
				or die(mysql_error());
			}
		}
	}

//GENERAL SITE SETTINGS UPDATE \\
	if(isset($Settings_Name)){
		$result = mysql_query("UPDATE info SET name='$Settings_Name' WHERE id='$WebId'") 
		or die(mysql_error());
	}
	if(isset($Settings_Slogan)){
		$result = mysql_query("UPDATE info SET slogan='$Settings_Slogan' WHERE id='$WebId'") 
		or die(mysql_error());
	}	
	if(isset($Settings_Mp)){
		$result = mysql_query("UPDATE info SET mp='$Settings_Mp' WHERE id='$WebId'") 
		or die(mysql_error());
	}	
	if(isset($Settings_Domain)){
		#$result = mysql_query("UPDATE info SET domain='$Settings_Domain' WHERE id='$WebId'") 
		#or die(mysql_error());
	}	
	if(isset($Settings_Other)){
		$result = mysql_query("UPDATE info SET other='$Settings_Other' WHERE id='$WebId'") 
		or die(mysql_error());
	}
	if(isset($Settings_Status)){
		$result = mysql_query("UPDATE info SET status='$Settings_Status' WHERE id='$WebId'") 
		or die(mysql_error());
	}
	if(isset($Settings_Logo)){
		$result = mysql_query("UPDATE info SET logo='$Settings_Logo' WHERE id='$WebId'") 
		or die(mysql_error());
	}
	if(isset($MainTheme)){
		$result = mysql_query("UPDATE info SET theme='$MainTheme' WHERE id='$WebId'") 
		or die(mysql_error());
	}
	if(isset($Settings_Content)){
		$result = mysql_query("UPDATE info SET info='$Settings_Content' WHERE id='$WebId'") 
		or die(mysql_error());
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