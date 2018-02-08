<?php

class Utilisateur
{
	private id;
	
	 public function __construct($id)
    {
		$this->id = $id;
	}
	
	public function getId()
    {
        return $this->id;
    }
	
	public function setId()
	{
		$this->id = $id;
	}
	
}