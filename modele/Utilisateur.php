<?php

class Utilisateur
{
	private $id;
	private $pseudo;
	private $mdp;
	private $email;
	private $id_privilege;
	private $image;
	private $description;

    private $idtemporaire;
    private $pseudotemporaire;
    private $mdptemporaire;
    private $emailtemporaire;
    private $id_privilegetemporaire;
    private $imagetemporaire;
    private $descriptiontemporaire;
	
	 public function __construct($id, $pseudo, $mdp, $email, $id_privilege, $image, $description)
    {
        $this->construireAvecDonneesSecurisees($id, $pseudo, $mdp, $email, $id_privilege, $image, $description)
        $this->idtemporaire = filter_var($id, FILTER_SANITIZE_NUMBER_INT);
		$this->pseudotemporaire = filter_var($pseudo, FILTER_SANITIZE_STRING);
		$this->mdptemporaire = filter_var($mdp, FILTER_SANITIZE_STRING);
		$this->emailtemporaire = filter_var($email, FILTER_SANITIZE_EMAIL);
		$this->id_privilegetemporaire = filter_var($id_privilege, FILTER_SANITIZE_NUMBER_INT);
		$this->imagetemporaire = filter_var($image, FILTER_SANITIZE_STRING);
		$this->descriptiontemporaire = filter_var($description, FILTER_SANITIZE_STRING);
	}

	public function construireAvecDonneesSecurisees($id, $pseudo, $mdp, $email, $id_privilege, $image, $description) {
        $this->id = filter_var($id, FILTER_SANITIZE_NUMBER_INT);
        $this->pseudo = filter_var($pseudo, FILTER_SANITIZE_STRING);
        $this->mdp = filter_var($mdp, FILTER_SANITIZE_STRING);
        $this->email = filter_var($email, FILTER_SANITIZE_EMAIL);
        $this->id_privilege = filter_var($id_privilege, FILTER_SANITIZE_NUMBER_INT);
        $this->image = filter_var($image, FILTER_SANITIZE_STRING);
        $this->description = filter_var($description, FILTER_SANITIZE_STRING);
    }
	
	public function getId()
    {
        return $this->id;
    }
	
	public function setId($id)
	{
		$this->id = filter_var($id, FILTER_SANITIZE_NUMBER_INT);
	}
	
	public function getPseudo()
    {
        return $this->pseudo;
    }
	
	public function setPseudo($pseudo)
	{
		$this->pseudo = filter_var($pseudo, FILTER_SANITIZE_STRING);
	}
	
	public function getMdp()
    {
        return $this->mdp;
    }
	
	public function setMdp($mdp)
	{
		$this->mdp = filter_var($mdp, FILTER_SANITIZE_STRING);
	}
	
	public function getEmail()
    {
        return $this->email;
    }
	
	public function setEmail($email)
	{
		$this->email = filter_var($email, FILTER_SANITIZE_EMAIL);
	}
	
	public function getId_Privilege()
    {
        return $this->id_privilege;
    }
	
	public function setId_Privilege($id_privilege)
	{
		$this->id_privilege = filter_var($id_privilege, FILTER_SANITIZE_NUMBER_INT);
	}
	
	public function getImage()
    {
        return $this->image;
    }
	
	public function setImage($image)
	{
		$this->image = filter_var($image, FILTER_SANITIZE_STRING);
	}
	
	public function getDescription()
    {
        return $this->description;
    }
	
	public function setDescription($description)
	{
		$this->description = filter_var($description, FILTER_SANITIZE_STRING);
	}
	
}