<?php
/**
 * Created by PhpStorm.
 * User: max77
 * Date: 12/02/2018
 * Time: 19:41
 */

define("NOMDEPAGE", _("Abonnement en cours..."));
include_once $_SERVER['DOCUMENT_ROOT'] . '/configuration.php';
require ENTETE;?>

<link rel="stylesheet" href=<?php echo CSS_WIZARD?>>
<div class="container pt-3">

      <div class="stepwizard">
    <div class="stepwizard-row setup-panel">
          <div class="stepwizard-step">
        <a href="#step-1" type="button" class="btn btn-primary btn-circle">1</a>
        <p><?php echo _("Etape 1");?></p>
      </div>
        <div class="stepwizard-step">
        <a href="#step-2" type="button" class="btn btn-default btn-circle" disabled="disabled">2</a>
        <p><?php echo _("Etape 2")?></p>
      </div>
        </div>
  </div>
      <form role="form" action="" method="post">
    <div class="row setup-content" id="step-1">
        <div class="col-md-12">
              <h3> <?php echo _("Etape 1")?></h3>
              <div class="form-group">
            <label class="control-label"><?php echo _("Nom")?></label>
            <input  type="text" required="required" class="form-control" placeholder=<?php echo _("Entrer nom");?>  />
          </div>
              <div class="form-group">
            <label class="control-label"><?php echo _("Prenom")?></label>
            <input type="text" required="required" class="form-control" placeholder=<?php echo _("Entrer prenom")?> />
          </div>
              <div class="form-group">
            <label class="control-label"><?php echo _("Adresse")?></label>
            <textarea required="required" class="form-control" placeholder=<?php echo _("Entrer adresse")?> ></textarea>
          </div>
              <button class="btn btn-primary nextBtn btn-lg pull-right" type="button" ><?php echo _("Suivant")?></button>
            </div>
        </div>
    <div class="row setup-content" id="step-2">
        <div class="col-md-12">
              <h3> <?php echo _("Etape 2")?></h3>
              <div class="form-group">
             <label class="control-label"><?php echo _("Email PayPal")?></label>
             <input type="email" required="required" class="form-control" placeholder=<?php echo _("Entrer email")?> />
             </div>
<!--              <button id="paypal-button" class="btn btn-success btn-lg pull-right pt-2" type="submit" name="paypal-button">--><?php //echo _("Payer")?><!--</button>-->
            <div id="paypal-button"></div>
            </div>
      </div>
  </form>
    </div>

    <script src="https://www.paypalobjects.com/api/checkout.js" data-version-4></script>
    <script type="text/javascript" src=<?php echo JSWIZARD?>></script>

<?php include PIEDDEPAGE;?>