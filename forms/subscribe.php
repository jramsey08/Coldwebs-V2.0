<?php
$Get_Name = $_POST["name"];
$Get_Email = $_POST["email"];
$Get_Gender = $_POST["gender"];
$Get_Birth = $_POST["birthyear"];
$Get_Country = $_POST["country"];
$Get_User = $Current_Admin;

$Uri = $_GET['popupuri'];

$Single_Domain = $_SERVER['SERVER_NAME'];
$Single_Domain = str_replace("www.", "+", "$Single_Domain");
$Subscribe_Email  = $Array['siteinfo']['content']['subscribe_email'];

if($Subscribe_Email == ""){
    $Subscribe_Email = $Array['siteinfo']['other']['email'];
}

if(strpos($Get_Email,'@') !== false){
}else{
    $Get_Email = "";
}

if($Get_Email != ""){
    $query = "SELECT * FROM subscribe WHERE email='$Get_Email' AND active='1' AND trash='0'";
    $result = mysql_query($query) or die(mysql_error());
    $row = mysql_fetch_array($result);
    if($row['email'] == ""){
        mysql_query("INSERT INTO subscribe 
        (name, email) VALUES('$Get_Name', '$Get_Email' ) ")
        or die(mysql_error());
        $to = $Subscribe_Email;
        if($Get_Name == ""){
            $subject = "$Get_Email has just subscribed to your website";
            $message = "$Get_Email has just subscribed to your newsletter.";
        }else{
            $subject = "$Get_Name has just subscribed to your website";
            $message = "$Get_Name | $Get_Email has just subscribed to your newsletter.";
        }
        $headers = "From: noreply@$Single_Domain" . "\r\n" .
            "Reply-To: noreply@$Single_Domain" . "\r\n" .
            'X-Mailer: PHP/' . phpversion();
        mail($to, $subject, $message, $headers);
    }else{
        $_SESSION['subscribe_Check'] = "1";
        $Past_Subscribe = "1";
        $result = mysql_query("UPDATE subscribe SET gender='$Get_Gender' WHERE email='$Get_Email'") 
        or die(mysql_error());
        $result = mysql_query("UPDATE subscribe SET user='$Get_User' WHERE email='$Get_Email'") 
	or die(mysql_error());
        $result = mysql_query("UPDATE subscribe SET country='$Get_Country' WHERE email='$Get_Email'") 
	or die(mysql_error());
        $result = mysql_query("UPDATE subscribe SET birth='$Get_Birth' WHERE email='$Get_Email'") 
	or die(mysql_error());
    }
}
header("Location: http://$Website_Url_Auth/");

?>