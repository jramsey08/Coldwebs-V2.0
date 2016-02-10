<?php
$ThemeId = OtarDecrypt($key,$_GET[type]);
include("../theme/$ThemeId[0]/settings.php");
?>


<div class="cl-mcont aside">	
<div class="page-aside">
<div>
<div class="content">
<h2><?php echo $ThemeId[1]; ?></h2>
<br><br><br>
<?php include("theme/cwadmin/extras/themesidebar.php"); ?>
</div></div></div>



 

	  
    
<div class="content">
<div class="cl-mcont">
<div class="page-head">
<ol class="breadcrumb">
<li><a href="/admin">Dashboard</a></li>
<li><a href="/admin/Design">Themes</a></li>
<li><a href="/admin/Design/<?php echo $_GET['type']; ?>"><?php echo $ThemeId['1']; ?></a></li>
<li class="active">File Manager</li>
</ol></div>


</div>

</div></div></div> </div>