<?php
include("ref/config.php");

$Query = "SELECT * FROM articles WHERE type='post-album' AND active='1' AND trash='0' AND id='$Album_Id'";
$Result = mysql_query($Query) or die(mysql_error());
$Row = mysql_fetch_array($Result);
$Row = PbUnSerial($Row);

?>




$(document).ready(function() {
    var myPlayer = new jPlayerPlaylist({
		jPlayer: "#jquery_jplayer_6",
		cssSelectorAncestor: "#jp_container_6"
	}, [
        //php writePlaylist('Y',' (!!duration!!)'); 
        //php writePlaylist('Y',"<span style='color:#828282'> (!!duration!!)</span>");
<?php 
$query = "SELECT * FROM images WHERE album='$Album_Id' AND type='track' AND active='1' AND trash='0' ORDER BY LIST";
$result = mysql_query($query) or die(mysql_error());
while($row = mysql_fetch_array($result)){
    $Count = $Count + 1;
    if($row['img'] == ""){
        $row['img'] = $Row['content']['img'];
    }
?>
        {
            title: "<?php echo $row["name"]; ?> <span>03:08</span>",
            mp3: "<?php echo $row["url"]; ?>",
            oga: "http://www.jplayer.org/audio/ogg/Miaow-02-Hidden.ogg",
            poster: "<?php echo $Row["content"]["img"]; ?>",
        }, 
<?php } ?>
    ],
     {
        playlistOptions: { loopOnPrevious: true, },
        loop: true,
        swfPath: "http://webmarce.com/html/musicbeat/images/jplayer.swf",
        supplied: "mp3, oga",
        wmode: "window",
        useStateClassSkin: true,
        autoBlur: false,
        preload: 'auto',
		preload: 'metadata',
        smoothPlayBar: true,
        audioFullScreen: true,
        keyEnabled: true,
        size: { width: "89px", height: "84px" },
    });

	var $jp = $('#jquery_jplayer_6');
	   $jp.on($.jPlayer.event.play,  function(e){
	       $('#current-track6').empty();
		   $('#current-track6').append(myPlayer.playlist[myPlayer.current].title);
	   });

});



// Video PLayer
$(document).ready(function(){

	new jPlayerPlaylist({
		jPlayer: "#jquery_jplayer_1",
		cssSelectorAncestor: "#jp_container_1"
	}, [
		{
			title:"Big Buck Bunny Trailer",
			artist:"Blender Foundation",
			m4v: "http://www.jplayer.org/video/m4v/Big_Buck_Bunny_Trailer.m4v",
			ogv: "http://www.jplayer.org/video/ogv/Big_Buck_Bunny_Trailer.ogv",
			webmv: "http://www.jplayer.org/video/webm/Big_Buck_Bunny_Trailer.webm",
			poster:"http://www.jplayer.org/video/poster/Big_Buck_Bunny_Trailer_480x270.png"
		},
		{
			title:"Finding Nemo Teaser",
			artist:"Pixar",
			m4v: "http://www.jplayer.org/video/m4v/Finding_Nemo_Teaser.m4v",
			ogv: "http://www.jplayer.org/video/ogv/Finding_Nemo_Teaser.ogv",
			webmv: "http://www.jplayer.org/video/webm/Finding_Nemo_Teaser.webm",
			poster: "http://www.jplayer.org/video/poster/Finding_Nemo_Teaser_640x352.png"
		},
		{
			title:"Incredibles Teaser",
			artist:"Pixar",
			m4v: "http://www.jplayer.org/video/m4v/Incredibles_Teaser.m4v",
			ogv: "http://www.jplayer.org/video/ogv/Incredibles_Teaser.ogv",
			webmv: "http://www.jplayer.org/video/webm/Incredibles_Teaser.webm",
			poster: "http://www.jplayer.org/video/poster/Incredibles_Teaser_640x272.png"
		},
		{
			title:"Big Buck Bunny Trailer",
			artist:"Blender Foundation",
			m4v: "http://www.jplayer.org/video/m4v/Big_Buck_Bunny_Trailer.m4v",
			ogv: "http://www.jplayer.org/video/ogv/Big_Buck_Bunny_Trailer.ogv",
			webmv: "http://www.jplayer.org/video/webm/Big_Buck_Bunny_Trailer.webm",
			poster:"http://www.jplayer.org/video/poster/Big_Buck_Bunny_Trailer_480x270.png"
		},
		{
			title:"Finding Nemo Teaser",
			artist:"Pixar",
			m4v: "http://www.jplayer.org/video/m4v/Finding_Nemo_Teaser.m4v",
			ogv: "http://www.jplayer.org/video/ogv/Finding_Nemo_Teaser.ogv",
			webmv: "http://www.jplayer.org/video/webm/Finding_Nemo_Teaser.webm",
			poster: "http://www.jplayer.org/video/poster/Finding_Nemo_Teaser_640x352.png"
		},
		{
			title:"Incredibles Teaser",
			artist:"Pixar",
			m4v: "http://www.jplayer.org/video/m4v/Incredibles_Teaser.m4v",
			ogv: "http://www.jplayer.org/video/ogv/Incredibles_Teaser.ogv",
			webmv: "http://www.jplayer.org/video/webm/Incredibles_Teaser.webm",
			poster: "http://www.jplayer.org/video/poster/Incredibles_Teaser_640x272.png"
		},
	], {
		swfPath: "http://webmarce.com/html/musicbeat/images/jplayer.swf",
		supplied: "webmv, ogv, m4v",
		useStateClassSkin: true,
		autoBlur: false,
		smoothPlayBar: true,
		keyEnabled: true,
		loop: true,
        wmode: "window",
        preload: 'auto',
		preload: 'metadata',
        audioFullScreen: true,
        size: { width: "100%", height: "436px" },
	});

});