<?php
/**
 * Created by PhpStorm.
 * User: max77
 * Date: 13/02/2018
 * Time: 11:01
 */
include_once $_SERVER['DOCUMENT_ROOT'] . '/configuration.php';
require_once MODELEANIME;
require_once ANIMEDAO;

class ControleurIndex
{
    public function afficherAnimesAleatoire()
    {
        $listeAnime = null;
        $animeDAO = new AnimeDAO();

        try{
            $listeAnime = $animeDAO->obtenirListeAnimes();
        }
        catch(Throwable $e) {
            $trace = $e->getTrace();
            echo $e->getMessage().' in '.$e->getFile().' on line '.$e->getLine().' called from '.$trace[0]['file'].' on line '.$trace[0]['line'];
        }

        return $listeAnime;
    }
}
