<?php
$Dynamic_Setup = $Array['dynamicsetup'];

if($Dynamic_Setup == "1"){
    $PostId = $Array['dynamicarticle']['id'];
    if($AddHits == "1"){
    $NewHits = $DynamicHits + 1;
    $result = mysqli_query("UPDATE articles SET hits='$NewHits' WHERE id='$PostId' AND webid='$WebId'");  
    }
}else{
    $PostId = $Array['article']['id'];
}


$query = "SELECT * FROM page_function WHERE active='1' AND trash='0' AND page='$PostId' AND template='$theme' AND webid='$WebId' ORDER BY list ASC";
$result = mysqli_query($CwDb,$query) ;
while($row = mysqli_fetch_assoc($result)){
    $Function_Type = $row['function'];
    $row = CwOrganize($row,$Array);
    if($row['contents']['category'] == ""){ $row['contents']['category'] = "all"; }
    $Function_Array = $row['contents'];
    $Array['function'] = $Function_Array;
    if(function_exists("$Function_Type")){
        $Function_Type($Array);
    }else{
    $Error['message'] = "A Function is being requested that does not exist";
    $Error["file"] = $Function_Type;
    $Error['type'] = "function";
    $Error['source'] = "homepage1";
    ReportError($Array,$Error);
    }
}

if($Function_Type == ""){ 
    $Error_404 = 1; 
    }
if($Error_404 == 1){ 
    Error404($Array); 
    }

?>