<?php
require_once '../modele/Genre.php';
require_once '../bdd/Db.php';

class GenreDAO
{
	public function GetListeGenres()
    {
		$list = [];
        $db = Db::getInstance();
		
        $req = $db->query('SELECT * FROM genre');

        foreach($req->fetchAll() as $genre) 
		{
            $list[] = new Genre($genre['id_genre'], 
			$genre['nom_genre']);
        }

        return $list;
    }
	
	public function GetGenreById($id)
    {
		$db = Db::getInstance();
        $id = intval($id);
		
        $req = $db->prepare('SELECT * FROM genre WHERE id_genre = :id_genre');
		
        $req->execute(array('id_genre' => $id));
		
        $genre = $req->fetch();

        return new Genre($genre['id_genre'], 
		$genre['nom_genre']);	
    }
	
	public function AjouterUnGenre(Genre $genre) 
	{
        $db = Db::getInstance();

        $req = $db->prepare('INSERT INTO genre(nom_genre)
		VALUES(:nom_genre');

        $req->execute(array('nom_genre' => $genre->getNom()));
    }
	
	public function SupprimerUnGenre(Genre $genre)
	{
		$db = Db::getInstance();
		
		$req = $db->prepare('DELETE FROM genre 
		WHERE id_genre=:id_genre');
		
		$req->execute(array('id_genre' => $genre->getId()));	
	}
	
	public function ModifierUnGenre(Genre $genre)
	{
		$db = Db::getInstance();
		
		$req = $db->prepare('UPDATE INTO genre 
		SET nom_genre = :nom_genre');
		
        $req->execute(array('nom_genre' => $genre->getNom()));
	}
}