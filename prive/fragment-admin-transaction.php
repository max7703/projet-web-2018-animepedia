<?php
/**
 * Created by PhpStorm.
 * User: max77
 * Date: 17/03/2018
 * Time: 23:58
 */
require_once PAIEMENTDAO;
require_once UTILISATEURDAO;

$paiementDAO = new PaiementDAO();
$listePaiements = $paiementDAO->obtenirListePaiements();

$utilisateurDAO = new UtilisateurDAO();
?>
<div class="table-wrapper">
    <table class="table table-striped table-hover">
        <thead>
        <tr>
            <th><?php echo _("Paiement ID PayPal")?></th>
            <th><?php echo _("Utilisateur")?></th>
            <th><?php echo _("Date")?></th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        <?php
        $nb_elem_per_page = 9;
        $page = isset($_GET['page-transaction'])?intval($_GET['page-transaction']-1):0;
        $number_of_pages = intval(count($listePaiements)/$nb_elem_per_page)+1;
        foreach (array_slice($listePaiements, $page*$nb_elem_per_page, $nb_elem_per_page) as $transaction) :
            echo '<tr>';
            echo '<td>' . $transaction->getPaiement_Id_Paypal() . '</td>';
            echo '<td>' . $utilisateurDAO->obtenirUtilisateurById($transaction->getId_Utilisateur())->getPseudo() . '</td>';
            echo '<td>' . $transaction->getDate_Paiement() . '</td>';
            echo '<td>';?>
            </td>
            </tr>
        <?php endforeach;?>
        </tbody>
    </table>
    <ul id="paginator" class="pagination pt-4 flex-wrap" style="justify-content: center;">
        <?php
        for($i=1;$i<=$number_of_pages;$i++){
            if($i == 1)
            {
                echo '
                <li id="page-' . $i . '" class="' . (('page-' . ($page + 1)=='page-' .$i)?'page-item active':'') . '"><a class="page-link" href="' . SITE . 'admin/transaction/page/' . $i . '">' . $i . '</a></li>
                ';
            }
            else
            {
                echo '
                <li id="page-' . $i . '" class="' . (('page-' . ($page + 1)=='page-' .$i)?'page-item active':'') . '"><a class="page-link" href="' . SITE . 'admin/transaction/page/' . $i . '">' . $i . '</a></li>
                ';
            }
        }
        ?>
    </ul>
</div>
</div>
