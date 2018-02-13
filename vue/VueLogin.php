<?php
/**
 * Created by PhpStorm.
 * User: max77
 * Date: 12/02/2018
 * Time: 21:47
 */

require_once 'VueHeader.php';

$header = new VueHeader();
$header->printHeader("Se connecter");

echo '
<link rel="stylesheet" href="../css/login_.css">
<div class="container">
  <form class="form-signin">
	<h2 class="form-signin-heading">Se connecter</h2>
	<label for="inputEmail" class="sr-only">Adresse mail</label>
	<input type="email" id="inputEmail" class="form-control" placeholder="adresse email" required autofocus>
	<label for="inputPassword" class="sr-only">Mot de passe</label>
	<input type="password" id="inputPassword" class="form-control" placeholder="mot de passe" required>
	<div class="checkbox">
	  <label>
		<input type="checkbox" value="remember-me"> Se souvenir
	  </label>
	</div>
	<button class="btn btn-lg btn-primary btn-block" type="submit">Connexion</button>
  </form>
</div> 

';


include 'VueFooter.php';