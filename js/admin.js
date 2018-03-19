function afficherAnime(id, nom, description, genre, auteur, studio, nbepisodes, cheminimg, lien, descriptiondetaille) {
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
    document.getElementById('modifierOpeningAnime').value = lien;
    document.getElementById('modifierDescriptionDetailleAnime').value = descriptiondetaille.replace(/&#(\d+);/g, function(match, dec) {
        return String.fromCharCode(dec);
    });
    document.getElementById("select-genre-modifier-anime").selectedIndex = document.getElementById("modifierGenreAnime").value -1;
}

function afficherAjouterAnime(nom, description, genre, auteur, studio, nbepisodes, cheminimg, trailer, descriptiondetaille) {
    document.getElementById('ajouterNomAnime').value = nom;
    document.getElementById('ajouterDescriptionAnime').value = description.replace(/&#(\d+);/g, function(match, dec) {
        return String.fromCharCode(dec);
    });
    document.getElementById('ajouterGenreAnime').value = genre;
    document.getElementById('ajouterAuteurAnime').value = auteur;
    document.getElementById('ajouterStudioAnime').value = studio;
    document.getElementById('ajouterNbEpisodeAnime').value = nbepisodes;
    document.getElementById('ajouterCheminImageAnime').value = cheminimg;
    document.getElementById('ajouterDescriptionDetailleAnime').value = descriptiondetaille.replace(/&#(\d+);/g, function(match, dec) {
        return String.fromCharCode(dec);
    });
    document.getElementById('ajouterOpeningAnime').value = trailer;
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
    document.getElementById("select-privilege-modifier-membre").selectedIndex = document.getElementById("modifierPrivilegeMembre").value -1;
}
function afficherMembreSupprimer(pseudo) {
    document.getElementById('supprimerMembrePseudo').value = pseudo;
}

function afficherGenre(id, nom) {
    document.getElementById('modifierIdGenre').value = id;
    document.getElementById('modifierNomGenre').value = nom;
}
function afficherAjouterGenre(nom) {
    document.getElementById('ajouterNomGenre').value = nom
}
function afficherGenreSupprimer(nom) {
    document.getElementById('supprimerGenreNom').value = nom;
}

function afficherPrivilege(id, nom) {
    document.getElementById('modifierIdPrivilege').value = id;
    document.getElementById('modifierNomPrivilege').value = nom;
}
function afficherAjouterPrivilege(nom) {
    document.getElementById('ajouterNomPrivilege').value = nom;
}
function afficherPrivilegeSupprimer(nom) {
    document.getElementById('supprimerPrivilegeNom').value = nom;
}
function changePrivilegeAjouter() {
    var select = document.getElementById("select-privilege-ajouter-membre");
    var inputprivilege = document.getElementById("ajouterPrivilegeMembre");
    inputprivilege.value = select.value;
}
function changePrivilegeModifier() {
    var select = document.getElementById("select-privilege-modifier-membre");
    var inputprivilege = document.getElementById("modifierPrivilegeMembre");
    inputprivilege.value = select.value;
}
function changeGenreAjouter() {
    var select = document.getElementById("select-genre-ajouter-anime");
    var inputgenre = document.getElementById("ajouterGenreAnime");
    inputgenre.value = select.value;
}
function changeGenreModifier() {
    var select = document.getElementById("select-genre-modifier-anime");
    var inputprivilege = document.getElementById("modifierGenreAnime");
    inputprivilege.value = select.value;
}
function openPage(pageName, elmnt) {
    // Hide all elements with class="tabcontent" by default */
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }

    // Remove the background color of all tablinks/buttons
    tablinks = document.getElementsByClassName("tablink");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].style.backgroundColor = "";
    }

    // Show the specific tab content
    document.getElementById(pageName).style.display = "block";
}
// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();