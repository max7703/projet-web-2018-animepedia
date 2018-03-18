<?php
/**
 * Created by PhpStorm.
 * User: max77
 * Date: 15/02/2018
 * Time: 08:13
 */
include_once $_SERVER['DOCUMENT_ROOT'] . '/configuration.php';
require_once MODELEUTILISATEUR;
require_once UTILISATEURDAO;

if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    if(isset($_POST["upload-img"]))
    {
        $utilisateurDAO = new UtilisateurDAO();

        $target_dir = "../img/profil/";
        $target_file = $target_dir . $_SESSION['username'] . "-" . basename($_FILES["fileToUpload"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
        if($check !== false) {
            $uploadOk = 1;
        } else {
            $_SESSION['messageError'] = 'File is not an image.';
            header("location: " . SITE . "profile");
            $uploadOk = 0;
        }

        // Check if file already exists
        if (file_exists($target_file)) {
            $_SESSION['messageError'] = 'Sorry, file already exists.';
            header("location: " . SITE . "profile");
            $uploadOk = 0;
        }
        // Check file size
        if ($_FILES["fileToUpload"]["size"] > 1000000) {
            $_SESSION['messageError'] = 'Sorry, your file is too large. 1Mo max';
            header("location: " . SITE . "profile");
            $uploadOk = 0;
        }
        // Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif" ) {
            $_SESSION['messageError'] = 'Sorry, only JPG, JPEG, PNG & GIF files are allowed.';
            header("location: " . SITE . "profile");
            $uploadOk = 0;
        }
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            header("location: " . SITE . "profile");
            // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {

                //echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
                $username = $_SESSION['username'];

                $utilisateurTemporaire = new Utilisateur(0, $username, "", "", 0,"","");

                if($utilisateurDAO->estExistant($utilisateurTemporaire))
                {
                    $utilisateur = $utilisateurDAO->obtenirUtilisateurParString($username);
                    unlink($utilisateur->getImage());
                    $id = $utilisateur->getId();
                    $pseudo = $utilisateur->getPseudo();
                    $email = $utilisateur->getEmail();
                    $privilege = $utilisateur->getId_Privilege();
                    $image = $target_file;
                    $description = $utilisateur->getDescription();

                    $utilisateur = new Utilisateur($id, $pseudo, '', $email, $privilege, $image, $description);

                    $utilisateurDAO->modifierUnUtilisateur($utilisateur);

                    $_SESSION['messageSuccess'] = 'La photo a bien été changé !';
                    header("location: " . SITE . "profile");
                }
            } else {
                $_SESSION['messageError'] = 'Sorry, there was an error uploading your file.';
                header("location: " . SITE . "profile");
            }
        }
    }
    else if(isset($_POST["modifierEmail"]))
    {
        $utilisateurDAO = new UtilisateurDAO();

        $email = $_POST['emailModifier'];
        $pass = $_POST['emailPasswordModifier'];

        $utilisateurEmail = new Utilisateur('', '', '', $email, '', '', '');
        $utilisateurTemporaire = $utilisateurDAO->obtenirUtilisateurParString($_SESSION['username']);

        if($utilisateurDAO->estExistant($utilisateurEmail))
        {
            $_SESSION['messageError'] = 'Email déjà utilisé !';
            header("location: " . SITE . "profile");
        }
        else
        {
            if(password_verify($pass, $utilisateurTemporaire->getMdp()))
            {

                $utilisateur = new Utilisateur($utilisateurTemporaire->getId(),
                    $utilisateurTemporaire->getPseudo(),
                    $utilisateurTemporaire->getMdp(),
                    $email,
                    $utilisateurTemporaire->getId_Privilege(),
                    $utilisateurTemporaire->getImage(),
                    $utilisateurTemporaire->getDescription());

                $utilisateurDAO->modifierUnUtilisateur($utilisateur);
                $_SESSION['messageSuccess'] = 'Email changé !';
                header("location: " . SITE . "profile");
            }
            else
            {
                $_SESSION['messageError'] = 'Mot de passe incorrect !';
                header("location: " . SITE . "profile");
            }
        }
    }
    else if(isset($_POST["modifierPassword"]))
    {
        $utilisateurDAO = new UtilisateurDAO();

        $oldpass = $_POST['passwordActuel'];
        $newpass = $_POST['nouveauPassword'];
        $newpassconf = $_POST['passwordConfirmation'];

        if($newpass != $newpassconf)
        {
            $_SESSION['messageError'] = 'Les mots de passes de ne correspondent pas';
            header("location: " . SITE . "profile");
        }
        else
        {
            $utilisateurTemporaire = $utilisateurDAO->obtenirUtilisateurParString($_SESSION['username']);

            if(password_verify($oldpass, $utilisateurTemporaire->getMdp()))
            {
                $password = password_hash($newpass, PASSWORD_BCRYPT);

                $utilisateur = new Utilisateur($utilisateurTemporaire->getId(),
                    $utilisateurTemporaire->getPseudo(),
                    $password,
                    $utilisateurTemporaire->getEmail(),
                    $utilisateurTemporaire->getId_Privilege(),
                    $utilisateurTemporaire->getImage(),
                    $utilisateurTemporaire->getDescription());

                $utilisateurDAO->modifierUtilisateurMdp($utilisateur);
                $_SESSION['messageSuccess'] = 'Mot de passe changé !';
                header("location: " . SITE . "profile");
            }
            else
            {
                $_SESSION['messageError'] = 'Mot de passe incorrect !';
                header("location: " . SITE . "profile");
            }
        }
    }
}
