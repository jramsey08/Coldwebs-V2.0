<?php
include("forms/logincheck.php");
if($Login == "1"){
	include("forms/logincheck.php");
	$Id = $_POST["PageIds"];
	$Id = OtarDecrypt($key,$Id);
	$Id = $Id['user'];

	if($CurrentAdmin == $Id){
		$Allow = "1";
	}else{
		if($Current_Access <= "2"){
			$Allow = "1";
		}
	}
	$Rand = rand("0","100000");

	if($Allow == "1"){
		$files = new UploadedFiles($_FILES);
		$FullName = $_POST['name'];
		$SplitName = explode(" ",$FullName);

		$Info['lastname'] = $_POST["lastname"];
		$Info['firstname'] = $_POST["firstname"];
		$Info['access'] = $_POST["access"];
		$Info['status'] = $_POST["status"];
		$Info['siteaccess'] = $_POST['siteaccess'];
		$Img = $_POST['img'];

		$Array["profilepic"]["img"] = $Img;
		$ImgArray = CwProfilePic($Array,$files,$Rand);
		$Info['img'] = $ImgArray["file"];


		$Array['mediafile']['code'] = $Info['code'];
		$Info['code'] = CwMediaFile($Array,$files,$Rand);
		if($Info['firstname'] == ""){
			$Info['firstname'] = $SplitName['0'];
		}
		if($Info['lastname'] == ""){
			$Info['lastname'] = $SplitName['1'];
		}
		$Info = serialize($Info);
		
		$Other['social'] = $_POST["social"];
		$Other = serialize($Other);
			
		$Email = $_POST["email"];
		$Username = $_POST["username"];
		$pword = $_POST["pword"];
		if($pword['1'] == "" OR $pword['2'] == ""){
		}else{
			if($pword['1'] == $pword['2']){
				$Password = PbEncrypt($key,$pword['1']);
			}else{
				$Password = $_POST['passphrase'];
			}
		}
		if($Id == ""){
			$query = "SELECT * FROM users WHERE email='$Email' OR username='$Username'";
			$result = mysql_query($query) or die(mysql_error());
			$row = mysql_fetch_array($result);

			if($row['email'] != $Email AND $row['username'] != $Username){
				mysql_query("INSERT INTO users
				(name, email, other, info, password, username) VALUES('$FullName', '$Email', '$Other', '$Info', '$Password', '$Username' ) ") 
				or die(mysql_error());
			}else{
				$UserRedir = OtarEncrypt($key,$row['id']);
				$Redirect = "admin/Users/$UserRedir";
			}
		}else{
			if(isset($Info)){
				$result = mysql_query("UPDATE users SET info='$Info' WHERE id='$Id'") 
				or die(mysql_error());
			}
			if(isset($Other)){
				$result = mysql_query("UPDATE users SET other='$Other' WHERE id='$Id'") 
				or die(mysql_error());
			}
			if(isset($Password)){
				$result = mysql_query("UPDATE users SET password='$Password' WHERE id='$Id'") 
				or die(mysql_error());
			}
			if(isset($Username)){
				$result = mysql_query("UPDATE users SET username='$Username' WHERE id='$Id'") 
				or die(mysql_error());
			}
			if(isset($FullName)){
				$result = mysql_query("UPDATE users SET name='$FullName' WHERE id='$Id'") 
				or die(mysql_error());
			}
			if(isset($Email)){
				$result = mysql_query("UPDATE users SET email='$Email' WHERE id='$Id'") 
				or die(mysql_error());
			}
			$Redirect = "admin/Users";
		}
	}
	if($Redirect == ""){
		$Redirect = "admin/Users";
	}
	$Domain = $Array["siteinfo"]["domain"];
	header("Location: $Domain/$Redirect");

}
?>