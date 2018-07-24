<?php

$Username = $_POST['username'];
$Email = $_POST['email'];
$Password = PbEncrypt($key, $_POST['passwd']);
$Password_Confirm = PbEncrypt($key, $_POST['passwd_confirm']);

$Info['access'] = $_POST['access'];
$Info['phone'] = $_POST['phone'];
$Info['address'] = $_POST['address'];
$Info['alias'] = $_POST['alias'];
$Info['personalinfo'] = $_POST['peronalinfo'];
$Info['firstname'] = $_POST['firstname'];
$Info['lastname'] = $_POST['lastname'];
$Info['company'] = $_POST['company'];
$Info['gender'] = $_POST['gender'];
$Info['days'] = $_POST['days'];
$Info['months'] = $_POST['months'];
$Info['years'] = $_POST['years'];
if($Info['access'] == ""){
    $Info['access'] = "4";
}
$Info = serialize($Info);

$Other['website'] = $_POST['website'];
$Other['optin'] = $_POST['optin'];
$Other['newsletter'] = $_POST['newsletter'];
$Other = serialize($Other);

$Redirect = $_POST['redirect'];
$Name = $_POST['firstname'] . " " . $_POST['lastname'];


$row = Cw_Fetch("SELECT * FROM users WHERE email='$Email' OR username='$Username'",$Array);
if($row['id'] == ""){
    $Ar = "0";
}else{
    $Ar = "1";
}


if(array_key_exists("passwd_confirm", $_POST)){
    if($Password != $Password_Confirm ){
        $Password = "";
        $error = "match";
    }
}

if($Email == "" OR $Password == ""){
    $Redirect = "Register?redir=$Redirect&error=$error";
}else{
    if($Ar == "1"){
        if(strtolower($Redirect) == "checkout"){
            $Redirect = "Checkout?error=ar&redir=$Redirect";
        }else{
            $Redirect = "Login?error=ar&redir=$Redirect";
        }
    }else{
        Cw_Query("INSERT INTO users(username, email, password, other, info, webid, name) VALUES('$Username', '$Email', '$Password', '$Other', '$Info', '$WebId', '$Name' ) ");
        if($Redirect == ""){
            $Redirect = "Login";
        }
    }
}
?>
<script type="text/javascript">
<!--
window.location = "<?php echo "http://$Website_Url_Auth/$Redirect"; ?>"
//-->
</script>