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
	
	 public function __construct($id, $pseudo, $mdp, $email, $id_privilege, $image, $description)
    {
		$this->id = $id;
		$this->pseudo = $pseudo;
		$this->mdp = $mdp;
		$this->email = $email;
		$this->id_privilege = $id_privilege;
		$this->image = $image;
		$this->description = $description;
	}
	
	public function getId()
    {
        return $this->id;
    }
	
	public function setId($id)
	{
		$this->id = $id;
	}
	
	public function getPseudo()
    {
        return $this->pseudo;
    }
	
	public function setPseudo($pseudo)
	{
		$this->pseudo = $pseudo;
	}
	
	public function getMdp()
    {
        return $this->mdp;
    }
	
	public function setMdp($mdp)
	{
		$this->mdp = $mdp;
	}
	
	public function getEmail()
    {
        return $this->email;
    }
	
	public function setEmail($email)
	{
		$this->email = $email;
	}
	
	public function getId_Privilege()
    {
        return $this->id_privilege;
    }
	
	public function setId_Privilege($id_privilege)
	{
		$this->id_privilege = $id_privilege;
	}
	
	public function getImage()
    {
        return $this->image;
    }
	
	public function setImage($image)
	{
		$this->image = $image;
	}
	
	public function getDescription()
    {
        return $this->description;
    }
	
	public function setDescription($description)
	{
		$this->description = $description;
	}
	
}