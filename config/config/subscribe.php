<?php
$result = mysqli_query($CwDb, "SELECT * FROM subscribe WHERE email='$CurrentUser[email]' AND webid='$WebId'") or die(mysql_error());
$row = mysqli_fetch_assoc($result);
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
                $Show_Subscribe_Pop_Up = "1";
                $_SESSION['Subscribe_Time_Start'] = strtotime("+5 minutes");
            }else{ 
                $Show_Subscribe_Pop_Up = "0";
            }
        }
    }
}





if($Mobile['phone'] == "1"){
    $Show_Subscribe_Pop_Up = "0";
}
if($Get_Url == "login"){
    $Show_Subscribe_Pop_Up = "0";
}

?>