<?php
include("config/encrypt.php");
include("config/functions.php");
include("config/database.php");
include("api/pblast/config.php");


$Request = $_GET['req'];


if($Request == ""){
}else{



    $Request = OtarDecrypt($key,$Request);
    $ExternalFile = $Request['file'];
    $ReqId = $Request['id'];
    $Date = date("M-d-Y");
    $UpdateFile = "CwUpdate-$Date";
    $FileLocation = "./uploads/upgrade/$UpdateFile.zip";
    $myfile = fopen("$FileLocation", "w");


// VALIDATE THE UPDATE REQUEST WITH PROMOTERBLAST \\
    $body ="?appid=$Pblast_Api&reqid=$ReqId&req=validate&status=null";
    $url = 'http://www.pblast.in/cwupgrade.php';
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url . $body);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_TIMEOUT, '3');
    $content = trim(curl_exec($ch));
    curl_close($ch);
    $content = OtarDecrypt($key,$content);


    if($content['valid'] == "1"){
// SAVE THE EXTERNAL FILE TO THE SERVER \\
        $ch = curl_init("$ExternalFile");
        $fp = fopen("$FileLocation", 'wb');
        curl_setopt($ch, CURLOPT_FILE, $fp);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_exec($ch);
        curl_close($ch);
        fclose($fp);

// EXTRACT THE EXTERNAL FILE'S CONTENTS \\
        $CwZip = new ZipArchive;
        if ($CwZip->open("$FileLocation") === TRUE){
            $CwZip->extractTo('./');
            $CwZip->close();
                $body ="?appid=$Website_App_Id&reqid=$ReqId&req=update&status=1";
                $url = 'http://www.pblast.in/cwupgrade.php';
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, $url . $body);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                curl_setopt($ch, CURLOPT_TIMEOUT, '3');
                $content = trim(curl_exec($ch));
                curl_close($ch);
        }else{
                $body ="?appid=$Website_App_Id&reqid=$ReqId&req=update&status=0";
                $url = 'http://www.pblast.in/cwupgrade.php';
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, $url . $body);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                curl_setopt($ch, CURLOPT_TIMEOUT, '3');
                $content = trim(curl_exec($ch));
                curl_close($ch);
        }
    }



}
?>