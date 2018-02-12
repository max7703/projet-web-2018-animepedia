<?php
require_once '../Modele/Privilege.php';

class PrivilegeDAO
{
	public function GetListePrivileges()
    {
		$list = [];
        $db = Db::getInstance();
		
        $req = $db->query('SELECT * FROM privilege');

        foreach($req->fetchAll() as $privilege) 
		{
            $list[] = new Privilege($privilege['id_privilege'], 
			$privilege['nom_privilege']);
        }

        return $list;
    }
	
	public function GetPrivilegeById($id)
    {
		$db = Db::getInstance();
        $id = intval($id);
		
        $req = $db->prepare('SELECT * FROM privilege WHERE id_privilege = :id_privilege');
		
        $req->execute(array('id_privilege' => $id));
		
        $privilege = $req->fetch();

        return new Privilege($privilege['id_privilege'], 
		$privilege['nom_privilege']);
    }
	
	public function AjouterUnPrivilege(Privilege $privilege) 
	{
        $db = Db::getInstance();

        $req = $db->prepare('INSERT INTO privilege(nom_privilege)
		VALUES(:nom_privilege');

        $req->execute(array('nom_privilege' => $privilege->getNom()));
    }
}