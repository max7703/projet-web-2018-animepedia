activePagination = "all";

function afficherAnimesListe(str) {
    if(document.getElementById("paginator") != null)
    {
        document.getElementById("paginator").remove();
    }
    if(activePagination == "all")
    {
        document.getElementById("all").className = "page-item";
    }
    if (str.length==0) {
        document.getElementById("animesListe").innerHTML="";
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
            document.getElementById("animesListe").innerHTML=this.responseText;
            if (str.length == 1)
            {
                if(window.location.href.indexOf("page") > -1) {
                    window.history.pushState(null, null, "https://animepedia.fr/animes#"+str);
                }
                if(activePagination != str)
                {
                    document.getElementById(activePagination).className = "page-item";
                }
                activePagination = str.toUpperCase();
                document.getElementById(str.toUpperCase()).className = "page-item active";
            }
            else if (str.length >= 2)
            {
                document.getElementById(activePagination).className = "page-item";
            }
        }
    }
    xmlhttp.open("GET","https://animepedia.fr/controleur/ControleurAnime.php?name="+str,true);
    xmlhttp.send();
}