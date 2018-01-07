
<script type='text/javascript'>//<![CDATA[
window.onload=function(){
/* EXTERNAL LINK WARNING
=========================================*/
$('a').on('click', function(e){
	e.preventDefault();
	var url = $(this).attr('href');
        var page = document.title;
        var host = location.host;	
        var xhttp = new XMLHttpRequest();
        var CwUserSess = "<?php echo $_COOKIE["_CwSess"]; ?>";	
	if(url.indexOf(host) > -1 || url.indexOf('http','https') == -1){
            xhttp.onreadystatechange = function(){
            };
            xhttp.open("POST", "./api/cwtracker/req.php?session="+CwUserSess+"&req=1&url="+url+"&idle=0&page="+page, true);
            xhttp.send(CwUserSess,'');
            window.location.href = url;
	}else{
            xhttp.onreadystatechange = function(){
            };
            xhttp.open("POST", "./api/cwtracker/req.php?session="+CwUserSess+"&req=0&url="+url+"&idle=1&page="+page, true);
            xhttp.send(CwUserSess,'');
            window.location.href = url;
	}
});
}//]]>
</script>

<script type="text/javascript">//<![CDATA[
var idleTime = 0;
$(document).ready(function (){
    //Increment the idle time counter every minute.
    var idleInterval = setInterval(timerIncrement, 60000);
    var xhttp = new XMLHttpRequest();
    //Zero the idle timer on mouse movement.
    $(this).mousemove(function (e) {
        idleTime = 0;
    });
    $(this).keypress(function (e) {
        idleTime = 0;
    });
});

function timerIncrement() {
    var xhttp = new XMLHttpRequest();
    var CwUserSess = "<?php echo $_COOKIE["_CwSess"]; ?>";	
    var url;
    idleTime = idleTime + 1;
    if (idleTime > 1){
window.location = "http://promoterblast.com";

    }
}
}//]]> 
</script>  