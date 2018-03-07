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
	private $lienTrailer;
	private $descriptionDetaillee;
    private $valid ;

    private $idTemporaire;
    private $nomTemporaire;
    private $descriptionTemporaire;
    private $genreTemporaire;
    private $auteurTemporaire;
    private $studioTemporaire;
    private $nbEpisodesTemporaire;
    private $imgPathTemporaire;
	private $lienTrailerTemporaire;
	private $descriptionDetailleeTemporaire;

    private $listeMessagesErreur = [
        "Nom-vide"=>"le nom de l'anime ne doit pas être vide",
        "Nom-trop-long"=>"le nom de l'anime est trop long",
        "Nom-invalide"=>"le nom ne doit contenir que des caracteres alphanumeriques",
        "Description-vide"=>"la description de l'anime ne doit pas être vide",
        "Description-trop-longue"=>"la description de l'anime est trop longue",
        "Description-invalide"=>"la description ne doit contenir que des caracteres alphanumeriques",
        "Genre-vide"=>"le genre de l'anime ne doit pas être vide",
        "Genre-invalide"=>"le genre doit etre un entier",
        "Auteur-vide"=>"le nom de l'auteur ne doit pas être vide",
        "Nom-auteur-trop-long"=>"le nom de l'auteur est trop long",
        "Auteur-invalide"=>"le nom de l'auteur ne doit contenir que des caracteres alphanumeriques",
        "Studio-vide"=>"le nom du studio ne doit pas être vide",
        "Nom-studio-trop-long"=>"le nom du studio est trop long",
        "Studio-invalide"=>"le nom du studio ne doit contenir que des caracteres alphanumeriques",
        "Nombre-episodes-vide"=>"le nombre d'episodes ne doit pas être vide",
        "Nombre-episodes-invalide"=>"le nombre d'episodes doit etre un entier",
        "Chemin-image-vide"=>"le chemin vers l'image ne doit pas être vide",
		"Chemin-image-trop-long"=>"le chemin vers l'image est trop long",
        "Description--detaillee-vide"=>"la description detaillée de l'anime ne doit pas être vide",
        "Description-detaillee-trop-longue"=>"la description detaillée de l'anime est trop longue",
        "Description-detaillee-invalide"=>"la description detaillée ne doit contenir que des caracteres alphanumeriques",
		"Lien-trailer"=>"le chemin vers le trailer ne doit pas être vide",
		"Lien-trailer-trop-long"=>"le chemin vers le trailer est trop long",

    ];
    public $listeErreursActives = [];

    public function __construct($id, $nom, $description, $genre, $auteur, $studio, $nbEpisodes, $imgPath)
    {
       $this->valid = true;
       $this->construireAvecDonneesSecurisees($id, $nom, $description, $genre, $auteur, $studio, $nbEpisodes, $imgPath);
    }
	
	public function construireSansDonneesSecurisees($id, $nom, $description, $genre, $auteur, $studio, $nbEpisodes, $imgPath)
	{
	    $this->valid = true;

		$this->idTemporaire = $id;
        $this->nomTemporaire = filter_var($nom, FILTER_SANITIZE_STRING);
        $this->descriptionTemporaire = filter_var($description, FILTER_SANITIZE_STRING);
        $this->genreTemporaire = filter_var($genre, FILTER_SANITIZE_STRING);
        $this->auteurTemporaire = filter_var($auteur, FILTER_SANITIZE_STRING);
        $this->studioTemporaire = filter_var($studio, FILTER_SANITIZE_STRING);
        $this->nbEpisodesTemporaire = filter_var($nbEpisodes, FILTER_SANITIZE_NUMBER_INT);
        $this->imgPathTemporaire = filter_var($imgPath, FILTER_SANITIZE_STRING);

        if(ctype_digit($this->idTemporaire)){
            $this->id = $this->idTemporaire;
        }

        if(strlen($this->nomTemporaire)>35){
            $this->listeErreursActives["nom"][] = $this->listeMessagesErreur["Nom-trop-long"];
            $this->valid = false;
        }
        if(empty($this->nomTemporaire)){
            $this->listeErreursActives["nom"][] = $this->listeMessagesErreur["Nom-vide"];
            $this->valid = false;
        }
        if(empty($this->listeErreursActives["nom"]))
        {
            $this->nom = $this->nomTemporaire;
        }

        if(strlen($this->descriptionTemporaire)>160){
            $this->listeErreursActives["description"][] = $this->listeMessagesErreur["Description-trop-longue"];
            $this->valid = false;
        }
        if(empty($this->descriptionTemporaire)){
            $this->listeErreursActives["description"][] = $this->listeMessagesErreur["Description-vide"];
            $this->valid = false;
        }
        if(empty($this->listeErreursActives["description"]))
        {
            $this->description = $this->descriptionTemporaire;
        }

        if(!ctype_digit($this->genreTemporaire)){
            $this->listeErreursActives["genre"][] = $this->listeMessagesErreur["Genre-invalide"];
            $this->valid = false;
        }
        if(empty($this->genreTemporaire)){
            $this->listeErreursActives["genre"][] = $this->listeMessagesErreur["Genre-vide"];
            $this->valid = false;
        }
        if(empty($this->listeErreursActives["genre"]))
        {
            $this->genre = $this->genreTemporaire;
        }

        if(strlen($this->auteurTemporaire)>30){
            $this->listeErreursActives["auteur"][] = $this->listeMessagesErreur["Nom-auteur-trop-long"];
            $this->valid = false;
        }
        if(empty($this->auteurTemporaire)){
            $this->listeErreursActives["auteur"][] = $this->listeMessagesErreur["Auteur-vide"];
            $this->valid = false;
        }
        if(empty($this->listeErreursActives["auteur"]))
        {
            $this->auteur = $this->auteurTemporaire;
        }

        if(strlen($this->studioTemporaire)>30){
            $this->listeErreursActives["studio"][] = $this->listeMessagesErreur["Nom-studio-trop-long"];
            $this->valid = false;
        }
        if(empty($this->studioTemporaire)){
            $this->listeErreursActives["studio"][] = $this->listeMessagesErreur["Studio-vide"];
            $this->valid = false;
        }
        if(empty($this->listeErreursActives["studio"]))
        {
            $this->studio = $this->studioTemporaire;
            $this->valid = false;
        }

        if(!ctype_digit($this->nbEpisodesTemporaire)){
            $this->listeErreursActives["nbEpisodes"][] = $this->listeMessagesErreur["Nombre-episodes-invalide"];
            $this->valid = false;
        }
        else if(empty($this->nbEpisodesTemporaire)){
            $this->listeErreursActives["nbEpisodes"][] = $this->listeMessagesErreur["Nombre-episodes-vide"];
            $this->valid = false;
        }
        if(empty($this->listeErreursActives["nbEpisodes"]))
        {
            $this->nbEpisodes = $this->nbEpisodesTemporaire;
        }

        if(empty($this->imgPathTemporaire)){
            $this->listeErreursActives["cheminImage"][] = $this->listeMessagesErreur["Chemin-image-vide"];
            $this->valid = false;
        }
        if(empty($this->listeErreursActives["cheminImage"]))
        {
            $this->imgPath = $this->imgPathTemporaire;
        }
	}

	public function construireAvecDonneesSecurisees($id, $nom, $description, $genre, $auteur, $studio, $nbEpisodes, $imgPath)
    {
        $this->valid = true;
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

    public function getNom()
    {
        return $this->nom;
    }

	public function setNom($nom)
    {
        $this->nomTemporaire = filter_var($nom, FILTER_SANITIZE_STRING);
        if(empty($this->nomTemporaire)) {
            $this->listeErreursActives["nom"][] = $this->listeMessagesErreur["Nom-vide"];
        }
        if(strlen($this->nomTemporaire) > 40) {
            $this->listeErreursActives["nom"][] = $this->listeMessagesErreur["Nom-trop-long"];
        }
        if(!ctype_alnum($this->nomTemporaire))
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
	
	public function getLienTrailer()
	{
		return $this->lienTrailer;
	}
	
	public function setLienTrailer()
	{
		$this->lienTrailer = filter_var($lienTrailer, FILTER_SANITIZE_STRING);
	}
	
	public function getDescriptionDetaillee()
	{
		return $this->descriptionDetaillee;
	}
	
	public function setDescriptionDetaillee()
	{
		$this->descriptionDetaillee = filter_var($descriptionDetaillee, FILTER_SANITIZE_STRING);
	}

    public function estValide(){
        return empty($this->listeErreursActives);
    }
}