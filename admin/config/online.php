<?php
include_once("../config/usersOnline.class.php"); 
$visitors_online = new usersOnline();
$OnlineUsers = $visitors_online->count_users();

echo $OnlineUsers;


if (count($visitors_online->error) == 0) { 

    if ($visitors_online->count_users() == 1) { 
        echo "There is " . $visitors_online->count_users() . " visitor online"; 
    } 
    else { 
        echo "There are " . $visitors_online->count_users() . " visitors online"; 
    } 
} 
else { 
    echo "<b>Users online class errors:</b><br /><ul>\r\n"; 
    for ($i = 0; $i < count($visitors_online->error); $i ++ ) { 
        echo "<li>" . $visitors_online->error[$i] . "</li>\r\n"; 
    } 
    echo "</ul>\r\n"; 

} 



?>