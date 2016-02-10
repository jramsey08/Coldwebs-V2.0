<?php
// PULLS ALL INFORMATION FROM THE POST REQUEST FOR THE CWFILE REQUEST \\
include("forms/logincheck.php");
if($Login == "1"){
	$REDIRECT = $_POST['redirect'];
	$Articles = $_POST['edit'];
	
	if(is_array($Articles)){

		if($Get_Id == "delete"){
			foreach($Articles as $value){
				$query = "SELECT * FROM page_template WHERE id='$value'";
				$result = mysql_query($query) or die(mysql_error());
				$row = mysql_fetch_array($result);
				$Other = $row['article'];
				$result = mysql_query("UPDATE page_template SET trash='1' WHERE id='$value'") 
				or die(mysql_error());
				$result = mysql_query("UPDATE articles SET trash='1' WHERE id='$Other'") 
				or die(mysql_error());
			}
		}

		if($Get_Id == "active"){
			foreach($Articles as $value){
				$query = "SELECT * FROM page_template WHERE id='$value'";
				$result = mysql_query($query) or die(mysql_error());
				$row = mysql_fetch_array($result);
				$Other = $row['article'];
				$result = mysql_query("UPDATE page_template SET active='1' WHERE id='$value'") 
				or die(mysql_error());
				$result = mysql_query("UPDATE page_template SET trash='0' WHERE id='$value'") 
				or die(mysql_error());
				$result = mysql_query("UPDATE articles SET active='1' WHERE id='$Other'") 
				or die(mysql_error());
				$result = mysql_query("UPDATE articles SET trash='0' WHERE id='$Other'") 
				or die(mysql_error());

			}
		}

		if($Get_Id == "inactive"){
			foreach($Articles as $value){
				$query = "SELECT * FROM page_template WHERE id='$value'";
				$result = mysql_query($query) or die(mysql_error());
				$row = mysql_fetch_array($result);
				$Other = $row['article'];
				$result = mysql_query("UPDATE page_template SET active='0' WHERE id='$value'") 
				or die(mysql_error());
				$result = mysql_query("UPDATE articles SET active='0' WHERE id='$Other'") 
				or die(mysql_error());
			}
		}

	}
	header("Location: $REDIRECT");

}