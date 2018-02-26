<?php
require_once MODELEUTILISATEUR;
//require_once '../bdd/Db.php';

class UtilisateurDAO
{
    public function obtenirListeUtilisateurs()
    {
        $list = [];
        $basededonnee = BaseDeDonnees::getInstance();

        $requete = $basededonnee->prepare('SELECT * FROM utilisateur');

        $requete->execute();

        foreach ($requete->fetchAll() as $utilisateur) {
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

    public function obtenirUtilisateurById($id)
    {
        $basededonnee = BaseDeDonnees::getInstance();
        $id = intval($id);

        $requete = $basededonnee->prepare('SELECT * FROM utilisateur WHERE id_utilisateur = :id_utilisateur');

        $requete->execute(array('id_utilisateur' => $id));

        $utilisateur = $requete->fetch();

        return new Utilisateur($utilisateur['id_utilisateur'],
            $utilisateur['pseudo_utilisateur'],
            $utilisateur['mdp_utilisateur'],
            $utilisateur['email_utilisateur'],
            $utilisateur['id_privilege'],
            $utilisateur['image_utilisateur'],
            $utilisateur['description_utilisateur']);
    }

    public function obtenirUtilisateurParString($username)
    {
        $basededonnee = BaseDeDonnees::getInstance();

        $requete = $basededonnee->prepare('SELECT * FROM utilisateur WHERE pseudo_utilisateur = :pseudo_utilisateur');

        $requete->execute(array('pseudo_utilisateur' => $username));

        $utilisateur = $requete->fetch();

        return new Utilisateur($utilisateur['id_utilisateur'],
            $utilisateur['pseudo_utilisateur'],
            $utilisateur['mdp_utilisateur'],
            $utilisateur['email_utilisateur'],
            $utilisateur['id_privilege'],
            $utilisateur['image_utilisateur'],
            $utilisateur['description_utilisateur']);
    }

    public function estExistant(Utilisateur $utilisateur)
    {
        $basededonnee = BaseDeDonnees::getInstance();

        $requete = $basededonnee->prepare('SELECT * FROM utilisateur WHERE email_utilisateur = :email_utilisateur 
        OR pseudo_utilisateur = :pseudo_utilisateur');

        $requete->execute(array('pseudo_utilisateur' => $utilisateur->getPseudo(),
            'email_utilisateur' => $utilisateur->getEmail()));

        if ( $requete->rowCount() > 0 )
        {
            return true;
        }
        else
        {
            return false;
        }
    }
    public function ajouterUnUtilisateur(Utilisateur $utilisateur)
    {
        $basededonnee = BaseDeDonnees::getInstance();

        $requete = $basededonnee->prepare(
            'INSERT INTO utilisateur(pseudo_utilisateur,
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

        $requete->execute(array('pseudo_utilisateur' => $utilisateur->getPseudo(),
            'mdp_utilisateur' => $utilisateur->getMdp(),
            'email_utilisateur' => $utilisateur->getEmail(),
            'id_privilege' => $utilisateur->getId_Privilege(),
            'image_utilisateur' => $utilisateur->getImage(),
            'description_utilisateur' => $utilisateur->getDescription()));

        return $requete;
    }

    public function supprimerUnUtilisateur(Utilisateur $utilisateur)
    {
        $basededonnee = BaseDeDonnees::getInstance();

        $requete = $basededonnee->prepare('DELETE FROM utilisateur 
		WHERE id_utilisateur=:id_utilisateur');

        $requete->execute(array('id_utilisateur' => $utilisateur->getId()));
    }

    public function modifierUnUtilisateur(Utilisateur $utilisateur)
    {
        $basededonnee = BaseDeDonnees::getInstance();

        $requete = $basededonnee->prepare('UPDATE utilisateur 
		SET pseudo_utilisateur = :pseudo_utilisateur, 
		email_utilisateur = :email_utilisateur, 
		id_privilege = :id_privilege, 
        image_utilisateur = :image_utilisateur, 
		description_utilisateur = :description_utilisateur
		WHERE id_utilisateur = :id_utilisateur');

        $requete->execute(array('pseudo_utilisateur' => $utilisateur->getPseudo(),
            'email_utilisateur' => $utilisateur->getEmail(),
            'id_privilege' => $utilisateur->getId_Privilege(),
            'image_utilisateur' => $utilisateur->getImage(),
            'description_utilisateur' => $utilisateur->getDescription(),
            'id_utilisateur' => $utilisateur->getId()));
    }
}