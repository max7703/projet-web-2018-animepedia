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
    private $valid;

    private $idTemporaire;
    private $nomTemporaire;
    private $descriptionTemporaire;
    private $genreTemporaire;
    private $auteurTemporaire;
    private $studioTemporaire;
    private $nbEpisodesTemporaire;
    private $imgPathTemporaire;

    private $listeMessagesErreur = [
        "Nom-vide"=>"le nom de l'anime ne doit pas être vide",
        "Nom-trop-long"=>"le nom de l'anime est trop long",
        "Nom-contient-chiffre"=>"le nom ne doit pas contenir un chiffre"
    ];
    private $listeErreursActives = [];

    public function __construct()
    {
       

    }
	
	public function construireAvecDonneesSecurisees($id, $nom, $description, $genre, $auteur, $studio, $nbEpisodes, $imgPath)
	{
		$this->id = $id;
        $this->nom = $nom;
        $this->description = $description;
        $this->genre = $genre;
        $this->auteur = $auteur;
        $this->studio = $studio;
        $this->nbEpisodes = $nbEpisodes;
        $this->imgPath = $imgPath;
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
        $valid = false;
        $this->nomTemporaire = filter_var($nom, FILTER_SANITIZE_STRING);
        if(empty($this->nomTemporaire)) {
            $this->listeErreursActives["nom"][] = $this->listeMessagesErreur["Nom-vide"];
        }
        if(strlen($this->nomTemporaire) > 250) {
            $this->listeErreursActives["nom"][] = $this->listeMessagesErreur["Nom-trop-long"];
        }
        if(!ctype_alpha($this->nomTemporaire))
        {
            $this->listeErreursActives["nom"][] = $this->listeMessagesErreur["Nom-contient-chiffres"];
        }
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