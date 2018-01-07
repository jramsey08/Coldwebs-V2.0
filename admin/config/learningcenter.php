<?php
$Get_Type = strtolower($_GET['type']);
$Get_Id = strtolower($_GET['id']);
$Get_Url = strtolower($_GET['url']);
$Get_End = strtolower($_GET['end']);

if($Get_Url == "learning-center"){
    switch ($Get_Type){
        case "audio":
            $LearnFile = "learn/audio";
            break;
        case "blog":
            $LearnFile = "learn/blog";
            break;
    }

    $LayoutFile = "$THEME/structure/$LearnFile.php";
    $layout_theme = "theme/cwadmin/structure/$LearnFile.php";
    $error_file = "$THEME/structure/404.php";
    $default_efile = "theme/cwadmin/structure/404.php";
    if(!file_exists($LayoutFile)){
        if(file_exists($layout_theme)){
            $LearnTheme = "theme/cwadmin";
        }else{
            if(file_exists($error_file)){
                $LearnFile = "404";
                $LearnTheme = $THEME;
            }else{
                if(file_exists($default_efile)){ 
                    $LearnFile = "404";
                    $LearnTheme = "theme/cwadmin";
                }else{
                    if(file_exists("$THEME/structure/default.php")){ 
                        $LearnFile = "default";
                        $LearnTheme = $THEME;
                    }else{
                        $LearnFile = "default";
                        $LearnTheme = "theme/cwadmin";
                    }
                }
            } 
        }
    }
}