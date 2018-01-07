<?php
include("config/session.php");

$Return = $_GET['id'];
$Return = OtarDecrypt($key,$Return);

$Domain = $Return['domain'];
$Username = $Return['username'];
$Account = $Return['account'];



if(is_array($Return)){
    if($Return['type'] == "callback"){
        if($Return['status'] == "200"){
            $Query = "SELECT * FROM articles WHERE url='$Username' AND type='social' AND category='$Account' AND trash='0' AND webid='$WebId'";
            $Result = mysql_query($Query) or die(mysql_error());
            $Row = mysql_fetch_array($Result);
            if($Row['id'] != ""){
                $result = mysql_query("UPDATE articles SET active='1' WHERE id='$Row[id]' AND webid='$WebId'") or die(mysql_error());
                $result = mysql_query("UPDATE articles SET info='$Return' WHERE id='$Row[id]' AND webid='$WebId'") or die(mysql_error());
                $Response["status"] = "200";
                $Response["postid"] = $Row["id"];   
            }
        }
    }
}


$Response = OtarEncrypt($key,$Response);
echo $Response;

?>