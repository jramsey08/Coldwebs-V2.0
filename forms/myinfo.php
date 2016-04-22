<?php
include("forms/logincheck.php");
if($Login == "1"){
	include("forms/logincheck.php");
	$Id = OtarDecrypt($key,$_POST['user']);

	if($Current_Admin == $Id){
	    $Allow = "1";
	}
	$Rand = rand("0","100000");

	if($Allow == "1"){
		$files = new UploadedFiles($_FILES);
		$FullName = $_POST['name'];
		$SplitName = explode(" ",$FullName);

                $query = "SELECT * FROM users WHERE id='$Id'";
	        $result = mysql_query($query) or die(mysql_error());
	        $row = mysql_fetch_array($result);
                $row = PbUnSerial($row);
                $Info = $row['info'];

                if($_POST["ref"] == "my-info"){
                    $Info['dob'] = $_POST["dob"];
		    $Info['last_name'] = $_POST["last_name"];
		    $Info['first_name'] = $_POST["first_name"];
		    $Img = $_POST['img'];
		    $Array["profilepic"]["img"] = $Img;
		    $ImgArray = CwProfilePic($Array,$files,$Rand);
		    $Info['img'] = $ImgArray["file"];
		    if($Info['first_name'] == ""){
		    	$Info['firstname'] = $SplitName['0'];
		    }
		    if($Info['last_name'] == ""){
			$Info['lastname'] = $SplitName['1'];
		    }
		    $pword = $_POST["pword"];
		    if($pword['1'] == "" OR $pword['2'] == ""){
		    }else{
		        if($pword['1'] == $pword['2']){
	                    $Password = PbEncrypt($key,$pword['1']);
		        }
		    }
                    $Redirect = "My-Info";
                }

                if($_POST["ref"] == "my-address"){
                    $Info['address'] = $_POST["address"];
                    $Info['home_phone'] = $_POST["home_phone"];
                    $Info['mobile_phone'] = $_POST["mobile_phone"];
                    $Info['notes'] = $_POST["notes"];
                    $Info['company'] = $_POST["company"];
                    $Redirect = "My-Address";
                }


                $Info = serialize($Info);

	        if(isset($Info)){
			$result = mysql_query("UPDATE users SET info='$Info' WHERE id='$Id'") 
			or die(mysql_error());
		}
		if(isset($Password)){
			$result = mysql_query("UPDATE users SET password='$Password' WHERE id='$Id'") 
			or die(mysql_error());
		}
		if(isset($FullName)){
			$result = mysql_query("UPDATE users SET name='$FullName' WHERE id='$Id'") 
			or die(mysql_error());
		}


	}
	$Domain = $Array["siteinfo"]["domain"];
	header("Location: $Domain/$Redirect");

}
?>