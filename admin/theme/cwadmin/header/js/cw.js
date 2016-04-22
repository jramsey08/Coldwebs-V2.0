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
        xmlhttp.open("GET","/admin/scripts/catType.php?catid="+str,true);
        xmlhttp.send();
    }
}