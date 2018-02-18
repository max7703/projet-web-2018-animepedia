<?php
// Initialisation des variables d'erreur.
$nomErreur ="";
$prenomErreur ="";
$emailErreur ="";

// Initialisation du code lorsque l'on appuie sur le bouton envoyer
if(isset($_POST["submit"])) {
    /*--------------------------------------------------------------
    Récuperer la valeur du nom et le nettoyer
    --------------------------------------------------------------*/
    if ($_POST["nom"] != "") {
        // Nettoyer la valeur nom de type string
        $_POST["nom"] = filter_var($_POST["nom"], FILTER_SANITIZE_STRING);
        if ($_POST["nom"] == "") {
            $nomErreur = "<span>S'il vous plaît, entrer un nom valide.</span>";
        }
    } else {
        $nomErreur = "<span>S'il vous plaît, entrer votre nom.</span>";
    }

    /*--------------------------------------------------------------
    Récuperer la valeur du prénom et le nettoyer
    --------------------------------------------------------------*/
    if ($_POST["prenom"] != "") {
        // Nettoyer la valeur prénom de type string
        $_POST["prenom"] = filter_var($_POST["prenom"], FILTER_SANITIZE_STRING);
        if ($_POST["prenom"] == "") {
            $prenomErreur = "<span>S'il vous plaît, entrer un prénom valide.</span>";
        }
    } else {
        $prenomErreur = "<span>S'il vous plaît, entrer votre prénom.</span>";
    }

    /*------------------------------------------------------------------
    Récuperer la valeur de l'email, le nettoyer et le valider
    --------------------------------------------------------------------*/
    if ($_POST["email"] != "") {
        // Nettoyage des caractères non autorisés
        $_POST["email"] = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
        // Validation de l'email
        $_POST["email"] = filter_var($_POST["email"], FILTER_VALIDATE_EMAIL);
        if ($_POST["email"] == "") {
            $emailErreur = "<span>S'il vous plaît, entrer un email valide.</span>";
        }
    } else {
        $emailErreur = "<span>S'il vous plaît, entrer votre email.</span>";
    }
}
?>