<?php
include("forms/logincheck.php");
if($Login == "1"){

	$REDIRECT = $_POST['redirect'];
	$Articles = $_POST['edit'];
	
	if(is_array($Articles)){

		if($Get_Id == "delete"){
			foreach($Articles as $value){
				#$result = mysql_query("UPDATE articles SET trash='1' WHERE id='$value'") 
				#or die(mysql_error());
				#$result = mysql_query("UPDATE images SET trash='1' WHERE album='$value'")
				#or die(mysql_error());
			}
		}

		if($Get_Id == "active"){
			foreach($Articles as $value){
				$Query = "SELECT * FROM users WHERE id='$value'"; 
				$Result = mysql_query($Query) or die(mysql_error());
				$Row = mysql_fetch_array($Result);
				if($Row['info'] == ""){ }else{ $Row['info'] = unserialize($Row['info']); }
				$Info = $Row['info'];
				$Info['status'] = "1";
				$Info = serialize($Info);
				$result = mysql_query("UPDATE users SET info='$Info' WHERE id='$value'") 
				or die(mysql_error());
			}
		}

		if($Get_Id == "limit"){
			foreach($Articles as $value){
				$Query = "SELECT * FROM users WHERE id='$value'"; 
				$Result = mysql_query($Query) or die(mysql_error());
				$Row = mysql_fetch_array($Result);
				if($Row['info'] == ""){ }else{ $Row['info'] = unserialize($Row['info']); }
				$Info = $Row['info'];
				$Info['status'] = "3";
				$Info = serialize($Info);
				$result = mysql_query("UPDATE users SET info='$Info' WHERE id='$value'") 
				or die(mysql_error());
			}
		}

		if($Get_Id == "suspend"){
			foreach($Articles as $value){
				$Query = "SELECT * FROM users WHERE id='$value'"; 
				$Result = mysql_query($Query) or die(mysql_error());
				$Row = mysql_fetch_array($Result);
				if($Row['info'] == ""){ }else{ $Row['info'] = unserialize($Row['info']); }
				$Info = $Row['info'];
				$Info['status'] = "0";
				$Info = serialize($Info);
				$result = mysql_query("UPDATE users SET info='$Info' WHERE id='$value'") 
				or die(mysql_error());
			}
		}

	}

	header("Location: $REDIRECT");

}