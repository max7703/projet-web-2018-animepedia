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
		
        $req = $db->prepare('SELECT * FROM privilege WHERE id = :id');
		
        $req->execute(array('id' => $id));
		
        $privilege = $req->fetch();

        return new Privilege($privilege['id_privilege'], 
		$privilege['nom_privilege']);	
    }
}