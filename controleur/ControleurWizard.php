<?php
/**
 * Created by PhpStorm.
 * User: max77
 * Date: 03/03/2018
 * Time: 18:20
 */

include_once $_SERVER['DOCUMENT_ROOT'] . '/configuration.php';

require_once UTILISATEURDAO;
require_once PAIEMENTDAO;
require_once MODELEUTILISATEUR;
require_once MODELEPAIEMENT;

if ($_SERVER['REQUEST_METHOD'] == 'GET')
{
    if (isset($_REQUEST['paiementID']))
    {
        $utilisateurDAO = new UtilisateurDAO();
        $paiementDAO = new PaiementDAO();

        $paiementID = $_REQUEST["paiementID"];

        $date =  (new DateTime())->format('Y-m-d H:i:s');

        $username = $_SESSION['username'];
        $email = $_SESSION['email'];

        $utilisateurTemporaire = new Utilisateur(0, $username, "", $email, 0,"","");

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

            $paiement = new Paiement(0, $paiementID, $id, $date);
            $paiementDAO->ajouterUnPaiement($paiement);

            echo '
            <div class="alert alert-success" role="alert">
                <h4 class="alert-heading">Paiement validé</h4>
                     <p>Vous etes maintenant abonné au site, merci de nous soutenir !</p>
                     <p class="mb-0">Votre numero de paiement est dans votre profil.</p>
            </div>';
        }
        else
        {
            echo 'Erreur ajout bdd abonné';
        }
    }
}