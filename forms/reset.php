<?php

include("forms/logincheck.php");
if($Login == "1"){

    $REDIRECT = $_POST['redirect'];
    $Articles = $_POST['edit'];
    $Type = $_POST['reset'];
    $Info = $_POST['email'];

    if($Type == "password"){
        $query = "SELECT * FROM request WHERE trash='0' AND type='password'";
        $result = mysql_query($query) or die(mysql_error());
	$row = mysql_fetch_array($result);
        if($row['id'] == ""){
            mysql_query("INSERT INTO cw_request(type, ref, info, content, user) 
            VALUES('password', '$Req_Ref', '$Req_Info', '$Req_Content', '$Req_User') ")or die(mysql_error());
        }
    }
	header("Location: $REDIRECT");
}