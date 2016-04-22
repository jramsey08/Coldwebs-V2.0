<?php
<<<<<<< HEAD
=======
include("forms/logincheck.php");
if($Login == "1"){
>>>>>>> origin/master
	$Name = $_POST["name"];
	$Email = $_POST["email"];
	$Subject = $_POST["subject"];
	$Message = $_POST["message"];
	$User = $Current_Admin_Id;
	$Phone = $_POST["phone"];
	$Website = $_POST["website"];
	$Priority = $_POST["priority"];
	$Url = $_POST["url"];

<<<<<<< HEAD
        $message = $Message;
        $to = $SiteInfo['other']['email'];
=======
>>>>>>> origin/master
	$Domain = $Array['siteinfo']['domain'];

	if($Priority == ""){ 
		$Priority = "4";
	}

	if($Email == ""){ }else{
		if($Name == ""){ }else{
			if($Message == ""){ }else{
				mysql_query("INSERT INTO messages 
				(name, email, subject, message, user, phone, website, date, priority) VALUES('$Name', '$Email', '$Subject', '$Message', '$User', '$Phone', '$Website', '$Date', '$Priority' ) ") 
				or die(mysql_error()); 
			}
<<<<<<< HEAD
                    if($Subject == ""){
                        $subject = "$Get_Name has just sent you a message";
                    }else{
                        $subject = $Subject;
                    }
                    $headers = "From: $Email" . "\r\n" . "Reply-To: $Email" . "\r\n" . 'X-Mailer: PHP/' . phpversion();
                    mail($to, $subject, $message, $headers);
		}
	}
	header("Location: /");

=======
		}
	}


	header("Location: /");
}
>>>>>>> origin/master
?>