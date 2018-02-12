<?php
require_once '../Modele/Utilisateur.php';

class UtilisateurDAO
{
	public function GetListeUtilisateurs()
    {
		$list = [];
        $db = Db::getInstance();
		
        $req = $db->query('SELECT * FROM utilisateur');

        foreach($req->fetchAll() as $utilisateur) 
		{
            $list[] = new Utilisateur($utilisateur['id_utilisateur'], 
			$utilisateur['nom_utilisateur'], 
			$utilisateur['mdp_utilisateur'], 
			$utilisateur['email_utilisateur'], 
			$utilisateur['id_privilege'], 
			$utilisateur['image_utilisateur'], 
			$utilisateur['description_utilisateur']);
        }

        return $list;
    }