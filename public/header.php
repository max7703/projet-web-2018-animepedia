<?php
/**
 * Created by PhpStorm.
 * User: 1743549
 * Date: 08/02/2018
 * Time: 08:24
 */
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <title><?= NOMDEPAGE ;?></title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php include LIENS ; ?>
</head>
<body>
<link rel="stylesheet" href=<?php echo CSS_INDEX ?>>
<link rel="stylesheet" href=<?php echo CSS_ENTETE ?>>
<header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="<?php echo SITE ?>home"><?php echo _("Animepedia")?></a>
        <button class="navbar-toggler navbar-toggler-right collapsed" type="button" data-toggle="collapse" data-target="#navb" aria-expanded="false">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="navbar-collapse collapse" id="navb" style="">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo SITE ?>animes"><?php echo _("Animes")?></a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="<?php echo SITE ?>forum" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <?php echo _("Communautés")?>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="<?php echo SITE ?>forum"><?php echo _("Forum")?></a>
                        <a class="dropdown-item" href="<?php echo SITE ?>discord"><?php echo _("Discord")?></a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo SITE ?>subscribe"><?php echo _("Abonnement")?></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo SITE ?>contact"><?php echo _("Contact")?></a>
                </li>
                <?php if( isset($_SESSION['logged_in']) && !empty($_SESSION['logged_in']))
                echo '
                <li class="nav-item">
                    <a class="nav-link" href="' . SITE .'admin">' . _("Admin") . '</a>
                </li>';?>
            </ul>
            <form class="form-inline pr-2 my-lg-0">
            <ul id="livesearch" class="dropdown-menu" style="left: auto"></ul>
                <input id="animeSearch" class="form-control mr-sm-2" placeholder="Rechercher" onkeyup="trouverAnime(this.value)" type="text">
                <button class="btn-lg btn-success search-index" type="button">
                    <span class="fa fa-search"></span>
                </button>
            </form>
            <ul class="nav navbar-nav navbar-right pr-2">
                <li class="dropdown">
                    <a href="<?php echo SITE ?>profile" class="dropdown-toggle visible-lg visible-sm visible-xs" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true">
                        <span class="fa fa-user fa-fw"></span>
                        <?php if( isset($_SESSION['logged_in']) && !empty($_SESSION['logged_in']) ) {
                        echo $_SESSION['username'];
                        }
                        else {
                        echo _('Invité');
                        }?>
                        <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <?php if( isset($_SESSION['logged_in']) && !empty($_SESSION['logged_in'])) {
                        echo '	
	                    <li>
                            <a href="'; echo SITE .'profile">
                                <span class="fa fa-user fa-fw"></span>
                                ' . _('Profil') . '
                            </a>
                        </li>
                        <li>
                            <a href="'; echo SITE .'logout">
                                <span class="fa fa-sign-out fa-fw"></span>' .
                                _("Deconnexion") . '
                            </a>
                        </li>';
                        }
                        else {
                        echo '	
	                    <li>
                            <a href="'; echo SITE .'login">
                                <span class="fa fa-sign-in fa-fw"></span>' .
                                _("Connexion") . '
                            </a>
                        </li>
                        <li>
                            <a href="'; echo SITE .'register">
                                <span class="fa fa-pencil fa-fw"></span> '.
                                _("Inscription") . '
                            </a>
                        </li>';
                        }?>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</header>
<script>
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
        xmlhttp.open("GET","../controleur/ControleurAnime.php?q="+str,true);
        xmlhttp.send();
    }
</script>