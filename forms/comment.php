<?php
include("forms/logincheck.php");
if($Login == "1"){
	$Name = $_POST["name"];
	$Email = $_POST["email"];
	$Message = $_POST["message"];
	$Id = $_GET["id"];
	$Redirect = $_POST["redirect"];

	if($Email == ""){
		$Email = $CurrentUser['email'];
		$Name = $CurrentUser['name'];
	}


	$Date = strtotime("now");
	$Content['name'] = $Name;
	$Content['email'] = $Email;
	$Content = serialize($Content); 

	mysql_query("INSERT INTO articles 
	(content,info,category,type,active,date) VALUES('$Content', '$Message', '$Id', 'comment', '1', $Date ) ") 
	or die(mysql_error()); 

}
?>

Success!, Your Message has been Submitted.