<?php
$Last_d = date("t");
$Year = date("Y");
$Month = date("M");
$Day = date("d");
$Today = "$Month $Day, $Year";
$Today_Start = strtotime("$Month $Day, $Year 12:00 am");
$Today_End = strtotime("$Month $Day, $Year 11:59 pm");
$Last = "$Month $Last_d, $Year";
$Last = strtotime("$Last");
$First = "$Month 1, $Year";
$First = strtotime("$First");
$Date = date("m-d-y");

$query = "SELECT * FROM tracker WHERE admin!='1' AND webid='$WebId'"; 
$result = mysqli_query($CwDb,$query);
$row = mysqli_fetch_assoc($result);
$TotalVisitors = mysqli_num_rows($result); 
$TotalVisitors = number_format("$TotalVisitors");

$query = "SELECT * FROM tracker WHERE date2='$Date' AND admin!='1' AND webid='$WebId'";
$result = mysqli_query($CwDb,$query);
$row = mysqli_fetch_assoc($result);
$TodayVisitors = mysqli_num_rows($result); 
$TodayVisitors = number_format("$TodayVisitors");

$query = "SELECT id, COUNT(id) FROM ws_sessions WHERE active='1' AND webid='$WebId'";
$result = mysqli_query($CwDb,$query);
$row = mysqli_fetch_assoc($result);
$LiveVisitors = mysqli_num_rows($result); 
$LiveVisitors = number_format("$LiveVisitors");




$query = "SELECT * FROM trans WHERE status > '0' AND status < '6' AND date<'$Last' AND date > '$First' AND Active='1' AND trash='0' AND webid='$WebId'";
$result = mysqli_query($CwDb,$query);
$MonthlySales = mysqli_num_rows($result); 
$MonthlySales = number_format("$MonthlySales");

$query = "SELECT * FROM trans WHERE status > '0' AND status < '6' AND Active='1' AND trash='0' AND webid='$WebId'";
$result = mysqli_query($CwDb,$query);
$TotalSales = mysqli_num_rows($result); 
$TotalSales = number_format("$TotalSales");

$query = "SELECT * FROM trans WHERE status > '0' AND status < '6' AND date<'$Today_End' AND date > '$Today_Start' AND Active='1' AND trash='0' AND webid='$WebId'";
$result = mysqli_query($CwDb,$query);
$TodaySales = mysqli_num_rows($result); 
$TodaySales = number_format("$TodaySales");

$query = "SELECT * FROM trans WHERE status='0' AND Active='1' AND trash='0' AND webid='$WebId'";
$result = mysqli_query($CwDb,$query);
$PendingSales = mysqli_num_rows($result); 
$PendingSales = number_format("$PendingSales");
?>