<?php
	$dsn = 'animepedao77.mysql.db;host=animepedao77';
	$user = 'animepedao77';
	$password = 'CCleaner77';

	try {
	$dbh = new PDO($dsn, $user, $password);
	if($dbh != NULL)
		echo("Connexion reussie");

	} catch (PDOException $e) {
	echo 'Connexion échouée : ' . $e->getMessage();
	}

?>