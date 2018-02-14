<?php
/**
 * Created by PhpStorm.
 * User: max77
 * Date: 12/02/2018
 * Time: 13:21
 */

require_once '../vue/VueHeader.php';
require_once '../modele/Anime.php';
require_once '../dao/AnimeDAO.php';

$header = new VueHeader();
$header->printHeader("Home");

$animeDAO = new AnimeDAO();

try{
    $listeAnime = $animeDAO->getListeAnimes();
}
catch(Throwable $e) {
    $trace = $e->getTrace();
    echo $e->getMessage().' in '.$e->getFile().' on line '.$e->getLine().' called from '.$trace[0]['file'].' on line '.$trace[0]['line'];
}

echo '
<div id="myCarousel" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner" role="listbox">
        <div class="carousel-item active">
          <img class="first-slide" src="../img/NarutoBanner.jpg" alt="First slide">
          <div class="container">
            <div class="carousel-caption d-none d-md-block text-left">
              <h1>Tous les épisodes de Naruto sont disponibles sur le site !</h1>
              <p>Nous avons mis à jour les épisodes de la série Naruto et Naruto Shippuden, désormais tous les épisodes sont disponibles sur le site !</p>
              <p><a class="btn btn-lg btn-primary" href="#" role="button">Lire la news</a></p>
            </div>
          </div>
        </div>
        <div class="carousel-item">
          <img class="second-slide" src="../img/DanganronpaBanner.jpg" alt="Second slide">
          <div class="container">
            <div class="carousel-caption d-none d-md-block">
              <h1>Danganronpa The End Of Kibougamine Gakuen Mirai-Hen & Zetsubo-Hen</h1>
              <p>Les arcs Désespoir et Espoir de Danganronpa sont maintenant disponibles sur le site !</p>
              <p><a class="btn btn-lg btn-primary" href="#" role="button">Lire la news</a></p>
            </div>
          </div>
        </div>
        <div class="carousel-item">
          <img class="third-slide" src="../img/OnePieceBanner.jpg" alt="Third slide">
          <div class="container">
            <div class="carousel-caption d-none d-md-block text-right">
              <h1>Nouvel épisode de OnePiece disponible !</h1>
              <p>Un nouvel épisode de OnePiece est disponible sur le site !</p>
              <p><a class="btn btn-lg btn-primary" href="#" role="button">Lire la news</a></p>
            </div>
          </div>
        </div>
      </div>
      <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Precedent</span>
      </a>
      <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Suivant</span>
      </a>
    </div>';

echo '<section class="animes" id="animes">
	<h2>Animes aleatoire</h2>
	<div class="row">';
foreach ($listeAnime as $anime)
{
    echo '<div class="col-lg-3 col-md-4 col-sm-6 pb-3">
			<article class="card">
				<header class="title-header">';
    echo '<h3>' . $anime->getNom() . '</h3>';
    echo '</header>
				<div class="card-block">
					<div class="img-card">';
    echo '<img src="' . $anime->getImgPath() . '" alt="Anime" class="w-100" />
					</div>';
    echo '<p class="tagline card-text text-xs-center">' . $anime->getDescription() . '</p>';
    echo '<a href="#" class="btn btn-primary btn-block"><i class="fa fa-eye"></i> Plus de details</a>
				</div>
			</article>
		</div>';
}
echo '
	</div>
</section>';


include '../vue/VueFooter.php';