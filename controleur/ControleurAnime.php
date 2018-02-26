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
        echo $hint === "" ? "no suggestion" : $hint;
    }
    else if (isset($_REQUEST['id']))
    {
        // get the q parameter from URL
        $q = $_REQUEST["id"];

        $_SESSION["animeid"] = $q;
    }
}
