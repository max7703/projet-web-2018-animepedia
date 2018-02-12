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

    public function __construct($id, $nom, $description, $genre, $auteur, $studio, $nbEpisodes)
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

	public function setId($id)
    {
        $this->id = $id;
    }

    public function getNom()
    {
        return $this->nom;
    }

	public function setNom($nom)
    {
        $this->nom = $nom;
    }

    public function getDescription()
    {
        return $this->description;
    }

	public function setDescription($description)
    {
        $this->description = $description;
    }

    public function getGenre()
    {
        return $this->genre;
    }

	public function setGenre($genre)
    {
        $this->genre = $genre;
    }

    public function getAuteur()
    {
        return $this->auteur;
    }

	public function setAuteur($auteur)
    {
        $this->auteur = $auteur;
    }

    public function getStudio()
    {
        return $this->studio;
    }

	public function setStudio($studio)
    {
        $this->studio = $studio;
    }

    public function getNbEpisodes()
    {
        return $this->nbEpisodes;
    }

	public function setNbEpisodes($nbEpisodes)
    {
        $this->nbEpisodes = $nbEpisodes;
    }
}