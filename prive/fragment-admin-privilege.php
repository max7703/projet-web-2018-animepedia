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
<div class="card">
    <div class="card-header">
        <a class="collapsed card-link" data-toggle="collapse" data-parent="#accordion" href="#collapseFour">
            <?php echo _("Gestion des privileges")?>
        </a>
    </div>
    <div id="collapseFour" class="collapse">
        <div class="card-body">
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
                    foreach ($listePrivileges as $privilege) :
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
            </div>
        </div>
        <!-- Edit Modal HTML -->
        <div id="ajouterPrivilegeModal" class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form method="post" action="admin">
                        <div class="modal-header">
                            <h4 class="modal-title"><?php echo _("Ajouter un privilege")?></h4>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        </div>
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
                    <form method="post" action="admin">
                        <div class="modal-header">
                            <h4 class="modal-title"><?php echo _("Modification du privilege")?></h4>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <input id="modifierIdPrivilege" name="modifierIdPrivilege" type="hidden" class="form-control" required>
                            </div>
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
                    <form method="post" action="admin">
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
        </div>
    </div>
</div>
