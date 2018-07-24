<?php

$Return = $_GET['id'];
$Return = OtarDecrypt($key,$Return);

$Domain = $Return['domain'];
$Username = $Return['username'];
$Account = $Return['account'];



if(is_array($Return)){
    if($Return['type'] == "callback"){
        if($Return['status'] == "200"){
            $Row = Cw_Fetch("SELECT * FROM articles WHERE url='$Username' AND type='social' AND category='$Account' AND trash='0' AND webid='$WebId'",$Array);
            $Other["auth"] = $Return["access_token"];
            if($Row['id'] != ""){
                $Return = serialize($Return);
                $result = Cw_Query("UPDATE articles SET active='1' WHERE id='$Row[id]' AND webid='$WebId'");
                $result = Cw_Query("UPDATE articles SET info='$Return' WHERE id='$Row[id]' AND webid='$WebId'");
                $Response["status"] = "200";
                $Response["postid"] = $Row["id"];   
            }
        }
    }
}


$Response = OtarEncrypt($key,$Response);
echo $Response;

?>