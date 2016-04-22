<?php
include("forms/logincheck.php");
if($Login == "1"){
    include("forms/logincheck.php");
    $Id = $_POST["PageIds"];
    $Id = OtarDecrypt($key,$Id);
    $Id = $Id['access'];
    $Rand = rand("0","100000");

    if($UserSiteAccess['grantaccess'] == "1" AND $UserSiteAccess['edituseraccess'] == "1" ){
        $Allow = "1";
    }
    if($Allow == "1"){
        $SiteAccess = $_POST['siteaccess'];
        $SiteAccess = serialize($SiteAccess);
        $Name = $_POST['name'];
        $Active = $_POST['active'];
        $AccessLevel = $_POST['accesslevel'];
        if($Id == ""){
             mysql_query("INSERT INTO cwoptions(name, content, type, category, active) VALUES('$Name', '$SiteAccess', 'useraccess', '$AccessLevel', '$Active')") or                      
             die(mysql_error());
	}else{
            $query = "SELECT * FROM cwoptions WHERE id='$Id'";
            $result = mysql_query($query) or die(mysql_error());
            $row = mysql_fetch_array($result);
            $PrevLevel = $row['category'];
	    if(isset($AccessLevel)){
		$result = mysql_query("UPDATE cwoptions SET category='$AccessLevel' WHERE id='$Id'") 
		or die(mysql_error());
            }
	    if(isset($Active)){
		$result = mysql_query("UPDATE cwoptions SET active='$Active' WHERE id='$Id'") 
		or die(mysql_error());
            }
	    if(isset($Name)){
		$result = mysql_query("UPDATE cwoptions SET name='$Name' WHERE id='$Id'") 
		or die(mysql_error());
            }
	    if(isset($SiteAccess)){
		$result = mysql_query("UPDATE cwoptions SET content='$SiteAccess' WHERE id='$Id'") 
		or die(mysql_error());
	    }
            $query = "SELECT * FROM users";
            $result = mysql_query($query) or die(mysql_error());
            while($row = mysql_fetch_array($result)){
                $row = PbUnSerial($row);
                if($row['info']['access'] == $PrevLevel){
                    if($PrevLevel != "0"){
                        $row['info']['access'] = $AccessLevel;
                    }
                    if($row['info']['siteaccess'] == $PrevAccess){
                        $row['info']['siteaccess'] = $SiteAccess;
                    }
                    $NewInfo = $row['info'];
                    $Result = mysql_query("UPDATE users SET info='$NewInfo' WHERE id='$ow[id]'") 
		    or die(mysql_error());               
	        }
            }
	}
    }
}
$Redirect = "admin/UserAccess";
$Domain = $Array["siteinfo"]["domain"];
header("Location: $Domain/$Redirect");
?>