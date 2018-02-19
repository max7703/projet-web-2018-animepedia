<?php
require_once MODELEPRIVILEGE;
/*require_once '../bdd/Db.php';*/

class PrivilegeDAO
{
	public function obtenirListePrivileges()
    {
		$list = [];
        $db = BaseDeDonnees::getInstance();
		
        $req = $db->prepare('SELECT * FROM privilege');

        $req->execute();

        foreach($req->fetchAll() as $privilege) 
		{
            $list[] = new Privilege($privilege['id_privilege'], 
			$privilege['nom_privilege']);
        }

        return $list;
    }
	
	public function obtenirPrivilegeById($id)
    {
		$db = BaseDeDonnees::getInstance();
        $id = intval($id);
		
        $req = $db->prepare('SELECT * FROM privilege WHERE id_privilege = :id_privilege');
		
        $req->execute(array('id_privilege' => $id));
		
        $privilege = $req->fetch();

        return new Privilege($privilege['id_privilege'], 
		$privilege['nom_privilege']);
    }

    public function obtenirPrivilegeParString($nom)
    {
        $db = BaseDeDonnees::getInstance();

        $req = $db->prepare('SELECT * FROM privilege WHERE nom_privilege = :nom_privilege');

        $req->execute(array('nom_privilege' => $nom));

        $privilege = $req->fetch();

        return new Privilege($privilege['id_privilege'],
            $privilege['nom_privilege']);
    }

	public function ajouterUnPrivilege(Privilege $privilege)
	{
        $db = BaseDeDonnees::getInstance();

        $req = $db->prepare('INSERT INTO privilege(nom_privilege)
		VALUES(:nom_privilege)');

        $req->execute(array('nom_privilege' => $privilege->getNom()));
    }
	
	public function supprimerUnPrivilege(Privilege $privilege)
	{
		$db = BaseDeDonnees::getInstance();
		
		$req = $db->prepare('DELETE FROM privilege 
		WHERE id_privilege=:id_privilege');
		
		$req->execute(array('id_privilege' => $privilege->getId()));	
	}
	
	public function modifierUnPrivilege(Privilege $privilege)
	{
		$db = BaseDeDonnees::getInstance();
		
		$req = $db->prepare('UPDATE privilege 
		SET nom_privilege = :nom_privilege');
		
        $req->execute(array('nom_privilege' => $privilege->getNom()));
	}
}