<?php
include("forms/logincheck.php");
if($Login == "1"){
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
            $Manual_Message = "Created User Access";
            Cw_Query("INSERT INTO cwoptions(name, content, type, category, active, webid) VALUES('$Name', '$SiteAccess', 'useraccess', '$AccessLevel', '$Active', '$WebId')");
    	}else{
            $row = Cw_Fetch("SELECT * FROM cwoptions WHERE id='$Id' AND webid='$WebId'",$Array);
            $PrevLevel = $row['category'];
    		$Article = $row;
            $Article = Cw_Filter_Array($Article);
    	    if(isset($AccessLevel)){
    		    $result = Cw_Query("UPDATE cwoptions SET category='$AccessLevel' WHERE id='$Id' AND webid='$WebId'");
            }
    	    if(isset($Active)){
    		    $result = Cw_Query("UPDATE cwoptions SET active='$Active' WHERE id='$Id' AND webid='$WebId'");
            }
    	    if(isset($Name)){
    		    $result = Cw_Query("UPDATE cwoptions SET name='$Name' WHERE id='$Id' AND webid='$WebId'");
            }
    	    if(isset($SiteAccess)){
    		    $result = Cw_Query("UPDATE cwoptions SET content='$SiteAccess' WHERE id='$Id' AND webid='$WebId'");
    	    }
            while($row = Cw_Fetch("SELECT * FROM users WHERE webid='$WebId'",$Array)){
                $row = PbUnSerial($row);
                if($row['info']['access'] == $PrevLevel){
                    if($PrevLevel != "0"){
                        $row['info']['access'] = $AccessLevel;
                    }
                    if($row['info']['siteaccess'] == $PrevAccess){
                        $row['info']['siteaccess'] = $SiteAccess;
                    }
                    $NewInfo = $row['info'];
                    $Result = Cw_Query("UPDATE users SET info='$NewInfo' WHERE id='$ow[id]' AND webid='$WebId'");               
	            }
            }
	    }
    }
}
// TRACKS CHANGES MADE FROM USERS \\
    $Info = array();
    $Info["webid"] = $WebId;
    $Info["user"] = $Current_Admin_Id;
    $Info["error"] = $error;
    $Info["tracker"] = $Load_Sess;
    $Info["manual_message"] = $Manual_Message;
    $Info["id"] = $Id;
    $Info["type"] = "cwoptions";
    Cw_Changes($Info, $Article, $Array);
/////////////////////////////////////////

header("Location: http://$Website_Url_Auth/admin/UserAccess");
?>