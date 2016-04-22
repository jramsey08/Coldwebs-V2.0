<?php
if($_POST['recipient'] != ""){





    // VERIFY LEGITIMACY OF TOKEN
    if (verifyFormToken('cwfile')) {


        // CHECK TO SEE IF THIS IS A MAIL POST
        if (isset($_POST['active'])) {
        
            // Building a whitelist array with keys which will send through the form, no others would be accepted later on
            $whitelist = array('token','term','recipient','name','protect','active', 'password', 'content', 'duration', 'specificdate', 'gallery[]', 'redirect', 'imgtype', 'userid', 'img', 'imgsizes', 'id','CwFileCode', 'encryptid', 'cwfilecode');
            
            // Building an array with the $_POST-superglobal 
            foreach ($_POST as $key=>$item) {
                    
                    // Check if the value $key (fieldname from $_POST) can be found in the whitelisting array, if not, die with a short message to the hacker
            		if (!in_array($key, $whitelist)) {
            			
            			writeLog('Unknown form fields');
            			die("Hack-Attempt detected. Please use only the fields in the form");
            			
            		}
            }
     

      
            // Lets check the URL whether it's a real URL or not. if not, stop the script
            
#            if(!filter_var($_POST['active'],FILTER_VALIDATE_URL)) {
#            			writeLog('URL Validation');
#            		die('Hack-Attempt detected. Please insert a valid URL');
#            }
    
    
    
    
    
            // SAVE INFO AS COOKIE, if user wants name and email saved
            
            $saveCheck = $_POST['save-stuff'];
            if ($saveCheck == 'on') {
                setcookie("WRCF-Name", $_POST['recipient'], time()+60*60*24*365);
                setcookie("WRCF-Email", $_POST['recipient'], time()+60*60*24*365);
            }
            
            
            $Sender = "Pk Design";
            $Expire = date("M-d-Y",$CwFileExpire);
            $CwLink = $CwLink . "?request=$CwFileCode";
            $Year = date("Y");
            
            
            
            // PREPARE THE BODY OF THE MESSAGE

			$message = '<html><body>';
			$message .= "Hello, " . strip_tags($_POST['recipient']);
			$message .= '<br><br>';
			$message .= '<b>' . $Sender . "</b> has uploaded some files for you to view and download via <a href='http://www.CwFile.com' target='_blank'>CwFile.com</a>.";
			$message .= '<br>';
			$message .= "Please use the information below in order to recieve your files.";
			$message .= '<br><br>';
if($CwFileMessage == ""){
			$message .= '<br>';
}else{
			$message .= $CwFileMessage;
			$message .= '<br><br>';
}
			$message .= '<table rules="all" style="border-color: #666;" cellpadding="10">';
			$message .= "<tr style='background: #eee;'><td><strong>User:</strong> </td><td>" . strip_tags($_POST['recipient']) . "</td></tr>";
			$message .= "<tr><td><strong>Code:</strong> </td><td>" . strip_tags($CwFileCode) . "</td></tr>";
			$message .= "<tr><td><strong>Expire:</strong> </td><td>" . strip_tags($Expire) . "</td></tr>";
			$message .= "<tr><td><strong># of files:</strong> </td><td>" . $CwFileCount . "</td></tr>";
			$message .= "<tr><td><strong>Password (if needed): </strong> </td><td>" . strip_tags($CwFilePassword) . "</td></tr>";
			$message .= "<tr><td><strong>Download Link: </strong> </td><td>" . $CwLink . "</td></tr>";
			$message .= "</table>";
			$message .= "<br><br>";
			$message .= "*Your files will expire on the date given above.";
			$message .= '<br><br><br>';
			$message .= 'Are you in need of transfering files yo your Friend, Family, or client?';
			$message .= "<br>";
			$message .= "Visit <a href='http://www.CwFile.com'>CwFile</a> to see how to transfer your files today.";
			$message .= "<hr>";
			$message .= "<center>All rights reserved $Year <a href='http://www.cwfile.com'>CwFile</a> | Member <a href='http://www.introll.com'>Introll, LLC</a></center>";
			$message .= "</body></html>";
			
			
			
			
			//  MAKE SURE THE "FROM" EMAIL ADDRESS DOESN'T HAVE ANY NASTY STUFF IN IT
			
			$pattern = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/i"; 
            if (preg_match($pattern, trim(strip_tags($_POST['recipient'])))) { 
                $cleanedFrom = trim(strip_tags($_POST['recipient'])); 
            } else { 
                return "The email address you entered was invalid. Please try again!"; 
            } 
            
            //   CHANGE THE BELOW VARIABLES TO YOUR NEEDS
             

			$to = 'jramsey08@gmail.com';
			
			$subject = "CwFile - " . $Sender . " uploaded some files for you.";
			
			$headers = "From: CwFile ";
			$headers .= "Reply-To: noreply@CwFile.com";
			$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

            if (mail($to, $subject, $message, $headers)) {
              #echo 'Your message has been sent.';
            } else {
              #echo 'There was a problem sending the email.';
            }
            
            // DON'T BOTHER CONTINUING TO THE HTML...
            #die();
        
        }
    } else {
    
   		if (!isset($_SESSION[$form.'_token'])) {
   		
   		} else {
   			echo "Hack-Attempt detected. Got ya!.";
   			writeLog('Formtoken');
   	    }
   
   	}
}
?>