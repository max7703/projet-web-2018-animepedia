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
			$utilisateur['pseudo_utilisateur'], 
			$utilisateur['mdp_utilisateur'], 
			$utilisateur['email_utilisateur'], 
			$utilisateur['id_privilege'], 
			$utilisateur['image_utilisateur'], 
			$utilisateur['description_utilisateur']);
        }

        return $list;
    }
	
	public function GetUtilisateurById($id)
    {
		$db = Db::getInstance();
        $id = intval($id);
		
        $req = $db->prepare('SELECT * FROM utilisateur WHERE id_utilisateur = :id_utilisateur');
		
        $req->execute(array('id_utilisateur' => $id));
		
        $utilisateur = $req->fetch();

        return new Utilisateur($utilisateur['id_utilisateur'], 
		$utilisateur['pseudo_utilisateur'],
		$utilisateur['mdp_utilisateur'], 
		$utilisateur['email_utilisateur'], 
		$utilisateur['id_privilege'], 
		$utilisateur['image_utilisateur'], 
		$utilisateur['description_utilisateur']);
    }
	
	public function AjouterUnUtilisateur(Utilisateur $utilisateur)
	{
        $db = Db::getInstance();

        $req = $db->prepare('INSERT INTO utilisateur(pseudo_utilisateur,
		mdp_utilisateur, 
		email_utilisateur, 
        id_privilege, 
		image_utilisateur,
		description_utilisateur) 
		
		VALUES(:pseudo_utilisateur,  
		:mdp_utilisateur, 
		:email_utilisateur, 
        :id_privilege, 
		:image_utilisateur,
		:description_utilisateur');

        $req->execute(array('pseudo_utilisateur' => $utilisateur->getNom(), 
		'mdp_utilisateur' => $utilisateur->getMdp(),
		'email_utilisateur'=> $utilisateur->getEmail(),
		'id_privilege'=> $utilisateur->getId_Privilege(),
		'image_utilisateur'=> $utilisateur->getImage(),
		'description_utilisateur'=> $utilisateur->getDescription()));

    }
	