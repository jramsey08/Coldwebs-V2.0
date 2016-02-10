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

	$ArticleContents = OtarDecrypt($key,$_POST['article']);
	$Article = $ArticleContents['article'];
	$Double = $Article_Other['double'];
	$Structure = $ArticleContents['structure'];
	$Function_Content = $Article_Other;
	$Article_Other = serialize($Article_Other);
	$Article_Content = serialize($Article_Content);


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

// PROCESS GALLERY IMAGE UPLOADS \\
	$Array["galleryupload"]["id"] = $ArticleId;
	CwGallery($Array,$files);
	if($Image_Order == ""){ 
	}else{
		foreach($Image_Order as $ImageO){
			$ImageId = key($Image_Order);
			$result = mysql_query("UPDATE images SET list='$ImageO' WHERE id='$ImageId'") 
			or die(mysql_error());
			next($Image_Order);
		}
	}

	if($Image_Url == ""){ 
	}else{
		foreach($Image_Url as $ImageU){
			$ImageUId = key($Image_Order);
			$result = mysql_query("UPDATE images SET url='$ImageU' WHERE id='$ImageUId'") 
			or die(mysql_error());
			next($Image_Url);
		}
	}


	if($ArticleId == ""){

		mysql_query("INSERT INTO articles (content,info,date,type,url,category,other,rand,feat,list)
		VALUES('$Article_Content', '$Function_Info', '$Date', '$ArticleType', '$Url', '$ArticleCategory', '$Article_Other', 
		'$Function_Rand', '$Function_Feat', '$Function_List') ") or die(mysql_error());

		$query = "SELECT * FROM articles WHERE rand='$Function_Rand'";
		$result = mysql_query($query) or die(mysql_error());
		$row = mysql_fetch_array($result);
		$Main_Function = $row['id'];

		mysql_query("INSERT INTO page_function (name,function,template,page,active,list,contents,rand,article,shortcode)
		VALUES('$Function_Name', '$Function_Type', '$Article_Theme', '$Function_Article', '$Function_Active', '$Function_List', '$Function_Content', '$Function_Rand', '$Main_Function', '$Shortcode' 
		) ") or die(mysql_error());

		$query = "SELECT * FROM page_function WHERE rand='$Function_Rand'";
		$result = mysql_query($query) or die(mysql_error());
		$row = mysql_fetch_array($result);
		$Function_Id = $row['id'];

		$result = mysql_query("UPDATE articles SET shortcode='$Function_Id' WHERE id='$Main_Function'") 
		or die(mysql_error());

	}else{

		$result = mysql_query("UPDATE articles SET active='$ArticleActive' WHERE id='$ArticleId'") 
		or die(mysql_error());
		$result = mysql_query("UPDATE articles SET list='$Article_List' WHERE id='$ArticleId'") 
		or die(mysql_error());
		$result = mysql_query("UPDATE articles SET content='$Article_Content' WHERE id='$ArticleId'") 
		or die(mysql_error());
		$result = mysql_query("UPDATE articles SET other='$Article_Other' WHERE id='$ArticleId'") 
		or die(mysql_error());    
		$result = mysql_query("UPDATE articles SET feat='$ArticleFeat' WHERE id='$ArticleId'") 
		or die(mysql_error());
		$result = mysql_query("UPDATE articles SET type='$ArticleType' WHERE id='$ArticleId'") 
		or die(mysql_error());
		$result = mysql_query("UPDATE articles SET info='$ArticleInfo' WHERE id='$ArticleId'") 
		or die(mysql_error());

		$query = "SELECT * FROM articles WHERE id='$ArticleId'";
		$result = mysql_query($query) or die(mysql_error());
		$row = mysql_fetch_array($result);
		$Function_Id = $row['shortcode'];

	   $result = mysql_query("UPDATE page_function SET name='$Function_Name' WHERE id='$Function_Id'") 
	   or die(mysql_error());
	   $result = mysql_query("UPDATE page_function SET function='$Function_Type' WHERE id='$Function_Id'") 
	   or die(mysql_error());
	   $result = mysql_query("UPDATE page_function SET active='$Function_Active' WHERE id='$Function_Id'") 
	   or die(mysql_error());
	   $result = mysql_query("UPDATE page_function SET list='$Function_List' WHERE id='$Function_Id'") 
	   or die(mysql_error());
	   $result = mysql_query("UPDATE page_function SET contents='$Function_Content' WHERE id='$Function_Id'")     
	   or die(mysql_error());
	   $result = mysql_query("UPDATE page_function SET rand='$Function_Rand' WHERE id='$Function_Id'") 
	   or die(mysql_error());
	   $result = mysql_query("UPDATE page_function SET template='$Article_Theme' WHERE id='$Function_Id'") 
	   or die(mysql_error());

	}




	$Redirect = $Array["siteinfo"]["domain"]; . "/admin/design/" . $ThemeUrl . "/Functions";
		
		

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