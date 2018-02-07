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
        
    public function getId()
    {
        return $this->id;
    }

    public function getNom()
    {
        return $this->nom;
    }

    public function getDescription()
    {
        return $this->description;
    }
    
    public function getGenre()
    {
        return $this->genre;
    }
    
    public function getAuteur()
    {
        return $this->auteur;
    }
    
    public function getStudio()
    {
        return $this->studio;
    }
    
    public function getNbEpisodes()
    {
        returnn $this->nbEpisodes;
    }
}