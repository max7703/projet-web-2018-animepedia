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
require_once PAIEMENTDAO;

$utilisateurDAO = new UtilisateurDAO();
$profil = $utilisateurDAO->obtenirUtilisateurParString($_SESSION['username']);

$privilegeDAO = new PrivilegeDAO();
$privilege = $privilegeDAO->obtenirPrivilegeById($profil->getId_Privilege());

$paiementDAO = new PaiementDAO();
$listePaiement = $paiementDAO->obtenirListePaiementsParUtilisateur($profil->getId());

?>
<link rel="stylesheet" href="<?php echo CSS_PROFIL?>">

<div class="container">
    <h2><?php echo _("Profil de")?> <strong class="text-default"><?php  echo $profil->getPseudo(); ?></strong></h2>
    <div class="row" style="margin-bottom: 20px;">
        <div class="img-profile col-sm-2" style="max-width: 150px;">
            <img id="img-utilisateur" class="avatar" src="<?php  echo $profil->getImage(); ?>">
        </div>
        <div class="col-sm-10">
            <dl class="row" style="margin: 20px 0 15px 0;">
                <dt class="col-sm-2"><?php echo _("ID:")?></dt><dd class="col-sm-10"><?php  echo $profil->getId(); ?></dd>
                <dt class="col-sm-2"><?php echo _("Classe:")?></dt><dd class="col-sm-10"><?php  echo $privilege->getNom(); ?></dd>
                <dt class="col-sm-2"><?php echo _("Créé le:")?></dt><dd class="col-sm-10">2017-07-07 15:51:25</dd>
            </dl>
        </div>
    </div>

    <?php
    if( isset($_SESSION['messageError']) && !empty($_SESSION['messageError']))
    {
        echo '<div class="alert alert-danger" role="alert">';
        echo $_SESSION['messageError'];
        $_SESSION['messageError'] = null;
        echo '</div>';
    }?>

    <?php
    if( isset($_SESSION['messageSuccess']) && !empty($_SESSION['messageSuccess']))
    {
        echo '<div class="alert alert-success" role="alert">';
        echo $_SESSION['messageSuccess'];
        $_SESSION['messageSuccess'] = null;
        echo '</div>';
    }?>

    <ul class="nav nav-tabs" id="profileTabs">
        <li class="nav-item">
            <a class="nav-link active" data-toggle="tab" href="#password">Mot de passe</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#email">Email</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#image">Image</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#transactions">Transactions</a>
        </li>
    </ul>

    <!-- Tab panes -->
    <div class="tab-content">
        <div class="tab-pane active container" id="password">
            <form method="POST" action="<?php echo CONTROLEURPROFIL?>">
                <div class="row">
                    <div class="form-group col-md-4">
                        <div class="form-group">
                            <label class="control-label" for="current_password"><?php echo _("Mot de passe actuel")?></label>
                            <input required="required" class="form-control" id="passwordActuel" name="passwordActuel" placeholder="Mot de passe actuel" title="" type="password" value="">
                        </div>

                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-4">
                        <div class="form-group">
                            <label class="control-label" for="new_password"><?php echo _("Nouveau mot de passe")?></label>
                            <input required="required"class="form-control" id="nouveauPassword" name="nouveauPassword" placeholder="Nouveau mot de passe" title="" type="password" value="">
                        </div>

                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-4">
                        <div class="form-group">
                            <label class="control-label" for="password_confirm"><?php echo _("Répéter le mot de passe")?></label>
                            <input required="required" class="form-control" id="passwordConfirmation" name="passwordConfirmation" placeholder="Confirmation du mot de passe" title="" type="password" value="">
                        </div>

                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <input type="submit" name="modifierPassword" value="Mettre à jour" class="btn btn-primary">
                    </div>
                </div>
            </form>
        </div>
        <div class="tab-pane container" id="image">
            <form action="<?php echo CONTROLEURPROFIL?>" method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="form-group col-md-4">
                        <p class="pt-2">Selectionner une image:</p>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-4">
                        <div class="form-group">
                            <input required="required" class="btn btn-primary" type="file" name="fileToUpload" id="fileToUpload">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-4">
                        <div class="form-group">
                            <input required="required" class="btn btn-primary" type="submit" value="Upload" name="upload-img">
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="tab-pane container" id="email">
            <form method="POST" action="<?php echo CONTROLEURPROFIL?>">
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
                            <input required="required" class="form-control" id="email" name="emailModifier" placeholder="Nouvelle adresse email" title="" type="email" value="">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-4">
                        <div class="form-group">
                            <label class="control-label" for="current_password"><?php echo _("Mot de passe actuel")?></label>
                            <input required="required" class="form-control" id="emailPasswordModifier" name="emailPasswordModifier" placeholder="Mot de passe actuel" title="" type="password" value="">
                        </div>

                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <input type="submit" name="modifierEmail" value="Mettre à jour" class="btn btn-primary">
                    </div>
                </div>
            </form>
        </div>
        <div class="tab-pane container" id="transactions">
            <div class="row">
                <div class="form-group col-md-4">
                    <?php
                    if (empty($listePaiement))
                    {
                        echo '<p>Aucun paiement effectué</p>';
                    }
                    else
                    {
                    echo '<table class="table table-striped table-hover">';
                        echo '<thead>';
                        echo '<tr>';
                        echo '<th>Paiement ID Paypal</th>
                            <th>Date</th>
                        </tr>
                        </thead>
                        <tbody>';
                            foreach ($listePaiement as $paiement)
                            {
                                echo '<tr>';
                                echo '<td>' . $paiement->getPaiement_Id_Paypal() . '</td>';
                                echo '<td>' . $paiement->getDate_Paiement() . '</td>';
                                echo '</td>';
                                echo '</tr>';
                            }
                        echo '</tbody>';
                    echo '</table>';
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>

<script>

</script>

<?php include PIEDDEPAGE;?>