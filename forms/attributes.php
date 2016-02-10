<?php
include("forms/logincheck.php");
if($Login == "1"){
	$AttId = OtarDecrypt($key,$_POST['id']);
	$AttId = $AttId['article'];

	if($AttId == ""){
		$query = "SELECT * FROM cwoptions WHERE type='$_POST[type]' AND category='$_POST[category]' AND name='$_POST[name]' ";
		$result = mysql_query($query) or die(mysql_error());
		$row = mysql_fetch_array($result);
		if($row['id'] == ""){
			mysql_query("INSERT INTO cwoptions
			(type, category, name, list) VALUES('$_POST[type]', '$_POST[category]', '$_POST[name]', '$_POST[list]' ) ") 
			or die(mysql_error()); 
		}else{
			if($row['active'] == "0"){
				$result = mysql_query("UPDATE cwoptions SET active='1' WHERE id='$row[id]'")
				or die(mysql_error());
			}
			if($row['trash'] == "1"){
				$result = mysql_query("UPDATE cwoptions SET trash='0' WHERE id='$row[id]'")
				or die(mysql_error());
			}
		}
	}else{
		$result = mysql_query("UPDATE cwoptions SET active='$_POST[active]' WHERE id='$AttId'")
		or die(mysql_error());
		$result = mysql_query("UPDATE cwoptions SET category='$_POST[category]' WHERE id='$AttId'")
		or die(mysql_error());
		$result = mysql_query("UPDATE cwoptions SET name='$_POST[name]' WHERE id='$AttId'")
		or die(mysql_error());
		$result = mysql_query("UPDATE cwoptions SET list='$_POST[list]' WHERE id='$AttId'")
		or die(mysql_error());
	}


	header("Location: $Domain/admin/Attributes");
}
?>