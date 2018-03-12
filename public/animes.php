<?php 
define("NOMDEPAGE", "Animes");
include_once $_SERVER['DOCUMENT_ROOT'] . '/configuration.php';
require_once ANIMEDAO;
require_once GENREDAO;

$genreDAO = new GenreDAO();
$listeGenres = $genreDAO->obtenirListeGenres();

$animeDAO = new AnimeDAO();
$listeAnimes = $animeDAO->obtenirListeAnimes();
require ENTETE;
?>
    <ul class="pagination pt-4 flex-wrap" style="justify-content: center;">
        <li id="all" class="page-item active"><a class="page-link" href="https://dev.animepedia.fr/animes">Tous</a></li>
        <?php
        foreach(range('A','Z') as $letter)
        {
            echo '<li id="' . $letter . '" class="page-item"><a class="page-link" onclick="afficherAnimesListe(\'' . $letter . '\')" href="#' .$letter . '">'; echo $letter . '</a></li>';
        }
        ?>
    </ul>


    <div class="row">
        <div class="col-sm-4"></div>
        <form method="post" class="form-inline col-sm-4">
            <div class="input-group">
                <div class="input-group-prepend">
                    <select class="btn btn-secondary" id="selecteurGenre">
                        <option selected>Genres : none</option>
                        <?php
                        foreach ($listeGenres as $genre)
                        {
                            echo '<option value="' . $genre->getId() . '">' . $genre->getNom() . '</option>';
                        }?>
                    </select>
                </div>
                <input type="text" class="form-control input-lg" size="40" maxlength="100" placeholder="Rechercher" autocomplete="off" onkeyup="afficherAnimesListe(this.value)">
                <div class="input-group-append">
                    <button class="btn btn-info" type="submit"><span class="fa fa-search"></span></button>
                </div>
            </div>
        </form>
    </div>

    <div class="container">
        <div id="animesListe" class="row">
            <?php
            $nb_elem_per_page = 9;
            $page = isset($_GET['page'])?intval($_GET['page']-1):0;
            $number_of_pages = intval(count($listeAnimes)/$nb_elem_per_page)+1;

            //echo $page;
            foreach (array_slice($listeAnimes, $page*$nb_elem_per_page, $nb_elem_per_page) as $anime)
            {
                echo '<div class="d-flex flex-wrap justify-content-center pt-4 col-md-4">
                <div class="card" style="width: 22rem;">
                    <img class="card-img-top" src="' . SITE; echo substr($anime->getImgPath(), 3); echo '" alt="anime image">
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

    <ul id="paginator" class="pagination pt-4 flex-wrap" style="justify-content: center;">
        <?php
        for($i=1;$i<=$number_of_pages;$i++){
            if($i == 1)
            {
                echo '
                <li id="page-' . $i . '" class="' . (('page-' . ($page + 1)=='page-' .$i)?'page-item active':'') . '"><a class="page-link" href="' . SITE . 'animes/page/' . $i . '">' . $i . '</a></li>
                ';
            }
            else
            {
                echo '
                <li id="page-' . $i . '" class="' . (('page-' . ($page + 1)=='page-' .$i)?'page-item active':'') . '"><a class="page-link" href="' . SITE . 'animes/page/' . $i . '">' . $i . '</a></li>
                ';
            }
        }
        ?>
    </ul>

<script src=<?php echo JSANIMES?>></script>
<?php include PIEDDEPAGE;?>