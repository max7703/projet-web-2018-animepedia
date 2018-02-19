<?php
/**
 * Created by PhpStorm.
 * User: max77
 * Date: 15/02/2018
 * Time: 08:13
 */
include_once $_SERVER['DOCUMENT_ROOT'] . '/configuration.php';
require_once MODELEUTILISATEUR;
require_once UTILISATEURDAO;

class ControleurProfil
{
    public function obtenirProfilUtilisateurActuel()
    {
        try{
            $utilisateurDAO = new UtilisateurDAO();

            $utilisateur = $utilisateurDAO->obtenirUtilisateurByString($_SESSION['username']);

            return $utilisateur;
        }
        catch(Throwable $e) {
            $trace = $e->getTrace();
            echo $e->getMessage().' in '.$e->getFile().' on line '.$e->getLine().' called from '.$trace[0]['file'].' on line '.$trace[0]['line'];
        }
    }
}