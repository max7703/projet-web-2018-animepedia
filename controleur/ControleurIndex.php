<?php
/**
 * Created by PhpStorm.
 * User: max77
 * Date: 13/02/2018
 * Time: 11:01
 */

require_once '../modele/Anime.php';
require_once '../dao/AnimeDAO.php';

class ControleurIndex
{
    public function printAnimesAleatoire()
    {
        $listeAnime = null;
        $animeDAO = new AnimeDAO();

        try{
            $listeAnime = $animeDAO->getListeAnimes();
        }
        catch(Throwable $e) {
            $trace = $e->getTrace();
            echo $e->getMessage().' in '.$e->getFile().' on line '.$e->getLine().' called from '.$trace[0]['file'].' on line '.$trace[0]['line'];
        }

        return $listeAnime;
    }
}
