<?php
/**
 * Created by PhpStorm.
 * User: 1743549
 * Date: 08/02/2018
 * Time: 08:24
 */

class VueHeader
{
    public function printHeader($pagename) {
        echo '
<!DOCTYPE html>
<html lang="fr">
<head>
    <title>'. $pagename . '</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">';
        include '../links.html';
echo '
</head>
<body>
<link rel="stylesheet" href="../css/index_.css">
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
			<a class="nav-link" href="subscribe">Subscribe</a>
		  </li>
		  <li class="nav-item">
			<a class="nav-link" href="contact">Contact</a>
		  </li>
		  <li class="nav-item">
			<a class="nav-link" href="admin">Admin</a>
		  </li>
		</ul>
		<form class="form-inline pr-2 my-lg-0">
		  <input class="form-control mr-sm-2" placeholder="Search" type="text">
		  <button class="btn-lg btn-success" type="button">
		  <i class="fa fa-search"></i>
		  </button>
		</form>
		<ul class="nav navbar-nav navbar-right pr-2">
			<li class="dropdown">
				<a href="#" class="dropdown-toggle visible-lg visible-sm visible-xs" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true">
					<i class="fa fa-user fa-fw"></i>
					Guest
					<span class="caret"></span>
				</a>
				<ul class="dropdown-menu">
					<li>
						<a href="login">
							<i class="fa fa-sign-in fa-fw"></i>
							Login
						</a>
					</li>
					<li>
						<a href="register">
							<i class="fa fa-pencil fa-fw"></i>
							Register
						</a>
					</li>
				</ul>
			</li>
		</ul>
	  </div>
	</nav>
</header>
';
    }
}