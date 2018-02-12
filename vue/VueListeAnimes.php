<?php
/**
 * Created by PhpStorm.
 * User: Kelyan Chauffourier
 * Date: 07/02/2018
 * Time: 10:09
 */

require_once '../modele/Anime.php';
require_once '../DAO/AnimeDAO.php';
require_once 'VueHeader.php';

$header = new VueHeader();
$header->printHeader("Liste des animes");
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
    echo '<td><a href="VueAnime?id='. strval($anime->getId()) .'">' . $anime->getNom() . '</a></td>';
    echo '<td><a href="VueAnime?id='. strval($anime->getId()) .'">' . $anime->getGenre() . '</a></td>';
    echo '<td><a href="VueAnime?id='. strval($anime->getId()) .'">' . $anime->getAuteur() . '</a></td>';
    echo '<td><a href="VueAnime?id='. strval($anime->getId()) .'">' . $anime->getStudio() . '</a></td>';
    echo '</tr>';
}

echo        '</tbody>
        </table>
        </div>
    </div>
</body>
</html>';
