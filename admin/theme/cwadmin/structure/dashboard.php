<div class="cl-mcont">
<div class="row">
      <div class="col-md-3 col-sm-6">
        <div class="fd-tile detail clean tile-purple">
          <div class="content"><h1 class="text-left"><?php TotalVisitors(); ?></h1><p>Total Visitors</p></div>
          <div class="icon"><i class="fa fa-flag"></i></div>
          <a class="details" href="#">Details <span><i class="fa fa-arrow-circle-right pull-right"></i></span></a>
        </div>
      </div>
      <div class="col-md-3 col-sm-6">
        <div class="fd-tile detail clean tile-green">
          <div class="content"><h1 class="text-left"><?php MonthlyVisitors(); ?></h1><p>Visitors This Month</p></div>
          <div class="icon"><i class="fa fa-comments"></i></div>
          <a class="details" href="#">Details <span><i class="fa fa-arrow-circle-right pull-right"></i></span></a>
        </div>
      </div>
      <div class="col-md-3 col-sm-6">
        <div class="fd-tile detail clean tile-prusia">
          <div class="content"><h1 class="text-left"><?php TodayVisitors(); ?></h1><p>Todays Visitors</p></div>
          <div class="icon"><i class="fa fa-heart"></i></div>
          <a class="details" href="#">Details <span><i class="fa fa-arrow-circle-right pull-right"></i></span></a>
        </div>
      </div>
      <div class="col-md-3 col-sm-6">
        <div class="fd-tile detail clean tile-red">
          <div class="content"><h1 class="text-left"><?php echo Cw_Load_Avg("xxx","xxx","xxx"); ?></h1><p>Average Time to load Website</p></div>
          <div class="icon"><i class="fa fa-eye"></i></div>
          <a class="details" href="#">Details <span><i class="fa fa-arrow-circle-right pull-right"></i></span></a>
        </div>
</div>
</div>

<?php if($UserSiteAccess['editarticle'] == "1"){ ?>
<div class="row">



<div class="col-sm-12 col-md-12">
<div class="block-flat">
<div class="header"><h1>Welcome Back!</h1></div>
<div class="content">
<h3>Thanks again for using ColdWebs.</h3>
<p class="spacer">Use the links provided below for faster navigation.</p>
</div></div>
</div>


<div class="col-md-4">
<div class="block-flat">
<div class="header"><h3>Quick Links</h3></div>
<div class="content overflow-hidden">
<ul>
<li><a href="/admin/Articles/New">Create Article</a></li>
<li><a href="/admin/Category/New">Create Category</a></li>
<li><a href="/admin/Pages/New">Create Page</a></li>
<li><a href="/admin/Menu/">Edit Menu</a></li>
<li><a href="/admin/Articles/New">Full Featured UI</a></li>
</ul>						
</div></div></div>

<div class="col-md-4">
<div class="block-flat">
<div class="header"><h3>User Accounts</h3></div>
<div class="content overflow-hidden">
<ul>
<li><a href="/admin/Users/New">Create Account</a></li>
<li><a href="/admin/Users/">View Accounts</a></li>
<li><a href="/admin/Users/Pending">Pending Accounts</a></li>
<li><a href="/admin/Users/Suspended">Suspended Accounts</a></li>
<li><a href="/admin/Settings/">Settings</a></li>
</ul>						
</div></div></div>

<div class="col-md-4">
<div class="block-flat">
<div class="header"><h3>Unordered List</h3></div>
<div class="content overflow-hidden">
<ul>
<li>Cloud Services</li>
<li>Photo Upload</li>
<li>Music Downloads</li>
<li>Notifications</li>
<li>Full Featured UI</li>
</ul>						
</div></div></div>




<div class="col-md-12">
<div class="block-flat">
<div class="header"><h3>Quick Post</h3></div>
<form role="form" method='post' action='/Process/Articles' enctype="multipart/form-data">
<div class="form-group">
<label class="col-sm-3 control-label">Title</label>
<div class="col-sm-6">
<input type="text" name='name' placeholder="Enter Title" class="form-control" value=''>
</div></div><br><br>
<div class="form-group">
<label class="col-sm-3 control-label">Status</label>
<div class="col-sm-6">
<select class="form-control" name='active'>
<option value="1">Active</option>
<option value="0">In-Active</option>
</select></div></div><br><br>
<div class="form-group">
<label class="col-sm-3 control-label">Category</label>
<div class="col-sm-6">
<select class="form-control" name='category'>
<option value="<?php echo $Array['dynamicarticle']['category']; ?>">Select Below</option>
<?php  $query = "SELECT * FROM articles WHERE category='self' AND type='category' AND active='1' AND trash='0'"; 
$result = mysql_query($query) or die(mysql_error());
while($row = mysql_fetch_array($result)){
$row = PbUnSerial($row);
echo "<option value='$row[id]'"; if($row['id'] == $Array['dynamicarticle']['category']){ echo "selected=selected"; }; ?>><?php echo $row['content']['name']; ?></option> <?php } ?>
</select></div></div><br><br>
<div class="form-group">
<label class="col-sm-3 control-label">Upload Photo</label>
<div class="col-sm-6">
<input type="file" name='profilepic[]'>
</div></div><br><br>
<div class="form-group">
<textarea name='content' id='editor'><?php echo $Array['dynamicarticle']['info']; ?></textarea>
</div><br><button class="btn btn-primary" type="submit">Submit</button></div>
<input type="hidden" name="imgtype" value="post">
<input type="hidden" name="userid" value="<?php echo $Array['userinfo']['id']; ?>">
<input type="hidden" name="quickpost" value="1">
</form></div><?php } ?>

      
     
     
     
     
     
     
     

<div class="col-md-6">

<div class="block-flat">
<?php if($UserSiteAccess['edittask'] == "1"){ ?>
<div class="header">
<h3>Website Tasks</h3></div>
<div class="content">
<div class="table-responsive">
<table class="no-border hover list">
<tbody class="no-border-y">
<?php
$Query = "SELECT * FROM tasks WHERE user='$Current_Admin_Id' AND active='1' AND trash='0' ORDER BY id DESC LIMIT 0,5"; 
$Result = mysql_query($Query) or die(mysql_error());
while($Row = mysql_fetch_array($Result)){
$row = PbUnSerial($row); ?>
<tr class="items">
    <td style="width: 10%;"><span class="label label-warning">Task</span></td>
    <td><p><strong><?php echo $row['content']['name']; ?></strong><span><?php echo $row['content']['desc']; ?></span></p></td>
    <td class="color-success"><div class="progress"><div class="progress-bar progress-bar-warning" style="width: 80%">80%</div></div></td>
    <td class="text-right" style="width: 15%;"><a class="label label-default" href="#"><i class="fa fa-pencil"></i></a> <a class="label label-danger" href="#"><i class="fa fa-times"></i></a></td>
</tr><?php } ?>
</tbody></table>		
</div></div>
</div><?php } ?>
</div>




<div class="col-md-6">
<?php if($UserSiteAccess['viewusers'] == "1"){ ?>
<div class="block-flat">
<div class="header">
<h3>Latest Registered Users</h3></div>
<div class="content">
<div class="table-responsive">
<table class="table table-bordered" id="datatable" >
<thead><tr>
<th>Name</th>
<th>Account Type</th>
<th>Status</th>
<th>Settings</th>
</tr></thead>
<tbody><?php
$Query = "SELECT * FROM users WHERE email!='' ORDER BY id DESC LIMIT 0,5"; 
$Result = mysql_query($Query) or die(mysql_error());
while($Row = mysql_fetch_array($Result)){
    if($Row['content'] == ""){ }else{ $Row['content'] = unserialize($Row['content']); }
    if($Row['info'] == ""){ }else{ $Row['info'] = unserialize($Row['info']); } 
    if($Row['info']['access'] == "0"){
    }else{
        $Access = CwUserAccess($Row['info']['access']);
        $Status = CwUserStatus($Row['info']['status']);
        if(mysql_real_escape_string($Row['name']) == ""){
            $Row['name'] = $Row['info']['firstname'] . " " . $Row['info']['lastname'];
        }
?>
<tr class="odd gradeX">
<td><?php echo mysql_real_escape_string($Row['name']); ?></td>
<td><?php echo mysql_real_escape_string($Access); ?></td>
<td><?php echo mysql_real_escape_string($Status); ?></td>
<td class="center"> 
<div class="btn-group">
<button class="btn btn-default btn-xs" type="button">Actions</button>
<button data-toggle="dropdown" class="btn btn-xs btn-primary dropdown-toggle" type="button"><span class="caret"></span><span class="sr-only">Toggle Dropdown</span></button>
<ul role="menu" class="dropdown-menu">
<li><a href="/admin/Users/<?php echo OtarEncrypt($key,$Row['id']); ?>">Edit</a></li>
<li class="divider"></li>
</ul></div></td>
</tr><?php }} ?>									
</tbody></table>							
</div></div></div>
</div><?php } ?>












<script>
	initSample();
</script>

<script type="text/javascript" src="http://condorthemes.com/flatdream/js/bootstrap.summernote/dist/summernote.min.js"></script>
<script type="text/javascript" src="http://condorthemes.com/flatdream/js/bootstrap.wysihtml5/lib/js/wysihtml5-0.3.0.js"></script>
<script type="text/javascript" src="http://condorthemes.com/flatdream/js/bootstrap.wysihtml5/src/bootstrap-wysihtml5.js"></script>




<script src="http://condorthemes.com/flatdream/js/behaviour/dashboard.js"></script>  
