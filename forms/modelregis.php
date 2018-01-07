<?php

$_POST = CwRmValue($_POST);

$Model_Id = $_POST['id'];
$Model_First_Name = $_POST['first_name'];
$Model_Last_Name = $_POST['last_name'];
$Model_Info = $_POST['bio'];
$Model_Gender = $_POST['gender'];
$Model_Email = $_POST['email'];
$Model_Birthday_Month = $_POST['birthday_month'];
$Model_Birthday_Day = $_POST['birthday_day'];
$Model_Birthday_Year = $_POST['birthday_year'];
$Model_Notes = $_POST['notes'];
$Rand = $_POST['rand'];
$GalRand = $_POST['galrand'];

if($Model_Gender == "male"){
    $Model_Height = $_POST['height_male'];
    $Model_Waist = $_POST['waist_male'];
    $Model_Shoe = $_POST['shoe_size_male'];
    $Model_Eyes = $_POST['eyes_male'];
    $Model_Hair = $_POST['hair_male'];
    $Model_Ethnicity = $_POST['ethnicity_male'];
}else{
    $Model_Height = $_POST['height_female'];
    $Model_Waist = $_POST['waist_female'];
    $Model_Dress = $_POST['dress_size_female'];
    $Model_Hip = $_POST['hip_size_female'];
    $Model_Chest = $_POST['chest_size_female'];
    $Model_Cup = $_POST['cup_size_female'];
    $Model_Shoe = $_POST['shoe_size_female'];
    $Model_Eyes = $_POST['eyes_female'];
    $Model_Hair = $_POST['hair_female'];
    $Model_Ethnicity = $_POST['ethnicity_female'];
}

$Model_Content['country'] = $_POST['country'];
$Model_Content['state'] = $_POST['state'];
$Model_Content['zip_code'] = $_POST['zip_code'];
$Model_Content['metro'] = $_POST['metro'];
$Model_Content['social']['instagram'] = $_POST['instagram'];
$Model_Content['phone'] = $_POST['phone'];
$Model_Content['representationState'] = $_POST['representationState'];
$Model_Content['previous_representation_company'] = $_POST['previous_representation_company'];
$Model_Content['representation_company'] = $_POST['representation_company'];
$Model_Content['representation_name'] = $_POST['representation_name'];
$Model_Content['representation_email'] = $_POST['representation_email'];
$Model_Content['guardian_full_name'] = $_POST['guardian_full_name'];
$Model_Content['guardian_phone'] = $_POST['guardian_phone'];
$Model_Content['guardian_email'] = $_POST['guardian_email'];
$Model_Content['unit_type'] = $_POST['unit_type'];

$Date = strtotime("now");



/////////////////////////////////////// PROCESSES ALL MEDIA UPLOADS \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
$Array["profilepic"]["img"] = $Model_Content["img"];
$ImgArray = CwProfilePic($Array,$files,$Rand);
$Model_Content["img"] = $ImgArray["file"];
if($_POST["img"] != $Model_Content["img"]){
    foreach($files['profilepic'] as $file){
        $ImgName = $file["name"];
    }
    $ImgSrc = $ImgArray["loc"];
    if(is_array($StructureImgSizes)){
        $PostImages = Cw_Img_Resize($Array,$ImgSrc,$StructureImgSizes,$ImgName);
    }
}
$Array["mediafile"]["code"] = $Model_Content["code"];
$Model_Content["code"] = CwMediaFile($Array,$files,$Rand);

// REMOVES ALL AND ANY ILLEGAL CHARACTERS \\
$Model_Url = CharacterRemoval($Model_Url);
$Model_Content['name'] = CommaRemoval($Model_Content['name']);






/////////////////////////// FINALIZE ALL ARRAYS FOR DATABASE UPLOAD \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
$Model_Content = Cw_Filter_Array($Model_Content);
$Model_Other = Cw_Filter_Array($Model_Other);
$Model_Content = serialize($Model_Content); 
$Model_Other = serialize($Model_Other);
$PostImages = serialize($PostImages);


if($Model_Id == ""){
    $Manual_Message = "Cresated Model";
    $PostImages = serialize($PostImages);
    mysql_query("INSERT INTO cw_model(first_name, last_name, bio, gender, email, birthday_month, birthday_day, birthday_year, height, 
    waist, dress_size, hip_size, chest_size, cup_size, shoe_size, eyes, hair, ethnicity, content, other, notes, rand, date, img)  
    VALUES('$Model_First_Name', '$Model_Last_Name',  '$Model_Info', '$Model_Gender', '$Model_Email', '$Model_Birthday_Month', 
    '$Model_Birthday_Day', '$Model_Birthday_Year', '$Model_Height ', '$Model_Waist', '$Model_Dress', '$Model_Hip', 
    '$Model_Chest', '$Model_Cup', '$Model_Shoe', '$Model_Eyes', '$Model_Hair', '$Model_Ethnicity', '$Model_Content', '$Model_Other', 
    '$Model_Notes', '$GalRand', '$Date', '$PostImages' ) ")or die(mysql_error());

// PROCESS GALLERY IMAGE UPLOADS \\
    $query = "SELECT * FROM cw_model WHERE trash='0' AND rand='$Rand'";
    $result = mysql_query($query) or die(mysql_error());
    $row = mysql_fetch_array($result);
    $Album = $row['id'];
	$result = mysql_query("UPDATE images SET album='$Album' WHERE album='$GalRand' AND webid='$WebId'") 
    or die(mysql_error());
	$result = mysql_query("UPDATE articles SET rand='' WHERE id='$Album' AND webid='$WebId'") 
	or die(mysql_error());


}else{
    $query = "SELECT * FROM articles WHERE id='$Article_Id'";
    $result = mysql_query($query) or die(mysql_error());
    $Article = mysql_fetch_array($result);
    $Article = CwOrganize($Article,$Array);
    $Article = Cw_Filter_Array($Article);

// PROCESS GALLERY IMAGE UPLOADS \\
    if($Image_Order != ""){ 
        foreach($Image_Order as $ImageO){
            $ImageId = key($Image_Order);
	        $result = mysql_query("UPDATE images SET list='$ImageO' WHERE id='$ImageId'") 
	        or die(mysql_error());
	        next($Image_Order);
	    }
    }
    if($Image_Url != ""){ 
        foreach($Image_Url as $ImageU){
	    $ImageUId = key($Image_Url);
	    $result = mysql_query("UPDATE images SET url='$ImageU' WHERE id='$ImageUId'") 
	    or die(mysql_error());
	    next($Image_Url);
	    }
    }

// UPDATE THE DATABASE WITH ANY NEW/OLD INFORMATION \\
    $result = mysql_query("UPDATE cw_model SET first_name ='$Model_First_Name' WHERE id='$Model_Id'") 
    or die(mysql_error());
    $result = mysql_query("UPDATE cw_model SET last_name='$Model_Last_Name' WHERE id='$Model_Id'") 
    or die(mysql_error()); 
    $result = mysql_query("UPDATE cw_model SET bio='$Model_Info' WHERE id='$Model_Id'") 
    or die(mysql_error()); 
    $result = mysql_query("UPDATE cw_model SET gender='$Model_Gender' WHERE id='$Model_Id'") 
    or die(mysql_error()); 
    $result = mysql_query("UPDATE cw_model SET email='$Model_Email' WHERE id='$Model_Id'") 
    or die(mysql_error());
    $result = mysql_query("UPDATE cw_model SET birthday_month='$Model_Birthday_Month' WHERE id='$Model_Id'") 
    or die(mysql_error());
    $result = mysql_query("UPDATE cw_model SET birthday_day='$Model_Birthday_Day' WHERE id='$Model_Id'") 
    or die(mysql_error());
    $result = mysql_query("UPDATE cw_model SET birthday_year='$Model_Birthday_Year' WHERE id='$Model_Id'") 
    or die(mysql_error());
    $result = mysql_query("UPDATE cw_model SET height='$Model_Height' WHERE id='$Model_Id'") 
    or die(mysql_error());
    $result = mysql_query("UPDATE cw_model SET waist='$Model_Waist' WHERE id='$Model_Id'") 
    or die(mysql_error());
    $result = mysql_query("UPDATE cw_model SET shoe_size='$Model_Shoe' WHERE id='$Model_Id'") 
    or die(mysql_error());
    $result = mysql_query("UPDATE cw_model SET dress_size='$Model_Dress' WHERE id='$Model_Id'") 
    or die(mysql_error());
    $result = mysql_query("UPDATE cw_model SET hip_size='$Model_Hip' WHERE id='$Model_Id'") 
    or die(mysql_error());
    $result = mysql_query("UPDATE cw_model SET chest_size='$Model_Chest' WHERE id='$Model_Id'") 
    or die(mysql_error());
    $result = mysql_query("UPDATE cw_model SET cup_size='$Model_Cup' WHERE id='$Model_Id'") 
    or die(mysql_error());
    $result = mysql_query("UPDATE cw_model SET eyes='$Model_Eyes' WHERE id='$Model_Id'") 
    or die(mysql_error());
    $result = mysql_query("UPDATE cw_model SET hair='$Model_Hair' WHERE id='$Model_Id'") 
    or die(mysql_error());
    $result = mysql_query("UPDATE cw_model SET ethnicity='$Model_Ethnicity' WHERE id='$Model_Id'") 
    or die(mysql_error());
    $result = mysql_query("UPDATE cw_model SET content='$Model_Content' WHERE id='$Model_Id'") 
    or die(mysql_error());
    $result = mysql_query("UPDATE cw_model SET other='$Model_Other' WHERE id='$Model_Id'") 
    or die(mysql_error());
    $result = mysql_query("UPDATE cw_model SET active='$Model_Active' WHERE id='$Model_Id'") 
    or die(mysql_error());
    $result = mysql_query("UPDATE cw_model SET notes='$Model_Notes' WHERE id='$Model_Id'") 
    or die(mysql_error());

    if(is_array($PostImages)){
        $PostImages = serialize($PostImages);
        $result = mysql_query("UPDATE cw_model SET img='$PostImages' WHERE id='$Model_Id'") 
	or die(mysql_error());
    }
    if(is_array($GalleryRemoval)){
        foreach($GalleryRemoval as $value){
	    $result = mysql_query("UPDATE images SET trash='1' WHERE id='$value'")
	    or die(mysql_error());
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
    $Info["id"] = $Model_Id;
    $Info["type"] = "cw_model";
    Cw_Changes($Info, $Article, $Array);
/////////////////////////////////////////


header("Location: http://$Website_Url_Auth/");
?>