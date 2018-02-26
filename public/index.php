<?php
/**
 * Created by PhpStorm.
 * User: max77
 * Date: 12/02/2018
 * Time: 13:21
 */
define("NOMDEPAGE", "Index");
include_once $_SERVER['DOCUMENT_ROOT'] . '/configuration.php';
require ENTETE;
require_once CONTROLEURINDEX;

$controleur = new ControleurIndex();
$animes = $controleur->afficherAnimesAleatoire();
?>
<div id="myCarousel" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner" role="listbox">
        <div class="carousel-item active">
          <img class="first-slide" src="https://media.boingboing.net/wp-content/uploads/2018/02/usagi.jpg" alt="First slide">
          <div class="container">
            <div class="carousel-caption d-none d-md-block text-left">
              <h1>Usagi Yojimbo, adaptée en série animée</h1>
              <p>Usagi Yojimbo, série de l\'auteur japano-américain Stan Sakai fera prochainement l\'objet d\'une adaptation animée, sous forme de série entièrement en CGI.</p>
              <p><a class="btn btn-lg btn-primary" href="#" role="button">Lire la news</a></p>
            </div>
          </div>
        </div>
        <div class="carousel-item">
          <img class="second-slide" src="http://www.manga-sama.com/img/report/385/cover.jpg" alt="Second slide">
          <div class="container">
            <div class="carousel-caption d-none d-md-block">
              <h1>Flying Witch remporte le Tournoi Jeunesse 2017 </h1>
              <p>La série de Chihiro Ishizuka, qui a plutôt survolé le tournoi, n\'a laissé absolument aucune chance à Jane Eyre en finale.</p>
              <p><a class="btn btn-lg btn-primary" href="#" role="button">Lire la news</a></p>
            </div>
          </div>
        </div>
        <div class="carousel-item">
          <img class="third-slide" src="https://a248.e.akamai.net/ib.huluim.com/show_key_art/25326?size=1600x600&region=US" alt="Third slide">
          <div class="container">
            <div class="carousel-caption d-none d-md-block text-right">
              <h1>Diffusion de Concrete Revolutio sur Game One</h1>
              <p>La série Concrete Revolutio débarque à partir d\'aujourd\'hui sur la chaine Game One en vf.</p>
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
    </div>

<section class="animes" id="animes">
	<h2>Animes aleatoire</h2>
	<div class="row">
        <?php
foreach ($animes as $anime)
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
    echo '<a href="anime.php?id=' . $anime->getId() . '" class="btn btn-primary btn-block"><span class="fa fa-eye"></span> Plus de details</a>
				</div>
			</article>
		</div>';
}?>
	</div>
</section>


<?php include PIEDDEPAGE;?>