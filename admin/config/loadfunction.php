<?php
$Array = "";
$ArticleId = OtarDecrypt($key,"");



$Id = $Article['id'];
$Query = "SELECT * FROM page_function WHERE template='$PageInfo[template]' AND page='$PageArticleId' AND trash='0' AND webid='$WebId' ORDER BY list"; 
$Result = mysql_query($Query) or die(mysql_error());
while($Row = mysql_fetch_array($Result)){
if($Row['contents'] == ""){ }else{ $Row['contents'] = unserialize($Row['contents']); }
$FunctionId = $Row[id]; ?>
<tr class="odd gradeX">
<td><?php echo $Row["function"]; ?></td>
<td><?php echo $Row['contents']['category']; ?></td>
<td><?php echo $Row["list"]; ?></td>
<td><?php if($Row['active'] == "1"){ echo "Active"; }else{ echo "In-Active"; } ?></td>
<td class="center">
<div class="btn-group">
<button class="btn btn-default btn-xs" type="button">Actions</button>
<button data-toggle="dropdown" class="btn btn-xs btn-primary dropdown-toggle" type="button"><span class="caret"></span><span class="sr-only">Toggle Dropdown</span></button>
<ul role="menu" class="dropdown-menu">
<li><a href="/admin/Functions/<?php echo OtarEncrypt($key,$FunctionId); ?>" target="function">Edit</a></li>
<li><a href="#">Copy</a></li>
<li><a href="#">Details</a></li>
<li class="divider"></li>
<li><a href="/Process/Delete/Functions/<?php echo OtarEncrypt($key,$FunctionId); ?>" target="function">Remove</a></li>
</ul></div></td>
</tr><?php } ?>



?>