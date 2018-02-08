<?php

class Utilisateur
{
	private id;
	private pseudo;
	private mdp;
	
	 public function __construct($id, $pseudo, $mdp)
    {
		$this->id = $id;
		$this->pseudo = $pseudo;
		$this->mdp = $mdp;
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
	
}