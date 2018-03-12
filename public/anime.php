<?php
/**
 * Created by PhpStorm.
 * User: max77
 * Date: 08/02/2018
 * Time: 07:02
 */
include_once $_SERVER['DOCUMENT_ROOT'] . '/configuration.php';
include_once CONTROLEURANIME;
require_once ANIMEDAO;
require_once GENREDAO;

$animeDAO = new AnimeDAO();
$anime = $animeDAO->obtenirAnimeParId($_SESSION["animeid"]);

$genreDAO = new GenreDAO();
$genre = $genreDAO->obtenirGenreParId($anime->getGenre());

define("NOMDEPAGE", $anime->getNom());
require ENTETE;
?>
<div class="container">

  <div class="row">

    <div class="col-lg-12">

      <h1 class="mt-6"><?php echo $anime->getNom() ?></h1>

      <hr>

      <img class="img-fluid rounded" src="<?php echo $anime->getImgPath() ?>" class="img-responsive center-block">

      <hr>

      <p>Auteur: <?php echo $anime->getAuteur() ?></p>
      <p>Genre: <?php echo $genre->getNom() ?></p>
      <p>Studio d’animation: <?php echo $anime->getStudio() ?></p>
      <p>Nombre d'épisodes: <?php echo $anime->getNbEpisodes() ?></p>

      <hr>


      <!-- Post Content -->
      <p class="lead">« <?php echo $anime->getDescription() ?> »</p>
      <hr>

      <p><?php echo $anime->getDescriptionDetaillee() ?></p>
      <hr>

      <h1 class="mt-6">Videos</h1>
        <iframe width="640" height="360" src="<?php echo $anime->getLienTrailer() ?>">
        </iframe>
        <hr>

    </div>

  </div>

</div>
<?php include PIEDDEPAGE;?>



