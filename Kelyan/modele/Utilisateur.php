<?php

class Utilisateur
{
	private id;
	private pseudo;
	private mdp;
	private email;
	private id_privilege;
	private image;
	
	 public function __construct($id, $pseudo, $mdp, $email, $id_privilege, $image)
    {
		$this->id = $id;
		$this->pseudo = $pseudo;
		$this->mdp = $mdp;
		$this->email = $email;
		$this->id_privilege = $id_privilege;
		$this->image = $image;
	}
	
	public function getId()
    {
        return $this->id;
    }
	
	public function setId()
	{
		$this->id = $id;
	}
	
	public function getPseudo()
    {
        return $this->pseudo;
    }
	
	public function setPseudo()
	{
		$this->pseudo = $pseudo;
	}
	
	public function getMdp()
    {
        return $this->mdp;
    }
	
	public function setMdp()
	{
		$this->mdp = $mdp;
	}
	
	public function getEmail()
    {
        return $this->email;
    }
	
	public function setEmail()
	{
		$this->email = $email;
	}
	
	public function getId_Privilege()
    {
        return $this->id_privilege;
    }
	
	public function setId_Privilege()
	{
		$this->id_privilege = $id_privilege;
	}
	
	public function getImage()
    {
        return $this->image;
    }
	
	public function setImage()
	{
		$this->image = $image;
	}
	
}