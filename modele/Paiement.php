<?php

class Paiement
{
	private $id;
	private $paiement_id_paypal;
	private $id_utilisateur;
	private $date_paiement;
	
	public function __construct($id, $paiement_id_paypal, $id_utilisateur, $date_paiement)
    {
        $this->id = filter_var($id, FILTER_SANITIZE_NUMBER_INT);
		$this->paiement_id_paypal = filter_var($paiement_id_paypal, FILTER_SANITIZE_STRING);
		$this->id_utilisateur = filter_var($id_utilisateur, FILTER_SANITIZE_STRING);
		$this->date_paiement = filter_var($date_paiement, FILTER_SANITIZE_EMAIL);
	}
	
	public function getId()
    {
        return $this->id;
    }
	
	public function getPaiement_Id_Paypal()
    {
        return $this->paiement_id_paypal;
    }
	
	public function getId_Utilisateur()
    {
        return $this->id_utilisateur;
    }
	
	public function getDate_Paiement()
    {
        return $this->date_paiement;
    }
}
