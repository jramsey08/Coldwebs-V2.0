<?php
    $REDIRECT = $_POST['redirect'];
    $Articles = $_POST['edit'];
    $Password = $_POST['pword'];
    $Auth = $_POST['auth'];
    $Type = $_POST['reset'];
    $Info = $_POST['email'];
    $Date = strtotime("now");
    $Expire = strtotime("+1 day");



    if($Type == "password"){
        $row = Cw_Fetch("SELECT * FROM cw_request WHERE trash='0' AND active='1' AND type='password' AND email='$Info' AND webid='$WebId'",$Array);
        if($row['id'] == ""){ echo "2";
            $Row = Cw_Fetch("SELECT * FROM cw_request WHERE active='3' AND email='$Info' AND type='password' AND webid='$WebId' AND expire<$Date",$Array);
            if($Row['id'] != ""){ echo "3";
                if($Get_Id == "auth"){
                    if($Auth != ""){ echo "3";
                        $Auth = OtarDecrypt($key, $Auth);
                        if($Auth == $Row['id']){
                            $Email = $Row['email'];
                            $New_Pw = PbEncrypt($key,$Password);
                            $roW = Cw_Fetch("SELECT * FROM users WHERE email='$Email' AND webid='$WebId'",$Array);
                            $UId = $roW['id'];
             		        $result = Cw_Query("UPDATE users SET password='$New_Pw' WHERE id='$UId' AND webid='$WebId'");
             		        $result = Cw_Query("UPDATE cw_request SET active='4' WHERE id='$Auth' AND webid='$WebId'");
                        }
                    }
                }
            }else{
                Cw_Query("INSERT INTO cw_request(type, ref, info, content, user, email, date_created, expire, webid) 
                VALUES('password', '$Req_Ref', '$Req_Info', '$Req_Content', '$Req_User', '$Info', '$Date', '$Expire', '$WebId') ");
            }
        }else{
        
        }
    }



	header("Location: $REDIRECT");
?>