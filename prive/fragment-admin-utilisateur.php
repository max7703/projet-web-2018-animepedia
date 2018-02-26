<?php
/**
 * Created by PhpStorm.
 * User: max77
 * Date: 25/02/2018
 * Time: 20:09
 */

require_once UTILISATEURDAO;

$utilisateurDAO = new UtilisateurDAO();
$listeUtilisateurs = $utilisateurDAO->obtenirListeUtilisateurs();
?>
<div class="card">
    <div class="card-header">
        <a class="collapsed card-link" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
            <?php echo _("Gestion des membres")?>
        </a>
    </div>
    <div id="collapseTwo" class="collapse">
        <div class="card-body">
            <div class="table-wrapper">
                <div class="table-title">
                    <div class="row">
                        <div class="col-sm-12">
                            <a href="#ajouterMembreModal" class="btn btn-success" data-toggle="modal"><span><?php echo _("Ajouter un membre")?></span></a>
                        </div>
                    </div>
                </div>
                <table class="table table-striped table-hover">
                    <thead>
                    <tr>
                        <th><?php echo _("Pseudo")?></th>
                        <th><?php echo _("Email")?></th>
                        <th><?php echo _("Privilège")?></th>
                        <th><?php echo _("Chemin image")?></th>
                        <th><?php echo _("Description")?></th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    foreach ($listeUtilisateurs as $membre) :
                        echo '<tr>';
                        echo '<td>' . $membre->getPseudo() . '</td>';
                        echo '<td>' . $membre->getEmail() . '</td>';
                        echo '<td>' . $membre->getId_Privilege() . '</td>';
                        echo '<td>' . $membre->getImage() . '</td>';
                        echo '<td>' . $membre->getDescription() . '</td>';
                        echo '<td>';?>
                        <a href="#modifierMembreModal" onclick="afficherMembre('<?php echo $membre->getId()?>','<?php echo $membre->getPseudo()?>','<?php echo $membre->getEmail()?>','<?php echo $membre->getId_Privilege()?>', '<?php echo $membre->getImage()?>', '<?php echo $membre->getDescription()?>')" class="edit" data-toggle="modal"><span class="fa fa-edit"></span></a>
                        <a href="#supprimerMembreModal" onclick="afficherMembreSupprimer('<?php echo $membre->getPseudo()?>')" class="delete pl-2" data-toggle="modal"><span class="fa fa-trash"></span></a>
                        </td>
                        </tr>
                    <?php endforeach;?>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- Edit Modal HTML -->
        <div id="ajouterMembreModal" class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form method="post" action="admin">
                        <div class="modal-header">
                            <h4 class="modal-title"><?php echo _("Ajouter un membre")?></h4>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label><?php echo _("Pseudo")?></label>
                                <input name="ajouterPseudoMembre" type="text" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label><?php echo _("Email")?></label>
                                <input name="ajouterEmailMembre" type="email" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label><?php echo _("Privilege")?></label>
                                <input name="ajouterPrivilegeMembre" type="text" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label><?php echo _("Chemin de l'image")?></label>
                                <input name="ajouterImageMembre" type="text" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label><?php echo _("Description")?></label>
                                <input name="ajouterDescriptionMembre" type="text" class="form-control" required>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <input type="button" class="btn btn-default" data-dismiss="modal" value="Annuler">
                            <button type="submit" class="btn btn-success" name="ajouterMembre"><?php echo _("Ajouter")?></button>
                        </div>
                </div>
                </form>
            </div>
        </div>
        <!-- Edit Modal HTML -->
        <div id="modifierMembreModal" class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form method="post" action="admin">
                        <div class="modal-header">
                            <h4 class="modal-title"><?php echo _("Modification du membre")?></h4>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <input id="modifierIdMembre" name="modifierIdMembre" type="hidden" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label><?php echo _("Pseudo")?></label>
                                <input id="modifierPseudoMembre" name="modifierPseudoMembre" type="text" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label><?php echo _("Email")?></label>
                                <input id="modifierEmailMembre" name="modifierEmailMembre" type="email" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label><?php echo _("Privilege")?></label>
                                <input id="modifierPrivilegeMembre" name="modifierPrivilegeMembre" type="text" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label><?php echo _("Chemin de l'image")?></label>
                                <input id="modifierImageMembre" name="modifierImageMembre" type="text" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label><?php echo _("Description")?></label>
                                <input id="modifierDescriptionMembre" name="modifierDescriptionMembre" type="text" class="form-control" required>
                            </div>
                            <div class="modal-footer">
                                <input type="button" class="btn btn-default" data-dismiss="modal" value="Annuler">
                                <button type="submit" class="btn btn-info" name="modifierMembre"><?php echo _("Sauvegarder")?></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Delete Modal HTML -->
        <div id="supprimerMembreModal" class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form method="post" action="admin">
                        <div class="modal-header">
                            <h4 class="modal-title"><?php echo _("Suppression du membre")?></h4>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        </div>
                        <div class="modal-body">
                            <p><?php echo _("Voulez-vous vraiment supprimer ce membre ?")?></p>
                            <input id="supprimerMembrePseudo" name="supprimerMembrePseudo">
                            <p class="text-warning"><small><?php echo _("Cette action est irréversible !")?></small></p>
                        </div>
                        <div class="modal-footer">
                            <input type="button" class="btn btn-default" data-dismiss="modal" value="Annuler">
                            <button type="submit" class="btn btn-danger" name="supprimerMembre"><?php echo _("Supprimer")?></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
