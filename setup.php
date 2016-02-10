<?php
require_once("config/functions.php");
include("config/encrypt.php");
$Setup_Info = serialize($_REQUEST);
$Setup_Email = $_REQUEST['email'];
$Website_Domain = Website_Domain();

$key = "";
$i = "0";

while($i == "0"){
    if($key == ""){ 
        $body ="?encryptcheck=1&email=$Setup_Email&domain=$Website_Domain"; 
    }else{
        $Setup_Info =  PbEncrypt($PB_Access, $Setup_Info);
        $Setup_Info =  str_replace("/", "((=))", "$Setup_Info");
        $Setup_Info =  str_replace("+", "))))==((((", "$Setup_Info");
        $body ="?setup=$Setup_Info&domain=$Website_Domain";
    }
    $url = 'http://www.pblast.in/setup.php';
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url . $body);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_TIMEOUT, '3');
    $content = trim(curl_exec($ch));
    curl_close($ch);
    $content = str_replace("))))==((((", "+", "$content");
    $content  = str_replace("((=))", "/", "$content");
    $content = rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, md5($PB_Access), base64_decode($content), MCRYPT_MODE_CBC, md5(md5($PB_Access))), "\0");
    $content = unserialize($content);
    $Setup_Response = $content[0];
    $Setup_Type = $content[1];
    $Setup_Value = $content[2];
    if($Setup_Response == "1"){
        if($Setup_Type == "key"){
            $file = "config/encrypt.php";
            $current = file_get_contents($file);
            $current = "<?php \n" . "$" . "PB_Access='" . $PB_Access . "'; \n" .  "$" . "key='" . $Setup_Value . "';" . "\n ?>";
            file_put_contents($file, $current);
            $i = "0"; $key = $Setup_Value;
        }
        if($Setup_Type == "setup"){ 
            echo "Completed";  $i = "1";
        } 
    }else{ 
        echo "Error $Setup_Value"; 
    }
    header( "Location: http://$Website_Domain" ) ;
}else{
    delete("welcome.php");
    #delete("setup.php");
}


?>