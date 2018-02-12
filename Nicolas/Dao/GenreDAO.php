<?php
require_once '../Modele/Genre.php';

class GenreDAO
{
	public function GetListeGenres()
    {
		$list = [];
        $db = Db::getInstance();
		
        $req = $db->query('SELECT * FROM genre');

        foreach($req->fetchAll() as $genre) 
		{
            $list[] = new Genre($genre['id'], 
			$genre['nom_genre']);
        }

        return $list;
    }
}