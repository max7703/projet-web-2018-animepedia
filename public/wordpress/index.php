<?php
/**
 * Created by PhpStorm.
 * User: max77
 * Date: 12/02/2018
 * Time: 13:21
 */
define("NOMDEPAGE", "Animepedia");
include_once $_SERVER['DOCUMENT_ROOT'] . '/configuration.php';
require ENTETE;
require_once ANIMEDAO;

$animeDAO = new AnimeDAO();
$listeAnimes = $animeDAO->obtenirListeAnimes();

?>
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner" role="listbox">
            <?php
            // Get the last 3 posts.
            global $post;
            $i = 1;
            $args = array( 'posts_per_page' => 3 );
            $myposts = get_posts( $args );

            foreach( $myposts as $post ) :	setup_postdata($post); ?>
                <?php
                if($i== 1)
                {
                    echo '<div class="carousel-item active">';
                }
                else
                {
                    echo '<div class="carousel-item">';
                }
                $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' );
                echo $image[0];
                ?>
                    <img class="first-slide" src="<?php echo $image[0]; ?>" alt="First slide">
                    <div class="container">
                        <div class="carousel-caption d-none d-md-block text-left">
                            <h1><?php the_title(); ?></h1>
                            <p><?php the_excerpt(); ?></p>
                            <p><a class="btn btn-lg btn-primary" href="<?php the_permalink() ?>" role="button">Lire la news</a></p>
                        </div>
                    </div>
                </div>
            <?php $i+=1; $image= null; endforeach; ?>
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
        $nombreDeBoucle = 1;
        shuffle($listeAnimes);
foreach ($listeAnimes as $anime)
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
    echo '<a href="'; echo SITE  . 'anime/' . $anime->getId() . '" class="btn btn-primary btn-block"><span class="fa fa-eye"></span> Plus de details</a>
				</div>
			</article>
		</div>';
    if ($nombreDeBoucle++ == 8) break;
}
?>
	</div>
</section>


<?php include PIEDDEPAGE;?>