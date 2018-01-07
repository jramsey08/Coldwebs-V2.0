<?php
include("forms/logincheck.php");
if($Login == "1"){
	$AttId = OtarDecrypt($key,$_POST['id']);
	$AttId = $AttId['article'];

	if($AttId == ""){
		$query = "SELECT * FROM cwoptions WHERE type='$_POST[type]' AND category='$_POST[category]' AND name='$_POST[name]' AND webid='$WebId'";
		$result = mysql_query($query) or die(mysql_error());
		$row = mysql_fetch_array($result);
		if($row['id'] == ""){
			mysql_query("INSERT INTO cwoptions
			(type, category, name, list, webid) VALUES('$_POST[type]', '$_POST[category]', '$_POST[name]', '$_POST[list]', '$WebId' ) ") 
			or die(mysql_error()); 
		}else{
			if($row['active'] == "0"){
				$result = mysql_query("UPDATE cwoptions SET active='1' WHERE id='$row[id]' AND webid='$WebId'")
				or die(mysql_error());
			}
			if($row['trash'] == "1"){
				$result = mysql_query("UPDATE cwoptions SET trash='0' WHERE id='$row[id]' AND webid='$WebId'")
				or die(mysql_error());
			}
		}
	}else{
	   $query = "SELECT * FROM cwoptions WHERE id='$AttId'";
    	$result = mysql_query($query) or die(mysql_error());
    	$Article = mysql_fetch_array($result);
    	$Article = CwOrganize($Article,$Array);
        $Article = Cw_Filter_Array($Article);
            
		$result = mysql_query("UPDATE cwoptions SET active='$_POST[active]' WHERE id='$AttId' AND webid='$WebId'")
		or die(mysql_error());
		$result = mysql_query("UPDATE cwoptions SET category='$_POST[category]' WHERE id='$AttId' AND webid='$WebId'")
		or die(mysql_error());
		$result = mysql_query("UPDATE cwoptions SET name='$_POST[name]' WHERE id='$AttId' AND webid='$WebId'")
		or die(mysql_error());
		$result = mysql_query("UPDATE cwoptions SET list='$_POST[list]' WHERE id='$AttId' AND webid='$WebId'")
		or die(mysql_error());
	}

// TRACKS CHANGES MADE FROM USERS \\
    $Info = array();
    $Info["webid"] = $WebId;
    $Info["user"] = $Current_Admin_Id;
    $Info["error"] = $error;
    $Info["tracker"] = $Load_Sess;
    $Info["id"] = $AttId;
    $Info["type"] = "cwoptions";
    Cw_Changes($Info, $Article, $Array);
/////////////////////////////////////////

	header("Location: http://$Website_Url_Auth/admin/Attributes");
}
?>