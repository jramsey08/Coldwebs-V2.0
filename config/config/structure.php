<?php

// PULLS DEFAULT THEME IF NONE IS DETECTED \\
if($theme == ""){
    if($View_site == "1"){
        $theme = CWDEFAULTTHEME;
    }else{
        $theme = CWDEFAULTOFFLINETHEME; 
    }
    $THEME = "theme/$theme";
}


// PULLS THE INFORMATION FROM THE THEME'S SETTINGS.PHP FILE \\
if(!file_exists("$THEME/settings.php")){
     $THEME = "theme/cwdefault";
}

include("$THEME/settings.php");

$Array["postimagessizes"] = $StructureImgSizes;
$Array["productimages"] = $ProductImgSizes;
$THEMESTRUCTURE['category'] = $ThemeCategoryStructure;
$THEMESTRUCTURE['page'] = $ThemePageStructure;
$THEMESTRUCTURE['post'] = $ThemePostStructure;
$THEMESTRUCTURE['listing'] = $ThemePageListings;
$THEMESTRUCTURE['PRODUCT'] = $ThemePRODUCTListings;
$ThemeArray['structure'] = $THEMESTRUCTURE;
$ThemeArray['name'] = $StructureTheme;

?>