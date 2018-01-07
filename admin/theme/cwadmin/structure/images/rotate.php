
<style>
    #image {
    transform-origin: top left; /* IE 10+, Firefox, etc. */
    -webkit-transform-origin: top left; /* Chrome */
    -ms-transform-origin: top left; /* IE 9 */
}
#image.rotate90 {
    transform: rotate(90deg) translateY(-100%);
    -webkit-transform: rotate(90deg) translateY(-100%);
    -ms-transform: rotate(90deg) translateY(-100%);
}
#image.rotate180 {
    transform: rotate(180deg) translate(-100%,-100%);
    -webkit-transform: rotate(180deg) translate(-100%,-100%);
    -ms-transform: rotate(180deg) translateX(-100%,-100%);
}
#image.rotate270 {
    transform: rotate(270deg) translateX(-100%);
    -webkit-transform: rotate(270deg) translateX(-100%);
    -ms-transform: rotate(270deg) translateX(-100%);
}
</style>
<?php
$Id = OtarDecrypt($key, $_GET["type"]);
#$Id = "305";


$query = "SELECT * FROM images WHERE id='$Id' AND active='1' AND trash='0' AND webid='$WebId'";
$result = mysql_query($query) or die(mysql_error());
$row = mysql_fetch_array($result);
$row = PbUnSerial($row);
$Img = $row['img'];

?>
<br><br>
        <center>
            <button type="button" class="btn btn-primary" id="button">Rotate Image</button>
            <button type="button" class="btn btn-primary" onclick="location.href='<?php echo $_SERVER["HTTP_REFERER"]; ?>';" >Return to Article</button>
                <br><br><br>
            <img src="<?php echo $Img; ?>" id="image" height="500" width='600' />




        </center>
        
<script>
    var angle = 0;
    img = document.getElementById('image');
    imgurl = document.getElementById('image').src;
        
        
document.getElementById('button').onclick = function() {
    angle = (angle+90)%360;
    img.className = "rotate"+angle;
    $.post("/api/coldwebs/cwrotate/rotate.php",{
        url: imgurl
    },
    function(data,status){
    });
}
</script>