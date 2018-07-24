<?php
include("forms/logincheck.php");
if($Login == "1"){

// PULLS ALL INFORMATION FROM THE POST REQUEST FOR THE SUPPLIER \\


	$Article_Content["carrier"] = $_POST["carrier"];
	$Article_Content["date"] = strtotime("now");
	$Article_Content["price"] = $_POST["price"];
	$Article_Content["default"] = $_POST["default"];
	$Default = $_POST["default"];

	$Article_Id = $_POST["id"];
	$Article_Name = $_POST["name"];
	$Article_Type = "shipping";
	$Article_Active = $_POST["active"];
	
	
/////////////////////////////////////// PROCESSES ALL MEDIA UPLOADS \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\


////////////////////////////////// PULL 3RD-PARTY CONTENT INFORMATION \\\\\\\\\\\\\\\\\\\\\\\\\\\\



/////////////////////////////////// SETS DEFAULT VARIABLE VALUES \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\

	if($Article_Url == ""){
		$Article_Url = $Article_Name;
	}

	// REMOVES ALL AND ANY ILLEGAL CHARACTERS \\
	$Article_Url = CharacterRemoval($Article_Url);
	$Article_Name = CommaRemoval($Article_Name);


/////////////////////////////// SOCIAL/3RD PARTY PLATFORMS INTEGRATION \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\

///////////////////////////////////////////////////////////////////////////////////////////////////////



///////////////////// FINALIZE ALL ARRAYS FOR UPLOAD TO DATABASE \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
    $Article_Content = Cw_Filter_Array($Article_Content);
	$Article_Content = serialize($Article_Content); 



	if($Article_Id == ""){
	    $Manual_Message = "Created Delivery Option";
	    
		mysqli_query($CwDb,"INSERT INTO cwoptions(name, type, active, content, webid) 
		VALUES('$Article_Name', '$Article_Type', '$Article_Active',  '$Article_Content', '$WebId') ");

		$query = "SELECT * FROM cwoptions WHERE type='shipping' AND content='$Article_Content' AND name='$Article_Name'";
        $result = mysqli_query($CwDb, $query);
        $RoW = mysqli_fetch_assoc($result);
    	$RoW = CwOrganize($RoW,$Array);
        $Article_Id = $RoW["id"];
		
	}else{
        $query = "SELECT * FROM cwoptions WHERE id='$Article_Id'";
        $result = mysqli_query($CwDb, $query);
        $Article = mysqli_fetch_assoc($result);
    	$Article = CwOrganize($Article,$Array);
        $Article = Cw_Filter_Array($Article);

// UPDATE THE DATABASE WITH ANY NEW/OLD INFORMATION \\
		$result = mysqli_query($CwDb,"UPDATE cwoptions SET name='$Article_Name' WHERE id='$Article_Id' AND webid='$WebId'") 
		or die(mysqli_error()); 
		$result = mysqli_query($CwDb,"UPDATE cwoptions SET active='$Article_Active' WHERE id='$Article_Id' AND webid='$WebId'") 
		or die(mysqli_error()); 
		$result = mysqli_query($CwDb,"UPDATE cwoptions SET content='$Article_Content' WHERE id='$Article_Id' AND webid='$WebId'") 
		or die(mysqli_error()); 
	}
	
    $query = "SELECT * FROM settings WHERE type='shipping'";
    $result = mysqli_query($CwDb, $query);
    $Setting = mysqli_fetch_assoc($result);
    $Setting = CwOrganize($Setting,$Array);
    $Content = $Setting["content"];
    if($Default == "1"){
        if($Setting["id"] == ""){
            $Content["post"] = $Article_Id;
            $Content = serialize($Content);
            mysqli_query($CwDb,"INSERT INTO settings(name, content, api, webid, def, type, active, trash) 
    		VALUES('Default Delivery', '$Content', '',  '$WebId', '1', 'shipping', '1', '0') ");
        }else{
            if($Content["post"] != $Article_Id){
                $Query = "SELECT * FROM cwoptions WHERE type='shipping' AND id!='$Article_Id'";
                $Result = mysqli_query($CwDb, $query);
                while($Row = mysqli_fetch_assoc($Result)){
                    $Row = CwOrganize($Row,$Array);                
                    $Update = $Row["content"];
                    $Update["default"] = "0";
                    $Update = serialize($Update);
                    $ResulT = mysqli_query($CwDb,"UPDATE cwoptions SET content='$Update' WHERE id='$Row[id]'");
                }
                $Content["post"] = $Article_Id;
                $Content = serialize($Content);
                $result = mysqli_query($CwDb,"UPDATE settings SET content='$Content' WHERE type='shipping' AND webid='$WebId'"); 
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
    $Info["type"] = "cwoptions";
    Cw_Changes($Info, $Article, $Array);
/////////////////////////////////////////

	header("Location: http://$Website_Url_Auth/admin/Ecommerce-Delivery");

}
?>