<?php

$Username = $_POST['username'];
$Email = $_POST['email'];
$Password = $_POST['passwd'];
$Password = PbEncrypt($key, $Password);

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

$query = "SELECT * FROM users WHERE email='$Email'"; 
$result = mysql_query($query) or die(mysql_error());
$row = mysql_fetch_array($result);
if($row['id'] == ""){
    $Ar = "0";
}else{
    $Ar = "1";
}

if($Email == "" OR $Password == ""){
    $Redirect = "Register";
}else{
    if($Ar == "1"){
        $Redirect = "Login?error=ar";
    }else{
        mysql_query("INSERT INTO users
        (username, email, password, other, info) VALUES('$Username', '$Email', '$Password', '$Other', '$Info' ) ") 
        or die(mysql_error());
        $Redirect = "Login";
    }
}
?>
<script type="text/javascript">
<!--
window.location = "<?php echo "$Site_Domain/$Redirect"; ?>"
//-->
</script>