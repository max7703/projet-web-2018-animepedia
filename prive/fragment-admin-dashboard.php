<?php
/**
 * Created by PhpStorm.
 * User: max77
 * Date: 17/03/2018
 * Time: 20:34
 */
include_once $_SERVER['DOCUMENT_ROOT'] . '/configuration.php';
require_once ANIMEDAO;
require_once UTILISATEURDAO;
require_once GENREDAO;

$animeDAO = new AnimeDAO();
$listeAnimes = $animeDAO->obtenirListeAnimes();

$genreDAO = new GenreDAO();
$listeGenres = $genreDAO->obtenirListeGenres();

$utilisateurDAO = new UtilisateurDAO();
$listeUtilisateurs = $utilisateurDAO->obtenirListeUtilisateurs();
$listeUtilisateursAbonnes = $utilisateurDAO->obtenirListeUtilisateursAbonnes();
?>

<div class="row">
    <div class="col-md-3">
        <a class="info-tiles tiles-inverse has-footer" href="#">
            <div class="tiles-heading">
                <div class="pull-left">Animes</div>
            </div>
            <div class="tiles-body">
                <div class="text-center"><?php echo count($listeAnimes)?></div>
            </div>
        </a>
    </div>

    <div class="col-md-3">
        <a class="info-tiles tiles-green has-footer" href="#">
            <div class="tiles-heading">
                <div class="pull-left">Membres non abonné</div>
            </div>
            <div class="tiles-body">
                <div id ="nombreUtilisateurs" class="text-center"><?php echo count($listeUtilisateurs) - count($listeUtilisateursAbonnes)?></div>
            </div>
        </a>
    </div>

    <div class="col-md-3">
        <a class="info-tiles tiles-blue has-footer" href="#">
            <div class="tiles-heading">
                <div class="pull-left">Abonnés</div>
            </div>
            <div class="tiles-body">
                <div id="nombreUtilisateursAbonnes" class="text-center"><?php echo count($listeUtilisateursAbonnes)?></div>
            </div>
        </a>
    </div>

    <div class="col-md-3">
        <a class="info-tiles tiles-midnightblue has-footer" href="#">
            <div class="tiles-heading">
                <div class="pull-left">Genres</div>
            </div>
            <div class="tiles-body">
                <div class="text-center"><?php echo count($listeGenres)?></div>
            </div>
        </a>
    </div>

    <div class="col-md-3">
        <a class="info-tiles tiles-midnightblue has-footer" href="#">
            <div class="tiles-heading">
                <div class="pull-left">Revenues</div>
            </div>
            <div class="tiles-body">
                <div class="text-center"><?php echo count($listeUtilisateursAbonnes) * 5 . "€"?></div>
            </div>
        </a>
    </div>

    <div class="col-md-3">
        <a class="info-tiles tiles-blue has-footer" href="#">
            <div class="tiles-heading">
                <div class="pull-left">Membres au total</div>
            </div>
            <div class="tiles-body">
                <div class="text-center"><?php echo count($listeUtilisateurs)?></div>
            </div>
        </a>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <canvas id="aboParMembre"></canvas>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.bundle.min.js"></script>
<script src=<?php echo JSDASHBOARD?>></script>
