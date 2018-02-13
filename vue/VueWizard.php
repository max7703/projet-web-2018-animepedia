<?php
/**
 * Created by PhpStorm.
 * User: max77
 * Date: 12/02/2018
 * Time: 19:41
 */

require_once 'VueHeader.php';

$header = new VueHeader();
$header->printHeader("Abonnement en cours..");

echo '
<link rel="stylesheet" href="../css/wizard_.css">
<div class="container pt-3">

      <div class="stepwizard">
    <div class="stepwizard-row setup-panel">
          <div class="stepwizard-step">
        <a href="#step-1" type="button" class="btn btn-primary btn-circle">1</a>
        <p>Etape 1</p>
      </div>
        <div class="stepwizard-step">
        <a href="#step-2" type="button" class="btn btn-default btn-circle" disabled="disabled">2</a>
        <p>Etape 2</p>
      </div>
        </div>
  </div>
      <form role="form" action="" method="post">
    <div class="row setup-content" id="step-1">
        <div class="col-md-12">
              <h3> Etape 1</h3>
              <div class="form-group">
            <label class="control-label">Nom</label>
            <input  maxlength="100" type="text" required="required" class="form-control" placeholder="Entrer nom"  />
          </div>
              <div class="form-group">
            <label class="control-label">Prenom</label>
            <input maxlength="100" type="text" required="required" class="form-control" placeholder="Entrer prenom" />
          </div>
              <div class="form-group">
            <label class="control-label">Adresse</label>
            <textarea required="required" class="form-control" placeholder="Entrer adresse" ></textarea>
          </div>
              <button class="btn btn-primary nextBtn btn-lg pull-right" type="button" >Suivant</button>
            </div>
        </div>
    <div class="row setup-content" id="step-2">
        <div class="col-md-12">
              <h3> Etape 2</h3>
              <div class="form-group">
             <label class="control-label">Email PayPal</label>
             <input type="email" required="required" class="form-control" placeholder="Entrer email" />
             </div>
              <button class="btn btn-success btn-lg pull-right pt-2" type="submit">Payer</button>
            </div>
      </div>
  </form>
    </div>
    
    <script type="text/javascript" src="../js/wizard.js"></script>
';

include 'VueFooter.php';