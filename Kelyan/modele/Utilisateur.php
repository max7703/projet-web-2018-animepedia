<?php

class Utilisateur
{
	private id;
	private pseudo;
	private mdp;
	private email;
	
	 public function __construct($id, $pseudo, $mdp, $email)
    {
		$this->id = $id;
		$this->pseudo = $pseudo;
		$this->mdp = $mdp;
		$this->email = $email;
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
	
}