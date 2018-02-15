<?php

require_once '../modele/Anime.php';
require_once '../bdd/Db.php';

class AnimeDAO
{
    public function GetListeAnimes()
    {
		$list = [];
        $db = Db::getInstance();
		
        $req = $db->query('SELECT * FROM anime');

        foreach($req->fetchAll() as $anime) 
		{
            if (isset($anime)) {
                $list[] = new Anime($anime['id_anime'],
                $anime['nom_anime'],
                $anime['description_anime'],
                $anime['id_genre'],
                $anime['auteur_anime'],
                $anime['studio_anime'],
                $anime['nb_episodes_anime'],
                $anime['img_path_anime']);
            }
        }

        return $list;
    }

    public function GetAnimeById($id)
    {
		$db = Db::getInstance();
        $id = intval($id);
		
        $req = $db->prepare('SELECT * FROM anime WHERE id_anime = :id_anime');
		
        $req->execute(array('id' => $id));
		
        $anime = $req->fetch();

        return new Anime($anime['id_anime'], 
		$anime['nom_anime'], 
		$anime['description_anime'], 
		$anime['genre_anime'], 
		$anime['auteur_anime'], 
		$anime['studio_anime'],
        $anime['nb_episodes_anime'],
        $anime['img_path_anime']);
		
    }
	
	public function AjouterUnAnime(Anime $anime) 
	{
        $db = Db::getInstance();

        $req = $db->prepare('INSERT INTO anime(nom_anime, 
		description_anime, 
		genre_anime, 
		auteur_anime, 
        studio_anime, 
		nb_episodes_anime,
		img_path_anime) 
		
		VALUES(:nom_anime, 
		:description_anime, 
		:genre_anime, 
		:auteur_anime, 
        :studio_anime, 
		:nb_episodes_anime,
		:img_path_anime');

        $req->execute(array('nom_anime' => $anime->getNom(), 
		'description_anime' => $anime->getDescription(),
		'genre_anime'=> $anime->getGenre(),
        'auteur_anime'=> $anime->getAuteur(),
        'studio_anime'=> $anime->getStudio(),
        'nb_episodes_anime'=> $anime->getNbEpisodes(),
        'img_path_anime'=> $anime->getImgPath()));
    }
	
	public function SupprimerUnAnime(Anime $anime)
	{
		$db = Db::getInstance();
		
		$req = $db->prepare('DELETE FROM anime 
		WHERE id_anime=:id_anime');
		
		$req->execute(array('id_anime' => $anime->getId()));	
	}
	
	public function ModifierUnAnime(Anime $anime)
	{
		$db = Db::getInstance();
		
		$req = $db->prepare('UPDATE anime 
		SET nom_anime = :nom_anime, 
		description_anime = :description_anime, 
		genre_anime = :genre_anime, 
		auteur_anime = :auteur_anime, 
        studio_anime = :studio_anime, 
		nb_episodes_anime = :nb_episodes_anime,
		img_path_anime = :img_path_anime');
		
        $req->execute(array('nom_anime' => $anime->getNom(), 
		'description_anime' => $anime->getDescription(),
		'genre_anime'=> $anime->getGenre(),
        'auteur_anime'=> $anime->getAuteur(),
        'studio_anime'=> $anime->getStudio(),
        'nb_episodes_anime'=> $anime->getNbEpisodes(),
        'img_path_anime'=> $anime->getImgPath()));
	}
	
}