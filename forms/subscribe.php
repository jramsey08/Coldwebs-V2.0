<?php
$Get_Name = $_POST["name"];
$Get_Email = $_POST["email"];
$Get_Gender = $_POST["gender"];
$Get_Birth = $_POST["birthyear"];
$Get_Country = $_POST["country"];
$Get_User = $Current_Admin;

$Domain = $Array["siteinfo"]["domain"];
$Uri = $_GET['popupuri'];

<<<<<<< HEAD
$Single_Domain = $_SERVER['SERVER_NAME'];
$Single_Domain = str_replace("www.", "+", "$Single_Domain");


$Array['siteinfo']['content']['subscribe_email'] = "subscribe@parallelmagz.com";

$Subscribe_Email  = $Array['siteinfo']['content']['subscribe_email'];

if($Subscribe_Email == ""){
    $Subscribe_Email = $Array['siteinfo']['other']['email'];
}

if (strpos($Get_Email,'@') !== false){
=======
if (strpos($Get_Email,'@') !== false) {
>>>>>>> origin/master
}else{
    $Get_Email = "";
}

if($Get_Email == ""){
<<<<<<< HEAD
=======
    
>>>>>>> origin/master
}else{
    $query = "SELECT * FROM subscribe WHERE email='$Get_Email' AND active='1' AND trash='0'";
    $result = mysql_query($query) or die(mysql_error());
    $row = mysql_fetch_array($result);
    if($row['email'] == ""){
<<<<<<< HEAD
        mysql_query("INSERT INTO subscribe 
        (name, email) VALUES('$Get_Name', '$Get_Email' ) ")
        or die(mysql_error());
        $to = $Subscribe_Email;
=======
        mysql_query("INSERT INTO subscribe
        (name, email, gender, birth, country, user) VALUES('$Get_Name', '$Get_Email', '$Get_Gender', '$Get_Birth', '$Get_Country',  
        '$Get_User' ) ") or die(mysql_error()); 
        $_SESSION['subscribe_Check'] = "1";
        $to      = 'subscribe@parallelmagz.com';
>>>>>>> origin/master
        if($Get_Name == ""){
            $subject = "$Get_Email has just subscribed to your website";
            $message = "$Get_Email has just subscribed to your newsletter.";
        }else{
            $subject = "$Get_Name has just subscribed to your website";
            $message = "$Get_Name | $Get_Email has just subscribed to your newsletter.";
        }
<<<<<<< HEAD
        $headers = "From: noreply@$Single_Domain" . "\r\n" .
            "Reply-To: noreply@$Single_Domain" . "\r\n" .
            'X-Mailer: PHP/' . phpversion();
=======
        $headers = 'From: noreply@parallelmagz.com' . "\r\n" .
            'Reply-To: noreply@parallelmagz.com' . "\r\n" .
            'X-Mailer: PHP/' . phpversion();

>>>>>>> origin/master
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
<<<<<<< HEAD
    }
}
header("Location: $Domain/");

?>
=======
   }
}

if($_GET['popup'] == "1"){ ?>
<br><br><br><br><br><br><br><br><br>
<font size="5" color='red'>
<center>
<?php if($Past_Subscribe == "1"){ ?>
You have updated your information!
<?php }else{ ?>
You are now subscribed to our Newsletter!
<?php } ?>
</center>

</font>
<a id='closesubscribe' href="<?php echo "$Domain$Uri"; ?>" target="_parent"></a>
<?php
}else{
    header("Location: $Domain/");
}
?>

<html>
<body onload="document.getElementById('closesubscribe').click()">
</body>
>>>>>>> origin/master
