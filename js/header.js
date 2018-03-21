function trouverAnime(str) {
    if (str.length==0) {
        document.getElementById("livesearch").innerHTML="";
        document.getElementById("livesearch").style.border="0px";
        document.getElementById("livesearch").className = "dropdown-menu";
        return;
    }
    if (window.XMLHttpRequest) {
        // code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp=new XMLHttpRequest();
    } else {  // code for IE6, IE5
        xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange=function() {
        if (this.readyState==4 && this.status==200) {
            document.getElementById("livesearch").innerHTML=this.responseText;
            document.getElementById("livesearch").style.border="1px solid #A5ACB2";
            document.getElementById("livesearch").className = "dropdown-menu show";
        }
    }
    xmlhttp.open("GET","https://animepedia.fr/controleur/ControleurAnime.php?q="+str,true);
    xmlhttp.send();
}