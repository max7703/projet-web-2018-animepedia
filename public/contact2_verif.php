<?php
// Initialisation des variables d'erreur.
$nonErreur ="";

// Initialisation du code lorsque l'on appuie sur le bouton envoyer
if(isset($_POST["submit"])) {
    /*--------------------------------------------------------------
    Récuperer la valeur du nom et nettoyage
    --------------------------------------------------------------*/
    if ($_POST["nom"] != "") {
        // Nettoyer la valeur nom de type string
        $_POST["nom"] = filter_var($_POST["nom"], FILTER_SANITIZE_STRING);
        $nomErreur = "<span class=\"valid\">\"" . $_POST["nom"] . "\" </span>est nettoyé et valide";
        if ($_POST["nom"] == "") {
            $nomErreur = "<span>S'il vous plaît, entrer un nom valide.</span>";
        }
    } else {
        $nomErreur = "<span>S'il vous plaît, entrer votre nom.</span>";
    }
}
?>


<p><?php echo $_POST["nom"];?></p>
<p><?php echo $nomErreur;?></p>