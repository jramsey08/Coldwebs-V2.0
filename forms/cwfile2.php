<?php
// PULLS ALL INFORMATION FROM THE POST REQUEST FOR THE CWFILE REQUEST \\
include("forms/logincheck.php");
if($Login == "1"){

	$CwFiles = new UploadedFiles($_FILES);
	$row["id"] = "664";

	$Array["galleryupload"]["id"] = $row["id"];
	$Upload = $files["file"];
	CwFileUpload($Array,$CwFiles);

}