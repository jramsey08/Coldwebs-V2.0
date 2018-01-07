<?php
// PULLS ALL INFORMATION FROM THE POST REQUEST FOR THE ARTICLE \\
include("forms/logincheck.php");
if($Login == "1"){
	$Article_Id = $_POST["id"];
	$Article_Type = $_POST["imgtype"];
	$Article_Category = $_POST["category"];
	$Article_Info = $_POST["content"];
	$Article_Active = $_POST["active"];
	$Article_Url = $_POST["url"];
	$Article_Date = strtotime($_POST["date"]);
    $RandValue = $_POST['randvalue'];
    $Date_Created = strtotime($_POST['date_created']);
	$REDIRECT = $_POST["redirect"];
	$Rand = rand(100,100000000);

	$Article_Content["name"] = $_POST["name"];
	$Article_Content["img"] = $_POST["img"];

	$SettingsAuto = $_POST["auto"];
	$SettingsAlbum = $_POST["album"];
	$SettingsBackground = $_POST["background"];
	$SettingsDashboard = $_POST["dashboard"];
	$SettingsSecure = $_POST["secure"];

	$Article_Other["website"] = $_POST["website"];
	$Article_Other["user"] = $_POST["user"];
	$Article_Other["status"] = $_POST["status"];
    $Article_Other["mainsocial"] = $_POST["mainsocial"];
	$Article_Other["socialqty"] = $_POST["socialqty"];

	$Search_Name = $Article_Content["name"];
	$Search_Parent = $_POST["id"];
	$Search_Other = "";

    if($Article_Active == ""){
        $Article_Active = "0";
    }


/////////////////////////// FINALIZE ALL ARRAYS FOR UPLOAD TO DATABASE \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
    $Article_Content = Cw_Filter_Array($Article_Content);
    $Article_Other = Cw_Filter_Array($Article_Other);
	$Article_Content = serialize($Article_Content); 
	$Article_Other = serialize($Article_Other);
    $PostImages = serialize($PostImages);




	if($Article_Id == ""){
	    $Manual_Message = "Created Post";
        $PostImages = serialize($PostImages);
        mysql_query("INSERT INTO articles(url, active, category, type, other, rand, date, feat, content, info, img, date_created,webid) VALUES('$Article_Url', '0',  
        '$Article_Category', '$Article_Type', '$Article_Other', '$Rand','$Article_Date', '$Article_Feat', '$Article_Content', '$Article_Info ', '$PostImages', '$Date_Created', '$WebId') ")or  
        die(mysql_error());
        $query = "SELECT * FROM articles WHERE trash='0' AND type='$Article_Type' AND rand='$Rand' AND webid='$WebId'";
        $result = mysql_query($query) or die(mysql_error());
        $row = mysql_fetch_array($result);
        $PostId = $row['id'];

	}else{
        $query = "SELECT * FROM articles WHERE id='$Article_Id'";
    	$result = mysql_query($query) or die(mysql_error());
    	$Article = mysql_fetch_array($result);
		$Article = CwOrganize($Article,$Array);   
		$Article = Cw_Filter_Array($Article);

// UPDATE THE DATABASE WITH ANY NEW/OLD INFORMATION \\
		$result = mysql_query("UPDATE articles SET url='$Article_Url' WHERE id='$Article_Id' AND webid='$WebId'") 
		or die(mysql_error());
		$result = mysql_query("UPDATE articles SET info='$Article_Info' WHERE id='$Article_Id' AND webid='$WebId'") 
		or die(mysql_error()); 
		$result = mysql_query("UPDATE articles SET category='$Article_Category' WHERE id='$Article_Id' AND webid='$WebId'") 
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
		$result = mysql_query("UPDATE articles SET rand='' WHERE id='$Article_Id' AND webid='$WebId'") 
		or die(mysql_error());
		if(is_array($PostImages)){
		    $PostImages = serialize($PostImages);
			$result = mysql_query("UPDATE articles SET img='$PostImages' WHERE id='$Article_Id' AND webid='$WebId'") 
		    or die(mysql_error());
		}

	}
    if($Article_Id == ""){
        $Article_Id = $PostId;
    }else{
        $PostId = $Article_Id;
    }



////////////////////////////////// VERIFY SOCIAL MEDIA ACCOUNT \\\\\\\\\\\\\\\\\\\\\\\\\\\\

    if($Article_Id == ""){
        $Query = "SELECT * FROM articles WHERE type='$Article_Type' AND category='$Article_Category' AND url='$Article_Url' AND trash='0' AND webid='$WebId'";
        $Result = mysql_query($Query) or die(mysql_error());
        $Row = mysql_fetch_array($Result);
        $Article_Id = $Row['id'];
    }

    if($Article_Active == "0"){
        $body ="?appid=$Website_App_Id&url=$Website_Url_Auth&state=verify&username=$Article_Url&type=$Article_Category&hs=$Hosted_Sites";
        $url = 'http://www.pblast.in/api/social/verify.php';
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url . $body);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_TIMEOUT, '3');
        $content = trim(curl_exec($ch));
        curl_close($ch);
        $content = unserialize($content);

        if($content['status'] == "0" OR $content['status'] == "" ){
            include("api/pblast/socialauth.php");
            $REDIRECT = $SocialAuth["$Article_Category"];
            $Root_Redi = "1";
        }else{
            $REDIRECT = "admin/SocialMedia";
        }
        if($REDIRECT == ""){
            $REDIRECT = "admin/SocialMedia";
            $Root_Redi = "0";
        }
    }




    if($_POST["mainsocial"] != ""){
        $query = "SELECT * FROM info WHERE domain LIKE '%$Website%'";
        $result = mysql_query($query) or die(mysql_error());
        $row = mysql_fetch_array($result);
        $row = PbUnSerial($row);
        $NewSocialOther = $row['other'];
        if(!is_array($NewSocialOther)){
            $NewSocialOther['socialauth'] = array();
        }
        $CurrentSocial = $NewSocialOther["socialauth"]["$Article_Category"];
        if($_POST["mainsocial"] == "1"){
            $NewSocialOther["socialauth"]["$Article_Category"] = $Article_Url;
            $NewSocialOther["social"]["$Article_Category"] = $Article_Url;
        }else{
            if($CurrentSocial == $Article_Url){
                $NewSocialOther["socialauth"]["$Article_Category"] = "";
            }
        }
        $NewSocialOther = serialize($NewSocialOther);
        $result = mysql_query("UPDATE info SET other='$NewSocialOther' WHERE id='$WebId'") 
        or die(mysql_error()); 
    }


	if($Root_Redi == "1"){
	    header("Location: $REDIRECT");
    }else{
        header("Location: http://$Website_Url_Auth/$REDIRECT");
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
}


