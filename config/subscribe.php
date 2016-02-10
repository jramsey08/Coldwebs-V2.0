<?php
$result = mysql_query("SELECT * FROM subscribe WHERE email='$CurrentUser[email]'") or die(mysql_error());
$row = mysql_fetch_array( $result );

$Subscribe_Time_End = $_SESSION['Subscribe_Time_Start'];
$Subscribe_Time_Now = strtotime("now");


if($Current_Admin == ""){
    if($_SESSION['subscribe_Check'] != "1"){
        if($Subscribe_Time_End == ""){
            $Show_Subscribe_Pop_Up = "1";
            $_SESSION['Subscribe_Time_Start'] = strtotime("+5 minutes");
        }else{
            if($Subscribe_Time_End <= $Subscribe_Time_Now){
                $Show_Subscribe_Pop_Up = "0";
            }else{
                $Show_Subscribe_Pop_Up = "1";
                $_SESSION['Subscribe_Time_Start'] = strtotime("+5 minutes");
            }
        }
    }
}else{
    if($row['active'] != "1" AND $row['end-date'] == ""){
        if($Subscribe_Time_End == ""){
            $Show_Subscribe_Pop_Up = "1";
            $_SESSION['Subscribe_Time_Start'] = strtotime("+5 minutes");
        }else{
            if($Subscribe_Time_End <= $Subscribe_Time_Now){
                $Show_Subscribe_Pop_Up = "0";
            }else{
                $Show_Subscribe_Pop_Up = "1";
                $_SESSION['Subscribe_Time_Start'] = strtotime("+5 minutes");
            }
        }
    }
}


if($Mobile['phone'] == "1"){
    $Show_Subscribe_Pop_Up = "0";
}


?>