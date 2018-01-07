<?php
include("api/coldwebs/cwads/config/functions.php");
$Get_Width = $width;
$Get_Height = $height;
$Get_User = $User;
$Get_Session = $Session_Id;
$Get_Url = $TrackerPage;
$NowDate = strtotime("now");
$Cw_Ads_Limit = $Ad_Arr['ads_limit'] - "1";
$Ad_File = $Ad_Arr['ads_file'];

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


if($Ad_Other['usetitle'] != "1"){
    $Ad_Name = "ADVERTISEMENT";
}


$Ad_Static = "1";

if($Ad_Static == "1"){
    $query = "SELECT * FROM cw_ads WHERE height='$Height' AND width='$Width' AND location='$Location' AND active='1' AND trash='0' AND id!='$Limit_Id' AND webid='$WebId' ORDER BY rand()";
}else{
    $query = "SELECT * FROM cw_ads WHERE height='$Height' AND width='$Width' AND location='xxx' AND active='1' AND trash='0' AND id!='$Limit_Id' AND webid='$WebId' ORDER BY rand()";
}
$result = mysql_query($query) or die(mysql_error());
$row = mysql_fetch_array($result);
$row = CwOrganize($row,$Array);
if($row['id'] == ""){
    if($Ad_Static == "1"){
        $query = "SELECT * FROM cw_ads WHERE height='xxx' AND width='xxx' AND location='$Location' AND active='1' AND trash='0' AND id!='$Limit_Id' AND webid='$WebId' ORDER BY rand()";
    }else{
        $query = "SELECT * FROM cw_ads WHERE height='xxx' AND width='xxx' AND location='xxx' AND active='1' AND trash='0' AND id!='$Limit_Id' AND webid='$WebId' ORDER BY rand()";
    }
    $result = mysql_query($query) or die(mysql_error());
    $row = mysql_fetch_array($result);
    $row = CwOrganize($row,$Array);
}

$row = PbUnserial($row);
$Ad_Img = $row['img'];
$Ad_Name = $row['name'];
$Ad_Type = $row['type'];
$Ad_Other = $row['other'];
$Ad_Code = $row['content'];
$Ad_Url = $Ad_Other['url'];
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
    $querY = "SELECT * FROM images WHERE album='$Ad_Id' and gallery='ads' AND trash='0' AND active='1' AND webid='$WebId' ORDER BY list";
    $resulT = mysql_query($querY) or die(mysql_error());
    while($roW = mysql_fetch_array($resulT)){
        $Count = $Count + 1;
        if($Ad_File == "1"){ 
            $Ad_Content["$Count"] = $roW['img'];
        }else{ 
            if($Ad_Arr['urlseperate'] == "1"){ 
                $Ad_Content["$Count"]['img'] = "$roW[img]";
                $Ad_Content["$Count"]['url'] = "http://$_SERVER[HTTP_HOST]/coldwebs/api/cwads/redirect.php?adid=$Ad_Id&img=$roW[id]";
            }else{
                $Ad_Content["$Count"] = "<a href='http://$_SERVER[HTTP_HOST]/coldwebs/api/cwads/redirect.php?adid=$Ad_Id&img=$roW[id]' target='_blank'><img src='$roW[img]' class='Cw_Ads_Img' height='$Manual_Height' width='$Manual_Width' ></a>";
            }
        }
    } 
    if($Ad_Content == ""){ 
        if($Ad_Arr['urlseperate'] == "1"){
            $Ad_Content['img'] = "$Ad_Img";
            $Ad_Content['url'] = "http://$_SERVER[HTTP_HOST]/api/coldwebs/cwads/redirect.php?adid=$Ad_Id";
        }else{
            $Ad_Content = "<a href='http://$_SERVER[HTTP_HOST]/api/coldwebs/cwads/redirect.php?adid=$Ad_Id' target='_blank'><img src='$Ad_Img' height='$Manual_Height' width='$Manual_Width'></a>";
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
$result = mysql_query("UPDATE cw_ads SET hits='$New_Hits' WHERE id='$Ad_Id' AND webid='$WebId'") 
or die(mysql_error());
$result = mysql_query("UPDATE cw_ads SET clicks='$New_Clicks' WHERE id='$Ad_Id' AND webid='$WebId'") 
or die(mysql_error());

if($Max_Hits == ""){
    $Max_Hits = $New_Hits + "1";
}

if($row['adlimit'] != "none"){
    if($row['adlimit'] == "views"){
        if($$Ad_Hits != "xxx"){
	    if($New_Hits >= $Max_Hits){
	        if($Ad_User != "coldwebs"){
		    $result = mysql_query("UPDATE cw_ads SET active='0' WHERE id='$Ad_Id' AND webid='$WebId'") 
		    or die(mysql_error());
		}
	    }
	}
    }
    if($row['adlimit'] == "date"){
        if($Ad_Date != "xxx"){
	    if($Max_Time < $NowDate){
	        if($Ad_User != "coldwebs"){
		    $result = mysql_query("UPDATE cw_ads SET active='0' WHERE id='$Ad_Id' AND webid='$WebId'") 
		    or die(mysql_error());
		}
	    }
	}
    }
    if($row['adlimit'] == "clicks"){
        if($Ad_Date != "xxx"){
	    if($New_Clicks >= $Max_Clicks){
	        if($Ad_User != "coldwebs"){
		    $result = mysql_query("UPDATE cw_ads SET active='0' WHERE id='$Ad_Id' AND webid='$WebId'") 
		    or die(mysql_error());
		}
	    }
	}
    }
}


if($Ad_Id != ""){
    if(is_array($Ad_Content)){
        if($Count != ""){
            $Ad_Content = Rand_Ad_Content($Ad_Content,$Count);
        }
    }
}
if($Ad_Content == ""){ 
        $Ad_Content = "<a href='/CwContact'><img src='/api/coldwebs/cwads/uploads/contactus.jpg' height='300' width='250'></a>";
}
$Request['id'] = $Ad_Id;
$Request['name'] = $Ad_Name;
$Request['content'] = $Ad_Content;
$Request['url'] = $Ad_Url;

?>