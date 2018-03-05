<?php
/**
 * Created by PhpStorm.
 * User: max77
 * Date: 21/02/2018
 * Time: 08:57
 */

include_once $_SERVER['DOCUMENT_ROOT'] . '/configuration.php';
require_once ANIMEDAO;

$animeDAO = new AnimeDAO();

$listeAnimes = $animeDAO->obtenirListeAnimes();

if ($_SERVER['REQUEST_METHOD'] == 'GET')
{
    if (isset($_REQUEST['q']))
    {
        // get the q parameter from URL
        $q = $_REQUEST["q"];

        $hint = "";

        // lookup all hints from array if $q is different from ""
        if ($q !== "") {
            $q = strtolower($q);
            $len=strlen($q);
            foreach($listeAnimes as $anime) {
                if (stristr($q, substr($anime->getNom(), 0, $len))) {
                    if ($hint === "") {
                        $hint='<a href="' . SITE . 'anime/' . $anime->getId() .'">' . $anime->getNom(). '</a>';
                    } else {
                        $hint=$hint.'<br><a href="' . SITE . 'anime/' . $anime->getId() . '">' . $anime->getNom() . '</a>';
                    }
                }
            }
        }

        // Output "no suggestion" if no hint was found or output correct values
        echo $hint === "" ? "Aucun resultat trouvé" : $hint;
    }
    else if (isset($_REQUEST['id']))
    {
        // get the q parameter from URL
        $q = $_REQUEST["id"];

        $_SESSION["animeid"] = $q;
    }
    else if (isset($_REQUEST['name']))
    {
        // get the q parameter from URL
        $q = $_REQUEST["name"];

        $hint = "";

        // lookup all hints from array if $q is different from ""
        if ($q !== "") {
            $q = strtolower($q);
            $len=strlen($q);
            foreach($listeAnimes as $anime) {
                if (stristr($q, substr($anime->getNom(), 0, $len))) {
                    if ($hint === "") {
                        $hint='
                        <div class="d-flex flex-wrap justify-content-center pt-4 col-md-4">
                            <div class="card" style="width: 22rem;">
                                <img class="card-img-top" src="' . SITE . substr($anime->getImgPath(), 3) . '" alt="anime image">
                                <div class="card-body">
                                    <h5 class="card-title">' . $anime->getNom() . '</h5>
                                    <p class="card-text">' . $anime->getDescription() . '</p>
                                    <a href="' . SITE  . 'anime/' . $anime->getId() . '" class="btn btn-primary">Go</a>
                                </div>
                            </div>
                        </div>';
                    } else {
                        $hint=$hint.'
                        <div class="d-flex flex-wrap justify-content-center pt-4 col-md-4">
                            <div class="card" style="width: 22rem;">
                                <img class="card-img-top" src="' . SITE . substr($anime->getImgPath(), 3) . '" alt="anime image">
                                <div class="card-body">
                                    <h5 class="card-title">' . $anime->getNom() . '</h5>
                                    <p class="card-text">' . $anime->getDescription() . '</p>
                                    <a href="' . SITE  . 'anime/' . $anime->getId() . '" class="btn btn-primary">Go</a>
                                </div>
                            </div>
                        </div>
                        ';
                    }
                }
            }
        }

        // Output "no suggestion" if no hint was found or output correct values
        echo $hint === "" ? "Aucun resultat trouvé" : $hint;
    }
}
