<?php
include("config/ecommerce/functions.php");
include("api/coldwebs/parse/simple_html_dom.php");



/////////  VARIABLES  \\\\\\\\\
$Url = $_POST["url"];


///////// PROCESS VARIABLES \\\\\\\\\
$Url =  explode(",", $Url);


foreach($Url as $value){
    $Domain = str_replace("http://", "", $value);
    $Domain = str_replace("https://", "", $Domain);
    $pieces = explode("/", $Domain);
    $Domain = $pieces["0"];
    #$Domain = parse_url($value, PHP_URL_HOST);
    $Domain = str_replace("www.", "", $Domain);
    $Domain = str_replace(".", "", $Domain);
    $value = str_replace("http://", "", $value);
    $value = str_replace("https://", "", $value);
    $value = "http://" . $value;
    if(function_exists($Domain)){
        $Domain($value);
    }
}





/////////////   SITE IMPORT FUNCTIONS  \\\\\\\\\\\\\\\

function buy2beecom($Value){
    $html = file_get_html($Value);
    $ProdUrl = $Value;
    $Images = array();
    $Icount = "0";
    $WebId = $_SESSION["webid"];
    $Product_Info = array();
    $title =  $html->find('h2[class=product-name]')["0"]->innertext;
    $Product_Info["title"] = $title;
    $sku =  $html->find('h5[class=text-uppercase]')["0"]->innertext;
    $sku = str_replace("<br/>", "", $sku);
    $Product_Info["sku"] = $sku;
    $manufacture =  $html->find('span[id=product_manufacturer]')["0"]->innertext;
    $Product_Info["product_id"] =  $html->find('input[name=id_product]')["0"]->value;
    $Product_Info["manufacture"] = $manufacture;
    $BrandId = $Product_Info["manufacture"];
    $Msrp =  $html->find('strong[itemprop=price]')["0"]->innertext;
    $Product_Info["msrp"] = $Msrp;
    $Desc =  $html->find('div[class=box-large]')["0"]->innertext;
    $Desc = str_replace("<b>Description: </b>", "", $Desc);
    $Desc = str_replace("</p>", "", $Desc);
    $Desc = str_replace("<p>", "", $Desc);
    $Product_Info["description"] = $Desc;
    $title = strtolower($title);
    if(strpos($title, "women") !== false){
        $Gname = "women";
        $Category = explode("womens", $title);
    }
    if(strpos($title, "men") !== false){
        $Gname = "men";
        $Category = explode("mens", $title);
    }
    if(strpos($title, "kid") !== false){
        $Gname = "kid";
        $Category = explode("kids", $title);
    }
    $query = "SELECT * FROM admin WHERE name LIKE '$Gname%' AND type='prodcat'";
    $result = mysqli_query($CwDb, $query);
    $Gender = mysqli_fetch_assoc($result);
    $Genders = $Gender . "s";
    if($Gender["id"] == ""){
        mysqli_query($CwDb,"INSERT INTO admin(name, type, webid, url) 
		VALUES('$Gender', 'prodcat', '$WebId', '$Genders') ");
        $query = "SELECT * FROM admin WHERE type='prodcat' AND name='$Gname' AND webid='$WebId' AND url='$Genders'";
        $result = mysqli_query($CwDb, $query);
        $Gender = mysqli_fetch_assoc($result);
    }
    $Product_Info["cattype"] = $Gender["id"];
    $Category = explode(" ", $Category["1"]);
    $Category = $Category["1"];
    $query = "SELECT * FROM articles WHERE name LIKE '$Category%' AND type='prodcat' AND category='$Gender[id]'";
    $result = mysqli_query($CwDb, $query);
    $Cat = mysqli_fetch_assoc($result);
    if($Cat["id"] == ""){
        mysqli_query($CwDb,"INSERT INTO articles(name, type, webid, url,category) 
		VALUES('$Category', 'prodcat', '$WebId', '$Category', '$Gender[id]') ");
        $query = "SELECT * FROM articles WHERE name LIKE '$Category%' AND type='prodcat' AND category='$Gender[id]'";
        $result = mysqli_query($CwDb, $query);
        $Cat = mysqli_fetch_assoc($result);
    }
    $Product_Info["category"] = $Cat["id"];
    foreach($html->find('img[class=img-thumbnail]') as $element){
        $Icount = $Icount + 1;
        $Images[$Icount] = $element->src;
    }
    foreach($html->find('a[rel]') as $elemenT){
        $Value = $elemenT->rel;
        if(strpos($Value, 'gallery') !== false){
            $Iount = $Iount + 1;
            $pieces = explode(",", $Value);
            unset($pieces['0']);
            $pieces["1"] = str_replace(" smallimage: '", "", $pieces["1"]);
            $pieces["1"] = str_replace("'", "", $pieces["1"]);
            $pieces["2"] = str_replace("largeimage: '", "", $pieces["2"]);
            $pieces["2"] = str_replace("'}", "", $pieces["2"]);
            $Simages[$Iount] = $pieces;
        }
    }
    $Images = array_unique($Images);
    $Product_Info["images"] = $Images;
    $Product_Info["simages"] = $Simages;
    $count = "0";
    foreach($html->find('div[class=combination_values]') as $element){
        $Info = $element->innertext;
    	$count = $count + 1;
    	$Info = str_replace("</b>", "", $Info);
    	$Info = str_replace("<b>", "", $Info);
    	$Filter = explode(" ", $Info);
    	$Size = $Filter["1"];
    	$Size = str_replace(" ", "", $Size);
    	$Color = $Filter["2"];
    	$Color = str_replace(" ", "", $Color);
    	$Combo[$count]["size"] = $Size;
    	$Combo[$count]["color"] = $Color;
    	$Sizes[] = $Size;
    	$Colors[] = $Color;
    }
////CHECK IF COLOR FIELD IS ACTUALLY A COLOR \\\\ 
        $query = "SELECT * FROM cwoptions WHERE name='$Sizes[0]' AND webid='$WebId' AND category='color'";
        $result = mysqli_query($CwDb, $query);
        $row = mysqli_fetch_assoc($result);
        if($row["id"] != ""){
            $Ncolor = $Sizes;
            $NSizes = $Colors;
            $Colors = $Ncolor;
            $Sizes = $NSizes;
        }
    $count = "0";
    foreach($html->find('div[class=combination_availability]') as $element){
    	$count = $count + 1;
    	$Qty = $element->innertext;
    	$Qty = str_replace(" pcs .", "", $Qty);
    	$Qty = str_replace(" ", "", $Qty);
    	$Combo[$count]["qty"] = $Qty;
    	$QtyAmt = $QtyAmt + $Qty;
    }
    foreach($Combo as $key => $val){
        $Color = $val["color"];
        $Qty = $val["qty"];
        $SizE = $val["size"];
        $Count = $Count + 1;
        $NCombo[$Color][$SizE] = $Qty;
    }
    $Product_Info["qty"] = $QtyAmt;
    $Product_Info["combo"] = $NCombo;
    $Product_Info["vendor"] = "buy2bee";
    $query = "SELECT * FROM cwoptions WHERE type='supplier' AND trash='0' AND webid='$WebId' AND name='buy2bee'";
    $result = mysqli_query($CwDb, $query);
    $Supplier = mysqli_fetch_assoc($result);
    if($Supplier["id"] == ""){
        mysqli_query($CwDb,"INSERT INTO cwoptions(name, type, webid) 
		VALUES('buy2bee', 'supplier', '$WebId') ");
        $query = "SELECT * FROM cwoptions WHERE type='supplier' AND trash='0' AND webid='$WebId' AND name='buy2bee'";
        $result = mysqli_query($CwDb, $query);
        $Supplier = mysqli_fetch_assoc($result);
    }
    $Product_Info["supplier"] = $Supplier["id"];
    $query = "SELECT * FROM cwoptions WHERE type='brand' AND trash='0' AND webid='$WebId' AND name='$BrandId'";
    $result = mysqli_query($CwDb, $query);
    $Brand = mysqli_fetch_assoc($result);
    if($Brand["id"] == ""){
        mysqli_query($CwDb,"INSERT INTO cwoptions(name, type, webid) 
		VALUES('$BrandId', 'brand', '$WebId') ")or die(mysql_error());
        $query = "SELECT * FROM cwoptions WHERE type='brand' AND trash='0' AND webid='$WebId' AND name='$BrandId'";
        $result = mysqli_query($CwDb, $query);
        $Brand = mysqli_fetch_assoc($result);
    }
    $Product_Info["brand"] = $Brand["id"];
    foreach($Sizes as $Size){
        $query = "SELECT * FROM cwoptions WHERE category='size' AND trash='0' AND webid='$WebId' AND name='$Size'";
        $result = mysqli_query($CwDb, $query);
        $Siz = mysqli_fetch_assoc($result);
        if($Siz["id"] == ""){
            mysqli_query($CwDb,"INSERT INTO cwoptions(name, category, webid, type) 
    		VALUES('$Size', 'size', '$WebId', 'attribute') ")or die(mysql_error());
            $Query = "SELECT * FROM cwoptions WHERE category='size' AND trash='0' AND webid='$WebId' AND name='$Size'";
            $Result = mysql_query($Query) or die(mysql_error());
            $result = mysqli_query($CwDb, $query);
            $Siz = mysqli_fetch_assoc($result);
        }
        $NSizes[] = $Siz["id"];
    }
    $Product_Info["site_abr"] = "buy2bee_";
    $Product_Info["size"] = $NSizes;
    foreach($Colors as $Color){
        $query = "SELECT * FROM cwoptions WHERE category='color' AND trash='0' AND webid='$WebId' AND name='$Color'";
        $result = mysqli_query($CwDb, $query);
        $Col = mysqli_fetch_assoc($result);
        if($Col["id"] == ""){
            mysqli_query($CwDb,"INSERT INTO cwoptions(name, category, webid, type) 
    		VALUES('$Color', 'color', '$WebId', 'attribute') ")or die(mysql_error());
            $query = "SELECT * FROM cwoptions WHERE category='color' AND trash='0' AND webid='$WebId' AND name='$Color'";
            $result = mysqli_query($CwDb, $query);
            $Col = mysqli_fetch_assoc($result);
        }
        $NColors[] = $Col["id"];
    }
    $Product_Info["color"] = $NColors;
    $Product_Info["url"] = $ProdUrl;
    ImportProduct($Product_Info);
}







function ImportProduct($Value){
    $Type = "post-product";
    $Active = "3";
    $Featured = "0";
    $Name = $Value["title"];
    $Site = $Value["site_abr"];
    $WebId = $_SESSION["webid"];
    $Date_Created = strtotime("now");
    $Info = $Value['description'];
    $GalRand = RandomCode("10");
    $ShortCode = $Value["cattype"];
    $Article_Date = strtotime("now");
    $Article_Feat = "0";
    $Article_Url = "";
    $Article_Category = $Value["category"];
	$Article_Other["sku"] = "";
	$Article_Other["structure"] = "product";
	$Article_Other["layout"]["front"] = $Value["simages"]["1"]["1"];
    $Article_Other["layout"]["back"] = $Value["simages"]["2"]["1"];
	$Article_Other["suppliertype"] = "dropship";
	$Article_Other["supplier"] = $Value["supplier"];
	$Article_Other["resell"]["price"] = $Value["price"];
	$Article_Other["resell"]["msrp"] = $Value["msrp"];
	$Article_Other["resell"]["msrp"] = str_replace("$", "", $Article_Other["resell"]["msrp"]);
	$Article_Other["resell"]["avgprice"] = $Value["avgprice"];
	$Article_Other["resell"]["sku"] = $Value["sku"];
	$Article_Other["resell"]["product_id"] = $Value["product_id"]; //Add this to the main product update page so information dont get lost
	$Article_Other["resell"]["url"] = $Value["url"]; //Add this to the main product update page so information dont get lost
	$Article_Content["img"] = $Value["simages"]["1"]["1"];
	$Article_Content["revised"] = strtotime("now");
    $Article_Content['gender'] = $Value['gender'];
    $Article_Content['condition'] = "New";
    $Article_Content['shortdesc'] = $Value['description'];
    $Article_Content['combo'] = $Value['combo'];
    $Article_Content['color'] = $Value['color']["0"];
    $Article_Content["brand"] = $Value["brand"];
    $Article_Content['size'] = $Value['size'];
    $Article_Content['qty'] = $Value['qty'];
$Article_Content['prodprice'] = "";
$Article_Content['newprice'] = "";
$Article_Other["tags"] = "";
$Article_Other["wholesale"]["price"] = "";
$Article_Other["wholesale"]["percent"] = "";
///////////////////// FINALIZE ALL ARRAYS FOR UPLOAD TO DATABASE \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
    $Article_Content = Cw_Filter_Array($Article_Content);
    $Article_Other = Cw_Filter_Array($Article_Other);
	$Article_Content = serialize($Article_Content); 
	$Article_Other = serialize($Article_Other);
	mysqli_query($CwDb,"INSERT INTO articles(name, url, active, category, type, other, rand, date, feat, content, info, img, date_created, shortcode, webid) 
	VALUES('$Name', '$Article_Url', '$Active', '$Article_Category', '$Type', '$Article_Other', '$GalRand', '$Article_Date', '$Article_Feat', '$Article_Content', '$Info ', '$PostImages', '$Article_Date', '$ShortCode', '$WebId') ")or die(mysql_error());
	$query = "SELECT * FROM articles WHERE trash='0' AND rand='$GalRand' AND webid='$WebId'";
    $result = mysqli_query($CwDb, $query);
    $row = mysqli_fetch_assoc($result);
	$row = CwOrganize($row, $Array);
	$Album = $row["id"];
    $Count = "0";
    foreach($Value["simages"] as $value){
        $Count = $Count + 1;
        $Name = $Site . $Value["product_id"] . "_" . $Count . ".jpg";
        $your_path = "uploads/images/$Name";
        $Path = "/" . $your_path;
        $Limages[] = $Path;
        $Image = $value["1"];
        copy("$Image", $your_path);
        if(!file_exists($your_path)){
            $image = file_get_contents($Image);
            file_put_contents($your_path, $image);
        }
        mysqli_query($CwDb,"INSERT INTO images(img, album, type, webid, list) VALUES('$Path', '$Album', 'image', '$WebId', '$Count') ")or die(mysql_error());
    }
    $Layout["front"] = $Limages["0"];
    $Layout["back"] = $Limages["1"];
    $LCount = "0";
    foreach($Layout as $key => $Lay){
        $LCount = $LCount + 1;
        $Query = "SELECT * FROM articles WHERE id='$Album' AND webid='$WebId'";
        $Result = mysqli_query($CwDb, $Query);
        $Row = mysqli_fetch_assoc($Result);
    	$Row = CwOrganize($Row, $Array);
    	$Other = $Row["other"];
        $query = "SELECT * FROM images WHERE img='$Lay' AND album='$Album' AND webid='$WebId'";
        $result = mysqli_query($CwDb, $query);
        $row = mysqli_fetch_assoc($result);
    	if($key == "front"){
    	    $Other["layout"]["front"] = $row["id"];
    	    $Other = serialize($Other);
    	    $result = mysqli_query($CwDb,"UPDATE articles SET other='$Other' WHERE id='$Album' AND webid='$WebId'") 
    		or die(mysqli_error());
    	}else if($key == "back"){
    	    $Other["layout"]["back"] = $row["id"];
    	    $Other = serialize($Other);
    	    $result = mysqli_query($CwDb,"UPDATE articles SET other='$Other' WHERE id='$Album' AND webid='$WebId'") 
    		or die(mysqli_error());
    	}
    	$Other = unserialize($Other);
    }
// TRACKS CHANGES MADE FROM USERS \\
$Info = array();
$Manual_Message = "Imported Product";
$Info["webid"] = $WebId;
$Info["user"] = $_SESSION["current_user"];
$Info["error"] = $error;
$Info["tracker"] = $_COOKIE["_CwSess"];
$Info["manual_message"] = $Manual_Message;
$Info["id"] = $Album;
$Info["type"] = "articles";
Cw_Changes($Info, $Article, $Array);
/////////////////////////////////////////
}

	header("Location: http://$Website_Url_Auth/admin/Ecommerce-Pending");
?>