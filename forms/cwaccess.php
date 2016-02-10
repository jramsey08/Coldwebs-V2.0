<?php
// PULLS ALL INFORMATION FROM THE POST REQUEST FOR THE ARTICLE \\
include("forms/logincheck.php");
if($Login == "1"){
	$Article_Type = $_POST["imgtype"];
	$Article_Name = $_POST["name"];
	$Article_Active = $_POST["active"];
	$Article_Content = $_POST["content"];
	$PageIds = $_POST["PageIds"];
	$PageIds = OtarDecrypt($key, $PageIds);
	$Article_Id = $PageIds["article"];

// REMOVES ALL AND ANY ILLEGAL CHARACTERS \\
	$Article_Code = CharacterRemoval($Article_Code);
	$Article_Name = CommaRemoval($Article_Name);
	
	if($Article_Id == ""){
// CREATE A NEW LISTING WITH THE INFORMATION PROVIDED \\
		mysql_query("INSERT INTO cwoptions(type, active, name, content) VALUES('access', '$Article_Active',  '$Article_Name', '$Article_Content') ")or die(mysql_error());
	}else{
// UPDATE THE DATABASE WITH ANY NEW/OLD INFORMATION \\
		$result = mysql_query("UPDATE cwoptions SET name='$Article_Name' WHERE id='$Article_Id'") 
		or die(mysql_error()); 
		$result = mysql_query("UPDATE cwoptions SET content='$Article_Content' WHERE id='$Article_Id'") 
		or die(mysql_error()); 
		$result = mysql_query("UPDATE cwoptions SET active='$Article_Active' WHERE id='$Article_Id'") 
		or die(mysql_error()); 
	}

	$REDIRECT = "admin/CwAccess";
	$Domain = $Array["siteinfo"]["domain"];
	header("Location: $Domain/$REDIRECT");
}