<?php
$ThemeId = OtarDecrypt($key,$_GET[type]);
include("../theme/$ThemeId[0]/settings.php");
?>


<div class="cl-mcont aside">	
    <div class="page-aside">
        <div>
            <div class="content">
                <h2><?php echo $ThemeId['1']; ?></h2>
                <br><br><br>
                <?php include("theme/cwadmin/extras/themesidebar.php"); ?>
            </div>
        </div>
    </div>
    
<div class="content">
<div class="cl-mcont">
<div class="page-head">
<ol class="breadcrumb">
<li><a href="/admin">Dashboard</a></li>
<li><a href="/admin/Design">Themes</a></li>
<li><a href="/admin/Design/<?php echo $_GET['type']; ?>"><?php echo $ThemeId['1']; ?></a></li>
<li class="active">Functions</li>
</ol></div>




<div class="row">
<div class="col-md-12">
<div class="block-flat">
<div class="header">							
<h3>Theme Widgets</h3>
</div>
<div class="content">
<div class="table-responsive">
<table class="table table-bordered" id="datatable" >
<thead>
<tr>
<th>Name</th>
<th>Status</th>
<th>Shortcode</th>
<th>Settings  -- > <a href="/admin/Design/<?php echo $_GET['type']; ?>/Functions/New">Create New</a></th>
</tr>
</thead>
<tbody>
<?php
$Query = "SELECT * FROM articles WHERE category='$ThemeId[2]' AND type='function' AND trash='0' AND webid='$WebId'"; 
$Result = mysqli_query($CwDb,$Query);
while($Row = mysqli_fetch_assoc($Result)){
    $Row = CwOrganize($Row,$Array);
    $QuerY = "SELECT * FROM page_function WHERE article='$Row[id]' AND webid='$WebId'";
    $ResulT = mysqli_query($CwDb,$QuerY);
    $RoW = mysqli_fetch_assoc($ResulT);
    $Shortcode = $RoW['shortcode'];
    $ArticleCat = $Row['category'];
    $artFunId = $Row['id'];
    $artFunId = OtarEncrypt($key,$artFunId);
    $query = "SELECT * FROM articles WHERE id='$ArticleCat' AND active='1' AND trash='0' AND webid='$WebId'";
    $result = mysqli_query($CwDb,$query);
    $row = mysqli_fetch_assoc($result);
    $row = CwOrganize($row,$Array);
?>
<tr class="odd gradeX">
<td><?php echo $Row['content']['name']; ?></td>
<td><?php if($Row['active'] == "1"){ echo "Active"; }else{ echo "In-Active"; } ?></td>
<td><?php if($Shortcode == ""){ }else{ echo "{{shortcode id=$Shortcode}"; }?></td>
<td class="center">
<div class="btn-group">
<button class="btn btn-default btn-xs" type="button">Actions</button>
<button data-toggle="dropdown" class="btn btn-xs btn-primary dropdown-toggle" type="button"><span class="caret"></span><span class="sr-only">Toggle Dropdown</span></button>
<ul role="menu" class="dropdown-menu">
<li><a href="/admin/Design/<?php echo $_GET['type']; echo "/Functions/"; echo $artFunId; ?>">Edit</a></li>
<li><a href="/Process/Copy/Function/<?php echo $artFunId; ?>">Copy</a></li>
<li class="divider"></li>
<li><a href="/Process/Delete/function/<?php echo $artFunId; ?>">Remove</a></li>
</ul></div></td>
</tr><?php } ?></tbody>
</table></div></div>
</div></div></div>














</div></div></div> </div>