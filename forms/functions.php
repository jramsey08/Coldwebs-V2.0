<?php
include("forms/logincheck.php");
if($Login == "1"){

	$UpdateType = $_POST["updatetype"];
	$ThemeUrl = $_POST['themeurl'];

	$ArticleType = "function";
	$ArticleId = $_POST['articleid'];
	$ArticleCategory = $_POST['templateid'];
	$Article_Theme = $_POST['theme'];
	$ArticleActive = $_POST['active'];
	$ArticleInfo = $_POST['functiontype'];
	$ArticleFeat = $_POST['feat'];
	$Article_Content['content'] = $_POST['content'];
	$Article_Content['name'] = $_POST['name'];
	$Article_Content['type'] = $_POST['type'];

	$Article_Other['dbactive'] = $_POST['dbactive'];
	$Article_Other['ftype'] = $_POST['ftype'];
	$Article_Other['functiontype'] = $_POST['functiontype'];
	$Article_Other['ordering'] = $_POST['ordering'];
	$Article_Other['category'] = $_POST['category'];
	$Article_Other['gallery'] = $_POST['gallery'];

	$Image_Order = $_POST["ImageOrder"];
	$Image_Url = $_POST["ImageUrl"];
	$files = new UploadedFiles($_FILES);


/////////////////////////////////// SETS DEFAULT VARIABLE VALUES \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
	$ArticleContents = OtarDecrypt($key,$_POST['article']);
	$Article = $ArticleContents['article'];
	$Double = $Article_Other['double'];
	$Structure = $ArticleContents['structure'];
	$Function_Content = $Article_Other;

	#if($ArticleId == ""){
	#    $Article_Other['double'] = Array("article","type","category","id","video","url","name","feat","gallery","code","img");
	#}else{
	#    $Article_Other['double'] = $_POST['double'];
	#}


	$Function_Type_Id = $_POST["functionselect"];


	$Function_Info = $_POST['ftype'];
	$Function_Rand = RandomCode("20");
	$Function_Active = $_POST["active"]; 
	$Function_Page = $_POST["page"];
	$Function_Template = $_POST['template'];
	$Function_Dynamic = "0";
	$Function_Type = $_POST['functiontype'];
	$Function_Name = $_POST['name'];
	$Function_Content['active'] = $_POST['active'];
	$Function_Content['content'] = $_POST['content'];
	$Function_Content['name'] = $_POST['name'];
	$Function_Content['type'] = $_POST['type'];
	$Function_Content['feat'] = $_POST['feat'];

	$Shortcode = RandomCode("4");


	if($Function_Content['article'] == ""){
		$Function_Content['article'] = $Function_Content['category'];
	}

	#$Count = "0";
	#foreach ($Double as &$value){
	#    $Id = $value['article'];
	#    if($Id == ""){
	#    }else{
	#        $query = "SELECT * FROM articles WHERE id='$Id'";
	#        $result = mysql_query($query) or die(mysql_error());
	#        $row = mysql_fetch_array($result);
	#        $row = PbUnSerial($row);
	#        $Function_Content['double'][$Count]['video'] = $row['content']['codetype'];
	#        $Function_Content['double'][$Count]['code'] = $row['content']['code'];
	#        $Function_Content['double'][$Count]['img'] = $row['content']['img'];
	#        $Function_Content['double'][$Count]['embedcode'] = $row['content']['embedcode'];
	#        $Function_Content['double'][$Count]['content'] = $row['content']['content'];
	#        $Count = $Count + 1;
	#    }
	#}
	$Function_Content = serialize($Function_Content);


/////////////////////////////////////// PROCESSES ALL MEDIA UPLOADS \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
	$Array["galleryupload"]["id"] = $ArticleId;
	CwGallery($Array,$files);
	if($Image_Order == ""){ 
	}else{
		foreach($Image_Order as $ImageO){
			$ImageId = key($Image_Order);
			$result = mysql_query("UPDATE images SET list='$ImageO' WHERE id='$ImageId' AND webid='$WebId'") 
			or die(mysql_error());
			next($Image_Order);
		}
	}

	if($Image_Url == ""){ 
	}else{
		foreach($Image_Url as $ImageU){
			$ImageUId = key($Image_Order);
			$result = mysql_query("UPDATE images SET url='$ImageU' WHERE id='$ImageUId' AND webid='$WebId'") 
			or die(mysql_error());
			next($Image_Url);
		}
	}
	
	
/////////////////////////// FINALIZE ALL ARRAYS FOR UPLOAD TO DATABASE \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
    $Article_Content = Cw_Filter_Array($Article_Content);
    $Article_Other = Cw_Filter_Array($Article_Other);
    $Article_Content = serialize($Article_Content); 
    $Article_Other = serialize($Article_Other);



	if($ArticleId == ""){

        $Manual_Message = "Created Page Funtion";
        
		mysql_query("INSERT INTO articles (content,info,date,type,url,category,other,rand,feat,list,webid)
		VALUES('$Article_Content', '$Function_Info', '$Date', '$ArticleType', '$Url', '$ArticleCategory', '$Article_Other', 
		'$Function_Rand', '$Function_Feat', '$Function_List', '$WebId') ") or die(mysql_error());

		$query = "SELECT * FROM articles WHERE rand='$Function_Rand' AND webid='$WebId'";
		$result = mysql_query($query) or die(mysql_error());
		$row = mysql_fetch_array($result);
		$Main_Function = $row['id'];

		mysql_query("INSERT INTO page_function (name,function,template,page,active,list,contents,rand,article,shortcode,webid)
		VALUES('$Function_Name', '$Function_Type', '$Article_Theme', '$Function_Article', '$Function_Active', '$Function_List', '$Function_Content', '$Function_Rand', '$Main_Function',   
                '$Shortcode','$WebId') ") or die(mysql_error());

		$query = "SELECT * FROM page_function WHERE rand='$Function_Rand' AND webid='$WebId'";
		$result = mysql_query($query) or die(mysql_error());
		$row = mysql_fetch_array($result);
		$Function_Id = $row['id'];

		$result = mysql_query("UPDATE articles SET shortcode='$Function_Id' WHERE id='$Main_Function' AND webid='$WebId'") 
		or die(mysql_error());

	}else{
	    
	    $query = "SELECT * FROM articles WHERE id='$Article_Id'";
    	$result = mysql_query($query) or die(mysql_error());
    	$Article = mysql_fetch_array($result);
    	$Article = CwOrganize($Article,$Array);
        $Article = Cw_Filter_Array($Article);
        $Function_Id = $Article['shortcode'];
        
		$result = mysql_query("UPDATE articles SET active='$ArticleActive' WHERE id='$ArticleId' AND webid='$WebId'") 
		or die(mysql_error());
		$result = mysql_query("UPDATE articles SET list='$Article_List' WHERE id='$ArticleId' AND webid='$WebId'") 
		or die(mysql_error());
		$result = mysql_query("UPDATE articles SET content='$Article_Content' WHERE id='$ArticleId' AND webid='$WebId'") 
		or die(mysql_error());
		$result = mysql_query("UPDATE articles SET other='$Article_Other' WHERE id='$ArticleId' AND webid='$WebId'") 
		or die(mysql_error());    
		$result = mysql_query("UPDATE articles SET feat='$ArticleFeat' WHERE id='$ArticleId' AND webid='$WebId'") 
		or die(mysql_error());
		$result = mysql_query("UPDATE articles SET type='$ArticleType' WHERE id='$ArticleId' AND webid='$WebId'") 
		or die(mysql_error());
		$result = mysql_query("UPDATE articles SET info='$ArticleInfo' WHERE id='$ArticleId' AND webid='$WebId'") 
		or die(mysql_error());

		$query = "SELECT * FROM page_function WHERE id='$Function_Id' AND webid='$WebId'";
		$result = mysql_query($query) or die(mysql_error());
		$Function = mysql_fetch_array($result);
    	$Function = CwOrganize($Function,$Array);
        $Function = Cw_Filter_Array($Function);
        
        $result = mysql_query("UPDATE page_function SET name='$Function_Name' WHERE id='$Function_Id' AND webid='$WebId'") 
        or die(mysql_error());
        $result = mysql_query("UPDATE page_function SET function='$Function_Type' WHERE id='$Function_Id' AND webid='$WebId'") 
        or die(mysql_error());
        $result = mysql_query("UPDATE page_function SET active='$Function_Active' WHERE id='$Function_Id' AND webid='$WebId'") 
        or die(mysql_error());
        $result = mysql_query("UPDATE page_function SET list='$Function_List' WHERE id='$Function_Id' AND webid='$WebId'") 
        or die(mysql_error());
        $result = mysql_query("UPDATE page_function SET contents='$Function_Content' WHERE id='$Function_Id' AND webid='$WebId'")     
        or die(mysql_error());
        $result = mysql_query("UPDATE page_function SET rand='$Function_Rand' WHERE id='$Function_Id' AND webid='$WebId'") 
        or die(mysql_error());
        $result = mysql_query("UPDATE page_function SET template='$Article_Theme' WHERE id='$Function_Id' AND webid='$WebId'") 
        or die(mysql_error());
	}


// TRACKS CHANGES MADE FROM USERS \\
    $Info = array();
    $Info["webid"] = $WebId;
    $Info["user"] = $Current_Admin_Id;
    $Info["error"] = $error;
    $Info["tracker"] = $Load_Sess;
    $Info["id"] = $ArticleId;
    $Info["manual_message"] = $Manual_Message;
    $Info["child"]["id"] = $Function_Id;
    $Info["child"]["type"] = "page_function";
    $Info["type"] = "articles";
    Cw_Changes($Info, $Article, $Array);
    $Info = array();
    $Info["webid"] = $WebId;
    $Info["user"] = $Current_Admin_Id;
    $Info["error"] = $error;
    $Info["manual_message"] = $Manual_Message;
    $Info["child"]["id"] = $ArticleId;
    $Info["child"]["type"] = "articles";
    $Info["tracker"] = $Load_Sess;
    $Info["id"] = $Function_Id;
    $Info["type"] = "page_function";
    Cw_Changes($Info, $Function, $Array);
/////////////////////////////////////////

	$Redirect = "http://$Website_Url_Auth/admin/design/$ThemeUrl/Functions";
		

	if($Exit == "close"){ ?>
		<script type='text/javascript'>
		window.close();
		</script>
		Please Close This Browser.
	<?php
	}else{
		header("Location: $Redirect");
	}



}