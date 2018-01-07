<?php
include("../ref/config.php");
$Rand = $_POST['rand'];
$Article = $_POST['id'];
if($Article == ""){
    $Article = $Rand;
}

$RanD = rand(999, 9999999999);
$files = new UploadedFiles($_FILES);
foreach($files as $Media){
    $Media['name'] = str_replace(" ", "", $Media['name']);
    if($Media["error"] > 0){
        $error = $Media["error"];
#echo "0";
    }else{
        if($Media["type"] == "image/gif" OR
           $Media["type"] == "image/jpeg" OR
           $Media["type"] == "image/png" OR
           $Media["type"] == "image/jpg"){
            include("image.php");
#echo "1";
        }else if($Media["type"] == "audio/mpeg" OR
           $Media["type"] == "audio/mpeg3" OR
           $Media["type"] == "audio/mp3" OR
           $Media["type"] == "audio/wav" OR
           $Media["type"] == "audio/ogg" OR
           $Media["type"] == "audio/x-mpeg-3"){ 
            include("audio.php");
#echo "2";
        }else if($Media["type"] == "video/mpeg" OR
           $Media["type"] == "video/mp4" OR
           $Media["type"] == "video/quicktime" OR
           $Media["type"] == "video/x-ms-wmv" OR
           $Media["type"] == "video/wmv" OR
           $Media["type"] == "video/avi" OR
           $Media["type"] == "video/m4v" OR
           $Media["type"] == "video/mpv" OR
           $Media["type"] == "video/flv" OR
           $Media["type"] == "video/mkv"){ 
            include("video.php");
#echo "3";
        }
        if($Type != ""){
#echo "4";
            if($Media['name'] != ""){
                $Gallery_Img = "../../../uploads/$Folder/$RanD" . $Media['name'];
                $Images = "http://$_SERVER[HTTP_HOST]/uploads/$Folder/$RanD" . $Media['name'];
                $Name = explode(".", $Media['name']);
                $Name = $Name['0'];
#echo $Images;
                if($Type == "image"){
                    $filename = compress_image($Media['tmp_name'], $Gallery_Img, 90);
                    $resizedFile = $Gallery_Img;
                    $siz = getimagesize($resizedFile);
                    list($width, $height) = getimagesize($resizedFile);
                    if($width > $height){
                        $filename = $resizedFile;
                        $width = "1275";
                        $height = "825";
                        list($width_orig, $height_orig) = getimagesize($filename);
                        $ratio_orig = $width_orig/$height_orig;
                        if($width/$height > $ratio_orig){
                            $width = $height*$ratio_orig;
                        }else{
                            $height = $width/$ratio_orig; 
                        }
                        $image_p = imagecreatetruecolor($width,$height);
                        $image = imagecreatefromjpeg($filename);
                        imagecopyresampled($image_p, $image, 0, 0, 0, 0, $width, $height, $width_orig, $height_orig);
                        imagejpeg($image_p, $filename, 100);
                    }else{
                        $filename = $resizedFile;
                        $width = "660";
                        $height = "860";
                        list($width_orig, $height_orig) = getimagesize($filename);
                        $ratio_orig = $width_orig/$height_orig;
                        if($width/$height > $ratio_orig){
                            $width = $height*$ratio_orig;
                        }else{
                            $height = $width/$ratio_orig;
                        }
                        $image_p = imagecreatetruecolor($width,$height);
                        $image = imagecreatefromjpeg($filename);
                        imagecopyresampled($image_p, $image, 0, 0, 0, 0, $width, $height, $width_orig, $height_orig);
                        imagejpeg($image_p, $filename, 100);
                    }
                    mysql_query("INSERT INTO images(img, album, type, webid) VALUES('$Images', '$Article', '$Type', '$WebId' ) ") or die(mysql_error());
                }else{
                    move_uploaded_file($Media['tmp_name'], $Gallery_Img);
                    mysql_query("INSERT INTO images(url, album, type, name, webid) VALUES('$Images', '$Article', '$Type', '$Name', '$WebId' ) ") or die(mysql_error());
                }
            }
        }
    }
}
?>