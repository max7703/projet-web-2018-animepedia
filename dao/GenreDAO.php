<?php
require_once MODELEGENRE;

class GenreDAO
{
    public function obtenirListeGenres()
    {
        $listeGenres = [];
        $basededonnee = BaseDeDonnees::getInstance();

        $requete = $basededonnee->prepare('SELECT * FROM genre ORDER BY nom_genre ASC');

        $requete->execute();

        foreach($requete->fetchAll() as $genre)
        {
            $listeGenres[] = new Genre($genre['id_genre'],
                $genre['nom_genre']);
        }

        return $listeGenres;
    }

    public function obtenirGenreParId($id)
    {
        $basededonnee = BaseDeDonnees::getInstance();
        $id = intval($id);

        $requete = $basededonnee->prepare('SELECT * FROM genre WHERE id_genre = :id_genre');

        $requete->execute(array('id_genre' => $id));

        $genre = $requete->fetch();

        return new Genre($genre['id_genre'],
            $genre['nom_genre']);
    }

    public function obtenirGenreParString($nom)
    {
        $basededonnee = BaseDeDonnees::getInstance();

        $requete = $basededonnee->prepare('SELECT * FROM genre WHERE nom_genre = :nom_genre');

        $requete->execute(array('nom_genre' => $nom));

        $genre = $requete->fetch();

        return new Genre($genre['id_genre'],
            $genre['nom_genre']);
    }

    public function ajouterUnGenre(Genre $genre)
    {
        $basededonnee = BaseDeDonnees::getInstance();

        $requete = $basededonnee->prepare('INSERT INTO genre(nom_genre)
		VALUES(:nom_genre)');

        $requete->execute(array('nom_genre' => $genre->getNom()));
    }

    public function supprimerUnGenre(Genre $genre)
    {
        $basededonnee = BaseDeDonnees::getInstance();

        $requete = $basededonnee->prepare('DELETE FROM genre 
		WHERE id_genre=:id_genre');

        $requete->execute(array('id_genre' => $genre->getId()));
    }

    public function modifierUnGenre(Genre $genre)
    {
        $basededonnee = BaseDeDonnees::getInstance();

        $requete = $basededonnee->prepare('UPDATE genre 
		SET nom_genre = :nom_genre
		WHERE id_genre = :id_genre');

        $requete->execute(array('nom_genre' => $genre->getNom(),
            'id_genre' => $genre->getId()));
    }
}