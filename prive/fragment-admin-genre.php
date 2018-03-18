<?php
/**
 * Created by PhpStorm.
 * User: max77
 * Date: 25/02/2018
 * Time: 20:10
 */
require_once GENREDAO;

$genreDAO = new GenreDAO();
$listeGenres = $genreDAO->obtenirListeGenres();
?>
<div class="table-wrapper">
    <div class="table-title">
        <div class="row">
            <div class="col-sm-12">
                <a href="#ajouterGenreModal" class="btn btn-success" data-toggle="modal"><span><?php echo _("Ajouter un genre")?></span></a>
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
        foreach ($listeGenres as $genre) :
            echo '<tr>';
            echo '<td>' . $genre->getNom() . '</td>';
            echo '<td>';?>
            <a href="#modifierGenreModal" onclick="afficherGenre('<?php echo $genre->getId()?>','<?php echo $genre->getNom()?>')" class="edit" data-toggle="modal"><span class="fa fa-edit"></span></a>
            <a href="#supprimerGenreModal" onclick="afficherGenreSupprimer('<?php echo $genre->getNom()?>')" class="delete pl-2" data-toggle="modal"><span class="fa fa-trash"></span></a>
            </td>
            </tr>
        <?php endforeach;?>
        </tbody>
    </table>
</div>
</div>
<!-- Edit Modal HTML -->
<div id="ajouterGenreModal" class="modal fade">
<div class="modal-dialog">
    <div class="modal-content">
        <form method="post" action="admin">
            <div class="modal-header">
                <h4 class="modal-title"><?php echo _("Ajouter un genre")?></h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
                <?php
                if(isset($_SESSION["genre"])) {
                    $genre = $_SESSION["genre"];
                    if(!empty($genre->listeErreursActives['nom'])) {
                        foreach ($genre->listeErreursActives['nom'] as $erreur) {
                            echo '<div class="alert alert-danger" role="alert">' .
                                $erreur .
                                '</div>';
                        }
                    }
                } ?>
                <div class="form-group">
                    <label><?php echo _("Nom")?></label>
                    <input name="ajouterNomGenre" type="text" class="form-control" required>
                </div>
            </div>
            <div class="modal-footer">
                <input type="button" class="btn btn-default" data-dismiss="modal" value="Annuler">
                <button type="submit" class="btn btn-success" name="ajouterGenre"><?php echo _("Ajouter")?></button>
            </div>
    </div>
    </form>
</div>
</div>
<!-- Edit Modal HTML -->
<div id="modifierGenreModal" class="modal fade">
<div class="modal-dialog">
    <div class="modal-content">
        <form method="post" action="admin">
            <div class="modal-header">
                <h4 class="modal-title"><?php echo _("Modification du genre")?></h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <input id="modifierIdGenre" name="modifierIdGenre" type="hidden" class="form-control" required>
                </div>
                <?php
                if(isset($_SESSION["genre"])) {
                    $genre = $_SESSION["genre"];
                    if(!empty($genre->listeErreursActives['nom'])) {
                        foreach ($genre->listeErreursActives['nom'] as $erreur) {
                            echo '<div class="alert alert-danger" role="alert">' .
                                $erreur .
                                '</div>';
                        }
                    }
                } ?>
                <div class="form-group">
                    <label><?php echo _("Nom")?></label>
                    <input id="modifierNomGenre" name="modifierNomGenre" type="text" class="form-control" required>
                </div>
                <div class="modal-footer">
                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Annuler">
                    <button type="submit" class="btn btn-info" name="modifierGenre"><?php echo _("Sauvegarder")?></button>
                </div>
            </div>
        </form>
    </div>
</div>
</div>
<!-- Delete Modal HTML -->
<div id="supprimerGenreModal" class="modal fade">
<div class="modal-dialog">
    <div class="modal-content">
        <form method="post" action="admin">
            <div class="modal-header">
                <h4 class="modal-title"><?php echo _("Suppression du genre")?></h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
                <p><?php echo _("Voulez-vous vraiment supprimer ce genre ?")?></p>
                <input id="supprimerGenreNom" name="supprimerGenreNom">
                <p class="text-warning"><small><?php echo _("Cette action est irréversible !")?></small></p>
            </div>
            <div class="modal-footer">
                <input type="button" class="btn btn-default" data-dismiss="modal" value="Annuler">
                <button type="submit" class="btn btn-danger" name="supprimerGenre"><?php echo _("Supprimer")?></button>
            </div>
        </form>
    </div>
</div>
