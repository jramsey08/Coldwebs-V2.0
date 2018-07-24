<?php
include("forms/logincheck.php");
if($Login == "1"){
    $Message_Name = $_POST["name"];
    $Message_Reply = $_POST["reply"];
    $Message_Subject = $_POST["subject"];    
    $Message_Email = explode(",", $_POST["email"]);
    $Message_Category = $_POST["category"];
    $Message_User = $_POST["user"];
    $Message_Message = $_POST["message"];
    $Message_Cc = explode(",", $_POST["cc"]);
    
    $Message_Other["ip"] = $_POST["ip"];
    $Message_Other["phone"] = $_POST["phone"];
    $Message_Other["website"] = $_POST["website"];
    $Message_Other["cc"] = $_POST["cc"];
    $Message_Other["date_changed"] = strtotime("now");   
    $Message_Other["url"] = $_POST["url"];
	$Message_Other["ip"] = $Get_Ip;


	
/////////////////////////////////// SETS DEFAULT VARIABLE VALUES \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\	
    $Message_Message = "<html>" . $Message_Message . "</html>";
    
    if($UserSiteAccess['adminmessages'] == "1"){
        if($Message_Reply == $SiteInfo["other"]["email"]){
            $Message_Admin = "1";
        }else{
            $Message_Admin = "0";
        }
    }else{
        $Message_Admin = "0";
    }
    
    
    $Domain = "http://$Website_Url_Auth";
    $Date = strtotime("now");
    
    if(is_array($Message_Email)){
        foreach($Message_Email as $key => $value){
            if(strpos($value,'@') !== false){
            }else{
                unset($Message_Email[$key]);
            }
        }
        foreach($Message_Email as $key => $value){
            $Count = $Count + 1;
            if($Count == "1"){
                $Message_Email = $value;              
            }else{
                $Message_Email = $Message_Email . "," . $value;
            }
        }
    }else{
        if(strpos($Message_Email,'@') !== false){
        }else{
            $Message_Email = "";
        }
    }
    if(is_array($Message_Cc)){
        foreach($Message_Cc as $key => $value){
            if(strpos($value,'@') !== false){
            }else{
                unset($Message_Cc[$key]);
            }
        }
        foreach($Message_Cc as $key => $value){
            $Count = $Count + 1;
            if($Count == "1"){
                $Message_Cc = $value;              
            }else{
                $Message_Cc = $Message_Cc . "," . $value;
            }
        }
    }else{
        if(strpos($Message_Cc,'@') !== false){
        }else{
            $Message_Cc = "";
        }
    }
    $Message_Cc = str_replace("Array,","","$Message_Cc");
    $Message_Email = str_replace("Array,","","$Message_Email");
/////////////////////////// FINALIZE ALL ARRAYS FOR UPLOAD TO DATABASE \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\	
	$Message_Other = Cw_Filter_Array($Message_Other);
	$Message_Other = serialize($Message_Other);
	
	
    if($Message_Email != ""){
        
        $Manual_Message = "Created Message";
        
        mysqli_query($CwDb,"INSERT INTO messages(name, subject, message, email, user, receiver, type, admin, date, webid, category, other) 
        VALUES('$Message_Name', '$Message_Subject', '$Message_Message', '$Message_Email', '$Message_User', '$Message_Email', 'sent', '$Message_Admin', '$Date', '$WebId', '$Message_Category', '$Message_Other') ")or die(mysqli_error());

        $query = "SELECT * FROM messages WHERE date='$Date' AND type='sent' AND webid='$WebId'";
    	$result = mysqli_query($CwDb,$query) or die(mysqli_error());
    	$row = mysqli_fetch_assoc($result);
    	$Post = CwOrganize($row,$Array);
        
        $to = $Message_Email;
        $subject = $Message_Subject;
        $message = $Message_Message;
        $headers = "From: " . strip_tags($Message_Reply) . "\r\n";
        $headers .= "Reply-To: ". strip_tags($Message_Reply) . "\r\n";
        $headers .= "CC: " . strip_tags($Message_Cc) . "\r\n";
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-type:text/html; charset=UTF-8" . "\r\n";
        $headers .= 'X-Mailer: PHP/' . phpversion();
        mail($to, $subject, $message, $headers);
    }

}

// TRACKS CHANGES MADE FROM USERS \\
    $Info = array();
    $Info["webid"] = $WebId;
    $Info["user"] = $Current_Admin_Id;
    $Info["error"] = $error;
    $Info["tracker"] = $Load_Sess;
    $Info["manual_mesage"] = $Manual_Message;
    $Info["id"] = $Post["id"];
    $Info["type"] = "messages";
    Cw_Changes($Info, $Article, $Array);
/////////////////////////////////////////

header("Location: $Domain/admin/Inbox");

?>