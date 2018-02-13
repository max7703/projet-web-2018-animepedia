<?php
/**
 * Created by PhpStorm.
 * User: max77
 * Date: 12/02/2018
 * Time: 21:50
 */

require_once 'VueHeader.php';

$header = new VueHeader();
$header->printHeader("S'enregistrer");

echo '
<link rel="stylesheet" href="../css/register_.css">
<div class="container">
  <form class="form-signup">
	<h2 class="form-signup-heading">S\'enregistrer</h2>
	<label for="inputUsername" class="sr-only">Nom d\'utilisateur</label>
	<input type="text" id="inputUsername" class="form-control" placeholder="utilisateur" required autofocus>
	<label for="inputEmail" class="sr-only">Adresse email</label>
	<input type="email" id="inputEmail" class="form-control" placeholder="adresse email" required autofocus>
	<label for="inputPassword" class="sr-only">Mot de passe</label>
	<input type="password" id="inputPassword" class="form-control" placeholder="mot de passe" required>
	<button class="btn btn-lg btn-primary btn-block" type="submit">S\'inscrire</button>
  </form>
</div>

';


include 'VueFooter.php';