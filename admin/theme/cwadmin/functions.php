<?php

function Error404(){ ?><center><img src="http://onlinemarketingblog24.com/wp-content/uploads/2013/04/404-error.jpg"></center><?php } 

function PageTitle($Array){
    echo "<title>"; echo $Array['siteinfo']['name']; echo " Admin</title>"; 
}

function YouAreHere($Array){
    $UrlInfo = $Array['urlinfo'];
    $Article = $Array['article'];
    $Dynamic_Article = $Array['dynamicarticle'];
    $SiteInfo = $Array['siteinfo'];  ?>
    <!-- breadcrumbs -->
    <nav class="breadcrumbs">
    <ul><li><a href="<?php echo "$SiteInfo[domain]"; ?>">Home</a></li> 
    <?php  if($Array['dynamicsetup'] == 1){ $Article = $Dynamic_Article;}
$query = "SELECT * FROM articles WHERE id='$Article[id]' AND active='1' AND trash='0'";
$result = mysqli_query($CwDb.$query);
$row = mysqli_fetch_assoc($result);
$row = CwOrganize($row,$Array);
if($row['content']['name'] == ""){ $row['content']['name'] = $Article['content']['name']; }
if($row['category'] == ""){ $row[category] = "self"; }
if($row['category'] == "self"){ echo "<li>$row[content][name]</li>"; }else{
$Query = "SELECT * FROM articles WHERE id='$row[category]' AND active='1' AND trash='0'";
$Result = mysql_query($CwDb,$Query);
$Row = mysqli_fetch_assoc($Result);
echo "<li><a href='$SiteInfo[domain]/$Row[url]'>$Row[name]</a></li> 
<li>$row[name]</li>"; } echo "</ul></nav>";
}

function youtube($Code,$Width,$Height){
    if($Array['videosize']['width'] == ""){ $Array['videosize']['width'] = "670"; }
    if($Array['videosize']['height'] == ""){ $Array['videosize']['height'] = "270"; } ?>
    <iframe width="<?php echo $Width; ?>" height="<?php echo $Height; ?>" src="https://www.youtube.com/embed/<?php echo $Code; ?>?    &amp;autoplay=1&amp;rel=0&amp;fs=0&amp;showinfo=0&amp;controls=0&amp;hd=1&amp;wmode=transparent" frameborder="0" allowfullscreen="" class="black_border full_width"></iframe><?php
}

function vimeo($Code,$Width,$Height){
    if($Width == ""){ $Width = "670"; }
    if($Height == ""){ $Height = "270"; } ?>
    <iframe src="//player.vimeo.com/video/<?php echo $Code; ?>" width="<?php echo $Width; ?>" height="<?php echo $Height; ?>" frameborder="0" autoplay webkitallowfullscreen mozallowfullscreen     allowfullscreen></iframe><?php
}

function spotify($Code,$Width,$Height){
    if($Width == ""){ $Width = "670"; }
    if($Height == ""){ $Height = "270"; } ?>
<iframe src="https://embed.spotify.com/?uri=spotify:<?php echo $Code; ?>" style="display:block; margin:0 auto; width:<?php echo $Width; ?>px; height:<?php echo $Height; ?>px;" frameborder="0" allowtransparency="true"></iframe>
<?php }

function code($Code,$Width,$Height){
    echo $Code;
}

function audiofile($Code,$Width,$Height){ ?>
    <div class="audio-box">
    <audio controls>
    <source src="<?php echo $Code; ?>" type="audio/mpeg">
    </audio></div>
<?php }


function TwitterStatus($Array){
    include("./api/twitter/Twitter.php");
    $twitterUsername = "flexkartel";
    $twitterCacheFile = "./api/twitter/.cacheFile";
    $Twitter = new Twitter($twitterUsername,$twitterCacheFile);
    if($Twitter->tweet != false){
        echo "<p>Error loading tweets</p>";
    }else{
        $Tweet = $Twitter->tweet->text;
        $Tweet =  mb_convert_encoding("$Twitter" ,'CP1252','UTF-8');
    }
return $Tweet;
}

function PullArticles($Array){
    $UrlInfo = $Array['urlinfo'];
    $Article = $Array['article'];
    $SiteInfo = $Array['siteinfo'];
    $key = $Array['key'];?>
    <div class="row">
    <div class="col-lg-12">
    <div class="widget">
    <div class="widget-header"> <i class="icon-table"></i>
    <h3>Website Articles</h3></div>
    <div class="widget-content">
    <div class="example_alt_pagination">
    <div id="container">
    <div class="full_width big"></div>
    <div id="demo">
    <table cellpadding="0" cellspacing="0" border="0" class="display" id="example">
    <thead><tr>
    <th class="hidden-xs">Name</th>
    <th class="hidden-xs">Page Views</th>
    <th class="hidden-xs">Category</th>
    <th>Settings</th>
    </tr></thead><tbody>    
    <?php $Query = "SELECT * FROM articles WHERE category!='self' AND trash='0'"; 
    $Result = mysqli_query($CwDb.$Query);
    while($Row = mysqli_fetch_assoc($Result)){
    $ArticleCat = $Row['category'];
    $ArticleId = $Row['id'];
    $ArticleId = OtarEncrypt($key,$ArticleId);
    $query = "SELECT * FROM articles WHERE id='$ArticleCat' AND active='1' AND trash='0'"; 
    $result = mysqli_query($CwDb.$query);
    $row = mysqli_fetch_assoc($result); 
    if($Row['hits'] == ""){ $Row['hits'] = 0; } ?>
    <tr class="gradeX">
    <td><a href="/Articles/<?php echo $ArticleId; ?>"><?php echo $Row['name']; ?></a></td>
    <td class="hidden-xs"><?php echo $Row['hits']; ?></td>
    <td class="hidden-xs"><?php echo $row['name']; ?></td>
    <td class="hidden-xs"><button onclick="window.location.href='/Articles/<?php echo $ArticleId; ?>'" class="btn btn-sm btn-primary"> Edit </button>
    <button data-toggle="button" onclick="window.location.href='/Process/Delete/Articles/<?php echo $ArticleId; ?>'" class="btn btn-sm btn-warning"> Delete </button></td>
    </tr><?php } ?>
    </tbody><tfoot><tr><th></th><th></th>
    <th></th><th></th><th></th></tr></tfoot>
    </table></div></div></div></div>
    </div></div></div><?php
}



?>