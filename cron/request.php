<?php
include("../config/session.php");


$Domain = $Array["siteinfo"]["domain"];
$Uri = $_GET['popupuri'];
$Date = strtotime("now");




$query = "SELECT * FROM cw_request WHERE active='1' AND trash='0' AND webid='$WebId'";
$result = mysql_query($query) or die(mysql_error());
if(!is_bool($result)){
    while($row = mysql_fetch_array($result)){
        $row = PbUnSerial($row);
        $Id = $row['id'];
        $ReqId = OtarEncrypt($key,$row[id]);
        if($row["expire"] > $Date){




            if($row['type'] = "password"){
                $to = $row['email'];
                $subject = "Password Reset for $Domain";
                $message = "You have requested to change your account password. If this is true please click this link to http://$Domain/Password-Recovery/$ReqId reset your password</a>";
                $headers = "From: noreply@$Domain" . "\r\n" .
                    "Reply-To: noreply@$Domain" . "\r\n" .
                    'X-Mailer: PHP/' . phpversion();
                mail($to, $subject, $message, $headers);
                $result = mysql_query("UPDATE cw_request SET active='3' WHERE id='$Id'") 
                or die(mysql_error());
            }





        }
    }






}

$result = mysql_query("UPDATE cw_request SET active='0' WHERE expire < $Date AND webid='$WebId'") 
or die(mysql_error());


?>