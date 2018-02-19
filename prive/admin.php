<?php
/**
 * Created by PhpStorm.
 * User: max77
 * Date: 16/02/2018
 * Time: 11:33
 */

define("NOMDEPAGE", "Admin");
include $_SERVER['DOCUMENT_ROOT'] . '/configuration.php';
require ENTETE;

require_once '../controleur/ControleurAdmin.php';

$controleur = new ControleurAdmin();

$animes = $controleur->obtenirListesAnimes();

$membres = $controleur->obtenirListesDesMembres();

$privileges = $controleur->obtenirListesPrivileges();

$genres = $controleur->obtenirListesGenres();

?>
<link rel="stylesheet" href="../css/admin_.css">
<div class="container">
    <h2 class="pt-2">Gestion du site</h2>
    <div id="accordion">
        <div class="card">
            <div class="card-header">
                <a class="card-link" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                    Gestion des animes
                </a>
            </div>
            <div id="collapseOne" class="collapse show">
                <div class="card-body">
                    <div class="table-wrapper">
                        <div class="table-title">
                            <div class="row">
                                <div class="col-sm-12">
                                    <a href="#ajouterAnimeModal" class="btn btn-success" data-toggle="modal"><span>Ajouter un anime</span></a>
                                </div>
                            </div>
                        </div>
                        <table class="table table-striped table-hover">
                            <thead>
                            <tr>
                                <th>Nom</th>
                                <th>Description</th>
                                <th>Genre</th>
                                <th>Auteur</th>
                                <th>Studio</th>
                                <th>Nombres d'episodes</th>
                                <th>Chemin de l'image</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            foreach ($animes as $anime) :
                                echo '<tr>';
                                echo '<td>' . $anime->getNom() . '</td>';
                                echo '<td>' . $anime->getDescription() . '</td>';
                                echo '<td>' . $anime->getGenre() . '</td>';
                                echo '<td>' . $anime->getAuteur() . '</td>';
                                echo '<td>' . $anime->getStudio() . '</td>';
                                echo '<td>' . $anime->getNbEpisodes() . '</td>';
                                echo '<td>' . $anime->getImgPath() . '</td>';
                                echo '<td>';?>
                                <a href="#modifierAnimeModal" onclick="afficherAnime('<?php echo $anime->getNom()?>','<?php echo htmlspecialchars($anime->getDescription())?>','<?php echo $anime->getGenre()?>','<?php echo $anime->getAuteur()?>','<?php echo $anime->getStudio()?>','<?php echo $anime->getNbEpisodes()?>','<?php echo $anime->getImgPath()?>')" class="edit" data-toggle="modal"><span class="fa fa-edit"></span></a>
                                <a href="#supprimerAnimeModal" onclick="afficherAnimeSupprimer('<?php echo $anime->getNom()?>')" class="delete pl-2" data-toggle="modal"><span class="fa fa-trash"></span></a>
                                </td>
                                </tr>
                            <?php endforeach;?>
                            </tbody>
                        </table>
                        <!--                                <div class="clearfix">-->
                        <!--                                    <div class="hint-text">Il y a <b>5</b> entrées sur <b>25</b></div>-->
                        <!--                                    <ul class="pagination">-->
                        <!--                                        <li class="page-item disabled"><a href="#">Avant</a></li>-->
                        <!--                                        <li class="page-item active"><a href="#" class="page-link">1</a></li>-->
                        <!--                                        <li class="page-item"><a href="#" class="page-link">2</a></li>-->
                        <!--                                        <li class="page-item"><a href="#" class="page-link">3</a></li>-->
                        <!--                                        <li class="page-item"><a href="#" class="page-link">4</a></li>-->
                        <!--                                        <li class="page-item"><a href="#" class="page-link">5</a></li>-->
                        <!--                                        <li class="page-item"><a href="#" class="page-link">Suivant</a></li>-->
                        <!--                                    </ul>-->
                        <!--                                </div>-->
                    </div>
                </div>
                <!-- Edit Modal HTML -->
                <div id="ajouterAnimeModal" class="modal fade">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <form method="post" action="../controleur/ControleurAdmin.php">
                                <div class="modal-header">
                                    <h4 class="modal-title">Ajouter un anime</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                </div>
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label>Nom</label>
                                        <input name="ajouterNomAnime" type="text" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Description</label>
                                        <textarea name="ajouterDescriptionAnime" class="form-control" required></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Genre</label>
                                        <input name="ajouterGenreAnime" type="text" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Auteur</label>
                                        <input name="ajouterAuteurAnime" type="text" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Studio</label>
                                        <input name="ajouterStudioAnime" type="text" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Nombre d'episode</label>
                                        <input name="ajouterNbEpisodeAnime" type="number" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Chemin de l'episode</label>
                                        <input name="ajouterCheminEpisodeAnime" type="text" class="form-control" required>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Annuler">
                                    <button type="submit" class="btn btn-success" name="ajouterAnime">Ajouter</button>
                                </div>
                        </div>
                        </form>
                    </div>
                </div>
                <!-- Edit Modal HTML -->
                <div id="modifierAnimeModal" class="modal fade">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <form method="post" action="../controleur/ControleurAdmin.php">
                                <div class="modal-header">
                                    <h4 class="modal-title">Modification de l'anime</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                </div>
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label>Nom</label>
                                        <input id="modifierNomAnime" name="modifierNomAnime" type="text" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Description</label>
                                        <textarea id="modifierDescriptionAnime" name="modifierDescriptionAnime" class="form-control" required></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Genre</label>
                                        <input id="modifierGenreAnime" name="modifierGenreAnime" type="number" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Auteur</label>
                                        <input id="modifierAuteurAnime" name="modifierAuteurAnime" type="text" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Studio</label>
                                        <input id="modifierStudioAnime" name="modifierStudioAnime" type="text" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Nombre d'episode</label>
                                        <input id="modifierNbEpisodeAnime" name="modifierNbEpisodeAnime" type="number" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Chemin de l'image</label>
                                        <input id="modifierCheminImageAnime" name="modifierCheminImageAnime" type="text" class="form-control" required>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Annuler">
                                    <button type="submit" class="btn btn-info" name="modifierAnime">Sauvegarder</button>
                                </div>
                        </div>
                        </form>
                    </div>
                </div>
                <!-- Delete Modal HTML -->
                <div id="supprimerAnimeModal" class="modal fade">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <form method="post" action="../controleur/ControleurAdmin.php">
                                <div class="modal-header">
                                    <h4 class="modal-title">Suppression de l'anime</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                </div>
                                <div class="modal-body">
                                    <p>Voulez-vous vraiment supprimer cet anime ?</p>
                                    <input id="supprimerAnimeNom" name="supprimerAnimeNom"></input>
                                    <p class="text-warning"><small>Cette action est irréversible !</small></p>
                                </div>
                                <div class="modal-footer">
                                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Annuler">
                                    <button type="submit" class="btn btn-danger" name="supprimerAnime">Supprimer</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                <a class="collapsed card-link" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                    Gestion des membres
                </a>
            </div>
            <div id="collapseTwo" class="collapse">
                <div class="card-body">
                    <div class="table-wrapper">
                        <div class="table-title">
                            <div class="row">
                                <div class="col-sm-12">
                                    <a href="#ajouterMembreModal" class="btn btn-success" data-toggle="modal"><span>Ajouter un membre</span></a>
                                </div>
                            </div>
                        </div>
                        <table class="table table-striped table-hover">
                            <thead>
                            <tr>
                                <th>Pseudo</th>
                                <th>Email</th>
                                <th>Privilège</th>
                                <th>Chemin image</th>
                                <th>Description</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            foreach ($membres as $membre) :
                                echo '<tr>';
                                echo '<td>' . $membre->getPseudo() . '</td>';
                                echo '<td>' . $membre->getEmail() . '</td>';
                                echo '<td>' . $membre->getId_Privilege() . '</td>';
                                echo '<td>' . $membre->getImage() . '</td>';
                                echo '<td>' . $membre->getDescription() . '</td>';
                                echo '<td>';?>
                                <a href="#modifierMembreModal" onclick="afficherMembre('<?php echo $membre->getPseudo()?>','<?php echo $membre->getEmail()?>','<?php echo $membre->getId_Privilege()?>', '<?php echo $membre->getImage()?>', '<?php echo $membre->getDescription()?>')" class="edit" data-toggle="modal"><span class="fa fa-edit"></span></a>
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
                            <form method="post" action="../controleur/ControleurAdmin.php">
                                <div class="modal-header">
                                    <h4 class="modal-title">Ajouter un membre</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                </div>
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label>Pseudo</label>
                                        <input name="ajouterPseudoMembre" type="text" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input name="ajouterEmailMembre" type="email" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Privilege</label>
                                        <input name="ajouterPrivilegeMembre" type="text" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Chemin de l'image</label>
                                        <input name="ajouterImageMembre" type="text" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Description</label>
                                        <input name="ajouterDescriptionMembre" type="text" class="form-control" required>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Annuler">
                                    <button type="submit" class="btn btn-success" name="ajouterMembre">Ajouter</button>
                                </div>
                        </div>
                        </form>
                    </div>
                </div>
                <!-- Edit Modal HTML -->
                <div id="modifierMembreModal" class="modal fade">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <form method="post" action="../controleur/ControleurAdmin.php">
                                <div class="modal-header">
                                    <h4 class="modal-title">Modification du membre</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                </div>
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label>Pseudo</label>
                                        <input id="modifierPseudoMembre" name="modifierPseudoMembre" type="text" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input id="modifierEmailMembre" name="modifierEmailMembre" type="email" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Privilege</label>
                                        <input id="modifierPrivilegeMembre" name="modifierPrivilegeMembre" type="text" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Chemin de l'image</label>
                                        <input id="modifierImageMembre" name="modifierImageMembre" type="text" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Description</label>
                                        <input id="modifierDescriptionMembre" name="modifierDescriptionMembre" type="text" class="form-control" required>
                                    </div>
                                    <div class="modal-footer">
                                        <input type="button" class="btn btn-default" data-dismiss="modal" value="Annuler">
                                        <button type="submit" class="btn btn-info" name="modifierMembre">Sauvegarder</button>
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
                            <form method="post" action="../controleur/ControleurAdmin.php">
                                <div class="modal-header">
                                    <h4 class="modal-title">Suppression du membre</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                </div>
                                <div class="modal-body">
                                    <p>Voulez-vous vraiment supprimer ce membre ?</p>
                                    <input id="supprimerMembrePseudo" name="supprimerMembrePseudo">
                                    <p class="text-warning"><small>Cette action est irréversible !</small></p>
                                </div>
                                <div class="modal-footer">
                                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Annuler">
                                    <button type="submit" class="btn btn-danger" name="supprimerMembre">Supprimer</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                <a class="collapsed card-link" data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
                    Gestion des genres
                </a>
            </div>
            <div id="collapseThree" class="collapse">
                <div class="card-body">
                    <div class="table-wrapper">
                        <div class="table-title">
                            <div class="row">
                                <div class="col-sm-12">
                                    <a href="#ajouterGenreModal" class="btn btn-success" data-toggle="modal"><span>Ajouter un genre</span></a>
                                </div>
                            </div>
                        </div>
                        <table class="table table-striped table-hover">
                            <thead>
                            <tr>
                                <th>Nom</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            foreach ($genres as $genre) :
                                echo '<tr>';
                                echo '<td>' . $genre->getNom() . '</td>';
                                echo '<td>';?>
                                <a href="#modifierGenreModal" onclick="afficherGenre('<?php echo $genre->getNom()?>')" class="edit" data-toggle="modal"><span class="fa fa-edit"></span></a>
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
                            <form method="post" action="../controleur/ControleurAdmin.php">
                                <div class="modal-header">
                                    <h4 class="modal-title">Ajouter un genre</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                </div>
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label>Nom</label>
                                        <input name="ajouterNomGenre" type="text" class="form-control" required>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Annuler">
                                    <button type="submit" class="btn btn-success" name="ajouterGenre">Ajouter</button>
                                </div>
                        </div>
                        </form>
                    </div>
                </div>
                <!-- Edit Modal HTML -->
                <div id="modifierGenreModal" class="modal fade">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <form method="post" action="../controleur/ControleurAdmin.php">
                                <div class="modal-header">
                                    <h4 class="modal-title">Modification du genre</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                </div>
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label>Nom</label>
                                        <input id="modifierNomGenre" name="modifierNomGenre" type="text" class="form-control" required>
                                    </div>
                                    <div class="modal-footer">
                                        <input type="button" class="btn btn-default" data-dismiss="modal" value="Annuler">
                                        <button type="submit" class="btn btn-info" name="modifierGenre">Sauvegarder</button>
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
                            <form method="post" action="../controleur/ControleurAdmin.php">
                                <div class="modal-header">
                                    <h4 class="modal-title">Suppression du genre</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                </div>
                                <div class="modal-body">
                                    <p>Voulez-vous vraiment supprimer ce genre ?</p>
                                    <input id="supprimerGenreNom" name="supprimerGenreNom">
                                    <p class="text-warning"><small>Cette action est irréversible !</small></p>
                                </div>
                                <div class="modal-footer">
                                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Annuler">
                                    <button type="submit" class="btn btn-danger" name="supprimerMembre">Supprimer</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                <a class="collapsed card-link" data-toggle="collapse" data-parent="#accordion" href="#collapseFour">
                    Gestion des privileges
                </a>
            </div>
            <div id="collapseFour" class="collapse">
                <div class="card-body">
                    <div class="table-wrapper">
                        <div class="table-title">
                            <div class="row">
                                <div class="col-sm-12">
                                    <a href="#ajouterPrivilegeModal" class="btn btn-success" data-toggle="modal"><span>Ajouter un privilege</span></a>
                                </div>
                            </div>
                        </div>
                        <table class="table table-striped table-hover">
                            <thead>
                            <tr>
                                <th>Nom</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            foreach ($privileges as $privilege) :
                                echo '<tr>';
                                echo '<td>' . $privilege->getNom() . '</td>';
                                echo '<td>';?>
                                <a href="#modifierPrivilegeModal" onclick="afficherPrivilege('<?php echo $privilege->getNom()?>')" class="edit" data-toggle="modal"><span class="fa fa-edit"></span></a>
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
                            <form method="post" action="../controleur/ControleurAdmin.php">
                                <div class="modal-header">
                                    <h4 class="modal-title">Ajouter un privilege</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                </div>
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label>Nom</label>
                                        <input name="ajouterNomPrivilege" type="text" class="form-control" required>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Annuler">
                                    <button type="submit" class="btn btn-success" name="ajouterPrivilege">Ajouter</button>
                                </div>
                        </div>
                        </form>
                    </div>
                </div>
                <!-- Edit Modal HTML -->
                <div id="modifierPrivilegeModal" class="modal fade">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <form method="post" action="../controleur/ControleurAdmin.php">
                                <div class="modal-header">
                                    <h4 class="modal-title">Modification du privilege</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                </div>
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label>Nom</label>
                                        <input id="modifierNomPrivilege" name="modifierNomPrivilege" type="text" class="form-control" required>
                                    </div>
                                    <div class="modal-footer">
                                        <input type="button" class="btn btn-default" data-dismiss="modal" value="Annuler">
                                        <button type="submit" class="btn btn-info" name="modifierPrivilege">Sauvegarder</button>
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
                            <form method="post" action="../controleur/ControleurAdmin.php">
                                <div class="modal-header">
                                    <h4 class="modal-title">Suppression du privilege</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                </div>
                                <div class="modal-body">
                                    <p>Voulez-vous vraiment supprimer ce privilege ?</p>
                                    <input id="supprimerPrivilegeNom" name="supprimerGenreNom">
                                    <p class="text-warning"><small>Cette action est irréversible !</small></p>
                                </div>
                                <div class="modal-footer">
                                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Annuler">
                                    <button type="submit" class="btn btn-danger" name="supprimerPrivilege">Supprimer</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function afficherAnime(nom, description, genre, auteur, studio, nbepisodes, cheminimg) {
        document.getElementById('modifierNomAnime').value = nom;
        document.getElementById('modifierDescriptionAnime').value = description.replace(/&#(\d+);/g, function(match, dec) {
            return String.fromCharCode(dec);
        });
        document.getElementById('modifierGenreAnime').value = genre;
        document.getElementById('modifierAuteurAnime').value = auteur;
        document.getElementById('modifierStudioAnime').value = studio;
        document.getElementById('modifierNbEpisodeAnime').value = nbepisodes;
        document.getElementById('modifierCheminImageAnime').value = cheminimg;
    }
    function afficherAnimeSupprimer(nom) {
        document.getElementById('supprimerAnimeNom').value = nom;
    }

    function afficherMembre(pseudo, email, privilege, image, description) {
        document.getElementById('modifierPseudoMembre').value = pseudo;
        document.getElementById('modifierEmailMembre').value = email;
        document.getElementById('modifierPrivilegeMembre').value = privilege;
        document.getElementById('modifierImageMembre').value = image;
        document.getElementById('modifierDescriptionMembre').value = description;
    }
    function afficherMembreSupprimer(pseudo) {
        document.getElementById('supprimerMembrePseudo').value = pseudo;
    }

    function afficherGenre(nom) {
        document.getElementById('modifierNomGenre').value = nom;
    }
    function afficherGenreSupprimer(nom) {
        document.getElementById('supprimerGenreNom').value = nom;
    }

    function afficherPrivilege(nom) {
        document.getElementById('modifierNomPrivilege').value = nom;
    }
    function afficherPrivilegeSupprimer(nom) {
        document.getElementById('supprimerPrivilegeNom').value = nom;
    }
</script>
<?php include PIEDDEPAGE;?>

