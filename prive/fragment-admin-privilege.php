<?php
/**
 * Created by PhpStorm.
 * User: max77
 * Date: 25/02/2018
 * Time: 20:11
 */
require_once PRIVILEGEDAO;

$privilegeDAO = new PrivilegeDAO();
$listePrivileges = $privilegeDAO->obtenirListePrivileges();
?>
<div class="table-wrapper">
    <div class="table-title">
        <div class="row">
            <div class="col-sm-12">
                <a href="#ajouterPrivilegeModal" class="btn btn-success" data-toggle="modal"><span><?php echo _("Ajouter un privilege")?></span></a>
            </div>
        </div>
    </div>
    <table class="table table-striped table-hover">
        <thead>
        <tr>
            <th><?php echo _("Nom")?></th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        <?php
        $nb_elem_per_page = 9;
        $page = isset($_GET['page-privilege'])?intval($_GET['page-privilege']-1):0;
        $number_of_pages = intval(count($listePrivileges)/$nb_elem_per_page)+1;
        foreach (array_slice($listePrivileges, $page*$nb_elem_per_page, $nb_elem_per_page) as $privilege) :
            echo '<tr>';
            echo '<td>' . $privilege->getNom() . '</td>';
            echo '<td>';?>
            <a href="#modifierPrivilegeModal" onclick="afficherPrivilege('<?php echo $privilege->getId()?>','<?php echo $privilege->getNom()?>')" class="edit" data-toggle="modal"><span class="fa fa-edit"></span></a>
            <a href="#supprimerPrivilegeModal" onclick="afficherPrivilegeSupprimer('<?php echo $privilege->getNom()?>')" class="delete pl-2" data-toggle="modal"><span class="fa fa-trash"></span></a>
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
                <li id="page-' . $i . '" class="' . (('page-' . ($page + 1)=='page-' .$i)?'page-item active':'') . '"><a class="page-link" href="' . SITE . 'admin/privilege/page/' . $i . '">' . $i . '</a></li>
                ';
            }
            else
            {
                echo '
                <li id="page-' . $i . '" class="' . (('page-' . ($page + 1)=='page-' .$i)?'page-item active':'') . '"><a class="page-link" href="' . SITE . 'admin/privilege/page/' . $i . '">' . $i . '</a></li>
                ';
            }
        }
        ?>
    </ul>
</div>
</div>
<!-- Edit Modal HTML -->
<div id="ajouterPrivilegeModal" class="modal fade">
<div class="modal-dialog">
    <div class="modal-content">
        <form method="post" action="<?php echo SITE  . "admin"?>">
            <div class="modal-header">
                <h4 class="modal-title"><?php echo _("Ajouter un privilege")?></h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <?php
                if(isset($_SESSION["privilege"])) {
                    $privilege = $_SESSION["privilege"];
                    if(!empty($privilege->listeErreursActives['nom'])) {
                        foreach ($privilege->listeErreursActives['nom'] as $erreur) {
                            echo '<div class="alert alert-danger" role="alert">' .
                                $erreur .
                                '</div>';
                        }
                    }
                }
            ?>
            <div class="modal-body">
                <div class="form-group">
                    <label><?php echo _("Nom")?></label>
                    <input name="ajouterNomPrivilege" type="text" class="form-control" required>
                </div>
            </div>
            <div class="modal-footer">
                <input type="button" class="btn btn-default" data-dismiss="modal" value="Annuler">
                <button type="submit" class="btn btn-success" name="ajouterPrivilege"><?php echo _("Ajouter")?></button>
            </div>
    </div>
    </form>
</div>
</div>
<!-- Edit Modal HTML -->
<div id="modifierPrivilegeModal" class="modal fade">
<div class="modal-dialog">
    <div class="modal-content">
        <form method="post" action="<?php echo SITE  . "admin"?>">
            <div class="modal-header">
                <h4 class="modal-title"><?php echo _("Modification du privilege")?></h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <input id="modifierIdPrivilege" name="modifierIdPrivilege" type="hidden" class="form-control" required>
                </div>
                <?php
                if(isset($_SESSION["privilege"])) {
                    $privilege = $_SESSION["privilege"];
                    if(!empty($privilege->listeErreursActives['nom'])) {
                        foreach ($privilege->listeErreursActives['nom'] as $erreur) {
                            echo '<div class="alert alert-danger" role="alert">' .
                                $erreur .
                                '</div>';
                        }
                    }
                }
                ?>
                <div class="form-group">
                    <label><?php echo _("Nom")?></label>
                    <input id="modifierNomPrivilege" name="modifierNomPrivilege" type="text" class="form-control" required>
                </div>
                <div class="modal-footer">
                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Annuler">
                    <button type="submit" class="btn btn-info" name="modifierPrivilege"><?php echo _("Sauvegarder")?></button>
                </div>
            </div>
        </form>
    </div>
</div>
</div>
<!-- Delete Modal HTML -->
<div id="supprimerPrivilegeModal" class="modal fade">
<div class="modal-dialog">
    <div class="modal-content">
        <form method="post" action="<?php echo SITE  . "admin"?>">
            <div class="modal-header">
                <h4 class="modal-title"><?php echo _("Suppression du privilege")?></h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
                <p><?php echo _("Voulez-vous vraiment supprimer ce privilege ?")?></p>
                <input id="supprimerPrivilegeNom" name="supprimerPrivilegeNom">
                <p class="text-warning"><small>Cette action est irréversible !</small></p>
            </div>
            <div class="modal-footer">
                <input type="button" class="btn btn-default" data-dismiss="modal" value="Annuler">
                <button type="submit" class="btn btn-danger" name="supprimerPrivilege"><?php echo _("Supprimer")?></button>
            </div>
        </form>
    </div>
</div>
