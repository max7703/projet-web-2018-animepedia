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
    $utilisateurDAO = new UtilisateurDAO();

    $target_dir = "../img/profil/";
    $target_file = $target_dir . $_SESSION['username'] . "-" . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    // Check if image file is a actual image or fake image
    if(isset($_POST["upload-img"])) {
        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
        if($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
    }
    // Check if file already exists
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }
    // Check file size
    if ($_FILES["fileToUpload"]["size"] > 1000000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }
    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
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

                header("location: " . SITE . "profile");
            }
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}
