<?php
// PULLS THE STRUCTURE AVAILABLE FOR THIS THEME \\

<<<<<<< HEAD
#if($Get_Url == "pages" OR $Get_Url == "articles" OR $Get_Url == "category" OR $Get_Url == "functions" OR $Get_Url == "design" OR $Get_Url == #"products"){
     $SearchUrl = $_GET['type']; 
     $SearchUrl = strtolower($SearchUrl);
=======
if($Get_Url == "pages" OR $Get_Url == "articles" OR $Get_Url == "category" OR $Get_Url == "functions" OR $Get_Url == "design" OR $Get_Url == "products"){
     $SearchUrl = $_GET['type']; 
     
     $SearchUrl = strtolower($SearchUrl);
     
>>>>>>> origin/master
     if($Get_Url == "pages"){
         $StructureTheme = $PageStructure['template'];
     }
     if($StructureTheme == "default"){
         $StructureTheme = $Array['siteinfo']['theme'];
     }
<<<<<<< HEAD
=======
         
>>>>>>> origin/master
     if($Get_Url == "functions"){
          $Id = OtarDecrypt($key,$SearchUrl);
          $QuerY = "SELECT * FROM page_function WHERE id='$Id' AND trash='0'";
          $ResulT = mysql_query($QuerY) or die(mysql_error());
          $RoW = mysql_fetch_array($ResulT);
          $StructureTheme = $RoW['template'];
          if($RoW['id'] == ""){
               $Article = OtarDecrypt($key,$_GET['id']);
               #$StructureTheme = isset_get($Article['structure']['pagestructure'], "template");
          }   
     }
<<<<<<< HEAD
=======

>>>>>>> origin/master
     if($StructureTheme == "" OR $StructureTheme == "cwadmin"){
          $Query = "SELECT * FROM info ORDER BY name";
          $Result = mysql_query($Query) or die(mysql_error());
          $Row = mysql_fetch_array($Result);
          $StructureTheme = $Row['theme'];
          include("../theme/$StructureTheme/settings.php");
          #echo "error 1";
     }else{
          include("../theme/$StructureTheme/settings.php");
          #echo "error 2";
     }

// PULLS THE INFORMATION FROM THE THEME'S SETTINGS.PHP FILE \\

     $THEMESTRUCTURE['category'] = $ThemeCategoryStructure;
     $THEMESTRUCTURE['page'] = $ThemePageStructure;
     $THEMESTRUCTURE['post'] = $ThemePostStructure;
     $THEMESTRUCTURE['listing'] = $ThemePageListings;
     $THEMESTRUCTURE['all'] = $ThemeAll;
     $ThemeArray['structure'] = $THEMESTRUCTURE;
     $ThemeArray['name'] = $StructureTheme;
         
<<<<<<< HEAD
#}  
=======
}  
>>>>>>> origin/master
         
?>