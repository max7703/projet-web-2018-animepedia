<?php
/**
 * Created by PhpStorm.
 * User: max77
 * Date: 12/02/2018
 * Time: 21:58
 */

define("NOMDEPAGE", "404");
include_once $_SERVER['DOCUMENT_ROOT'] . '/configuration.php';
require ENTETE;
?>

<link rel="stylesheet" href= <?php echo CSS . "/404_.css" ?>>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="error-template">
                <h1>
                    <?php echo _("Oups!")?></h1>
                <h2>
                    <?php echo _("404 Page non trouv&eacute;e")?></h2>
                <div class="error-details">
                    <?php echo _("D&eacute;sol&eacute;, la page que vous avez demand&eacute; n'est pas disponible. ")?>
                </div>
                <div class="error-actions">
                    <a href="<?php echo SITE ?>home" class="btn btn-primary btn-lg"><span class="glyphicon glyphicon-home"></span>
                        <?php echo _("Retour &agrave; l'accueil")?> </a><a href="<?php echo SITE ?>contact" class="btn btn-default btn-lg"><span class="glyphicon glyphicon-envelope"></span> <?php echo _("Contacter le support")?> </a>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include PIEDDEPAGE;?>