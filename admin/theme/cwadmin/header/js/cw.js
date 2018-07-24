function showUser(str) {
 if (str == "") {
        document.getElementById("txtHint").innerHTML = "";
        return;
    } else { 
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("txtHint").innerHTML = xmlhttp.responseText;
            }
        };
        xmlhttp.open("GET","/admin/theme/cwadmin/structure/html/"+str+".php",true);
        xmlhttp.send();
    }
}

function showTeam(str) {
 if (str == "") {
        document.getElementById("sportTeam").innerHTML = "";
        return;
    } else { 
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("sportTeam").innerHTML = xmlhttp.responseText;
            }
        };
        xmlhttp.open("GET","/admin/scripts/listteam.php?compare=<?php echo $_GET['compare']; ?>&id="+str,true);
        xmlhttp.send();
    }
}

function showTeamChance(str) {
 if (str == "") {
        document.getElementById("sportTeamChance").innerHTML = "";
        return;
    } else { 
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("sportTeamChance").innerHTML = xmlhttp.responseText;
            }
        };
        xmlhttp.open("GET","/admin/scripts/listteam.php?compare=<?php echo $_GET['compare']; ?>&id="+str,true);
        xmlhttp.send();
    }
}

function showTeamCompare(str) {
 if (str == "") {
        document.getElementById("sportTeamCompare").innerHTML = "";
        return;
    } else { 
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("sportTeamCompare").innerHTML = xmlhttp.responseText;
            }
        };
        xmlhttp.open("GET","/admin/scripts/listteam.php?compare=<?php echo $_GET['compare']; ?>&id="+str,true);
        xmlhttp.send();
    }
}

function catType(str) {
 if (str == "") {
        document.getElementById("showCatType").innerHTML = "";
        return;
    } else { 
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("showCatType").innerHTML = xmlhttp.responseText;
            }
        };
        xmlhttp.open("GET","/admin/scripts/catType.php?compare=<?php echo $_GET['compare']; ?>&catid="+str,true);
        xmlhttp.send();
    }
}


function switchTem(str) {
 if (str == "") {
        document.getElementById("switchTem").innerHTML = "";
        return;
    } else { 
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("switchTem").innerHTML = xmlhttp.responseText;
            }
        };
        xmlhttp.open("GET","/admin/scripts/template.php?temid="+str,true);
        xmlhttp.send();
    }
}