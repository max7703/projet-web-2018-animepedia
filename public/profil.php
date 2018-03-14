<?php
/**
 * Created by PhpStorm.
 * User: max77
 * Date: 14/02/2018
 * Time: 21:23
 */

define("NOMDEPAGE", "Profil");
include_once $_SERVER['DOCUMENT_ROOT'] . '/configuration.php';

if (!isset($_SESSION['logged_in']))
    header("location: " . SITE . "home");

require_once ENTETE;
require_once UTILISATEURDAO;
require_once PRIVILEGEDAO;

$utilisateurDAO = new UtilisateurDAO();
$profil = $utilisateurDAO->obtenirUtilisateurParString($_SESSION['username']);

$privilegeDAO = new PrivilegeDAO();
$privilege = $privilegeDAO->obtenirPrivilegeById($profil->getId_Privilege());

?>
<link rel="stylesheet" href="<?php echo CSS_PROFIL?>">

<div class="container">
    <h2><?php echo _("Profil de")?> <strong class="text-default"><?php  echo $profil->getPseudo(); ?></strong></h2>
    <div class="row" style="margin-bottom: 20px;">
        <div class="col-sm-2" style="max-width: 150px;">
            <img class="avatar" src="https://www.gravatar.com/avatar/b95af81b980e4148dea02dc6be3c2dce?s=120&amp;d=https%3A%2F%2Fnyaa.si%2Fstatic%2Fimg%2Favatar%2Fdefault.png&amp;r=pg">
        </div>
        <div class="col-sm-10">
            <dl class="row" style="margin: 20px 0 15px 0;">
                <dt class="col-sm-2"><?php echo _("ID:")?></dt><dd class="col-sm-10"><?php  echo $profil->getId(); ?></dd>
                <dt class="col-sm-2"><?php echo _("Classe:")?></dt><dd class="col-sm-10"><?php  echo $privilege->getNom(); ?></dd>
                <dt class="col-sm-2"><?php echo _("Créé le:")?></dt><dd class="col-sm-10">2017-07-07 15:51:25</dd>
            </dl>
        </div>
    </div>


    <ul class="nav nav-tabs" id="profileTabs">
        <li class="nav-item">
            <a class="nav-link active" data-toggle="tab" href="#password">Mot de passe</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#email">Email</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#transactions">Transactions</a>
        </li>
    </ul>

    <!-- Tab panes -->
    <div class="tab-content">
        <div class="tab-pane active container" id="password">
            <form method="POST">
                <div class="row">
                    <div class="form-group col-md-4">
                        <div class="form-group">
                            <label class="control-label" for="current_password"><?php echo _("Mot de passe actuel")?></label>
                            <input class="form-control" id="current_password" name="current_password" placeholder="Mot de passe actuel" title="" type="password" value="">
                        </div>

                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-4">
                        <div class="form-group">
                            <label class="control-label" for="new_password"><?php echo _("Nouveau mot de passe")?></label>
                            <input class="form-control" id="new_password" name="new_password" placeholder="Nouveau mot de passe" title="" type="password" value="">
                        </div>

                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-4">
                        <div class="form-group">
                            <label class="control-label" for="password_confirm"><?php echo _("Répéter le mot de passe")?></label>
                            <input class="form-control" id="password_confirm" name="password_confirm" placeholder="Confirmation du mot de passe" title="" type="password" value="">
                        </div>

                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <input type="submit" value="Mettre à jour" class="btn btn-primary">
                    </div>
                </div>
            </form>
        </div>
        <div class="tab-pane container" id="email">
            <form method="POST">
                <div class="row">
                    <div class="form-group col-md-4">
                        <label class="control-label" for="current_email"><?php echo _("Adresse email actuelle")?></label>
                        <div><?php  echo $profil->getEmail(); ?></div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-4">
                        <div class="form-group">
                            <label class="control-label" for="email"><?php echo _("Nouvelle adresse email")?></label>
                            <input class="form-control" id="email" name="email" placeholder="Nouvelle adresse email" title="" type="email" value="">
                        </div>

                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-4">
                        <div class="form-group">
                            <label class="control-label" for="current_password"><?php echo _("Mot de passe actuel")?></label>
                            <input class="form-control" id="current_password" name="current_password" placeholder="Mot de passe actuel" title="" type="password" value="">
                        </div>

                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <input type="submit" value="Mettre à jour" class="btn btn-primary">
                    </div>
                </div>
            </form>
        </div>
        <div class="tab-pane container" id="transactions">
            <form method="POST">
                <div class="row">
                    <div class="form-group col-md-4">
                        //all previous payment
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>



<?php include PIEDDEPAGE;?>