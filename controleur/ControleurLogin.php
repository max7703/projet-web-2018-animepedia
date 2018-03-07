<?php
/**
 * Created by PhpStorm.
 * User: max77
 * Date: 14/02/2018
 * Time: 11:33
 */
include_once $_SERVER['DOCUMENT_ROOT'] . '/configuration.php';
require_once MODELEUTILISATEUR;
require_once UTILISATEURDAO;

if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    if (isset($_POST['buttonLogin'])) { //user registering

        try{

            $utilisateurDAO = new UtilisateurDAO();

            $pass = $_POST['loginPassword'];
            $username = $_POST['loginUser'];

            $_SESSION['username'] = $_POST['loginUser'];

            $utilisateurTemporaire = new Utilisateur("",$username, "", "none", 0,"","");

            if($utilisateurDAO->estExistant($utilisateurTemporaire))
            {
                $utilisateur = $utilisateurDAO->obtenirUtilisateurParString($utilisateurTemporaire->getPseudo());

                $_SESSION['message'] = $utilisateur->getPseudo() . ' '. $utilisateur->getMdp() . ' ' . $utilisateur->getEmail();
                if ( password_verify($pass, $utilisateur->getMdp()) )
                {
                    $_SESSION['logged_in'] = true;

                    $_SESSION['message'] = "";
                    header("location: " . SITE);
                }
                else
                {
                    $_SESSION['message'] = 'Mot de passe incorrect';
                    header("location: " . SITE . "login");

                }
            }
            else
            {
                $_SESSION['message'] = 'Utilisateur inconnu';
                header("location: " . SITE . "login");
            }
        }
        catch(Throwable $e) {
            $trace = $e->getTrace();
            echo $e->getMessage().' in '.$e->getFile().' on line '.$e->getLine().' called from '.$trace[0]['file'].' on line '.$trace[0]['line'];
        }

    }
}