<?php
require_once '../modele/Utilisateur.php';
require_once '../bdd/Db.php';

class UtilisateurDAO
{
    public function GetListeUtilisateurs()
    {
        $list = [];
        $db = Db::getInstance();

        $req = $db->query('SELECT * FROM utilisateur');

        foreach ($req->fetchAll() as $utilisateur) {
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

    public function GetUtilisateurByString($username)
    {
        $db = Db::getInstance();

        $req = $db->prepare('SELECT * FROM utilisateur WHERE pseudo_utilisateur = :pseudo_utilisateur');

        $req->execute(array('pseudo_utilisateur' => $username));

        $utilisateur = $req->fetch();

        return new Utilisateur($utilisateur['pseudo_utilisateur'],
            $utilisateur['mdp_utilisateur'],
            $utilisateur['email_utilisateur'],
            $utilisateur['id_privilege'],
            $utilisateur['image_utilisateur'],
            $utilisateur['description_utilisateur']);
    }

    public function CheckIfUserExist(Utilisateur $utilisateur)
    {
        $db = Db::getInstance();

        $req = $db->prepare('SELECT * FROM utilisateur WHERE email_utilisateur = :email_utilisateur 
        OR pseudo_utilisateur = :pseudo_utilisateur');

        $req->execute(array('pseudo_utilisateur' => $utilisateur->getPseudo(),
            'email_utilisateur' => $utilisateur->getEmail()));

        if ( $req->rowCount() > 0 )
        {
            return true;
        }
        else
        {
            return false;
        }
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
		:description_utilisateur)');

        $req->execute(array('pseudo_utilisateur' => $utilisateur->getPseudo(),
            'mdp_utilisateur' => $utilisateur->getMdp(),
            'email_utilisateur' => $utilisateur->getEmail(),
            'id_privilege' => $utilisateur->getId_Privilege(),
            'image_utilisateur' => $utilisateur->getImage(),
            'description_utilisateur' => $utilisateur->getDescription()));

        return $req;
    }

    public function SupprimerUnUtilisateur(Utilisateur $utilisateur)
    {
        $db = Db::getInstance();

        $req = $db->prepare('DELETE FROM utilisateur 
		WHERE id_utilisateur=:id_utilisateur');

        $req->execute(array('id_utilisateur' => $utilisateur->getId()));
    }

    public function ModifierUnUtilisateur(Utilisateur $utilisateur)
    {
        $db = Db::getInstance();

        $req = $db->prepare('UPDATE INTO utilisateur 
		SET pseudo_utilisateur = :pseudo_utilisateur, 
		mdp_utilisateur = :mdp_utilisateur, 
		email_utilisateur = :email_utilisateur, 
		id_privilege = :id_privilege, 
        image_utilisateur = :image_utilisateur, 
		description_utilisateur = :description_utilisateur');

        $req->execute(array('pseudo_utilisateur' => $utilisateur->getPseudo(),
            'mdp_utilisateur' => $utilisateur->getMdp(),
            'email_utilisateur' => $utilisateur->getEmail(),
            'id_privilege' => $utilisateur->getId_Privilege(),
            'image_utilisateur' => $utilisateur->getImage(),
            'description_utilisateur' => $utilisateur->getDescription()));
    }
}