<?php

class Privilege
{
	private $id;
	private $nom;
	
	 public function __construct($id, $nom)
    {
		$this->id = filter_var($id, FILTER_SANITIZE_NUMBER_INT);
		$this->nom = filter_var($nom, FILTER_SANITIZE_STRING);
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
}