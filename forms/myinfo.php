<?php
include("forms/logincheck.php");
if($Login == "1"){
	$Id = OtarDecrypt($key,$_POST['user']);

	if($Current_Admin_Id == $Id){
	    $Allow = "1";
	}
	$Rand = rand("0","100000");


	if($Allow == "1"){
        $LastName = $_POST["lastname"];
		$FirstName = $_POST["firstname"];
		$files = new UploadedFiles($_FILES);
		$FullName = $_POST['name'];
		$SplitName = explode(" ",$FullName);
		
        if($FirstName == ""){
		    $FirstName = $SplitName['0'];
	    }
		if($LastName == ""){
			$LastName = $SplitName['1'];
		}
		
        $query = "SELECT * FROM users WHERE id='$Id' AND webid='$WebId'";
        $result = mysqli_query($CwDb,$query) or die(mysqli_error());
        $Article = mysqli_fetch_assoc($result);
        $Article = CwOrganize($Article,$Array);
        $Info = $Article['info'];
        $Article = Cw_Filter_Array($Article);
        
        
        if($_POST["ref"] == "my-info"){
            $Info['dob'] = $_POST["dob"];
		    $Img = $_POST['img'];
		    $Array["profilepic"]["img"] = $Img;
		    $ImgArray = CwProfilePic($Array,$files,$Rand);
		    $Info['img'] = $ImgArray["file"];
		    $pword = $_POST["pword"];
		    if($pword['1'] != "" OR $pword['2'] != ""){
		        if($pword['1'] == $pword['2']){
	                    $Password = PbEncrypt($key,$pword['1']);
		        }
		    }
            if($CustomerLogin == "1"){
                $Redirect = "My-Info";
            }else{
                $Redirect = "admin/Profile";
            }
        }
        if($_POST["ref"] == "my-address"){
            $Info['address'] = $_POST["address"];
            $Info['homephone'] = $_POST["homephone"];
            $Info['fax'] = $_POST["fax"];
            $Info['telephone'] = $_POST["telephone"];
            $Info['mobilephone'] = $_POST["mobilephone"];
            $Info['notes'] = $_POST["notes"];
            $Info['company'] = $_POST["company"];
            $Redirect = "My-Address";
        }
        
        $Info["firstname"] = $FirstName;
        $Info["lastname"] = $LastName;
        $Info = serialize($Info);
        if(isset($Info)){
		$result = mysqli_query($CwDb,"UPDATE users SET info='$Info' WHERE id='$Id' AND webid='$WebId'") or die(mysqli_error());
		}
		
		if(isset($Password)){
			$result = mysqli_query($CwDb,"UPDATE users SET password='$Password' WHERE id='$Id' AND webid='$WebId'") or die(mysqli_error());
		}
		
		if(isset($FullName)){
			$result = mysqli_query($CwDb,"UPDATE users SET name='$FullName' WHERE id='$Id' AND webid='$WebId'") or die(mysqli_error());
		}

	}
	
// TRACKS CHANGES MADE FROM USERS \\
    $Change = array();
    $Change["webid"] = $WebId;
    $Change["user"] = $Id;
    $Change["error"] = $error;
    $Change["tracker"] = $Load_Sess;
    $Change["id"] = $Id;
    $Change["type"] = "users";
    Cw_Changes($Change, $Article, $Array);
/////////////////////////////////////////
	header("Location: http://$Website_Url_Auth/$Redirect");

}
?>