<?php
/**
 * Created by PhpStorm.
 * User: 1743549
 * Date: 08/02/2018
 * Time: 08:24
 */

/*class VueHeader
{
    public function printHeader($pagename) {
        session_start();
        error_reporting(E_ALL);
        ini_set('display_errors', 1);
        echo '
<!DOCTYPE html>
<html lang="fr">
<head>
    <title>'. $pagename . '</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">';
        include '../links.html';
echo '
</head>
<body>
<link rel="stylesheet" href="../css/index_.css">
<link rel="stylesheet" href="../css/header_.css">
<header>
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
	  <a class="navbar-brand" href="home">Animepedia</a>
	  <button class="navbar-toggler navbar-toggler-right collapsed" type="button" data-toggle="collapse" data-target="#navb" aria-expanded="false">
		<span class="navbar-toggler-icon"></span>
	  </button>

	  <div class="navbar-collapse collapse" id="navb" style="">
		<ul class="navbar-nav mr-auto">
		  <li class="nav-item">
			<a class="nav-link" href="animes">Animes</a>
		  </li>
		  <li class="nav-item dropdown">
			<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			  Community
			</a>
			<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
			  <a class="dropdown-item" href="forum">Forum</a>
			  <a class="dropdown-item" href="discord">Discord</a>
			</div>
		   </li>
		  <li class="nav-item">
			<a class="nav-link" href="subscribe">Abonnement</a>
		  </li>
		  <li class="nav-item">
			<a class="nav-link" href="contact">Contact</a>
		  </li>';
        if( isset($_SESSION['logged_in']) && !empty($_SESSION['logged_in']))
            echo '
                <li class="nav-item">
			        <a class="nav-link" href="admin">Admin</a>
		        </li>';
        echo '
		</ul>
		<form class="form-inline pr-2 my-lg-0">
		  <input class="form-control mr-sm-2" placeholder="Rechercher" type="text">
		  <button class="btn-lg btn-success search-index" type="button">
		  <i class="fa fa-search"></i>
		  </button>
		</form>
		<ul class="nav navbar-nav navbar-right pr-2">
			<li class="dropdown">
				<a href="#" class="dropdown-toggle visible-lg visible-sm visible-xs" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true">
					<i class="fa fa-user fa-fw"></i>';
                if( isset($_SESSION['logged_in']) && !empty($_SESSION['logged_in']) ) {
                    echo $_SESSION['username'];
                }
                else {
                    echo 'Invité';
                }
                echo '
					<span class="caret"></span>
				</a>
				<ul class="dropdown-menu">';
        if( isset($_SESSION['logged_in']) && !empty($_SESSION['logged_in'])) {
            echo '	<li>
						<a href="profile">
							<i class="fa fa-user fa-fw"></i>
							Profile
						</a>
					</li>
					<li>
						<a href="logout">
							<i class="fa fa-sign-out fa-fw"></i>
							Deconnexion
						</a>
					</li>';
        }
        else {
            echo '	<li>
						<a href="login">
							<i class="fa fa-sign-in fa-fw"></i>
							Connexion
						</a>
					</li>
					<li>
						<a href="register">
							<i class="fa fa-pencil fa-fw"></i>
							Inscription
						</a>
					</li>';
        }
        echo '
				</ul>
			</li>
		</ul>
	  </div>
	</nav>
</header>
';
    }
}*/
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <title> <?php echo $pagename ?></title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">';
        <?php include LINKS; ?>
echo '
</head>
<body>
<link rel="stylesheet" href="../css/index_.css">
<link rel="stylesheet" href="../css/header_.css">
<header>
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
	  <a class="navbar-brand" href="home">Animepedia</a>
	  <button class="navbar-toggler navbar-toggler-right collapsed" type="button" data-toggle="collapse" data-target="#navb" aria-expanded="false">
		<span class="navbar-toggler-icon"></span>
	  </button>

	  <div class="navbar-collapse collapse" id="navb" style="">
		<ul class="navbar-nav mr-auto">
		  <li class="nav-item">
			<a class="nav-link" href="animes">Animes</a>
		  </li>
		  <li class="nav-item dropdown">
			<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Community
			</a>
			<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
			  <a class="dropdown-item" href="forum">Forum</a>
			  <a class="dropdown-item" href="discord">Discord</a>
			</div>
		   </li>
		  <li class="nav-item">
			<a class="nav-link" href="subscribe">Abonnement</a>
		  </li>
		  <li class="nav-item">
			<a class="nav-link" href="contact">Contact</a>
		  </li>';
        if( isset($_SESSION['logged_in']) && !empty($_SESSION['logged_in']))
            echo '
<li class="nav-item">
			        <a class="nav-link" href="admin">Admin</a>
		        </li>';
        echo '
		</ul>
		<form class="form-inline pr-2 my-lg-0">
		  <input class="form-control mr-sm-2" placeholder="Rechercher" type="text">
		  <button class="btn-lg btn-success search-index" type="button">
		  <i class="fa fa-search"></i>
		  </button>
		</form>
		<ul class="nav navbar-nav navbar-right pr-2">
			<li class="dropdown">
				<a href="#" class="dropdown-toggle visible-lg visible-sm visible-xs" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true">
					<i class="fa fa-user fa-fw"></i>';
                if( isset($_SESSION['logged_in']) && !empty($_SESSION['logged_in']) ) {
                    echo $_SESSION['username'];
                }
                else {
                    echo 'Invité';
                }
                echo '
<span class="caret"></span>
				</a>
				<ul class="dropdown-menu">';
        if( isset($_SESSION['logged_in']) && !empty($_SESSION['logged_in'])) {
            echo '	<li>
						<a href="profile">
							<i class="fa fa-user fa-fw"></i>
Profile
						</a>
					</li>
					<li>
						<a href="logout">
							<i class="fa fa-sign-out fa-fw"></i>
Deconnexion
						</a>
					</li>';
        }
        else {
            echo '	<li>
						<a href="login">
							<i class="fa fa-sign-in fa-fw"></i>
Connexion
						</a>
					</li>
					<li>
						<a href="register">
							<i class="fa fa-pencil fa-fw"></i>
Inscription
						</a>
					</li>';
        }
        echo '
				</ul>
			</li>
		</ul>
	  </div>
	</nav>
</header>