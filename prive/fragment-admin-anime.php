<?php
/**
 * Created by PhpStorm.
 * User: max77
 * Date: 25/02/2018
 * Time: 20:10
 */
include_once $_SERVER['DOCUMENT_ROOT'] . '/configuration.php';
require_once ANIMEDAO;

$animeDAO = new AnimeDAO();
$listeAnimes = $animeDAO->obtenirListeAnimes();

?>
<div class="table-wrapper">
    <div class="table-title">
        <div class="row">
            <div class="col-sm-12">
                <a href="#ajouterAnimeModal" class="btn btn-success" data-toggle="modal"><span><?php echo _("Ajouter un anime")?></span></a>
            </div>
        </div>
    </div>
    <table class="table table-striped table-hover">
        <thead>
        <tr>
            <th><?php echo _("Nom")?></th>
            <th><?php echo _("Description")?></th>
            <th><?php echo _("Genre")?></th>
            <th><?php echo _("Auteur")?></th>
            <th><?php echo _("Studio")?></th>
            <th><?php echo _("Nombres d'episodes")?></th>
            <th><?php echo _("Chemin de l'image")?></th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        <?php
        foreach ($listeAnimes as $anime) :
            echo '<tr>';
            echo '<td>' . $anime->getNom() . '</td>';
            echo '<td>' . $anime->getDescription() . '</td>';
            echo '<td>' . $anime->getGenre() . '</td>';
            echo '<td>' . $anime->getAuteur() . '</td>';
            echo '<td>' . $anime->getStudio() . '</td>';
            echo '<td>' . $anime->getNbEpisodes() . '</td>';
            echo '<td>' . $anime->getImgPath() . '</td>';
            echo '<td>';?>
            <a href="#modifierAnimeModal" onclick="afficherAnime('<?php echo $anime->getId()?>','<?php echo $anime->getNom()?>','<?php echo htmlspecialchars($anime->getDescription())?>','<?php echo $anime->getGenre()?>','<?php echo $anime->getAuteur()?>','<?php echo $anime->getStudio()?>','<?php echo $anime->getNbEpisodes()?>','<?php echo $anime->getImgPath()?>')" class="edit" data-toggle="modal"><span class="fa fa-edit"></span></a>
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
        <form method="post" action="admin">
            <div class="modal-header">
                <h4 class="modal-title"><?php echo _("Ajouter un anime")?></h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
                <?php
                if(isset($_SESSION["anime"])) {
                    $anime = $_SESSION["anime"];
                    if(!empty($anime->listeErreursActives['nom'])) {
                        foreach ($anime->listeErreursActives['nom'] as $erreur) {
                            echo '<div class="alert alert-danger" role="alert">' .
                                $erreur .
                                '</div>';
                        }
                    }
                } ?>
                <div class="form-group">
                    <label><?php echo _("Nom")?></label>
                    <input name="ajouterNomAnime" type="text" class="form-control" required>
                </div>
                <?php
                if(isset($_SESSION["anime"])) {
                    $anime = $_SESSION["anime"];
                    if(!empty($anime->listeErreursActives['description'])) {
                        foreach ($anime->listeErreursActives['description'] as $erreur) {
                            echo '<div class="alert alert-danger" role="alert">' .
                                $erreur .
                                '</div>';
                        }
                    }
                } ?>
                <div class="form-group">
                    <label><?php echo _("Description")?></label>
                    <textarea name="ajouterDescriptionAnime" class="form-control" required></textarea>
                </div>
                <?php
                if(isset($_SESSION["anime"])) {
                    $anime = $_SESSION["anime"];
                    if(!empty($anime->listeErreursActives['genre'])) {
                        foreach ($anime->listeErreursActives['genre'] as $erreur) {
                            echo '<div class="alert alert-danger" role="alert">' .
                                $erreur .
                                '</div>';
                        }
                    }
                } ?>
                <div class="form-group">
                    <label><?php echo _("Genre")?></label>
                    <input name="ajouterGenreAnime" type="text" class="form-control" required>
                </div>
                <?php
                if(isset($_SESSION["anime"])) {
                    $anime = $_SESSION["anime"];
                    if(!empty($anime->listeErreursActives['auteur'])) {
                        foreach ($anime->listeErreursActives['auteur'] as $erreur) {
                            echo '<div class="alert alert-danger" role="alert">' .
                                $erreur .
                                '</div>';
                        }
                    }
                } ?>
                <div class="form-group">
                    <label><?php echo _("Auteur")?></label>
                    <input name="ajouterAuteurAnime" type="text" class="form-control" required>
                </div>
                <?php
                if(isset($_SESSION["anime"])) {
                    $anime = $_SESSION["anime"];
                    if(!empty($anime->listeErreursActives['studio'])) {
                        foreach ($anime->listeErreursActives['studio'] as $erreur) {
                            echo '<div class="alert alert-danger" role="alert">' .
                                $erreur .
                                '</div>';
                        }
                    }
                } ?>
                <div class="form-group">
                    <label><?php echo _("Studio")?></label>
                    <input name="ajouterStudioAnime" type="text" class="form-control" required>
                </div>
                <?php
                if(isset($_SESSION["anime"])) {
                    $anime = $_SESSION["anime"];
                    if(!empty($anime->listeErreursActives['nbEpisodes'])) {
                        foreach ($anime->listeErreursActives['nbEpisodes'] as $erreur) {
                            echo '<div class="alert alert-danger" role="alert">' .
                                $erreur .
                                '</div>';
                        }
                    }
                } ?>
                <div class="form-group">
                    <label><?php echo _("Nombres d'episodes")?></label>
                    <input name="ajouterNbEpisodeAnime" type="number" class="form-control" required>
                </div>
                <?php
                if(isset($_SESSION["anime"])) {
                    $anime = $_SESSION["anime"];
                    if(!empty($anime->listeErreursActives['cheminImage'])) {
                        foreach ($anime->listeErreursActives['cheminImage'] as $erreur) {
                            echo '<div class="alert alert-danger" role="alert">' .
                                $erreur .
                                '</div>';
                        }
                    }
                } ?>
                <div class="form-group">
                    <label><?php echo _("Chemin de l'image")?></label>
                    <input name="ajouterCheminEpisodeAnime" type="text" class="form-control" required>
                </div>
            </div>
            <div class="modal-footer">
                <input type="button" class="btn btn-default" data-dismiss="modal" value="Annuler">
                <button type="submit" class="btn btn-success" name="ajouterAnime"><?php echo _("Ajouter")?></button>
            </div>
    </div>
    </form>
</div>
</div>
<!-- Edit Modal HTML -->
<div id="modifierAnimeModal" class="modal fade">
<div class="modal-dialog">
    <div class="modal-content">
        <form method="post" action="admin">
            <div class="modal-header">
                <h4 class="modal-title"><?php echo _("Modification de l'anime")?></h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <input id="modifierIdAnime" name="modifierIdAnime" type="hidden" class="form-control" required>
                </div>
                <?php
                if(isset($_SESSION["anime"])) {
                    $anime = $_SESSION["anime"];
                    if(!empty($anime->listeErreursActives['nom'])) {
                        foreach ($anime->listeErreursActives['nom'] as $erreur) {
                            echo '<div class="alert alert-danger" role="alert">' .
                                $erreur .
                                '</div>';
                        }
                    }
                } ?>
                <div class="form-group">
                    <label><?php echo _("Nom")?></label>
                    <input id="modifierNomAnime" name="modifierNomAnime" type="text" class="form-control" required>
                </div>
                <?php
                if(isset($_SESSION["anime"])) {
                    $anime = $_SESSION["anime"];
                    if(!empty($anime->listeErreursActives['description'])) {
                        foreach ($anime->listeErreursActives['description'] as $erreur) {
                            echo '<div class="alert alert-danger" role="alert">' .
                                $erreur .
                                '</div>';
                        }
                    }
                } ?>
                <div class="form-group">
                    <label><?php echo _("Description")?></label>
                    <textarea id="modifierDescriptionAnime" name="modifierDescriptionAnime" class="form-control" required></textarea>
                </div>
                <?php
                if(isset($_SESSION["anime"])) {
                    $anime = $_SESSION["anime"];
                    if(!empty($anime->listeErreursActives['genre'])) {
                        foreach ($anime->listeErreursActives['genre'] as $erreur) {
                            echo '<div class="alert alert-danger" role="alert">' .
                                $erreur .
                                '</div>';
                        }
                    }
                } ?>
                <div class="form-group">
                    <label><?php echo _("Genre")?></label>
                    <input id="modifierGenreAnime" name="modifierGenreAnime" type="number" class="form-control" required>
                </div>
                <?php
                if(isset($_SESSION["anime"])) {
                    $anime = $_SESSION["anime"];
                    if(!empty($anime->listeErreursActives['auteur'])) {
                        foreach ($anime->listeErreursActives['auteur'] as $erreur) {
                            echo '<div class="alert alert-danger" role="alert">' .
                                $erreur .
                                '</div>';
                        }
                    }
                } ?>
                <div class="form-group">
                    <label><?php echo _("Auteur")?></label>
                    <input id="modifierAuteurAnime" name="modifierAuteurAnime" type="text" class="form-control" required>
                </div>
                <?php
                if(isset($_SESSION["anime"])) {
                    $anime = $_SESSION["anime"];
                    if(!empty($anime->listeErreursActives['studio'])) {
                        foreach ($anime->listeErreursActives['studio'] as $erreur) {
                            echo '<div class="alert alert-danger" role="alert">' .
                                $erreur .
                                '</div>';
                        }
                    }
                } ?>
                <div class="form-group">
                    <label><?php echo _("Studio")?></label>
                    <input id="modifierStudioAnime" name="modifierStudioAnime" type="text" class="form-control" required>
                </div>
                <?php
                if(isset($_SESSION["anime"])) {
                    $anime = $_SESSION["anime"];
                    if(!empty($anime->listeErreursActives['nbEpisodes'])) {
                        foreach ($anime->listeErreursActives['nbEpisodes'] as $erreur) {
                            echo '<div class="alert alert-danger" role="alert">' .
                                $erreur .
                                '</div>';
                        }
                    }
                } ?>
                <div class="form-group">
                    <label><?php echo _("Nombres d'episodes")?></label>
                    <input id="modifierNbEpisodeAnime" name="modifierNbEpisodeAnime" type="number" class="form-control" required>
                </div>
                <?php
                if(isset($_SESSION["anime"])) {
                    $anime = $_SESSION["anime"];
                    if(!empty($anime->listeErreursActives['cheminImage'])) {
                        foreach ($anime->listeErreursActives['cheminImage'] as $erreur) {
                            echo '<div class="alert alert-danger" role="alert">' .
                                $erreur .
                                '</div>';
                        }
                    }
                } ?>
                <div class="form-group">
                    <label><?php echo _("Chemin de l'image")?></label>
                    <input id="modifierCheminImageAnime" name="modifierCheminImageAnime" type="text" class="form-control" required>
                </div>
            </div>
            <div class="modal-footer">
                <input type="button" class="btn btn-default" data-dismiss="modal" value="Annuler">
                <button type="submit" class="btn btn-info" name="modifierAnime"><?php echo _("Sauvegarder")?></button>
            </div>
    </div>
    </form>
</div>
</div>
<!-- Delete Modal HTML -->
<div id="supprimerAnimeModal" class="modal fade">
<div class="modal-dialog">
    <div class="modal-content">
        <form method="post" action="admin">
            <div class="modal-header">
                <h4 class="modal-title"><?php echo _("Suppression de l'anime")?></h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
                <p><?php echo _("Voulez-vous vraiment supprimer cet anime ?")?></p>
                <input id="supprimerAnimeNom" name="supprimerAnimeNom"></input>
                <p class="text-warning"><small><?php echo _("Cette action est irréversible !")?></small></p>
            </div>
            <div class="modal-footer">
                <input type="button" class="btn btn-default" data-dismiss="modal" value="Annuler">
                <button type="submit" class="btn btn-danger" name="supprimerAnime"><?php echo _("Supprimer")?></button>
            </div>
        </form>
    </div>
</div>
