<!DOCTYPE html>
<html>
	<head>
		<title>jQuery lightbox clone - prettyPhoto - by Stephane Caron</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js" type="text/javascript"></script>
		<!--script src="js/jquery.lint.js" type="text/javascript" charset="utf-8"></script-->
		<link rel="stylesheet" href="css/prettyPhoto.css" type="text/css" media="screen" title="prettyPhoto main stylesheet" charset="utf-8" />
		<script src="js/jquery.prettyPhoto.js" type="text/javascript" charset="utf-8"></script>
		

	</head>
	<body>
	





			<ul class="gallery clearfix">
				<li><a href="images/fullscreen/1.JPG?lol=lol" rel="prettyPhoto[gallery1]" title="You can add caption to pictures. You can add caption to pictures. You can add caption to pictures."><img src="images/thumbnails/t_1.jpg" width="60" height="60" alt="Red round shape" /></a></li>
				<li><a href="images/fullscreen/2.jpg" rel="prettyPhoto[gallery1]"><img src="images/thumbnails/t_2.jpg" width="60" height="60" alt="Nice building" /></a></li>
				<li><a href="images/fullscreen/3.jpg" rel="prettyPhoto[gallery1]"><img src="images/thumbnails/t_3.jpg" width="60" height="60" alt="Fire!" /></a></li>
				<li><a href="images/fullscreen/4.jpg" rel="prettyPhoto[gallery1]"><img src="images/thumbnails/t_4.jpg" width="60" height="60" alt="Rock climbing" /></a></li>
				<li><a href="images/fullscreen/5.jpg" rel="prettyPhoto[gallery1]"><img src="images/thumbnails/t_5.jpg" width="60" height="60" alt="Fly kite, fly!" /></a></li>
				<li><a href="images/fullscreen/6.jpg" rel="prettyPhoto[gallery1]"><img src="images/thumbnails/t_2.jpg" width="60" height="60" alt="Nice building" /></a></li>
			</ul>






	
			<script type="text/javascript" charset="utf-8">
			$(document).ready(function(){
				$("area[rel^='prettyPhoto']").prettyPhoto();
				
				$(".gallery:first a[rel^='prettyPhoto']").prettyPhoto({animation_speed:'normal',theme:'light_square',slideshow:3000, autoplay_slideshow: true});
				$(".gallery:gt(0) a[rel^='prettyPhoto']").prettyPhoto({animation_speed:'fast',slideshow:10000, hideflash: true});
		
				$("#custom_content a[rel^='prettyPhoto']:first").prettyPhoto({
					custom_markup: '<div id="map_canvas" style="width:260px; height:265px"></div>',
					changepicturecallback: function(){ initialize(); }
				});

				$("#custom_content a[rel^='prettyPhoto']:last").prettyPhoto({
					custom_markup: '<div id="bsap_1259344" class="bsarocks bsap_d49a0984d0f377271ccbf01a33f2b6d6"></div><div id="bsap_1237859" class="bsarocks bsap_d49a0984d0f377271ccbf01a33f2b6d6" style="height:260px"></div><div id="bsap_1251710" class="bsarocks bsap_d49a0984d0f377271ccbf01a33f2b6d6"></div>',
					changepicturecallback: function(){ _bsap.exec(); }
				});
			});
			</script>
	
	
	</body>
</html>