<?php
include("forms/logincheck.php");
if($Login == "1"){
	$Domain = $Array["siteinfo"]["domain"];
		
	if($Get_Id == "images"){
		$Image = $_GET['end'];
		$Image = OtarDecrypt($key, $Image);
		$query = "SELECT * FROM images WHERE id='$Image'";
		$result = mysql_query($query) or die(mysql_error());
		$row = mysql_fetch_array($result);
		$Album = $row['album'];
		mysql_query("DELETE FROM images WHERE id='$Image'") 
		or die(mysql_error());
		$Album = OtarEncrypt($key,$Album);
		header("Location: $Domain/admin/Articles/$Album");
	}

	if($Get_Id == "articles"){
		$Article = $_GET['end'];
		$Article = OtarDecrypt($key, $Article);
		$result = mysql_query("UPDATE articles SET trash='1' WHERE id='$Article'") 
		or die(mysql_error());
		$result = mysql_query("UPDATE images SET trash='1' WHERE album='$Article'")
		or die(mysql_error());
		header("Location: $Domain/admin/Articles");
	}

	if($Get_Id == "product"){
		$Article = $_GET['end'];
		$Article = OtarDecrypt($key, $Article);
		$result = mysql_query("UPDATE articles SET trash='1' WHERE id='$Article'") 
		or die(mysql_error());
		$result = mysql_query("UPDATE images SET trash='1' WHERE album='$Article'")
		or die(mysql_error());
		header("Location: $Domain/admin/Products");
	}

	if($Get_Id == "functions"){
		$Article = $_GET['end'];
		$Article = OtarDecrypt($key, $Article);
		$result = mysql_query("UPDATE page_function SET trash='1' WHERE id='$Article'") 
		or die(mysql_error()); 
	?><script type='text/javascript'> window.close(); </script>
	<?php }

	if($Get_Id == "restore"){
		$Restore = $_GET['end'];
		$Restore = OtarDecrypt($key, $Restore);
		$RestoreType = $Restore['type'];
		$RestoreId = $Restore['id'];
		$RestoreId = OtarDecrypt($key, $RestoreId);
		$result = mysql_query("UPDATE $RestoreType SET trash='0' WHERE id='$RestoreId'") 
		or die(mysql_error());
		header("Location: $Domain/admin/Archive/");
	}

	if($Get_Id == "pages"){
		$Page = $_GET['end'];
		$Page = OtarDecrypt($key, $Page);
		$result = mysql_query("UPDATE page_template SET trash='1' WHERE id='$Page'") 
		or die(mysql_error());
		header("Location: $Domain/admin/Pages/");
	}

	if($Get_Id == "transfer"){
		$Page = $_GET['end'];
		$Page = OtarDecrypt($key, $Page);
		$result = mysql_query("UPDATE transfer SET trash='1' WHERE id='$Page'") 
		or die(mysql_error());
		header("Location: $Domain/admin/Transfer/");
	}

<<<<<<< HEAD
	if($Get_Id == "cart"){
		$Page = $_GET['end'];
		$Page = OtarDecrypt($key, $Page);
		$result = mysql_query("UPDATE cw_cart SET trash='1' WHERE id='$Page'") 
		or die(mysql_error());
		header("Location: $Domain/Cart/");
	}

=======
>>>>>>> origin/master
	if($Get_Id == "delete"){
		$Restore = $_GET['end'];
		$Restore = OtarDecrypt($key, $Restore);
		$RestoreType = $Restore['type'];
		$RestoreId = $Restore['id'];
		$RestoreId = OtarDecrypt($key, $RestoreId);
		mysql_query("DELETE FROM $RestoreType WHERE id='$RestoreId'") 
		or die(mysql_error());
		header("Location: $Domain/admin/Archive/");
	}

}