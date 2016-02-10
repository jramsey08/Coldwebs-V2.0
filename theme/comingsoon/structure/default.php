<?php if($Array[siteinfo][comingsoon] == ""){ $Array[siteinfo][comingsoon] = "/theme/comingsoon/uploads/comingsoon.jpg";} ?>
<body>

<!--// OPEN COUNTDOWN SCREEN //-->
<section id="countdown-screen" class="scrn full-height white-bg onepage-scroll">
<div class="mid-content wrapper">
<!--// OPEN LOGO & DESCR //-->

<header>
<div class="logo">
<a href="/<?php $Array[siteinfo][domain]; ?>"><?php echo $Array[siteinfo][name]; ?></a>
</div>

<div class="tagline"><span>
<?php
if($OfflineError[message] == ""){ 
    echo "Our site is coming soon";
}else{
    echo $OfflineError[message];
} ?></span>
</div>
</header>

<!--// CLOSE LOGO & DESCR //-->
<!--// OPEN COUNTDOWN //-->

<section id="countdown">
<fieldset>
<legend align="center">Perfection In Progress</legend>
<div class="body clearfix">
<img src="<?php echo $Array[siteinfo][comingsoon]; ?>" >
</div>

<div class="loading"></div>
</fieldset>
</section>
<!--// CLOSE COUNTDOWN //-->
</div>
</section>
<!--// CLOSE COUNTDOWN SCREEN //-->
