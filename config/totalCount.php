<?php

$query = "SELECT type, COUNT(id) FROM articles WHERE active='1' AND trash='0' AND type='post' GROUP BY type"; 
$result = mysql_query($query) or die(mysql_error());
while($row = mysql_fetch_array($result)){
    $CwPostCount = $row['COUNT(id)'];
}

if($getpagenumber > "1"){
    $query = "SELECT * FROM articles WHERE active='1' AND trash='0' AND type='post' LIMIT $Home_One,$Home_Ten"; 
    $result = mysql_query($query) or die(mysql_error());
    while($row = mysql_fetch_array($result)){
        $Count_Page = $Count_Page + 1;
    }
$CwPostCount = $Count_Page;
}

?>




