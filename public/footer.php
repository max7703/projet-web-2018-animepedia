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
            <p> <?php echo _("Nous sommes une équipe de 4 étudiants en DEC Technique de l'Informatique - Informatique de Gestion. Nous avons eu l'idée de créer un site qui redirige l'utilisateur
                vers un lien fiable où il pourra regarder son animé, le tout sans pub.")?></p>
        </div>
        <div class="col-sm-3">
            <h4 class="title"><?php echo _("Navigation")?></h4>
            <span class="acount-icon">          
            <a href="#"><i class="fa fa-heart" aria-hidden="true"></i> <?php echo _("List")?></a>
            <a href="#"><i class="fa fa-users" aria-hidden="true"></i><?php echo _("Group")?></a>
            <a href="#"><i class="fa fa-user" aria-hidden="true"></i> <?php echo _("Profile")?></a>
            <a href="#"><i class="fa fa-globe" aria-hidden="true"></i> <?php echo _("Langue")?></a>
            </span>
        </div>
        <div class="col-sm-3">
            <h4 class="title"><?php echo _("Categories")?></h4>
            <div class="category">
                <a href="#"><?php echo _("Ecchi")?></a>
                <a href="#"><?php echo _("Seinen")?></a>
                <a href="#"><?php echo _("Shōjo")?></a>
                <a href="#"><?php echo _("Shōnen")?></a>
                <a href="#"><?php echo _("Yaoi")?></a>
                <a href="#"><?php echo _("Yandere")?></a>
                <a href="#"><?php echo _("Yuri")?></a>
                <a href="#"><?php echo _("Magical girl")?></a>
            </div>
        </div>
        <div class="col-sm-3">
            <h4 class="title"><?php echo _("Moyens de paiement")?></h4>
            <p><?php echo _("Divers moyens de paiement sont disponible sur notre site")?></p>
            <ul class="payment">
                <li><a href="#"><i class="fa fa-cc-amex" aria-hidden="true"></i></a></li>
                <li><a href="#"><i class="fa fa-credit-card" aria-hidden="true"></i></a></li>            
                <li><a href="#"><i class="fa fa-paypal" aria-hidden="true"></i></a></li>
                <li><a href="#"><i class="fa fa-cc-visa" aria-hidden="true"></i></a></li>
            </ul>
            </div>
        </div>
        <hr>
        <div class="pl-1"><a href="http://dev.animepedia.fr/" style="color: #fff;"><?php echo _("Copyright © Animepedia 2018")?></a></div>
    </div>	
</footer>
</body>
</html>