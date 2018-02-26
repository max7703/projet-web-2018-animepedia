function afficherAnime(id, nom, description, genre, auteur, studio, nbepisodes, cheminimg) {
    document.getElementById('modifierIdAnime').value = id;
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

function afficherMembre(id, pseudo, email, privilege, image, description) {
    document.getElementById('modifierIdMembre').value = id;
    document.getElementById('modifierPseudoMembre').value = pseudo;
    document.getElementById('modifierEmailMembre').value = email;
    document.getElementById('modifierPrivilegeMembre').value = privilege;
    document.getElementById('modifierImageMembre').value = image;
    document.getElementById('modifierDescriptionMembre').value = description;
}
function afficherMembreSupprimer(pseudo) {
    document.getElementById('supprimerMembrePseudo').value = pseudo;
}

function afficherGenre(id, nom) {
    document.getElementById('modifierIdGenre').value = id;
    document.getElementById('modifierNomGenre').value = nom;
}
function afficherGenreSupprimer(nom) {
    document.getElementById('supprimerGenreNom').value = nom;
}

function afficherPrivilege(id, nom) {
    document.getElementById('modifierIdPrivilege').value = id;
    document.getElementById('modifierNomPrivilege').value = nom;
}
function afficherPrivilegeSupprimer(nom) {
    document.getElementById('supprimerPrivilegeNom').value = nom;
}