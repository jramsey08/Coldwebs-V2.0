<?php
// PULLS ALL INFORMATION FROM THE POST REQUEST FOR THE CWFILE REQUEST \\
include("forms/logincheck.php");
if($Login == "1"){

	$REDIRECT = $_POST['redirect'];
	$Articles = $_POST['edit'];

	if(is_array($Articles)){
		if($Get_Id == "delete"){
			foreach($Articles as $value){
				$result = mysql_query("UPDATE articles SET trash='1' WHERE id='$value'") 
				or die(mysql_error());
				$result = mysql_query("UPDATE images SET trash='1' WHERE album='$value'")
				or die(mysql_error());
			}
		}

		if($Get_Id == "active"){
			foreach($Articles as $value){
				$result = mysql_query("UPDATE articles SET active='1' WHERE id='$value'") 
				or die(mysql_error());
				$result = mysql_query("UPDATE articles SET trash='0' WHERE id='$value'") 
				or die(mysql_error());
				$result = mysql_query("UPDATE images SET trash='0' WHERE album='$value'")
				or die(mysql_error());
			}
		}

		if($Get_Id == "inactive"){
			foreach($Articles as $value){
				$result = mysql_query("UPDATE articles SET active='0' WHERE id='$value'") 
				or die(mysql_error());
			}
		}
	}

	header("Location: $REDIRECT");

}