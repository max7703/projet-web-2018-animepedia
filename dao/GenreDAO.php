<?php
require_once MODELEGENRE;
/*require_once '../bdd/Db.php';*/

class GenreDAO
{
	public function obtenirListeGenres()
    {
		$list = [];
        $db = BaseDeDonnees::getInstance();
		
        $req = $db->prepare('SELECT * FROM genre');

        $req->execute();

        foreach($req->fetchAll() as $genre) 
		{
            $list[] = new Genre($genre['id_genre'], 
			$genre['nom_genre']);
        }

        return $list;
    }
	
	public function obtenirGenreParId($id)
    {
		$db = BaseDeDonnees::getInstance();
        $id = intval($id);
		
        $req = $db->prepare('SELECT * FROM genre WHERE id_genre = :id_genre');
		
        $req->execute(array('id_genre' => $id));
		
        $genre = $req->fetch();

        return new Genre($genre['id_genre'], 
		$genre['nom_genre']);	
    }

    public function ObtenirGenreParString($nom)
    {
        $db = BaseDeDonnees::getInstance();

        $req = $db->prepare('SELECT * FROM genre WHERE nom_genre = :nom_genre');

        $req->execute(array('nom_genre' => $nom));

        $genre = $req->fetch();

        return new Genre($genre['id_genre'],
            $genre['nom_genre']);
    }

	public function ajouterUnGenre(Genre $genre)
	{
        $db = BaseDeDonnees::getInstance();

        $req = $db->prepare('INSERT INTO genre(nom_genre)
		VALUES(:nom_genre)');

        $req->execute(array('nom_genre' => $genre->getNom()));
    }
	
	public function supprimerUnGenre(Genre $genre)
	{
		$db = BaseDeDonnees::getInstance();
		
		$req = $db->prepare('DELETE FROM genre 
		WHERE id_genre=:id_genre');
		
		$req->execute(array('id_genre' => $genre->getId()));	
	}
	
	public function modifierUnGenre(Genre $genre)
	{
		$db = BaseDeDonnees::getInstance();
		
		$req = $db->prepare('UPDATE genre 
		SET nom_genre = :nom_genre');
		
        $req->execute(array('nom_genre' => $genre->getNom()));
	}
}