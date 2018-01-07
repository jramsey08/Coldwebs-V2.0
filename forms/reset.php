<?php
    $REDIRECT = $_POST['redirect'];
    $Articles = $_POST['edit'];
    $Password = $_POST['pword'];
    $Auth = $_POST['auth'];
    $Type = $_POST['reset'];
    $Info = $_POST['email'];
    $Date = strtotime("now");
    $Expire = strtotime("+1 day");



    if($Type == "password"){ echo "1";
        $query = "SELECT * FROM cw_request WHERE trash='0' AND active='1' AND type='password' AND email='$Info' AND webid='$WebId'";
        $result = mysql_query($query) or die(mysql_error());
	    $row = mysql_fetch_array($result);
        if($row['id'] == ""){ echo "2";
            $Query = "SELECT * FROM cw_request WHERE active='3' AND email='$Info' AND type='password' AND webid='$WebId' AND expire<$Date";
            $result = mysql_query($Query) or die(mysql_error());
	        $Row = mysql_fetch_array($result);
            if($Row['id'] != ""){ echo "3";
                if($Get_Id == "auth"){
                    if($Auth != ""){ echo "3";
                        $Auth = OtarDecrypt($key, $Auth);
                        if($Auth == $Row['id']){
                            $Email = $Row['email'];
                            $New_Pw = PbEncrypt($key,$Password);
                            $querY = "SELECT * FROM users WHERE email='$Email' AND webid='$WebId'";
                            $resulT = mysql_query($querY) or die(mysql_error());
	                        $roW = mysql_fetch_array($resulT);
                            $UId = $roW['id'];
             		        $result = mysql_query("UPDATE users SET password='$New_Pw' WHERE id='$UId' AND webid='$WebId'") 
			                or die(mysql_error());
             		        $result = mysql_query("UPDATE cw_request SET active='4' WHERE id='$Auth' AND webid='$WebId'") 
			                or die(mysql_error());
                        }
                    }
                }
            }else{ echo "4";
                mysql_query("INSERT INTO cw_request(type, ref, info, content, user, email, date_created, expire, webid) 
                VALUES('password', '$Req_Ref', '$Req_Info', '$Req_Content', '$Req_User', '$Info', '$Date', '$Expire', '$WebId') ")or die(mysql_error());
            }
        }else{
        
        }
    }



	header("Location: $REDIRECT");
?>