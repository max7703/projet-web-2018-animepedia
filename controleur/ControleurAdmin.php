<?php
/**
 * Created by PhpStorm.
 * User: max77
 * Date: 17/02/2018
 * Time: 21:06
 */

include_once $_SERVER['DOCUMENT_ROOT'] . '/configuration.php';
require_once MODELEANIME;
require_once MODELEUTILISATEUR;
require_once MODELEGENRE;
require_once ANIMEDAO;
require_once UTILISATEURDAO;
require_once GENREDAO;
require_once PRIVILEGEDAO;
require_once MODELEPRIVILEGE;

$_SESSION["anime"] = null;

if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    if (isset($_POST['supprimerAnime'])) {

        try {
            $animeDAO= new AnimeDAO();

            $nom = $_POST['supprimerAnimeNom'];

            $animeTemporaire = $animeDAO->obtenirAnimeParString($nom);

            $animeDAO->supprimerUnAnime($animeTemporaire);


        }
        catch(Throwable $e) {
            $trace = $e->getTrace();
            echo $e->getMessage().' in '.$e->getFile().' on line '.$e->getLine().' called from '.$trace[0]['file'].' on line '.$trace[0]['line'];
        }

    }
    else if (isset($_POST['ajouterAnime'])) {

        try {
            $animeDAO= new AnimeDAO();

            $nom = $_POST['ajouterNomAnime'];
            $description = $_POST['ajouterDescriptionAnime'];
            $genre = $_POST['ajouterGenreAnime'];
            $auteur = $_POST['ajouterAuteurAnime'];
            $studio = $_POST['ajouterStudioAnime'];
            $nbepisode = $_POST['ajouterNbEpisodeAnime'];
            $cheminepisode = $_POST['ajouterCheminEpisodeAnime'];

            $anime = new Anime(null. null, null, null, null, null, null, null, null);
            $anime->construireSansDonneesSecurisees(0, $nom, $description, $genre, $auteur, $studio, $nbepisode, $cheminepisode);
            if($anime->estValide()){
                echo "Ajout anime";
                $animeDAO->ajouterUnAnime($anime);
            }
            else {
                echo '<script> loadData = function() {
                    afficherAjouterAnime("' . $anime->getNom() . '","' . htmlspecialchars($anime->getDescription(),  ENT_QUOTES | ENT_HTML5 , 'UTF-8') . '","' . $anime->getGenre() . '","' . $anime->getAuteur() . '","' . $anime->getStudio() . '","' . $anime->getNbEpisodes() . '","' . $anime->getImgPath() . '");
                    $("#ajouterAnimeModal").modal();
                };
                </script>';
            }
            $_SESSION["anime"] = $anime;

        }
        catch(Throwable $e) {
            $trace = $e->getTrace();
            echo $e->getMessage().' in '.$e->getFile().' on line '.$e->getLine().' called from '.$trace[0]['file'].' on line '.$trace[0]['line'];
        }

    }
    else if (isset($_POST['modifierAnime'])) {

        try {
            $animeDAO= new AnimeDAO();

            $id = $_POST['modifierIdAnime'];
            $nom = $_POST['modifierNomAnime'];
            $description = $_POST['modifierDescriptionAnime'];
            $genre = $_POST['modifierGenreAnime'];
            $auteur = $_POST['modifierAuteurAnime'];
            $studio = $_POST['modifierStudioAnime'];
            $nbepisode = $_POST['modifierNbEpisodeAnime'];
            $cheminImage = $_POST['modifierCheminImageAnime'];

            /*$animeTemporaire = $animeDAO->obtenirAnimeParId($id);
            $id = $animeTemporaire->getId();*/

            $anime = new Anime(null, null, null, null, null, null, null, null);
            $anime->construireSansDonneesSecurisees($id, $nom, $description, $genre, $auteur, $studio, $nbepisode, $cheminImage);

            if($anime->estValide()){
                $animeDAO->modifierUnAnime($anime);
            }
            else {
                echo '<script> loadData =function() {
                    afficherAnime("'. $anime->getId(). '","' . $anime->getNom() . '","' . $anime->getDescription() . '","' . $anime->getGenre() . '","' . $anime->getAuteur() . '","' . $anime->getStudio() . '","' . $anime->getNbEpisodes() . '","' . $anime->getImgPath() . '");
                    $("#modifierAnimeModal").modal();
                };</script>';
                $_SESSION["anime"] = $anime;
            }


        }
        catch(Throwable $e) {
            $trace = $e->getTrace();
            echo $e->getMessage().' in '.$e->getFile().' on line '.$e->getLine().' called from '.$trace[0]['file'].' on line '.$trace[0]['line'];
        }
    }
    else if (isset($_POST['supprimerMembre'])) {

        try {
            $utilisateurDAO = new UtilisateurDAO();

            $pseudo = $_POST['supprimerMembrePseudo'];

            $membreTemporaire = $utilisateurDAO->obtenirUtilisateurParString($pseudo);

            $utilisateurDAO->supprimerUnUtilisateur($membreTemporaire);


        }
        catch(Throwable $e) {
            $trace = $e->getTrace();
            echo $e->getMessage().' in '.$e->getFile().' on line '.$e->getLine().' called from '.$trace[0]['file'].' on line '.$trace[0]['line'];
        }

    }
    else if (isset($_POST['ajouterMembre'])) {

        try {
            $utilisateurDAO = new UtilisateurDAO();

            $pseudo = $_POST['ajouterPseudoMembre'];
            $email = $_POST['ajouterEmailMembre'];
            $privilege = $_POST['ajouterPrivilegeMembre'];
            $image = $_POST['ajouterImageMembre'];
            $description = $_POST['ajouterDescriptionMembre'];

            $mdp = password_hash('test', PASSWORD_BCRYPT);

            $utilisateur = new Utilisateur(0, $pseudo, $mdp, $email, $privilege, $image, $description);
            $utilisateurDAO->ajouterUnUtilisateur($utilisateur);


        }
        catch(Throwable $e) {
            $trace = $e->getTrace();
            echo $e->getMessage().' in '.$e->getFile().' on line '.$e->getLine().' called from '.$trace[0]['file'].' on line '.$trace[0]['line'];
        }

    }
    else if (isset($_POST['modifierMembre'])) {

        try {
            $utilisateurDAO = new UtilisateurDAO();

            $id = $_POST['modifierIdMembre'];
            $pseudo = $_POST['modifierPseudoMembre'];
            $email = $_POST['modifierEmailMembre'];
            $privilege = $_POST['modifierPrivilegeMembre'];
            $image = $_POST['modifierImageMembre'];
            $description = $_POST['modifierDescriptionMembre'];

            /*$utilisateurTemporaire = $utilisateurDAO->obtenirUtilisateurParString($pseudo);
            $id = $utilisateurTemporaire->getId();*/

            $utilisateur = new Utilisateur($id, $pseudo, '', $email, $privilege, $image, $description);

            $utilisateurDAO->modifierUnUtilisateur($utilisateur);


        }
        catch(Throwable $e) {
            $trace = $e->getTrace();
            echo $e->getMessage().' in '.$e->getFile().' on line '.$e->getLine().' called from '.$trace[0]['file'].' on line '.$trace[0]['line'];
        }
    }
    else if (isset($_POST['supprimerGenre'])) {

        try {
            $genreDAO = new GenreDAO();

            $nom = $_POST['supprimerGenreNom'];

            $genreTemporaire = $genreDAO->obtenirGenreParString($nom);

            $genreDAO->supprimerUnGenre($genreTemporaire);


        }
        catch(Throwable $e) {
            $trace = $e->getTrace();
            echo $e->getMessage().' in '.$e->getFile().' on line '.$e->getLine().' called from '.$trace[0]['file'].' on line '.$trace[0]['line'];
        }

    }
    else if (isset($_POST['ajouterGenre'])) {

        try {
            $genreDAO = new GenreDAO();

            $nom = $_POST['ajouterNomGenre'];

            $genre = new Genre(null, null);
            $genre->construireSansDonneesSecurisees(0, $nom);
            if($genre->estValide()) {
                echo "Ajout genre";
                $genreDAO->ajouterUnGenre($genre);
            }
            else {
                echo '<script> loadData = function() {
                    afficherAjouterGenre("' . $genre->getNom() . '");
                    $("#ajouterGenreModal").modal();
                };
                </script>';
            }
            $_SESSION["genre"] = $genre;


        }
        catch(Throwable $e) {
            $trace = $e->getTrace();
            echo $e->getMessage().' in '.$e->getFile().' on line '.$e->getLine().' called from '.$trace[0]['file'].' on line '.$trace[0]['line'];
        }

    }
    else if (isset($_POST['modifierGenre'])) {

        try {
            $genreDAO = new GenreDAO();

            $id = $_POST['modifierIdGenre'];
            $nom = $_POST['modifierNomGenre'];

            /*$genreTemporaire = $genreDAO->obtenirGenreParString($nom);*/

            $genre = new Genre(null, null);
            $genre->construireSansDonneesSecurisees($id, $nom);

            if($genre->estValide()){
                $genreDAO->modifierUnGenre($genre);
            }
            else {
                echo '<script> loadData =function() {
                    afficherGenre("'. $genre->getId(). '","' . $genre->getNom() . '");
                    $("#modifierGenreModal").modal();
                };</script>';
                $_SESSION["genre"] = $genre;
            }


        }
        catch(Throwable $e) {
            $trace = $e->getTrace();
            echo $e->getMessage().' in '.$e->getFile().' on line '.$e->getLine().' called from '.$trace[0]['file'].' on line '.$trace[0]['line'];
        }
    }
    else if (isset($_POST['supprimerPrivilege'])) {

        try {
            $privilegeDAO = new PrivilegeDAO();

            $nom = $_POST['supprimerPrivilegeNom'];

            $privilegeTemporaire = $privilegeDAO->obtenirPrivilegeParString($nom);

            $privilegeDAO->supprimerUnPrivilege($privilegeTemporaire);


        }
        catch(Throwable $e) {
            $trace = $e->getTrace();
            echo $e->getMessage().' in '.$e->getFile().' on line '.$e->getLine().' called from '.$trace[0]['file'].' on line '.$trace[0]['line'];
        }

    }
    else if (isset($_POST['ajouterPrivilege'])) {

        try {
            $privilegeDAO = new PrivilegeDAO();

            $nom = $_POST['ajouterNomPrivilege'];

            $privilege = new Privilege(0, $nom);

            $privilegeDAO->ajouterUnPrivilege($privilege);


        }
        catch(Throwable $e) {
            $trace = $e->getTrace();
            echo $e->getMessage().' in '.$e->getFile().' on line '.$e->getLine().' called from '.$trace[0]['file'].' on line '.$trace[0]['line'];
        }

    }
    else if (isset($_POST['modifierPrivilege'])) {

        try {
            $privilegeDAO = new PrivilegeDAO();

            $id = $_POST['modifierIdPrivilege'];
            $nom = $_POST['modifierNomPrivilege'];

            /*$privilegeTemporaire = $privilegeDAO->obtenirPrivilegeParString($nom);*/

            $privilege = new Privilege($id, $nom);

            $privilegeDAO->modifierUnPrivilege($privilege);


        }
        catch(Throwable $e) {
            $trace = $e->getTrace();
            echo $e->getMessage().' in '.$e->getFile().' on line '.$e->getLine().' called from '.$trace[0]['file'].' on line '.$trace[0]['line'];
        }
    }
}