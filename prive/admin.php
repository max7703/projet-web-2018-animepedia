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
    <button class="tablink" onclick="openPage('Dashboard', this)" id="defaultOpen">Tableau de bord</button>
    <button class="tablink" onclick="openPage('Animes', this)">Animes</button>
    <button class="tablink" onclick="openPage('Membres', this)">Membres</button>
    <button class="tablink" onclick="openPage('Genres', this)">Genres</button>
    <button class="tablink" onclick="openPage('Privileges', this)">Privileges</button>
    <div id="Dashboard" class="tabcontent">
        <h3>Tableau de bord</h3>
        <p>Home is where the heart is..</p>
    </div>

    <div id="Animes" class="tabcontent">
        <h3>Animes</h3>
        <?php include './fragment-admin-anime.php';?>
    </div>

    <div id="Membres" class="tabcontent">
        <h3>Membres</h3>
        <?php include './fragment-admin-utilisateur.php';?>
    </div>

    <div id="Genres" class="tabcontent">
        <h3>Genres</h3>
        <?php include './fragment-admin-genre.php';?>
    </div>

    <div id="Privileges" class="tabcontent">
        <h3>Privileges</h3>
        <?php include './fragment-admin-privilege.php';?>
    </div>

<script src=<?php echo JSADMIN?>></script>
<script> loadData();</script>

<?php include PIEDDEPAGE;?>