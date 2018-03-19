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

            unlink($animeTemporaire->getImgPath());
            
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

            $target_dir = "../img/";
            $cheminImage = $target_dir . $nom . "-" . basename($_FILES["imageAnimeAjouter"]["name"]);
            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($cheminImage,PATHINFO_EXTENSION));

            $check = getimagesize($_FILES["imageAnimeAjouter"]["tmp_name"]);
            if($check !== false)
            {
                $uploadOk = 1;
            }
            else
            {
                $_SESSION['erreurImageAjouter'] = 'File is not an image.';
                $uploadOk = 0;
            }

            // Check if file already exists
            if (file_exists($cheminImage))
            {
                $_SESSION['erreurImageAjouter'] = 'Sorry, file already exists.';
                $uploadOk = 0;
            }
            // Check file size
            if ($_FILES["imageAnimeAjouter"]["size"] > 5000000)
            {
                $_SESSION['erreurImageAjouter'] = 'Sorry, your file is too large. 1Mo max';
                $uploadOk = 0;
            }
            // Allow certain file formats
            if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                && $imageFileType != "gif" )
            {
                $_SESSION['erreurImageAjouter'] = 'Sorry, only JPG, JPEG, PNG & GIF files are allowed.';
                $uploadOk = 0;
            }

            $lien = $_POST['ajouterOpeningAnime'];
            $descriptiondetaille = $_POST['ajouterDescriptionDetailleAnime'];

            $anime = new Anime(null. null, null, null, null, null, null, null, null, null, null);
            $anime->construireSansDonneesSecurisees(0, $nom, $description, $genre, $auteur, $studio, $nbepisode, $cheminImage, $lien, $descriptiondetaille);
            if($anime->estValide()){
                // Check if $uploadOk is set to 0 by an error
                if ($uploadOk == 0)
                {
                    // if everything is ok, try to upload file
                }
                else
                {
                    if (move_uploaded_file($_FILES["imageAnimeAjouter"]["tmp_name"], $cheminImage))
                    {
                        $animeDAO->ajouterUnAnime($anime);
                    }
                    else
                    {
                        $_SESSION['erreurImageAjouter'] = 'Sorry, there was an error uploading your file.';
                    }
                }
            }
            else {
                echo "dans le nonvalide";
                echo '<script> loadData = function() {
                    afficherAjouterAnime("' . $anime->getNom() . '","' . htmlspecialchars($anime->getDescription(),  ENT_QUOTES | ENT_HTML5 , 'UTF-8') . '","' . $anime->getGenre() . '","' . $anime->getAuteur() . '","' . $anime->getStudio() . '","' . $anime->getNbEpisodes() . '","' . $anime->getLienTrailer() . '","' . htmlspecialchars($anime->getDescriptionDetaillee(),  ENT_QUOTES | ENT_HTML5 , 'UTF-8') . '");
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

            if(empty($_FILES["fileToUpload"]["name"]))
            {
                $cheminImage = $_POST['modifierCheminImageAnime'];
            }
            else
            {
                $target_dir = "../img/";
                $cheminImage = $target_dir . $nom . "-" . basename($_FILES["fileToUpload"]["name"]);
                $uploadOk = 1;
                $imageFileType = strtolower(pathinfo($cheminImage,PATHINFO_EXTENSION));

                $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
                if($check !== false)
                {
                    $uploadOk = 1;
                }
                else
                {
                    $_SESSION['erreurImage'] = 'File is not an image.';
                    $uploadOk = 0;
                }

                // Check if file already exists
                if (file_exists($cheminImage))
                {
                    $_SESSION['erreurImage'] = 'Sorry, file already exists.';
                    $uploadOk = 0;
                }
                // Check file size
                if ($_FILES["fileToUpload"]["size"] > 5000000)
                {
                    $_SESSION['erreurImage'] = 'Sorry, your file is too large. 1Mo max';
                    $uploadOk = 0;
                }
                // Allow certain file formats
                if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                    && $imageFileType != "gif" )
                {
                    $_SESSION['erreurImage'] = 'Sorry, only JPG, JPEG, PNG & GIF files are allowed.';
                    $uploadOk = 0;
                }
            }

            $lien = $_POST['modifierOpeningAnime'];
            $descriptiondetaille = $_POST['modifierDescriptionDetailleAnime'];

            /*$animeTemporaire = $animeDAO->obtenirAnimeParId($id);
            $id = $animeTemporaire->getId();*/

            $anime = new Anime(null, null, null, null, null, null, null, null, null, null);
            $anime->construireSansDonneesSecurisees($id, $nom, $description, $genre, $auteur, $studio, $nbepisode, $cheminImage, $lien, $descriptiondetaille);
            $animeAncienneImage = $animeDAO->obtenirAnimeParId($id);

            if($anime->estValide())
            {
                if(!empty($_FILES["fileToUpload"]["name"]))
                {
                    // Check if $uploadOk is set to 0 by an error
                    if ($uploadOk == 0)
                    {
                        // if everything is ok, try to upload file
                    }
                    else
                    {
                        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $cheminImage))
                        {
                            $animeDAO->modifierUnAnime($anime);
                            unlink($animeAncienneImage->getImgPath());
                        }
                        else
                        {
                            $_SESSION['erreurImage'] = 'Sorry, there was an error uploading your file.';
                        }
                    }
                }
                else
                {
                    $animeDAO->modifierUnAnime($anime);
                }
            }
            else
            {
                echo '<script> loadData =function() {
                    afficherAnime("'. $anime->getId(). '","' . $anime->getNom() . '","' . $anime->getDescription() . '","' . $anime->getGenre() . '","' . $anime->getAuteur() . '","' . $anime->getStudio() . '","' . $anime->getNbEpisodes() . '","' . $anime->getImgPath() . '","' . $anime->getLienTrailer() . '","' . $anime->getDescriptionDetaillee() . '");
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

            unlink($membreTemporaire->getImage());

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

            $privilege = new Privilege(null, null);
            $privilege->construireSansDonneesSecurisees(0, $nom);
            if($privilege->estValide()) {
                echo "Ajout privilege";
                $privilegeDAO->ajouterUnPrivilege($privilege);
            }
            else {
                echo '<script> loadData = function() {
                    afficherAjouterPrivilege("' . $privilege->getNom() . '");
                    $("#ajouterPrivilegeModal").modal();
                };
                </script>';
            }
            $_SESSION["privilege"] = $privilege;

            //$privilege = new Privilege(0, $nom);

            //$privilegeDAO->ajouterUnPrivilege($privilege);


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
            

            $privilege = new Privilege(null, null);
            $privilege->construireSansDonneesSecurisees($id, $nom);

            if($privilege->estValide()){
                $privilegeDAO->modifierUnPrivilege($privilege);
            }
            else {
                echo '<script> loadData =function() {
                    afficherPrivilege("'. $privilege->getId(). '","' . $privilege->getNom() . '");
                    $("#modifierPrivilegeModal").modal();
                };</script>';
                $_SESSION["privilege"] = $privilege;
            }


            //$privilege = new Privilege($id, $nom);

            //$privilegeDAO->modifierUnPrivilege($privilege);


        }
        catch(Throwable $e) {
            $trace = $e->getTrace();
            echo $e->getMessage().' in '.$e->getFile().' on line '.$e->getLine().' called from '.$trace[0]['file'].' on line '.$trace[0]['line'];
        }
    }
}