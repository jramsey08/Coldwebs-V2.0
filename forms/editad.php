<?php
// PULLS ALL INFORMATION FROM THE POST REQUEST FOR THE CWFILE REQUEST \\
include("forms/logincheck.php");
if($Login == "1"){

	$REDIRECT = $_POST['redirect'];
	$Articles = $_POST['edit'];
	$Array['pbaccess'] = $PB_Access;

	if(is_array($Articles)){

		if($Get_Id == "delete"){
			foreach($Articles as $value){
				$result = mysql_query("UPDATE cw_ads SET trash='1' WHERE id='$value'") 
				or die(mysql_error());
				$query = "SELECT * FROM cw_ads WHERE id='$value'";
				$result = mysql_query($query) or die(mysql_error());
				$row = mysql_fetch_array($result);
				$row['active'] = "0";
				$row['trash'] = "1";
				$row['domain'] = $Website_Url_Auth;
				Cw_Update_Ad($row,$Array);
			}
		}

		if($Get_Id == "active"){
			foreach($Articles as $value){
				$result = mysql_query("UPDATE cw_ads SET active='1' WHERE id='$value'") 
				or die(mysql_error());
				$result = mysql_query($query) or die(mysql_error());
				$row = mysql_fetch_array($result);
				$row['active'] = "1";
				$row['trash'] = "0";
				$row['domain'] = $Website_Url_Auth;
				Cw_Update_Ad($row,$Array);
			}
		}

		if($Get_Id == "inactive"){
			foreach($Articles as $value){
				$result = mysql_query("UPDATE cw_ads SET active='0' WHERE id='$value'") 
				or die(mysql_error());
				$result = mysql_query($query) or die(mysql_error());
				$row = mysql_fetch_array($result);
				$row['active'] = "0";
				$row['trash'] = "0";
				$row['domain'] = $Website_Url_Auth;
				Cw_Update_Ad($row,$Array);
			}
		}
	}


	header("Location: $REDIRECT");

}