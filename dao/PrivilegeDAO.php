<?php
require_once MODELEPRIVILEGE;

class PrivilegeDAO
{
    public function obtenirListePrivileges()
    {
        $listePrivileges = [];
        $basededonnee = BaseDeDonnees::getInstance();

        $requete = $basededonnee->prepare('SELECT * FROM privilege');

        $requete->execute();

        foreach($requete->fetchAll() as $privilege)
        {
            $listePrivileges[] = new Privilege($privilege['id_privilege'],
                $privilege['nom_privilege']);
        }

        return $listePrivileges;
    }

    public function obtenirPrivilegeById($id)
    {
        $basededonnee = BaseDeDonnees::getInstance();
        $id = intval($id);

        $requete = $basededonnee->prepare('SELECT * FROM privilege WHERE id_privilege = :id_privilege');

        $requete->execute(array('id_privilege' => $id));

        $privilege = $requete->fetch();

        return new Privilege($privilege['id_privilege'],
            $privilege['nom_privilege']);
    }

    public function obtenirPrivilegeParString($nom)
    {
        $basededonnee = BaseDeDonnees::getInstance();

        $requete = $basededonnee->prepare('SELECT * FROM privilege WHERE nom_privilege = :nom_privilege');

        $requete->execute(array('nom_privilege' => $nom));

        $privilege = $requete->fetch();

        return new Privilege($privilege['id_privilege'],
            $privilege['nom_privilege']);
    }

    public function ajouterUnPrivilege(Privilege $privilege)
    {
        $basededonnee = BaseDeDonnees::getInstance();

        $requete = $basededonnee->prepare('INSERT INTO privilege(nom_privilege)
		VALUES(:nom_privilege)');

        $requete->execute(array('nom_privilege' => $privilege->getNom()));
    }

    public function supprimerUnPrivilege(Privilege $privilege)
    {
        $basededonnee = BaseDeDonnees::getInstance();

        $requete = $basededonnee->prepare('DELETE FROM privilege 
		WHERE id_privilege=:id_privilege');

        $requete->execute(array('id_privilege' => $privilege->getId()));
    }

    public function modifierUnPrivilege(Privilege $privilege)
    {
        $basededonnee = BaseDeDonnees::getInstance();

        $requete = $basededonnee->prepare('UPDATE privilege 
		SET nom_privilege = :nom_privilege
		WHERE id_privilege=:id_privilege');

        $requete->execute(array('nom_privilege' => $privilege->getNom(),
            'id_privilege' => $privilege->getId()));
    }
}