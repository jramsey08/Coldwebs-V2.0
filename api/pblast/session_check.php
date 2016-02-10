<?php

$query = "SELECT * FROM login_session WHERE id='$Request[pbsession]' AND userid='$Request[user]' AND active='1' AND trash='0'";
$result = mysql_query($query) or die(mysql_error());
$row = mysql_fetch_array($result);
$Verify_Session = $row['active'];



if($Verify_Session == "1"){
    $Response['auth'] = "1";
    $Response['error'] = "success";
    $Response = OtarEncrypt($Pblast_Secret,$Response);
}else{
    $Response['auth'] = "0";
    $Response['error'] = "session not found";
    $Response = OtarEncrypt($Pblast_Secret,$Response);
}


echo $Response;


?>



