<?php
include("forms/logincheck.php");
if($Login == "1"){
    
// TRACKS CHANGES MADE FROM USERS \\
    $Info = array();
/////////////////////////////////////////
		
	if($Get_Id == "images"){
		$Image = $_GET['end'];
		$Image = OtarDecrypt($key, $Image);
        $Post = Cw_Quick_Info("images", $WebId, $Image, $Array);
		$Album = $Post['album'];
		mysql_query("DELETE FROM images WHERE id='$Image' AND webid='$WebId'") 
		or die(mysql_error());
		$Album = OtarEncrypt($key,$Album);
		$Info["id"] = $Image;
        $Info["type"] = "images";
        $Info["manual_message"] = "Perm deleted imgage from Post";
		$Redirect = "admin/Articles/$Album";
	}

	if($Get_Id == "articles"){
		$Article = $_GET['end'];
		$Article = OtarDecrypt($key, $Article);
		$Post = Cw_Quick_Info("articles", $WebId, $Article, $Array);
		$result = mysql_query("UPDATE articles SET trash='1' WHERE id='$Article' AND webid='$WebId'") 
		or die(mysql_error());
		$result = mysql_query("UPDATE images SET trash='1' WHERE album='$Article' AND webid='$WebId'")
		or die(mysql_error());
		$Info["id"] = $Article;
        $Info["type"] = "articles";
        $Info["manual_message"] = "Sent post to trash";
		$Redirect = "admin/Articles";
	}

	if($Get_Id == "product"){
		$Article = $_GET['end'];
		$Article = OtarDecrypt($key, $Article);
		$Post = Cw_Quick_Info("articles", $WebId, $Article, $Array);
		$result = mysql_query("UPDATE articles SET trash='1' WHERE id='$Article' AND webid='$WebId'") 
		or die(mysql_error());
		$result = mysql_query("UPDATE images SET trash='1' WHERE album='$Article' AND webid='$WebId'")
		or die(mysql_error());
		$Info["id"] = $Article;
        $Info["type"] = "articles";
        $Info["manual_message"] = "Sent product to trash";
		$Redirect = "admin/Products";
	}
	
	if($Get_Id == "cart"){
		$Article = $_GET['end'];
		$Article = OtarDecrypt($key, $Article);
		$Post = Cw_Quick_Info("cw_cart", $WebId, $Article, $Array);
		$result = mysql_query("UPDATE cw_cart SET trash='1' WHERE id='$Article' AND webid='$WebId'") 
		or die(mysql_error());
		$Info["id"] = $Article;
        $Info["type"] = "cw_cart";
        $Info["manual_message"] = "Sent cart to trash";
		$Redirect = "Cart";
	}

	if($Get_Id == "product-images"){
		$Article = $_GET['end'];
		$Article = OtarDecrypt($key, $Article);
		$Post = Cw_Quick_Info("images", $WebId, $Article, $Array);
        $ProdId = OtarEncrypt($key, $Post[album]);
		$result = mysql_query("UPDATE images SET trash='1' WHERE id='$Article' AND webid='$WebId'")
		or die(mysql_error());
		$Info["id"] = $Article;
        $Info["type"] = "images";
        $Info["manual_message"] = "Sent product images to trash";
		$Redirect = "admin/Products/$ProdId";
	}

	if($Get_Id == "functions"){
		$Article = $_GET['end'];
		$Article = OtarDecrypt($key, $Article);
		$Post = Cw_Quick_Info("page_function", $WebId, $Article, $Array);
		$result = mysql_query("UPDATE page_function SET trash='1' WHERE id='$Article' AND webid='$WebId'") 
		or die(mysql_error());
		$Info["id"] = $Article;
        $Info["type"] = "page_function";
        $Info["manual_message"] = "Sent page fuunction to trash";
	?><script type='text/javascript'> window.close(); </script>
	<?php }

	if($Get_Id == "restore"){
		$Restore = $_GET['end'];
		$Restore = OtarDecrypt($key, $Restore);
		$RestoreType = $Restore['type'];
		$RestoreId = $Restore['id'];
		$RestoreId = OtarDecrypt($key, $RestoreId);
		$Post = Cw_Quick_Info($RestoreType, $WebId, $RestoreId, $Array);
		$result = mysql_query("UPDATE $RestoreType SET trash='0' WHERE id='$RestoreId' AND webid='$WebId'") 
		or die(mysql_error());
		$Info["id"] = $RestoreId;
        $Info["type"] = $RestoreType;
        $Info["manual_message"] = "Restored $RestoreType from trash";
		$Redirect = "admin/Archive/";
	}

	if($Get_Id == "pages"){
		$Page = $_GET['end'];
		$Page = OtarDecrypt($key, $Page);
		$Post = Cw_Quick_Info("page_template", $WebId, $Page, $Array);
		$result = mysql_query("UPDATE page_template SET trash='1' WHERE id='$Page' AND webid='$WebId'") 
		or die(mysql_error());
		$Info["id"] = $Page;
        $Info["type"] = "page_template";
        $Info["manual_message"] = "Sent page template to trash";
		$Redirect = "admin/Pages/";
	}

	if($Get_Id == "transfer"){
		$Page = $_GET['end'];
		$Page = OtarDecrypt($key, $Page);
		$Post = Cw_Quick_Info("transfer", $WebId, $Page, $Array);
		$result = mysql_query("UPDATE transfer SET trash='1' WHERE id='$Page' AND webid='$WebId'") 
		or die(mysql_error());
		$Info["id"] = $Page;
        $Info["type"] = "transfer";
        $Info["manual_message"] = "Sent transfer post to trash";
		$Redirect = "admin/Transfer/";
	}

	if($Get_Id == "delete"){
		$Restore = $_GET['end'];
		$Restore = OtarDecrypt($key, $Restore);
		$RestoreType = $Restore['type'];
		$RestoreId = $Restore['id'];
		$RestoreId = OtarDecrypt($key, $RestoreId);
		$Post = Cw_Quick_Info($RestoreType, $WebId, $RestoreId, $Array);
		mysql_query("DELETE FROM $RestoreType WHERE id='$RestoreId' AND webid='$WebId'") 
		or die(mysql_error());
		$Info["id"] = $RestoreId;
        $Info["type"] = $RestoreType;
        $Info["manual_message"] = "Permanently Deleted $RestoreType";
		$Redirect = "admin/Archive/";
	}
	
	if($Get_Id == "mail-delete"){
		$Restore = $_GET['end'];
		$RestoreId = OtarDecrypt($key, $Restore);
		$Post = Cw_Quick_Info("messages", $WebId, $RestoreId, $Array);
		mysql_query("UPDATE messages  SET trash='1' WHERE id='$RestoreId' AND webid='$WebId'") 
		or die(mysql_error());
		$Info["id"] = $RestoreId;
        $Info["type"] = "messages";
        $Info["manual_message"] = "Sent Message to trash";
		$Redirect = "admin/Inbox/";
	}
	
	if($Get_Id == "mail-restore"){
		$Restore = $_GET['end'];
		$RestoreId = OtarDecrypt($key, $Restore);
		$Post = Cw_Quick_Info("messages", $WebId, $RestoreId, $Array);
		mysql_query("UPDATE messages  SET trash='0' WHERE id='$RestoreId' AND webid='$WebId'") 
		or die(mysql_error());
		$Info["id"] = $RestoreId;
        $Info["type"] = "messages";
        $Info["manual_message"] = "Restored Message from trash";
		$Redirect = "admin/Inbox/";
	}
	

// TRACKS CHANGES MADE FROM USERS \\
    $Info["webid"] = $WebId;
    $Info["user"] = $Current_Admin_Id;
    $Info["error"] = $error;
    $Info["tracker"] = $Load_Sess;
    Cw_Changes($Info, $Post, $Array);
/////////////////////////////////////////

header("Location: http://$Website_Url_Auth/$Redirect");	
}
