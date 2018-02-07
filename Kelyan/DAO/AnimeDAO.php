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
        $this->remplirListeAnimes();
        return $this->listeAnimes;
    }

    public function getAnimeById( $id)
    {
        $this->remplirListeAnimes();
        foreach ($this->listeAnimes as $anime)
        {
            if($anime.getId() == $id);
            return $anime;
        }
        echo "ERROR, not found";
    }
}