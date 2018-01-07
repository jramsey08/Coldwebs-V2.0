<?php
	$Name = $_POST["name"];
	$Email = $_POST["email"];
	$Subject = $_POST["subject"];
	$Message = $_POST["message"];
	$User = $Current_Admin_Id;
	$Priority = $_POST["priority"];
	
	$Other["phone"] = $_POST["phone"];
	$Other["website"] = $_POST["website"];
	$Other["url"] = $_POST["url"];
	$Other["ip"] = $Get_Ip;
	
    $message = $Message;
    $to = $SiteInfo['other']['email'];
	$Domain = $Array['siteinfo']['domain'];

	if($Priority == ""){ 
            $Priority = "4";
	}

	if($Email != ""){ 
		if($Name != ""){
			if($Message != ""){
				mysql_query("INSERT INTO messages 
				(name, email, subject, message, user, date, priority, webid, type, other, admin)
				VALUES('$Name', '$Email', '$Subject', '$Message', '$User', '$Date', '$Priority', '$WebId', 'inbox', '$Other', '1' ) ") 
				or die(mysql_error()); 
			}
            if($Subject == ""){
                $subject = "$Name has just sent you a message";
            }else{
                $subject = $Subject;
            }
            $headers = "From: $Email" . "\r\n" . "Reply-To: $Email" . "\r\n" . 'X-Mailer: PHP/' . phpversion();
            mail($to, $subject, $message, $headers);
		}
	}
	header("Location: /");

?>