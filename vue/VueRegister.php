<?php
/**
 * Created by PhpStorm.
 * User: max77
 * Date: 12/02/2018
 * Time: 21:50
 */

require_once 'VueHeader.php';
require_once '../controleur/ControleurRegister.php';

$header = new VueHeader();
$header->printHeader("S'enregistrer");

if( isset($_SESSION['logged_in']) && !empty($_SESSION['logged_in']) )
    header( "url: https://www.dev.animepedia.fr/home" );

echo '
<link rel="stylesheet" href="../css/register_.css">
<div class="container">
  <form class="form-signup" action="../controleur/ControleurRegister.php" method="post">
	<h2 class="form-signup-heading">S\'enregistrer</h2>';
if( isset($_SESSION['message']) && !empty($_SESSION['message']))
{
    echo '<div class="alert alert-danger" role="alert">';
    echo $_SESSION['message'];
    echo '</div>';
}
    echo '
	<label for="registerUsername" class="sr-only">Nom d\'utilisateur</label>
	<input type="text" id="registerUsername" name="registerUsername" class="form-control" placeholder="utilisateur" required autofocus>
	<label for="registerEmail" class="sr-only">Adresse email</label>
	<input type="email" id="registerEmail" name="registerEmail" class="form-control" placeholder="adresse email" required autofocus>
	<label for="registerPassword" class="sr-only">Mot de passe</label>
	<input type="password" id="registerPassword" name="registerPassword" class="form-control" placeholder="mot de passe" required>
	<button class="btn btn-lg btn-primary btn-block" name="buttonRegister" type="submit">S\'inscrire</button>
  </form>
</div>

';

include 'VueFooter.php';