<?php

function Error404(){ ?><center><img src="http://onlinemarketingblog24.com/wp-content/uploads/2013/04/404-error.jpg"></center><?php } 

function YouAreHere($Array){
$UrlInfo = $Array[urlinfo];
$Article = $Array[article];
$Dynamic_Article = $Array[dynamicarticle];
$SiteInfo = $Array[siteinfo];  ?>
<!-- breadcrumbs -->
<nav class="breadcrumbs">
<ul><li><a href="<?php echo "$SiteInfo[domain]"; ?>">Home</a></li> 
<?php  if($Array[dynamicsetup] == 1){ $Article = $Dynamic_Article;}
$query = "SELECT * FROM articles WHERE id='$Article[id]' AND active='1' AND trash='0'";
$result = mysql_query($query) or die(mysql_error());
$row = mysql_fetch_array($result);
if($row[name] == ""){ $row[name] = $Article[name]; }
if($row[category] == ""){ $row[category] = "self"; }
if($row[category] == "self"){ echo "<li>$row[name]</li>"; }else{
$Query = "SELECT * FROM articles WHERE id='$row[category]' AND active='1' AND trash='0'";
$Result = mysql_query($Query) or die(mysql_error());
$Row = mysql_fetch_array($Result);
echo "<li><a href='$SiteInfo[domain]/$Row[url]'>$Row[name]</a></li> 
<li>$row[name]</li>"; } echo "</ul></nav>"; }

function youtube($Array){ ?>
<iframe width="<?php echo $Array[videowidth]; ?>" height="<?php echo $Array[videoheight]; ?>" src="https://www.youtube.com/embed/<?php $Array[article][code]; ?>?&amp;autoplay=1&amp;rel=0&amp;fs=0&amp;showinfo=0&amp;controls=0&amp;hd=1&amp;wmode=transparent" frameborder="0" allowfullscreen="" class="black_border full_width"></iframe><?php }

function vimeo($Array){ ?>
<iframe src="//player.vimeo.com/video/<?php $Array[article][code]; ?>" width="520" height="270" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe><?php } 

function code($Array){ echo $Array[article][code]; }

function ComingSoon($Array){ ?>
    <br><br><br><br><div style="text-align: center;"><IMG SRC="/uploads/ComingSoon.jpg" ALT="image"></div>
<?php }
