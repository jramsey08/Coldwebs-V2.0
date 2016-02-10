<div class="cl-mcont">
<div class="row">
      
      <div class="col-md-3 col-sm-6">
        <div class="fd-tile detail clean tile-purple">
          <div class="content"><h1 class="text-left"><?php TotalVisitors(); ?></h1><p>Total Sales</p></div>
          <div class="icon"><i class="fa fa-flag"></i></div>
          <a class="details" href="#">Details <span><i class="fa fa-arrow-circle-right pull-right"></i></span></a>
        </div>
      </div>
    
      
      <div class="col-md-3 col-sm-6">
        <div class="fd-tile detail clean tile-green">
          <div class="content"><h1 class="text-left"><?php MonthlyVisitors(); ?></h1><p>Sales This Month</p></div>
          <div class="icon"><i class="fa fa-comments"></i></div>
          <a class="details" href="#">Details <span><i class="fa fa-arrow-circle-right pull-right"></i></span></a>
        </div>
      </div>
      
      <div class="col-md-3 col-sm-6">
        <div class="fd-tile detail clean tile-prusia">
          <div class="content"><h1 class="text-left"><?php TodayVisitors(); ?></h1><p>Today's Sales</p></div>
          <div class="icon"><i class="fa fa-heart"></i></div>
          <a class="details" href="#">Details <span><i class="fa fa-arrow-circle-right pull-right"></i></span></a>
        </div>
      </div>
      
      <div class="col-md-3 col-sm-6">
        <div class="fd-tile detail clean tile-red">
          <div class="content"><h1 class="text-left"><?php PostsCount(); ?></h1><p>Pending Orders</p></div>
          <div class="icon"><i class="fa fa-eye"></i></div>
          <a class="details" href="#">Details <span><i class="fa fa-arrow-circle-right pull-right"></i></span></a>
        </div>
      </div>
    
    </div>
    
    
    
    
    
    
<div class="col-md-6">
<div class="row">

<div class="block-flat">
<div class="header"><h3>Quick Links</h3></div>
<div class="content">
<div class="col-md-12 clearfix spacer">
<div class="static-lg-menu">
<ul class="dropdown-menu col-menu-2 static-mn static-mn spacer">
<li class="col-sm-6 no-padding"><ul>
    <li class="dropdown-header"><i class="fa fa-group"></i>Users</li>
    <li><a href="#">Action</a></li>
    <li><a href="#">Another action</a></li>
    <li><a href="#">Something else here</a></li>
    <li class="dropdown-header"><i class="fa fa-gear"></i>Config</li>
    <li><a href="#">Action</a></li>
    <li><a href="#">Another action</a></li>
    <li><a href="#">Something else here</a></li> 
</ul></li>
<li  class="col-sm-6 no-padding"><ul>
    <li class="dropdown-header"><i class="fa fa-legal"></i>Sales</li>
    <li><a href="#">New sale</a></li>
    <li><a href="#">Register a product</a></li>
    <li><a href="#">Register a client</a></li> 
    <li><a href="#">Month sales</a></li>
    <li><a href="#">Delivered orders</a></li>
</ul></li>
</ul></div></div>
<div class="clearfix"></div>
</div></div>

</div></div>






























<div class="col-md-6">
<div class="block-flat">
<div class="header"><h3>E-Commerce Tasks</h3></div>
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
    <td><p><strong><?php echo $row[content][name]; ?></strong><span><?php echo $row['content']['desc']; ?></span></p></td>
    <td class="color-success"><div class="progress"><div class="progress-bar progress-bar-warning" style="width: 80%">80%</div></div></td>
    <td class="text-right" style="width: 15%;"><a class="label label-default" href="#"><i class="fa fa-pencil"></i></a> <a class="label label-danger" href="#"><i class="fa fa-times"></i></a></td>
</tr><?php } ?>
</tbody></table>		
</div></div>
</div>

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

















  <script src="http://condorthemes.com/flatdream/js/behaviour/dashboard.js"></script>