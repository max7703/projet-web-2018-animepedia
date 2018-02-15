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

if( isset($_SESSION['logged_in']) && !empty($_SESSION['logged_in']) )
    header( "url: https://www.dev.animepedia.fr/home" );

echo '
<link rel="stylesheet" href="../css/login_.css">
<div class="container">
  <form class="form-signin" method="post" action="../controleur/ControleurLogin.php">
	<h2 class="form-signin-heading">Se connecter</h2>';
if( isset($_SESSION['message']) && !empty($_SESSION['message']))
{
    echo '<div class="alert alert-danger" role="alert">';
    echo $_SESSION['message'];
    echo '</div>';
}
    echo '
	<label for="loginUser" class="sr-only">Nom d\'utilisateur</label>
	<input type="text" id="loginUser" name="loginUser" class="form-control" placeholder="nom d\'utilisateur" required autofocus>
	<label for="loginPassword" class="sr-only">Mot de passe</label>
	<input type="password" id="loginPassword" name="loginPassword" class="form-control" placeholder="mot de passe" required>
	<div class="checkbox">
	  <label>
		<input type="checkbox" value="remember-me"> Se souvenir
	  </label>
	</div>
	<button class="btn btn-lg btn-primary btn-block" name="buttonLogin" type="submit">Connexion</button>
  </form>
</div> 

';


include 'VueFooter.php';