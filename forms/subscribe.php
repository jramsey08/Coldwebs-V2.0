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
    $row = Cw_Fetch("SELECT * FROM subscribe WHERE email='$Get_Email' AND active='1' AND trash='0'",$Array);
    if($row['email'] == ""){
        Cw_Query("INSERT INTO subscribe (name, email) VALUES('$Get_Name', '$Get_Email' ) ");
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
        $result = Cw_Query("UPDATE subscribe SET gender='$Get_Gender' WHERE email='$Get_Email'");
        $result = Cw_Query("UPDATE subscribe SET user='$Get_User' WHERE email='$Get_Email'");
        $result = Cw_Query("UPDATE subscribe SET country='$Get_Country' WHERE email='$Get_Email'");
        $result = Cw_Query("UPDATE subscribe SET birth='$Get_Birth' WHERE email='$Get_Email'");
    }
}
header("Location: http://$Website_Url_Auth/");

?>