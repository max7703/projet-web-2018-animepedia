<?php

class Privilege
{
	private $id;
	private $nom;

	private $valid ;

	private $idtemporaire;
	private $nomtemporaire;

	private $listeMessagesErreur = [
		"Nom-vide"=>"le nom du privilege ne doit pas être vide",
        "Nom-trop-long"=>"le nom du privilege est trop long",
        "Nom-invalide"=>"le nom ne doit contenir que des caracteres alphanumeriques"
	];
	public $listeErreursActives = [];

	public function __construct($id, $nom)
    {
		$this->valid = true;
        $this->construireAvecDonneesSecurisees($id, $nom);
	}

	public function construireSansDonneesSecurisees($id, $nom)
    {
        $this->idtemporaire = filter_var($id, FILTER_SANITIZE_NUMBER_INT);
        $this->nomtemporaire = filter_var($nom, FILTER_SANITIZE_STRING);

        if(ctype_digit($this->idTemporaire)){
            $this->id = $this->idTemporaire;
        }

        if(strlen($this->nomTemporaire)>15){
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
    }

    public function construireAvecDonneesSecurisees($id, $nom)
    {
        $this->valid = true;
        $this->id = $id;
        $this->nom = $nom;
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
        $this->nomtemporaire = filter_var($nom, FILTER_SANITIZE_STRING);

        if(strlen($this->nomTemporaire)>15){
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
	}

	public function estValide(){
        return empty($this->listeErreursActives);
    }
}