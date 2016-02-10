<?php
include("forms/logincheck.php");
if($Login == "1"){
	$Name = $_POST["name"];
	$Email = $_POST["email"];
	$Subject = $_POST["subject"];
	$Message = $_POST["message"];
	$User = $Current_Admin_Id;
	$Phone = $_POST["phone"];
	$Website = $_POST["website"];
	$Priority = $_POST["priority"];
	$Url = $_POST["url"];

	$Domain = $Array['siteinfo']['domain'];

	if($Priority == ""){ 
		$Priority = "4";
	}

	if($Email == ""){ }else{
		if($Name == ""){ }else{
			if($Message == ""){ }else{
				mysql_query("INSERT INTO messages 
				(name, email, subject, message, user, phone, website, date, priority) VALUES('$Name', '$Email', '$Subject', '$Message', '$User', '$Phone', '$Website', '$Date', '$Priority' ) ") 
				or die(mysql_error()); 
			}
		}
	}


	header("Location: /");
}
?>