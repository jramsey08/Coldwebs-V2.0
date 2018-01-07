<?php
include("ref/config.php");


if($_GET['type'] == "bg-menu-list"){
    $result = mysql_query("UPDATE admin SET list='$_GET[list]' WHERE id='$_GET[id]'") 
    or die(mysql_error());
}