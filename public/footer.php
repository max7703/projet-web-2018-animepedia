<?php
/**
 * Created by PhpStorm.
 * User: max77
 * Date: 12/02/2018
 * Time: 13:36
 */
?>
<link rel="stylesheet" href=<?php echo CSS_PIEDDEPAGE?>>
<footer class="footer">
    <div class="container">
        <div class="row">
        <div class="col-sm-3">
            <h4 class="title"><?php echo _("A propos")?></h4>
            <p> <?php echo _("Nous sommes une équipe de 4 étudiants finissant en DEC Technique de l'Informatique - Informatique de Gestion.
            Nous avons eu l'idée de créer un site communautaire qui reference les animes.")?></p>
        </div>
        <div class="col-sm-3">
            <h4 class="title"><?php echo _("Navigation")?></h4>
            <span class="acount-icon">          
            <a href="<?php echo SITE ?>animes"><span class="fa fa-heart" aria-hidden="true"></span> <?php echo _("Anime")?></a>
            <a href="<?php echo SITE ?>forum"><span class="fa fa-users" aria-hidden="true"></span><?php echo _("Forum")?></a>
            <a href="<?php echo SITE ?>profile"><span class="fa fa-user" aria-hidden="true"></span> <?php echo _("Profile")?></a>
            <a href="<?php echo SITE ?>language"><span class="fa fa-globe" aria-hidden="true"></span> <?php echo _("Langue")?></a>
            </span>
        </div>
        <div class="col-sm-3">
            <h4 class="title"><?php echo _("Categories")?></h4>
            <div class="category">
                <a href="<?php echo SITE ?>categories"><?php echo _("Ecchi")?></a>
                <a href="<?php echo SITE ?>categories"><?php echo _("Seinen")?></a>
                <a href="<?php echo SITE ?>categories"><?php echo _("Shōjo")?></a>
                <a href="<?php echo SITE ?>categories"><?php echo _("Shōnen")?></a>
                <a href="<?php echo SITE ?>categories"><?php echo _("Yaoi")?></a>
                <a href="<?php echo SITE ?>categories"><?php echo _("Yandere")?></a>
                <a href="<?php echo SITE ?>categories"><?php echo _("Yuri")?></a>
                <a href="<?php echo SITE ?>categories"><?php echo _("Magical girl")?></a>
            </div>
        </div>
        <div class="col-sm-3">
            <h4 class="title"><?php echo _("Moyens de paiement")?></h4>
            <p><?php echo _("Divers moyens de paiement sont disponible sur notre site")?></p>
            <ul class="payment">
                <li><a href="https://www.americanexpress.com"><span class="fa fa-cc-amex" aria-hidden="true"></span></a></li>
                <li><a href="https://www.mastercard.com"><span class="fa fa-cc-mastercard" aria-hidden="true"></span></a></li>
                <li><a href="https://www.paypal.com"><span class="fa fa-paypal" aria-hidden="true"></span></a></li>
                <li><a href="https://www.visa.com"><span class="fa fa-cc-visa" aria-hidden="true"></span></a></li>
            </ul>
            </div>
        </div>
        <hr>
        <div class="pl-1"><a href="http://dev.animepedia.fr/" style="color: #fff;"><?php echo _("Copyright © Animepedia 2018")?></a></div>
    </div>	
</footer>
</body>
</html>