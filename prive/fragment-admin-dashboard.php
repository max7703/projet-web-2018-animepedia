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
    <div class="col-md-6">
        <canvas id="animeParGenre"></canvas>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.bundle.min.js"></script>
<script>
    var canvas = document.getElementById("aboParMembre");
    var ctx = canvas.getContext('2d');

    // Global Options:
    Chart.defaults.global.defaultFontColor = 'black';
    Chart.defaults.global.defaultFontSize = 16;

    var data = {
        labels: ["Membres", "Abonnés"],
        datasets: [
            {
                fill: true,
                backgroundColor: [
                    'green',
                    'red'],
                data: [document.getElementById("nombreUtilisateurs").innerText, document.getElementById("nombreUtilisateursAbonnes").innerText],
                borderColor:	['black', 'black'],
                borderWidth: [2,2]
            }
        ]
    };

    // Notice the rotation from the documentation.
    var options = {
        title: {
            display: true,
            text: 'Abonnés par membres',
            position: 'top'
        },
        rotation: -0.7 * Math.PI
    };

    // Chart declaration:
    var myBarChart = new Chart(ctx, {
        type: 'pie',
        data: data,
        options: options
    });

    var canvas1 = document.getElementById("animeParGenre");
    var ctx1 = canvas1.getContext('2d');

    var data1 = {
        labels: ["aaaa", "Abonnés"],
        datasets: [
            {
                fill: true,
                backgroundColor: [
                    'black',
                    'white'],
                data: [document.getElementById("nombreUtilisateurs").innerText, document.getElementById("nombreUtilisateursAbonnes").innerText],
                borderColor:	['black', 'black'],
                borderWidth: [2,2]
            }
        ]
    };

    // Notice the rotation from the documentation.
    var options1 = {
        title: {
            display: true,
            text: 'Animes par genre',
            position: 'top'
        },
        rotation: -0.7 * Math.PI
    };

    // Chart declaration:
    var myBarChart1 = new Chart(ctx1, {
        type: 'pie',
        data: data1,
        options: options1
    });

</script>
