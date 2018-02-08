<?php

class Utilisateur
{
	private id;
	private pseudo;
	
	 public function __construct($id, $pseudo)
    {
		$this->id = $id;
		$this->pseudo = $pseudo;
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
	
}