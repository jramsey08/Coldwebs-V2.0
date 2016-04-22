<?php
<<<<<<< HEAD
include("api/cwads/config/functions.php");

$Get_Width = $width;
$Get_Height = $height;
$Get_User = $User;
$Get_Session = $Session_Id;
$Get_Url = $TrackerPage;
$NowDate = strtotime("now");
$Cw_Ads_Limit = $Array['ads_limit'] - "1";
$Ad_File = $Array['ads_file'];

if($Manual_Size == "1"){
    $Height = $Manual_Height;
    $Width = $Manual_Width;
}else{
    $Height = $height;
    $Width = $width;
}

if($Height == "" OR $Height == "res"){
    $Width = "res";
    $Height = "res";
    $Location = "xxx";
}
if($Width == "" OR $Width == "res"){
    $Width = "res";
    $Height = "res";
    $Location = "xxx";
}


if($Ad_Other['usetitle'] == "1"){
     $Ad['name'] = $Ad['name'];
}else{
     $Ad_Name = "ADVERTISEMENT";
}


$Ad_Static = "1";

if($Ad_Static == "1"){
    $query = "SELECT * FROM cw_ads WHERE height='$Height' AND width='$Width' AND location='$Location' AND active='1' AND trash='0' AND id!='$Limit_Id' ORDER BY rand()";
}else{
    $query = "SELECT * FROM cw_ads WHERE height='$Height' AND width='$Width' AND location='xxx' AND active='1' AND trash='0' AND id!='$Limit_Id' ORDER BY rand()";
}
$result = mysql_query($query) or die(mysql_error());
$row = mysql_fetch_array($result);
if($row['id'] == ""){
    if($Ad_Static == "1"){
        $query = "SELECT * FROM cw_ads WHERE height='xxx' AND width='xxx' AND location='$Location' AND active='1' AND trash='0' AND id!='$Limit_Id' ORDER BY rand()";
    }else{
        $query = "SELECT * FROM cw_ads WHERE height='xxx' AND width='xxx' AND location='xxx' AND active='1' AND trash='0' AND id!='$Limit_Id' ORDER BY rand()";
    }
    $result = mysql_query($query) or die(mysql_error());
    $row = mysql_fetch_array($result);
}
=======
#include("api/cwads/config/functions.php");


if($Cw_Ads_Remote == "1"){
    $Get_User = $_GET['user'];
    $Get_Width = $_GET['width'];
    $Get_Height = $_GET['height'];
    $Get_Session = $_GET['session'];
    $Get_Url = $_GET['url'];
    $Website = $_GET['website'];
    $Location = $_GET['location'];
    $Extra = $_GET['extra'];
    $Request_Other = unserialize($_GET['other']);
}else{
    $Get_Width = $width;
    $Get_Height = $height;
    $Website = $Website;
    $Location = $Location;
    $Extra = $Extra;
    $Get_User = $User;
    $Request_Other = unserialize($Other);
    $Get_Session = $Session_Id;
    $Get_Url = $TrackerPage;
}


$Rand = rand(0,4);
$Request_Other['cwadsbg'];
$Request_Other['cwadsraw'];


if($Location == "1"){
    $Rand = "1";
}


$Ad_Control = "1";

if($Ad_Control != "1"){
    $Static_Ad = "1";
}
if($Static_Ad == "1"){
    $Rand = "1";
}


if($Rand != 0){
    $query = "SELECT * FROM cw_ads WHERE height='$Get_Height' AND width='$Get_Width' AND location='$Location' AND active='1' AND trash='0' OR height='xxx' AND width='xxx' AND location='$Location' AND active='1' AND trash='0' OR height='$Get_Height' AND width='$Get_Width' AND location='x' AND active='1' AND trash='0' ORDER BY rand()";
}else{
    $query = "SELECT * FROM cw_ads WHERE height='$Get_Height' AND width='$Get_Width' AND location='x' AND active='1' AND trash='0' ORDER BY rand()";
}
$result = mysql_query($query) or die(mysql_error());
$row = mysql_fetch_array($result);
>>>>>>> origin/master
$row = PbUnserial($row);
$Ad_Img = $row['img'];
$Ad_Name = $row['name'];
$Ad_Type = $row['type'];
$Ad_Other = $row['other'];
<<<<<<< HEAD
$Ad_Code = $row['content'];
=======


$Ad_Code = $row['content'];



>>>>>>> origin/master
$Ad_Website = $row['website'];
$Ad_Promo = $row['promo'];
$Ad_Hits = $row['hits'];
$Ad_Id = $row['id'];
$Ad_Height = $row['height'];
$Ad_Width = $row['width'];
$Ad_User = $row['user'];
$Ad_Limit = $row['adlimit'];
$Ad_Media_Code = $Ad_Other['mediacode'];
$Ad_Media_Code_Type = $Ad_Other['mediacodetype'];
$Manual_Height = $Ad_Other['manualheight'];
$Manual_Width = $Ad_Other['manualwidth'];
$Manual_Size = $Ad_Other['manualsize'];

switch ($Ad_Limit){
<<<<<<< HEAD
    case "clicks":
        $Max_Clicks = $Ad_Other['adclicks'];
	break;
    case "date":
	$Max_Time = $Ad_Other['adtime'];
	break;	
    case "views":
	$Max_Hits = $Ad_Other['adviews'];
	break;	
}

if($Ad_Type == "img"){
    $querY = "SELECT * FROM images WHERE album='$Ad_Id' and gallery='ads' AND trash='0' ORDER BY list";
    $resulT = mysql_query($querY) or die(mysql_error());
    while($roW = mysql_fetch_array($resulT)){
        $Count = $Count + 1;
        if($Ad_File == "1"){
            $Ad_Content["$Count"] = $roW['img'];
        }else{
            $Ad_Content["$Count"] = "<a href='http://$_SERVER[HTTP_HOST]/api/cwads/redirect.php?id=$Ad_Id&img=$roW[id]' height='$Height' width='$Width' target='_blank'><img src='$roW[img]' class='Cw_Ads_Img'></a>";
        }
    }
    if($Ad_Content == ""){
        if($Ad_File == "1"){
            $Ad_Content = $Ad_Img;
        }else{
            $Ad_Content = "<a href='http://$_SERVER[HTTP_HOST]/api/cwads/redirect.php?id=$Ad_Id' height='$Manual_Height' width='$Manual_Width' target='_blank'><img src='$Ad_Img'></a>";
        }
    }else{
        $Count = $Count + 1;
        if($Ad_File == "1"){
            $Ad_Content["$Count"] = $Ad_Img;
        }else{
            $Ad_Content["$Count"] = "<a href='http://$_SERVER[HTTP_HOST]/api/cwads/redirect.php?id=$Ad_Id' height='$Manual_Height' width='$Manual_Width' target='_blank'><img src='$Ad_Img'></a>";
        }
    }
}else{
    $Ad_Media_Code_Type = "cw_" . $Ad_Media_Code_Type;
    if(function_exists($Ad_Media_Code_Type)){
        if($Ad_Width == "xxx" AND $Ad_Height == "xxx"){
            $Ad_Content = $Ad_Media_Code_Type($Ad_Media_Code,$Width,$Height,$Autoplay);
        }else{
	    $Ad_Content = $Ad_Media_Code_Type($Ad_Media_Code,$Ad_Width,$Ad_Height,$Autoplay);
        }
    }
}

$New_Hits = $Ad_Hits + 1;
$New_Clicks = $Ad_Clicks + 1;
$result = mysql_query("UPDATE cw_ads SET hits='$New_Hits' WHERE id='$Ad_Id'") 
or die(mysql_error());
$result = mysql_query("UPDATE cw_ads SET clicks='$New_Clicks' WHERE id='$Ad_Id'") 
or die(mysql_error());

if($Max_Hits == ""){
    $Max_Hits = $New_Hits + "1";
}

if($row['adlimit'] != "none"){
    if($row['adlimit'] == "views"){
        if($$Ad_Hits != "xxx"){
	    if($New_Hits >= $Max_Hits){
	        if($Ad_User != "coldwebs"){
		    $result = mysql_query("UPDATE cw_ads SET active='0' WHERE id='$Ad_Id'") 
		    or die(mysql_error());
		}
	    }
	}
    }
    if($row['adlimit'] == "date"){
        if($Ad_Date != "xxx"){
	    if($Max_Time < $NowDate){
	        if($Ad_User != "coldwebs"){
		    $result = mysql_query("UPDATE cw_ads SET active='0' WHERE id='$Ad_Id'") 
		    or die(mysql_error());
		}
	    }
	}
    }
    if($row['adlimit'] == "clicks"){
        if($Ad_Date != "xxx"){
	    if($New_Clicks >= $Max_Clicks){
	        if($Ad_User != "coldwebs"){
		    $result = mysql_query("UPDATE cw_ads SET active='0' WHERE id='$Ad_Id'") 
		    or die(mysql_error());
		}
	    }
	}
    }
}

if($Ad_Id != ""){
    if(is_array($Ad_Content)){
        $Ad_Content = Rand_Ad_Content($Ad_Content,$Count);
    }
    if($Ad_Content == ""){
        $Ad_Content = "<a href='/Contact-Us'><img src='http://www.comedy-festivals.co.uk/wp-content/uploads/2012/06/advertise-here.jpg' height='300' width='250'></a>";
    }
}
$Request['id'] = $Ad_Id;
$Request['name'] = $Ad_Name;
$Request['content'] = $Ad_Content;
=======
	case "clicks":
		$Max_Hits = $Ad_Other['adclicks'];
		break;
	case "date":
		$Max_Time = $Ad_Other['adtime'];
		break;	
	case "views":
		$Max_Hits = $Ad_Other['adviews'];
		break;	
}

if($Request_Other['cwadsbg'] != "1"){
	if($Ad_Id == ""){
		$query = "SELECT * FROM cw_ads WHERE active='1' AND trash='0' AND height='res' AND width='res' ORDER BY rand()";
		$result = mysql_query($query) or die(mysql_error());
		$row = mysql_fetch_array($result);
		$row = PbUnserial($row);
			$Ad_Img = $row['img'];
			$Ad_Type = $row['type'];




			$Ad_Code = $row['content'];




			$Ad_Website = $row['website'];
			$Ad_Id = $row['id'];
			$Ad_Height = $row['height'];
			$Ad_Width = $row['width'];
			$Ad_Promo = $row['promo'];
			$Ad_Hits = $row['hits'];
			$General_Size = '1';
			$Ad_User = $row['user'];
			$Ad_Other = $row['other'];
			$Ad_Media_Code = $Ad_Other['mediacode'];
			$Ad_Media_Code_Type = $Ad_Other['mediacodetype'];
			$Max_Hits = $Ad_Other['hits'];
	}
}

if($Extra == "1"){








	if($Request_Other['cwadsraw'] == "1"){
		 echo $Ad_Img;
	}else{
		if($Ad_Name == ""){
			$Ad_Name = "ADVERTISEMENT";
		}
		$Ads_Extra['name'] = $Ad_Name;
		$Ads_Extra['id'] = $Ad_Id;
		if($Ad_Type == "img"){
			if($Ad_Promo == "1"){
				if($Manual_Size == "1"){
					$Ads_Extra['content'] = "<a href='http://www.Promoterblast.com/Advertise/$Get_User' height='$Manual_Height' width='$Manual_Width' target='_blank'><img src='$Ad_Img'></a>";
				}else{
					$Ads_Extra['content'] = "<a href='http://www.Promoterblast.com/Advertise/$Get_User' target='_blank'><img src='$Ad_Img'></a>";
				}
			}else{
				if($Manual_Size == "1"){
					$Ads_Extra['content'] = "<a href='http://www.parallelmagz.com/api/cwads/adsredirect.php?id=$Ad_Id' height='$Manual_Height' width='$Manual_Width' target='_blank'><img src='$Ad_Img'></a>";
				}else{
					$Ads_Extra['content'] = "<a href='http://www.parallelmagz.com/api/cwads/adsredirect.php?id=$Ad_Id' target='_blank'><img src='$Ad_Img'></a>";
				}
			}
		    $querY = "SELECT * FROM images WHERE album='$Ad_Id' and gallery='ads' AND trash='0' ORDER BY list";
		    $resulT = mysql_query($querY) or die(mysql_error());
		    while($roW = mysql_fetch_array($resulT)){
	                $Count = $Count + 1;
		        $Images["$Count"] = $roW;
		    }
		    $Ads_Extra['images'] = $Images;
		    $Ads_Extra['type'] = "img";
		}else if($Ad_Type == "video"){
		          #$Ad_Media_Code_Type = "cw_" . $Ad_Media_Code_Type;	        
                          $Ads_Extra['media_code'] = $Ad_Media_Code;
                          $Ads_Extra['media_code_type'] = $Ad_Media_Code_Type;
		      }
		    $Ads_Extra['type'] = "video";
		
		if($Ad_Other['usetitle'] == "1"){
		    $Ads_Extra['name'] = $Ads_Extra['name'];
		}else{
		    $Ads_Extra['name'] = "";
		}
		#return $Ads_Extra;
	
	}

	
	
}else{
	if($Ad_Type == "img"){
		if($Ad_Promo == "1"){
			if($Manual_Size == "1"){
?>
				<a href="http://www.Promoterblast.com/Advertise/<?php echo $Get_User; ?>" target="_blank"><img src="<?php echo $Ad_Img; ?>" height="<?php echo $Manual_Height; ?>" width="<?php echo $Manual_Width; ?>"></a>
<?php
			}else{
?>
				<a href="http://www.Promoterblast.com/Advertise/<?php echo $Get_User; ?>" target="_blank"><img src="<?php echo $Ad_Img; ?>" height="<?php if($Ad_Height != ""){ echo $Ad_Height; } ?>" width="<?php if($Ad_Width!= ""){  echo $Ad_Width; } ?>"></a>
<?php
			}	
		}else{
			if($Manual_Size == "1"){
?>
				<a href="http://www.parallelmagz.com/api/cwads/adsredirect.php?id=<?php echo $Ad_Id; ?>" target="_blank"><img src="<?php echo $Ad_Img; ?>" height="<?php echo $Manual_Height; ?>" width="<?php echo $Manual_Width; ?>"></a>
<?php
			}else{
?>			
				<a href="http://www.parallelmagz.com/api/cwads/adsredirect.php?id=<?php echo $Ad_Id; ?>" target="_blank"><img src="<?php echo $Ad_Img; ?>" height="<?php if($Ad_Height != ""){ echo $Ad_Height; } ?>" width="<?php  if($Ad_Width!= ""){ echo $Ad_Width; } ?>"></a>
<?php
			}
		}
	}else{
	       $Ad_Media_Code_Type = "cw_" . $Ad_Media_Code_Type;
		if(function_exists($Ad_Media_Code_Type)){
			if($Ad_Width == "xxx" AND $Ad_Height == "xxx"){
				$Ad_Media_Code_Type($Ad_Media_Code,$Ad_Width,$Ad_Height);
			}else{
				$Ad_Media_Code_Type($Ad_Media_Code,$Ad_Width,$Ad_Height);
			}
		}else{
			echo $Ad_Code;
		}
	}
}





$New_Hits = $Ad_Hits + 1;
$result = mysql_query("UPDATE cw_ads SET hits='$New_Hits' WHERE id='$Ad_Id'") 
or die(mysql_error());

if($Max_Hits == ""){
    $Max_Hits = New_Hits + "1";
}

if($row['adlimit'] != "none"){

	if($row['adlimit'] == "views"){
		if($$Ad_Hits != "xxx"){
			if($New_Hits >= $Max_Hits){
				if($Ad_User != "coldwebs"){
					$result = mysql_query("UPDATE pb_ads SET active='0' WHERE id='$Ad_Id'") 
					or die(mysql_error());
				}
			}
		}
	}
	if($row['adlimit'] == "date"){
		if($$Ad_Date != "xxx"){
			#if($New_Hits >= $Max_Hits){
				#if($Ad_User != "coldwebs"){
					#$result = mysql_query("UPDATE pb_ads SET active='0' WHERE id='$Ad_Id'") 
					#or die(mysql_error());
				#}
			#}
		}
	}
}


$Request_Other = serialize($Request_Other);

>>>>>>> origin/master

?>