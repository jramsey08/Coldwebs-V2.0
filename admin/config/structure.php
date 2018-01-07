<?php
// PULLS THE STRUCTURE AVAILABLE FOR THIS THEME \\
#if($Get_Url == "pages" OR $Get_Url == "articles" OR $Get_Url == "category" OR $Get_Url == "functions" OR $Get_Url == "design" OR $Get_Url == #"products"){
     $SearchUrl = $_GET['type']; 
     $SearchUrl = strtolower($SearchUrl);
     if($Get_Url == "pages"){
         $StructureTheme = $PageStructure['template'];
     }
     if($StructureTheme == "default"){
         $StructureTheme = $Array['siteinfo']['theme'];
     }
     if($Get_Url == "functions"){
          $Id = OtarDecrypt($key,$SearchUrl);
          $QuerY = "SELECT * FROM page_function WHERE id='$Id' AND trash='0' AND webid='$WebId'";
          $ResulT = mysql_query($QuerY) or die(mysql_error());
          $RoW = mysql_fetch_array($ResulT);
          $StructureTheme = $RoW['template'];
          if($RoW['id'] == ""){
               $Article = OtarDecrypt($key,$_GET['id']);
               #$StructureTheme = isset_get($Article['structure']['pagestructure'], "template");
          }   
     }
     if($StructureTheme == "" OR $StructureTheme == "cwadmin"){
         $Query = "SELECT * FROM info WHERE id='$WebId' ORDER BY name";
         $Result = mysql_query($Query) or die(mysql_error());
         $Row = mysql_fetch_array($Result);
         $StructureTheme = $Row['theme'];
         if(!file_exists("../theme/$StructureTheme/settings.php")){
             $StructureTheme = "cwdefault";
         }
         include("../theme/$StructureTheme/settings.php");
         #echo "error 1";
     }else{
         if(!file_exists("../theme/$StructureTheme/settings.php")){
             $StructureTheme = "cwdefault";
         }
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
#}  
?>