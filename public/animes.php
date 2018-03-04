<?php 
define("NOMDEPAGE", "Animes");
include_once $_SERVER['DOCUMENT_ROOT'] . '/configuration.php';
require ENTETE;
require_once ANIMEDAO;
require_once GENREDAO;

$genreDAO = new GenreDAO();
$listeGenres = $genreDAO->obtenirListeGenres();

$animeDAO = new AnimeDAO();
$listeAnimes = $animeDAO->obtenirListeAnimes();

?>
    <div class="container pt-4">
        <ul class="pagination pagination-sm justify-content-center">
            <li class="page-item"><a class="page-link" href="https://dev.animepedia.fr/animes">Tous</a></li>
            <?php
            foreach(range('A','Z') as $letter)
            {
                echo '<li class="page-item"><a class="page-link" onclick="afficherAnimeAvecLettre(\'' . $letter . '\')" href="#">'; echo $letter . '</a></li>';
            }
            ?>
        </ul>
    </div>


    <div class="row">
        <div class="col-sm-4"></div>
        <form method="post" class="form-inline col-sm-4">
            <div class="input-group">
                <div class="input-group-prepend">
                    <select class="btn btn-secondary" id="inputGroupSelect02">
                        <option selected>Genres : none</option>
                        <?php
                        foreach ($listeGenres as $genre)
                        {
                            echo '<option value="' . $genre->getId() . '">' . $genre->getNom() . '</option>';
                        }?>
                    </select>
                </div>
                <input type="text" class="form-control input-lg" size="40" maxlength="100">
                <div class="input-group-append">
                    <button class="btn btn-info" type="submit"><span class="fa fa-search"></span></button>
                </div>
            </div>
        </form>
    </div>

    <div class="container">
        <div id="animesListe" class="row">
            <?php
            foreach ($listeAnimes as $anime)
            {
                echo '<div class="d-flex flex-wrap justify-content-center pt-4 col-md-4">
                <div class="card" style="width: 22rem;">
                    <img class="card-img-top" src="'; echo $anime->getImgPath(); echo '" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">'; echo $anime->getNom(); echo '</h5>
                        <p class="card-text">'; echo $anime->getDescription(); echo '</p>
                        <a href="'; echo SITE  . 'anime/' . $anime->getId() . '" class="btn btn-primary">Go</a>
                    </div>
                </div>
            </div>';
            }?>
        </div>
    </div>
<script src=<?php echo JSANIMES?>></script>
<?php include PIEDDEPAGE;?>