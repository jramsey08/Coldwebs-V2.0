<?php
include("forms/logincheck.php");
if($Login == "1"){
	$AttId = OtarDecrypt($key,$_POST['id']);
	$AttId = $AttId['article'];

	if($AttId == ""){
		$query = "SELECT * FROM cwoptions WHERE type='$_POST[type]' AND category='$_POST[category]' AND name='$_POST[name]' AND webid='$WebId'";
		$result = mysqli_query($CwDb,$query) or die(mysqli_error());
		$Att = mysqli_fetch_assoc($result);
		$AttId = $Att["id"];
		if($AttId == ""){
		    $Manual_Message = "Created Product Attribute";
			mysqli_query($CwDb,"INSERT INTO cwoptions
			(type, category, name, list, webid) VALUES('$_POST[type]', '$_POST[category]', '$_POST[name]', '$_POST[list]', '$WebId' ) ") or die(mysqli_error()); 
			$query = "SELECT * FROM cwoptions WHERE type='$_POST[type]' AND category='$_POST[category]' AND name='$_POST[name]' AND webid='$WebId'";
		    $result = mysqli_query($CwDb,$query) or die(mysqli_error());
		    $Att = mysqli_fetch_assoc($result);
		    $AttId = $Att["id"];
		}else{
		    $Manual_Message = "Updated Product Attribute";
			if($row['active'] == "0"){
				$result = mysqli_query($CwDb,"UPDATE cwoptions SET active='1' WHERE id='$row[id]' AND webid='$WebId'")or die(mysqli_error());
			}
			if($row['trash'] == "1"){
				$result = mysqli_query($CwDb,"UPDATE cwoptions SET trash='0' WHERE id='$row[id]' AND webid='$WebId'")or die(mysqli_error());
			}
		}
	}else{
	    $Manual_Message = "Updated Product Attribute";
	    $query = "SELECT * FROM cwoptions WHERE id='$AttId'";
    	$result = mysqli_query($CwDb,$query) or die(mysqli_error());
    	$Article = mysqli_fetch_assoc($result);
    	$Article = CwOrganize($Article,$Array);
        $Article = Cw_Filter_Array($Article);
            
		$result = mysqli_query($CwDb,"UPDATE cwoptions SET active='$_POST[active]' WHERE id='$AttId' AND webid='$WebId'")or die(mysqli_error());
		$result = mysqli_query($CwDb,"UPDATE cwoptions SET category='$_POST[category]' WHERE id='$AttId' AND webid='$WebId'")or die(mysqli_error());
		$result = mysqli_query($CwDb,"UPDATE cwoptions SET name='$_POST[name]' WHERE id='$AttId' AND webid='$WebId'")or die(mysqli_error());
		$result = mysqli_query($CwDb,"UPDATE cwoptions SET list='$_POST[list]' WHERE id='$AttId' AND webid='$WebId'")or die(mysqli_error());
	}

// TRACKS CHANGES MADE FROM USERS \\
    $Info = array();
    $Info["webid"] = $WebId;
    $Info["user"] = $Current_Admin_Id;
    $Info["error"] = $error;
    $Info["tracker"] = $Load_Sess;
    $Info["manual_message"] = $Manual_Message;
    $Info["id"] = $AttId;
    $Info["type"] = "cwoptions";
    Cw_Changes($Info, $Article, $Array);
/////////////////////////////////////////

	header("Location: http://$Website_Url_Auth/admin/ECommerce-Attributes");
}
?>