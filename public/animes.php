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
            <li class="page-item"><a class="page-link" href="#">Tous</a></li>
            <li class="page-item"><a class="page-link" href="#">A</a></li>
            <li class="page-item"><a class="page-link" href="#">B</a></li>
            <li class="page-item"><a class="page-link" href="#">C</a></li>
            <li class="page-item"><a class="page-link" href="#">D</a></li>
            <li class="page-item"><a class="page-link" href="#">E</a></li>
            <li class="page-item"><a class="page-link" href="#">F</a></li>
            <li class="page-item"><a class="page-link" href="#">G</a></li>
            <li class="page-item"><a class="page-link" href="#">H</a></li>
            <li class="page-item"><a class="page-link" href="#">I</a></li>
            <li class="page-item"><a class="page-link" href="#">J</a></li>
            <li class="page-item"><a class="page-link" href="#">K</a></li>
            <li class="page-item"><a class="page-link" href="#">L</a></li>
            <li class="page-item"><a class="page-link" href="#">M</a></li>
            <li class="page-item"><a class="page-link" href="#">N</a></li>
            <li class="page-item"><a class="page-link" href="#">O</a></li>
            <li class="page-item"><a class="page-link" href="#">P</a></li>
            <li class="page-item"><a class="page-link" href="#">Q</a></li>
            <li class="page-item"><a class="page-link" href="#">R</a></li>
            <li class="page-item"><a class="page-link" href="#">S</a></li>
            <li class="page-item"><a class="page-link" href="#">T</a></li>
            <li class="page-item"><a class="page-link" href="#">U</a></li>
            <li class="page-item"><a class="page-link" href="#">V</a></li>
            <li class="page-item"><a class="page-link" href="#">W</a></li>
            <li class="page-item"><a class="page-link" href="#">X</a></li>
            <li class="page-item"><a class="page-link" href="#">Y</a></li>
            <li class="page-item"><a class="page-link" href="#">Z</a></li>
        </ul>
    </div>


    <div class="row">
        <div class="col-sm-4"></div>
        <form class="form-inline col-sm-4">
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
                <input type="text" class="form-control input-lg" aria-label="Text input with dropdown button" size="40" maxlength="100">
                <div class="input-group-append">
                    <button class="btn btn-info" type="submit"><i class="material-icons">search</i></button>
                </div>
            </div>
        </form>
    </div>

    <div class="container">
        <div class="row">
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