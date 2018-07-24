<?php
include("../../config/encrypt.php");
include("../config/functions.php");
include("../../config/database.php");

$LocalTem = $_GET["temid"];
$CurrentLayout = $Article['other']['structure'];

if(file_exists("../../theme/$LocalTem/settings.php")){
    include("../../theme/$LocalTem/settings.php");
}

// PULLS THE INFORMATION FROM THE THEME'S SETTINGS.PHP FILE \\
     $TEMPSTRUCTURE['category'] = $ThemeCategoryStructure;
     $TEMPSTRUCTURE['page'] = $ThemePageStructure;
     $TEMPSTRUCTURE['post'] = $ThemePostStructure;
     $TEMPSTRUCTURE['listing'] = $ThemePageListings;
     $TEMPSTRUCTURE['all'] = $ThemeAll;
     $TemArray['structure'] = $TEMPSTRUCTURE;
     $TemArray['name'] = $StructureTheme;
?>
<div class="form-group" id='switchTem'>
    <label class="col-sm-3 control-label">Type</label>
    <div class="col-sm-6">
        <select class="form-control" name='structure'>
<?php
if($Article['category'] == "page"){
    $PageType = "page";
}else{
    $PageType = $Article['type'];
}
$PostCheck = explode("-",$PageType);
if($PostCheck["0"] == "post"){
    $PageType = "post";
}
if($PageType == ""){$PageType = "page"; }
if($LocalTem == "default"){
    $Layouts = $ThemeArray['structure'][$PageType];
}else{
    $Layouts = $TemArray['structure'][$PageType];
}

if(is_array($Layouts)){
    foreach($Layouts as $Layout=>$x_value){
        echo "<option value='$Layout'"; if($Article['other']['structure'] == $Layout){ echo "selected=selected"; } echo ">$Layout</option>";
    }
}
?>
        </select>
    </div>
</div>
