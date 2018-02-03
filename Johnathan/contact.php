<html>
<head>
    <title>Contact</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <script src="assets/js/bootstrap.min.js"></script>
</head>
<body>

<form id="contact-form" method="post" action="contact.php" role="form">

    <div class="messages"></div>

    <div class="controls offset-2">

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
                    <textarea id="form_message" name="message" class="form-control" placeholder="Tapez votre message *" rows="4" required="required" data-error="S'il vous plaît, laissez un meaage."></textarea>
                    <div class="help-block with-errors"></div>
                </div>
            </div>
            <div class="col-md-12">
                <input type="submit" class="btn btn-success btn-send" value="Envoyer">
            </div>
        </div>
    </div>

</form>
</body>