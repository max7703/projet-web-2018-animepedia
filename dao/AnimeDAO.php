<?php

require_once MODELEANIME;
//require_once '../bdd/Db.php';

class AnimeDAO
{
    public function obtenirListeAnimes()
    {
		$listeAnime = [];
        $db = BaseDeDonnees::getInstance();
		
        $requete = $db->prepare('SELECT * FROM anime');

        $requete->execute();

        foreach($requete->fetchAll() as $enregistrementAnime) 
		{
			$anime = new Anime()
			$anime->construireAvecDonneesSecurisees($anime['id_anime'],
				$anime['nom_anime'],
				$anime['description_anime'],
				$anime['id_genre'],
				$anime['auteur_anime'],
				$anime['studio_anime'],
				$anime['nb_episodes_anime'],
				$anime['img_path_anime'])
			$listeAnime[] = $anime;
        }

        return $listeAnime;
    }

    public function obtenirAnimeParId($id)
    {
		$db = BaseDeDonnees::getInstance();
        $id = intval($id);
		
        $requete = $db->prepare('SELECT * FROM anime WHERE id_anime = :id_anime');
		
        $requete->execute(array('id' => $id));
		
        $anime = $requete->fetch();

        return new Anime($anime['id_anime'], 
		$anime['nom_anime'], 
		$anime['description_anime'], 
		$anime['id_genre'],
		$anime['auteur_anime'], 
		$anime['studio_anime'],
        $anime['nb_episodes_anime'],
        $anime['img_path_anime']);
		
    }

    public function obtenirAnimeParString($nom)
    {
        $db = BaseDeDonnees::getInstance();

        $requete = $db->prepare('SELECT * FROM anime WHERE nom_anime = :nom_anime');

        $requete->execute(array('nom_anime' => $nom));

        $anime = $requete->fetch();

        return new Anime($anime['id_anime'],
            $anime['nom_anime'],
            $anime['description_anime'],
            $anime['id_genre'],
            $anime['auteur_anime'],
            $anime['studio_anime'],
            $anime['nb_episodes_anime'],
            $anime['img_path_anime']);

    }
	
	public function ajouterUnAnime(Anime $anime)
	{
        $db = BaseDeDonnees::getInstance();

        $requete = $db->prepare('INSERT INTO anime(nom_anime, 
		description_anime, 
		id_genre, 
		auteur_anime, 
        studio_anime, 
		nb_episodes_anime,
		img_path_anime) 
		
		VALUES(:nom_anime, 
		:description_anime, 
		:id_genre, 
		:auteur_anime, 
        :studio_anime, 
		:nb_episodes_anime,
		:img_path_anime)');

        $requete->execute(array('nom_anime' => $anime->getNom(), 
		'description_anime' => $anime->getDescription(),
		'id_genre'=> $anime->getGenre(),
        'auteur_anime'=> $anime->getAuteur(),
        'studio_anime'=> $anime->getStudio(),
        'nb_episodes_anime'=> $anime->getNbEpisodes(),
        'img_path_anime'=> $anime->getImgPath()));
    }
	
	public function supprimerUnAnime(Anime $anime)
	{
		$db = BaseDeDonnees::getInstance();
		
		$requete = $db->prepare('DELETE FROM anime 
		WHERE id_anime=:id_anime');
		
		$requete->execute(array('id_anime' => $anime->getId()));	
	}
	
	public function modifierUnAnime(Anime $anime)
	{
		$db = BaseDeDonnees::getInstance();
		
		$requete = $db->prepare('UPDATE anime 
		SET nom_anime = :nom_anime, 
		description_anime = :description_anime, 
		id_genre = :id_genre, 
		auteur_anime = :auteur_anime, 
        studio_anime = :studio_anime, 
		nb_episodes_anime = :nb_episodes_anime,
		img_path_anime = :img_path_anime
		WHERE id_anime = :id_anime');
		
        $requete->execute(array('nom_anime' => $anime->getNom(), 
		'description_anime' => $anime->getDescription(),
		'id_genre'=> $anime->getGenre(),
        'auteur_anime'=> $anime->getAuteur(),
        'studio_anime'=> $anime->getStudio(),
        'nb_episodes_anime'=> $anime->getNbEpisodes(),
        'img_path_anime'=> $anime->getImgPath(),
        'id_anime'=> $anime->getId()));
	}
	
}