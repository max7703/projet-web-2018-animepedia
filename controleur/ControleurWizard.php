<?php
/**
 * Created by PhpStorm.
 * User: max77
 * Date: 03/03/2018
 * Time: 18:20
 */

include_once $_SERVER['DOCUMENT_ROOT'] . '/configuration.php';

require_once UTILISATEURDAO;
require_once MODELEUTILISATEUR;

if ($_SERVER['REQUEST_METHOD'] == 'GET')
{
    if (isset($_REQUEST['paiementID']))
    {
        $utilisateurDAO = new UtilisateurDAO();

        $paiementID = $_REQUEST["paiementID"];

        $username = $_SESSION['username'];
        $email = $_SESSION['email'];

        $utilisateurTemporaire = new Utilisateur(0, $username, "", $email, 0,"","");

        echo $utilisateurDAO->estExistant($utilisateurTemporaire);

        if($utilisateurDAO->estExistant($utilisateurTemporaire))
        {
            $utilisateur = $utilisateurDAO->obtenirUtilisateurParString($username);
            $id = $utilisateur->getId();
            $pseudo = $utilisateur->getPseudo();
            $email = $utilisateur->getEmail();
            $privilege = 3;
            $image = $utilisateur->getImage();
            $description = $utilisateur->getDescription();

            $utilisateur = new Utilisateur($id, $pseudo, '', $email, $privilege, $image, $description);

            $utilisateurDAO->modifierUnUtilisateur($utilisateur);

            echo 'Vous etes abonnée !';
        }
        else
        {
            echo 'Erreur ajout bdd abonné';
        }
    }
}