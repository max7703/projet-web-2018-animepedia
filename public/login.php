<?php
/**
 * Created by PhpStorm.
 * User: max77
 * Date: 12/02/2018
 * Time: 21:47
 */
define("NOMDEPAGE", "Connexion");
include_once $_SERVER['DOCUMENT_ROOT'] . '/configuration.php';
require ENTETE;

if( isset($_SESSION['logged_in']))
    header( "url: https://www.dev.animepedia.fr/home" );?>

<link rel="stylesheet" href=<?php echo CSS_CONNEXION?>>
<div class="container">
  <form class="form-signin" method="post" action=<?php echo CONTROLEURCONNEXION?>>
	<h2 class="form-signin-heading">Se connecter</h2>
      <?php
if( isset($_SESSION['message']) && !empty($_SESSION['message']))
{
    echo '<div class="alert alert-danger" role="alert">';
    echo $_SESSION['message'];
    $_SESSION['message'] = null;
    echo '</div>';
}?>
	<label for="loginUser" class="sr-only">Nom d'utilisateur</label>
	<input type="text" id="loginUser" name="loginUser" class="form-control" placeholder="nom d'utilisateur" required autofocus>
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


<?php include PIEDDEPAGE;?>