<?php
/**
 * Created by PhpStorm.
 * User: Kelyan Chauffourier
 * Date: 07/02/2018
 * Time: 09:48
 */
require_once '../modele/Anime.php';
class AnimeDAO
{
    private $listeAnimes = array();

    private function remplirListeAnimes()
    {
        array_push(
            $this->listeAnimes, new Anime(0, "one piece",
                "les aventures de Luffy, le pirate au chapeau de paille", "Shonen", "Eichiro Oda",
                "Toei", 900)
        );
        array_push(
            $this->listeAnimes, new Anime(1, "naruto",
                "La quete de naruto uzumaki pour devenir Konoha", "shonen", "Masashi kishimoto",
                "Studio Pierrot", 1500)
        );
    }

    /**
     * @return array
     */
    public function getListeAnimes()
    {
		$list = [];
        $db = Db::getInstance();
		
        $req = $db->query('SELECT * FROM anime');

        foreach($req->fetchAll() as $anime) {
            $list[] = new Anime($anime['id'], 
			$anime['nom_anime'], 
			$anime['description_anime'], 
			$anime['genre_anime'], 
			$anime['auteur_anime'], 
			$anime['studio_anime'], 
			$anime['nb_episodes_anime']););
        }

        return $list;
		
        /*$this->remplirListeAnimes();
        return $this->listeAnimes;*/
    }

    public function getAnimeById($id)
    {
		$db = Db::getInstance();
        $id = intval($id);
		
        $req = $db->prepare('SELECT * FROM anime WHERE id = :id');
		
        $req->execute(array('id' => $id));
		
        $anime = $req->fetch();

        return new Anime($anime['id'], 
		$anime['nom_anime'], 
		$anime['description_anime'], 
		$anime['genre_anime'], 
		$anime['auteur_anime'], 
		$anime['studio_anime'], 
		$anime['nb_episodes_anime']);
		
        /*$this->remplirListeAnimes();
        foreach ($this->listeAnimes as $anime)
        {
            if($anime.getId() == $id);
            return $anime;
        }

        return null;
        echo "ERROR, not found";*/
    }
}