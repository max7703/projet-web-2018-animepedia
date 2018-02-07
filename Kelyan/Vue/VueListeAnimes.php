<?php
/**
 * Created by PhpStorm.
 * User: Kelyan Chauffourier
 * Date: 07/02/2018
 * Time: 10:09
 */

require_once '../modele/Anime.php';
require_once '../DAO/AnimeDAO.php';

echo '<!DOCTYPE html>
<html>
<head>
<title>Animepedia</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="../admin.css">';
include '../links.html';
echo '</head>';
include '../header.php';
echo '<body>
            <table class="table  table-sm">
            <thead class="table-info">
                <tr>
                    <th>Nom</th>
                    <th>Genre</th>
                    <th>Auteur</th>
                    <th>Studio</th>
                </tr>
            </thead>
            <tbody>';
$animeDAO = new AnimeDAO();
$listeAnime = $animeDAO->getListeAnimes();
foreach ($listeAnime as $anime)
{
    echo '<tr>';
    echo '<td>' + $anime->getNom() +'</td>';
    echo '<td>' + $anime->getGenre() + '</td>';
    echo '<td>' + $anime->getAuteur() + '</td>';
    echo '<td>' + $anime->getStudio() +'</td>';
    echo '</tr>';
}

echo        '</tbody>
        </table>
        </div>
    </div>
</body>
</html>';
