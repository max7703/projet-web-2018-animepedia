<?php
/**
 * Created by PhpStorm.
 * User: max77
 * Date: 12/02/2018
 * Time: 21:50
 */



define("NOMDEPAGE", _("S'enregistrer"));
include_once $_SERVER['DOCUMENT_ROOT'] . '/configuration.php';
require ENTETE;
require_once CONTROLEURINSCRIPTION;


if( isset($_SESSION['logged_in']))
    header( HOMEPAGE );?>

<link rel="stylesheet" href=<?php echo CSS_INSCRIPTION?>>
<div class="container">
  <form class="form-signup" action=<?php echo CONTROLEURINSCRIPTION?> method="post">
	<h2 class="form-signup-heading"><?php echo _("S'enregistrer") ?></h2>
<?php if( isset($_SESSION['message']) && !empty($_SESSION['message']))
{
    echo '<div class="alert alert-danger" role="alert">';
    echo $_SESSION['message'];
    $_SESSION['message'] = null;
    echo '</div>';
}?>
	<label for="registerUsername" class="sr-only"><?php echo _("Nom d'utilisateur")?></label>
	<input type="text" id="registerUsername" name="registerUsername" class="form-control" placeholder="<?php echo _("Nom d'utilisateur")?>" required autofocus>
	<label for="registerEmail" class="sr-only"><?php echo _("Adresse email")?></label>
	<input type="email" id="registerEmail" name="registerEmail" class="form-control" placeholder="<?php echo _("Adresse email")?>" required autofocus>
	<label for="registerPassword" class="sr-only"><?php echo _("Mot de passe")?></label>
	<input type="password" id="registerPassword" name="registerPassword" class="form-control" placeholder="<?php echo _("Mot de passe")?>" required>
	<button class="btn btn-lg btn-primary btn-block" name="buttonRegister" type="submit"><?php echo _("S'inscrire")?></button>
  </form>
</div>

<?php include PIEDDEPAGE;?>