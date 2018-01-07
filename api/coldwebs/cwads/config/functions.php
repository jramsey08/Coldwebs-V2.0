<?php

if (function_exists('cw_youtube')) {

}else{


function cw_youtube($Code,$Width,$Height,$Autoplay){
    if($Autoplay != "1"){
        $Autoplay = "0";
    }
    if($Array['videosize']['width'] == ""){
        $Array['videosize']['width'] = "670";
    }
    if($Array['videosize']['height'] == ""){
        $Array['videosize']['height'] = "270";
    }
    $Content = "<div class='cw-video-container'><iframe width='$Width' height='$Height;' src='https://www.youtube.com/embed/$Code?amp;autoplay=$Autoplay;&amp;rel=0&amp;fs=0&amp;showinfo=0&amp;controls=0&amp;hd=1&amp;wmode=transparent' frameborder='0' allowfullscreen='' class='black_border full_width'></iframe></div>";
return $Content;
}

function cw_vimeo($Code,$Width,$Height,$Autoplay){
    if($Autoplay != "1"){
        $Autoplay = "0";
    }
    if($Width == ""){
        $Width = "670";
    }
    if($Height == ""){
        $Height = "270";
    }
    $Content ="<div class='cw-video-container'><iframe src='//player.vimeo.com/video/$Code' width='$Width' height='$Height' frameborder='0' webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe></div>";
return $Content;
}

function cw_embed($Code,$Width,$Height,$Autoplay){
    $Content = $Code;
return $Content;
}

function cw_audiofile($Code,$Width,$Height,$Autoplay){ 
    if($Autoplay != "1"){
        $Autoplay = "0";
    }
    $Content = "<div class='cw-video-container'><div class='audio-box'><audio controls><source src='$Code' type='audio/mpeg'></audio></div></div>";
return $Content;
}


function Rand_Ad_Content($Code,$Count){
    $Rand = rand("1",$Count);
    $Content = $Code["$Rand"];
return $Content;
}


}

?>