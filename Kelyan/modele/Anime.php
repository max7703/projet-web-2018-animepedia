<?php

class Anime
{
    private $id;
    private $nom;
    private $description;
    private $genre;
    private $auteur;
    private $studio;
    private $nbEpisodes;
    
    public function __construct($id, $nom, $description, $genre, $auteur, $studio,$nbEpisodes)
    {
        $this->id = $id;
        $this->nom = $nom;
        $this->description = $description;
        $this->genre = $genre;
        $this->auteur = $auteur;
        $this->studio = $studio;
        $this->nbEpisodes = $nbEpisodes;
    }
}