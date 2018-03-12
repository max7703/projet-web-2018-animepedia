<?php
/**
 * Created by PhpStorm.
 * User: max77
 * Date: 16/02/2018
 * Time: 11:33
 */
define("NOMDEPAGE", "Admin");
include_once $_SERVER['DOCUMENT_ROOT'] . '/configuration.php';
require ENTETE;
include_once CONTROLEURADMIN;

?>
<link rel="stylesheet" href=<?php echo CSS_ADMIN?>>
<div class="container">
    <h2 class="pt-2"><?php echo _("Gestion du site")?></h2>
    <div id="accordion">
        <?php include './fragment-admin-anime.php';?>
        <?php include './fragment-admin-genre.php';?>
        <?php include './fragment-admin-utilisateur.php';?>
        <?php include './fragment-admin-privilege.php';?>
    </div>
</div>
<script src=<?php echo JSADMIN?>></script>
<?php include PIEDDEPAGE;?>

