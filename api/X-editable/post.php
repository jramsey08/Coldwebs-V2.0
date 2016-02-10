<?php

$FullName = $_POST[fullname];
$Article_Content[img] = $_POST[img];
$Article_Content[content] = $_POST[content];
$Article_Content[revised] = strtotime("now");
$Article_Content[code] = $_POST[code];
$Article_Content[codetype] = $_POST[codetype];
$Article_Content[embedcode] = $_POST[embedcode];

if($FullName == ""){
}else{
$result = mysql_query("UPDATE users SET name='$FullName' WHERE id='40'")
or die(mysql_error());
}

$result = mysql_query("UPDATE users SET name='$FullName' WHERE id='40'")
or die(mysql_error());