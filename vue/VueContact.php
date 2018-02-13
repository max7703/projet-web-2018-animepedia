<?php
/**
 * Created by PhpStorm.
 * User: max77
 * Date: 12/02/2018
 * Time: 22:05
 */

require_once 'VueHeader.php';

$header = new VueHeader();
$header->printHeader("Contact");

echo '
<div class="controls pt-3 offset-2">

	<div class="row">
		<div class="col-md-5">
			<div class="form-group">
				<label for="form_name">Prénom *</label>
				<input id="form_name" type="text" name="name" class="form-control" placeholder="Entrez votre prénom *" required="required" data-error="Le prénom est requis.">
				<div class="help-block with-errors"></div>
			</div>
		</div>
		<div class="col-md-5">
			<div class="form-group">
				<label for="form_lastname">Nom *</label>
				<input id="form_lastname" type="text" name="surname" class="form-control" placeholder="Entrez votre nom *" required="required" data-error="Le nom est requis.">
				<div class="help-block with-errors"></div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-5">
			<div class="form-group">
				<label for="form_email">Email *</label>
				<input id="form_email" type="email" name="email" class="form-control" placeholder="Entrez votre email *" required="required" data-error="Un email valide est requis.">
				<div class="help-block with-errors"></div>
			</div>
		</div>
		<div class="col-md-5">
			<div class="form-group">
				<label for="form_phone">Téléphone</label>
				<input id="form_phone" type="tel" name="phone" class="form-control" placeholder="Entrez votre numéro de téléphone">
				<div class="help-block with-errors"></div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-10">
			<div class="form-group">
				<label for="form_message">Message *</label>
				<textarea id="form_message" name="message" class="form-control" placeholder="Tapez votre message *" rows="4" required="required" data-error="S\'il vous plaît, laissez un meaage."></textarea>
				<div class="help-block with-errors"></div>
			</div>
		</div>
		<div class="col-md-12">
			<input type="submit" class="btn btn-success btn-send" value="Envoyer">
		</div>
	</div>
</div>

';

include 'VueFooter.php';