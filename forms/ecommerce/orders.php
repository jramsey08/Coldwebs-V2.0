<?php
include("forms/logincheck.php");
if($Login == "1"){


////////////// PULLS ALL INFORMATION FROM THE POST REQUEST FOR THE ARTICLE \\\\\\\\\\\\\\\\\\\\
	$Article_Id = $_POST["id"];
	$Article_Tracking = $_POST["tracking"];
	$Article_Carrier = $_POST["carrier"];
	$Article_Active = $_POST["status"];
	$Article_Notes = $_POST["notes"];
////////////////////////////////////////////////////////////////////////////////////////////////	



//////////////////////////// PULL UN-CHANGED TRANS INFORMATION \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
    $query = "SELECT * FROM trans WHERE id='$Article_Id'";
	$result = mysql_query($query) or die(mysql_error());
	$Article = mysql_fetch_array($result);
	$Article = CwOrganize($Article,$Array);
    $Article = Cw_Filter_Array($Article);
    $Article_Other = $Article["other"];
////////////////////////////////////////////////////////////////////////////////////////////////



/////////////////////////////////// SETS DEFAULT VARIABLE VALUES \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
    $Article_Other["tracking"] = $Article_Tracking;
    $Article_Other["carrier"] = $Article_Carrier;
    $Article_Other["notes"] = $Article_Notes;
////////////////////////////////////////////////////////////////////////////////////////////////



///////////////////// FINALIZE ALL ARRAYS FOR UPLOAD TO DATABASE \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
    $Article_Other = Cw_Filter_Array($Article_Other);
	$Article_Other = serialize($Article_Other);
////////////////////////////////////////////////////////////////////////////////////////////////



//////////////////////  UPDATE THE DATABASE WITH ANY NEW/OLD INFORMATION \\\\\\\\\\\\\\\\\\\\\\
	$result = mysql_query("UPDATE trans SET other='$Article_Other' WHERE id='$Article_Id' AND webid='$WebId'") 
	or die(mysql_error());
	$result = mysql_query("UPDATE trans SET status='$Article_Active' WHERE id='$Article_Id' AND webid='$WebId'") 
	or die(mysql_error());
////////////////////////////////////////////////////////////////////////////////////////////////



//////////////////////////////// TRACKS CHANGES MADE FROM USERS \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
    $Info = array();
    $Info["webid"] = $WebId;
    $Info["user"] = $Current_Admin_Id;
    $Info["error"] = $error;
    $Info["tracker"] = $Load_Sess;
    $Info["manual_message"] = $Manual_Message;
    $Info["id"] = $Article_Id;
    $Info["type"] = "trans";
    Cw_Changes($Info, $Article, $Array);
//////////////////////////////////////////////////////////////////////////////////////////////


	header("Location: http://$Website_Url_Auth/admin/Ecommerce-Orders");

}
?>