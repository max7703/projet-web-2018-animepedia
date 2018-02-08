<?php
/**
 * Created by PhpStorm.
 * User: Kelyan Chauffourier
 * Date: 08/02/2018
 * Time: 07:02
 */

require_once '../modele/Anime.php';
require_once '../DAO/AnimeDAO.php';
require_once 'VueHeader.php';
$header = new VueHeader();
$animeDAO = new AnimeDAO();
$anime = null;
$newAnime = true;

if(empty($_GET['id'])){
    $header->printHeader("Ajout d'un anime");
}
else {
    $anime = $animeDAO->getAnimeById(intval($id));
    if($anime == null) {
        $header->printHeader("Ajout d'un anime");
    }
    $newAnime = false;
    $header->printHeader("");
}