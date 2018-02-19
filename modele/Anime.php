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
    private $imgPath;

    public function __construct($id, $nom, $description, $genre, $auteur, $studio, $nbEpisodes, $imgPath)
    {
        $this->id = filter_var($id, FILTER_SANITIZE_NUMBER_INT);
        $this->nom = filter_var($nom, FILTER_SANITIZE_STRING);
        $this->description = filter_var($description, FILTER_SANITIZE_STRING);
        $this->genre = filter_var($genre, FILTER_SANITIZE_NUMBER_INT);
        $this->auteur = filter_var($auteur, FILTER_SANITIZE_STRING);
        $this->studio = filter_var($studio, FILTER_SANITIZE_STRING);
        $this->nbEpisodes = filter_var($nbEpisodes, FILTER_SANITIZE_NUMBER_INT);
        $this->imgPath = filter_var($imgPath, FILTER_SANITIZE_STRING);

    }

    public function getId()
    {
        return $this->id;
    }

	public function setId($id)
    {
        $this->id = filter_var($id, FILTER_SANITIZE_NUMBER_INT);
    }

    public function getNom()
    {
        return $this->nom;
    }

	public function setNom($nom)
    {
        $this->nom = filter_var($nom, FILTER_SANITIZE_STRING);
    }

    public function getDescription()
    {
        return $this->description;
    }

	public function setDescription($description)
    {
        $this->description = filter_var($description, FILTER_SANITIZE_STRING);
    }

    public function getGenre()
    {
        return $this->genre;
    }

	public function setGenre($genre)
    {
        $this->genre = filter_var($genre, FILTER_SANITIZE_STRING);
    }

    public function getAuteur()
    {
        return $this->auteur;
    }

	public function setAuteur($auteur)
    {
        $this->auteur = filter_var($auteur, FILTER_SANITIZE_STRING);
    }

    public function getStudio()
    {
        return $this->studio;
    }

	public function setStudio($studio)
    {
        $this->studio = filter_var($studio, FILTER_SANITIZE_STRING);
    }

    public function getNbEpisodes()
    {
        return $this->nbEpisodes;
    }

	public function setNbEpisodes($nbEpisodes)
    {
        $this->nbEpisodes = filter_var($nbEpisodes, FILTER_SANITIZE_NUMBER_INT);
    }

    public function getImgPath()
    {
        return $this->imgPath;
    }

    public function setImgPath($imgPath)
    {
        $this->imgPath = filter_var($imgPath, FILTER_SANITIZE_STRING);
    }
}