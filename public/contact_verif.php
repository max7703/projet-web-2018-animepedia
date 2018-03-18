)<?php
// Initialisation des variables d'erreur.
$nomErreur ="";
$prenomErreur ="";
$emailErreur ="";
$telephoneErreur ="";
$regexTelephone=array("options"=>array("regexp"=>"/(\+|\-|\(|\)|[0-9]{1,5}|\s|)\d*/"));


// Initialisation du code lorsque l'on appuie sur le bouton envoyer
if(isset($_POST["submit"])) {
    /*--------------------------------------------------------------
    Récuperer la valeur du nom depuis l'URL et le nettoyer
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

    /*--------------------------------------------------------------
    Récuperer la valeur du prénom depuis l'URL et le nettoyer
    --------------------------------------------------------------*/
    if ($_POST["prenom"] != "") {
        // Nettoyer la valeur prénom de type string
        $_POST["prenom"] = filter_var($_POST["prenom"], FILTER_SANITIZE_STRING);
        $prenomErreur = "<span class=\"valid\">\"" . $_POST["prenom"] . "\" </span>est nettoyé et valide";
        if ($_POST["prenom"] == "") {
            $prenomErreur = "<span>S'il vous plaît, entrer un prénom valide.</span>";
        }
    } else {
        $prenomErreur = "<span>S'il vous plaît, entrer votre prénom.</span>";
    }

    /*------------------------------------------------------------------
    Récuperer la valeur de l'email depuis l'URL, le nettoyer et le valider
    --------------------------------------------------------------------*/
    if ($_POST["email"] != "") {
        // Nettoyage des caractères non autorisés
        $_POST["email"] = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
        // Validation de l'email
        $_POST["email"] = filter_var($_POST["email"], FILTER_VALIDATE_EMAIL);
        $emailErreur = "<span class=\"valid\">\"" . $_POST["email"] . "\" </span>est nettoyé et valide";
        if ($_POST["email"] == "") {
            $emailErreur = "<span>S'il vous plaît, entrer un email valide.</span>";
        }
    } else {
        $emailErreur = "<span>S'il vous plaît, entrer votre email.</span>";
    }

    /*------------------------------------------------------------------
    Récuperer la valeur du téléphone, le nettoyer et le valider
    --------------------------------------------------------------------*/
    if ($_POST["telephone"] != "") {
        // Nettoyer la valeur prénom de type string
        $_POST["telephone"] = filter_var($_POST["telephone"], FILTER_VALIDATE_REGEXP, $regexTelephone);
        $telephoneErreur = "<span class=\"valid\">\"" . $_POST["telephone"] . "\" </span>est nettoyé et valide";
        if ($_POST["telephone"] == "") {
            $telephoneErreur = "<span>S'il vous plaît, entrer un téléphone valide.</span>";
        }
    } else {
        $telephoneErreur = "<span>S'il vous plaît, entrer votre téléphone.</span>";
    }
}
?>


<p><?php echo $_POST["nom"];?></p>
<p><?php echo $nomErreur;?></p>
<p><?php echo $_POST["prenom"];?></p>
<p><?php echo $prenomErreur?></p>
<p><?php echo $_POST["email"];?></p>
<p><?php echo $emailErreur;?></p>
<p><?php echo $_POST["telephone"];?></p>
<p><?php echo $telephoneErreur;?></p>
<p><?php echo $_POST["message"];?></p>
