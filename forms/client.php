<?php
include("forms/logincheck.php");
if($Login == "1"){
	$Preview = $_REQUEST['preview'];

	$query = "SELECT * FROM articles WHERE active='1' AND trash='0' AND other='$Preview'  AND webid='$WebId'";
	$result = mysqli_query($CwDb,$query) or die(mysql_error());
	$row = mysqli_fetch_assoc($result);

	$_SESSION['previewcode'] = $row['other'];


	header("Location: http://$Website_Url_Auth/Preview");
}
?>