<?php
// Initialisation des variables d'erreur.
$nonErreur ="";
$prenomErreur ="";

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
    Récuperer la valeur du prénom et le nettoyer
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

}
?>


<p><?php echo $_POST["nom"];?></p>
<p><?php echo $nomErreur;?></p>
<p><?php echo $_POST["prenom"];?></p>
<p><?php echo $prenomErreur;?></p>
