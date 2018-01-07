<?php
include("forms/logincheck.php");
if($Login == "1"){

// PULLS ALL INFORMATION FROM THE POST REQUEST FOR THE ARTICLE \\
    $Article_Id = $_POST["id"];
    $Article_Type = $_POST["type"];
    $Article_Content = $_POST["content"];
    $Article_Active = $_POST["active"];
    $Article_Name = $_POST["name"];
    $Article_List = $_POST["list"];
    $Article_Category = $_POST["category"];
    $Article_Other = $POST["other"];
    $Article_Access = $_POST["access"];
    $Article_Url = $_POST["url"];
    $Article_Theme = $_POST["theme"];


    $Rand = rand(0,100);
/////////////////////////////////// SETS DEFAULT VARIABLE VALUES \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
    if($Article_Category == ""){
        $Article_Category = "self";
    }
    if($Article_Category == $Article_Id){
        $Article_Category = "self";
    }
    if($Article_Url == ""){   
        if($Article_Category == "self"){
            $Article_Url = "#";
        }else{
            if($Article_Id == ""){
                $query = "SELECT * FROM admin WHERE url ='$Article_Url' AND active='1' AND trash='0' AND webid='$WebId'";
            }else{
                $query = "SELECT * FROM admin WHERE url ='$Article_Url' AND active='1' AND trash='0' AND id!='$Article_Id' AND webid='$WebId'";
            }
            $result = mysql_query($query) or die(mysql_error());
            $row = mysql_fetch_array($result);
            if($row['id'] != ""){
                $Article_Url = $Article_Name . $Rand;
            }else{
                $Article_Url = $Article_Name;
            }
        }
    }

// REMOVES ALL AND ANY ILLEGAL CHARACTERS \\
    $Article_Url = CharacterRemoval($Article_Url);
    $Article_Name = CommaRemoval($Article_Name);

    if($Article_Url == "" OR $Article_Url == "-"){
        $Article_Url = "#";
    }

///////////////////// FINALIZE ALL ARRAYS FOR UPLOAD TO DATABASE \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
    if(is_array($Article_Content)){
        $Article_Content = Cw_Filter_Array($Article_Content);
        $Article_Content = serialize($Article_Content);
    }
    if(is_array($Article_Other)){
        $Article_Other = Cw_Filter_Array($Article_Other);
        $Article_Other = serialize($Article_Other);
    }
        
        
    if($Article_Id == ""){
        $Manual_Message = "Created admin record";

        mysql_query("INSERT INTO admin(type, content, active, name, list, category, other, access, url, theme, webid) VALUES('$Article_Type', '$Article_Content',  '$Article_Active', '$Article_Name', 
        '$Article_List', '$Article_Category','$Article_Other', '$Article_Access', '$Article_Url', '$Article_Theme', '$WebId') ")or die(mysql_error());


    }else{
        
    $query = "SELECT * FROM admin WHERE id='$Article_Id'";
	$result = mysql_query($query) or die(mysql_error());
	$Article = mysql_fetch_array($result);
    $Article = CwOrganize($Article,$Array);
    $Article = Cw_Filter_Array($Article);


// UPDATE THE DATABASE WITH ANY NEW/OLD INFORMATION \\
    $result = mysql_query("UPDATE admin SET type='$Article_Type' WHERE id='$Article_Id'") 
	or die(mysql_error()); 
	$result = mysql_query("UPDATE admin SET content='$Article_Content' WHERE id='$Article_Id' ") 
	or die(mysql_error()); 
	$result = mysql_query("UPDATE admin SET active='$Article_Active' WHERE id='$Article_Id' ") 
	or die(mysql_error()); 
	$result = mysql_query("UPDATE admin SET name='$Article_Name' WHERE id='$Article_Id' ") 
	or die(mysql_error()); 
	$result = mysql_query("UPDATE admin SET list='$Article_List' WHERE id='$Article_Id' ") 
	or die(mysql_error());
	$result = mysql_query("UPDATE admin SET category='$Article_Category' WHERE id='$Article_Id' ") 
	or die(mysql_error());
	$result = mysql_query("UPDATE admin SET other='$Article_Other' WHERE id='$Article_Id' ") 
	or die(mysql_error());
	$result = mysql_query("UPDATE admin SET access='$Article_Access' WHERE id='$Article_Id' ") 
	or die(mysql_error());
	$result = mysql_query("UPDATE admin SET url='$Article_Url' WHERE id='$Article_Id'") 
	or die(mysql_error());
	$result = mysql_query("UPDATE admin SET theme='$Article_Theme' WHERE id='$Article_Id' ") 
	or die(mysql_error());
    }

// TRACKS CHANGES MADE FROM USERS \\
    $Info = array();
    $Info["webid"] = $WebId;
    $Info["user"] = $Current_Admin_Id;
    $Info["error"] = $error;
    $Info["tracker"] = $Load_Sess;
    $Info["manual_message"] = $Manual_Message;
    $Info["id"] = $Article_Id;
    $Info["type"] = "admin";
    Cw_Changes($Info, $Article, $Array);
/////////////////////////////////////////

    $REDIRECT = "admin/Bg-Menu";
    header("Location: http://$Website_Url_Auth/$REDIRECT");
}
?>