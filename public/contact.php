<html>
<head>
    <title>Contact</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <script src="assets/js/bootstrap.min.js"></script>
</head>
<body>

<form action="contact_verif.php" method="post" role="form">

    <div class="messages pt-4"></div>

    <div class="controls offset-2">

        <div class="row">
            <div class="col-md-5">
                <div class="form-group">
                    <label>Prénom *</label>
                    <input type="text" name="prenom" class="form-control" placeholder="Entrez votre prénom *">
                </div>
            </div>
            <div class="col-md-5">
                <div class="form-group">
                    <label>Nom *</label>
                    <input type="text" name="nom" class="form-control" placeholder="Entrez votre nom *">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-5">
                <div class="form-group">
                    <label>Email *</label>
                    <input type="email" name="email" class="form-control" placeholder="Entrez votre email *">
                </div>
            </div>
            <div class="col-md-5">
                <div class="form-group">
                    <label>Téléphone</label>
                    <input type="tel" name="telephone" class="form-control" placeholder="Entrez votre numéro de téléphone">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-10">
                <div class="form-group">
                    <label>Message *</label>
                    <textarea name="message" class="form-control" placeholder="Tapez votre message *" rows="4"></textarea>
                </div>
            </div>
            <div class="col-md-12">
                <input type="submit" name="submit" class="btn btn-success btn-send" value="Envoyer">
            </div>
        </div>
    </div>
</form>
</body>