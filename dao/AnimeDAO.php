<?php

require_once '../modele/Anime.php';
require_once '../bdd/Db.php';

class AnimeDAO
{
	
    private $listeAnimes = array();

    //private function RemplirListeAnimes()
    //{
    //    array_push(
    //        $this->listeAnimes, new Anime(0, "one piece",
    //            "Les aventures de Luffy, le pirate au chapeau de paille", "Shonen", "Eichiro Oda", "Toei", 850));
	//			
    //    array_push(
    //        $this->listeAnimes, new Anime(1, "naruto",
    //            "La quete de Naruto Uzumaki pour devenir Hokage", "Shonen", "Masashi Kishimoto", "Studio Pierrot", 740));
    //}

	
    public function GetListeAnimes()
    {
		$list = [];
        $db = Db::getInstance();
		
        $req = $db->query('SELECT * FROM anime');

        foreach($req->fetchAll() as $anime) 
		{
            $list[] = new Anime($anime['id_anime'], 
			$anime['nom_anime'], 
			$anime['description_anime'], 
			$anime['genre_anime'], 
			$anime['auteur_anime'], 
			$anime['studio_anime'], 
			$anime['nb_episodes_anime']);
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
		$anime['nb_episodes_anime']);
		
    }
	
	public function AjouterUnAnime(Anime $anime) 
	{
        $db = Db::getInstance();

        $req = $db->prepare('INSERT INTO anime(nom_anime, 
		description_anime, 
		genre_anime, 
		auteur_anime, 
        studio_anime, 
		nb_episodes_anime) 
		
		VALUES(:nom_anime, 
		:description_anime, 
		:genre_anime, 
		:auteur_anime, 
        :studio_anime, 
		:nb_episodes_anime');

        $req->execute(array('nom_anime' => $anime->getNom(), 
		'description_anime' => $anime->getDescription(),
		'genre_anime'=> $anime->getGenre(),
        'auteur_anime'=> $anime->getAuteur(),
        'studio_anime'=> $anime->getStudio(),
        'nb_episodes_anime'=> $anime->getNbEpisodes()));
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
		
		$req = $db->prepare('UPDATE INTO anime 
		SET nom_anime = :nom_anime, 
		description_anime = :description_anime, 
		genre_anime = :genre_anime, 
		auteur_anime = :auteur_anime, 
        studio_anime = :studio_anime, 
		nb_episodes_anime = :nb_episodes_anime');
		
        $req->execute(array('nom_anime' => $anime->getNom(), 
		'description_anime' => $anime->getDescription(),
		'genre_anime'=> $anime->getGenre(),
        'auteur_anime'=> $anime->getAuteur(),
        'studio_anime'=> $anime->getStudio(),
        'nb_episodes_anime'=> $anime->getNbEpisodes()));
	}
	
}