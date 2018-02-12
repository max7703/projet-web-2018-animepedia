<?php
/**
 * Created by PhpStorm.
 * User: max77
 * Date: 07/02/2018
 * Time: 10:03
 */

class Db {
    private static $instance = NULL;

    private function __construct() {}

    private function __clone() {}

    public static function getInstance() {
        if (!isset(self::$instance)) {
            $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
            self::$instance = new PDO('mysql:host=animepedao77.mysql.db;dbname=animepedao77', 'animepedao77', 'Ccleaner77', $pdo_options);
            if(self::$instance == NULL)
                echo('Erreur de connexion');
        }
        return self::$instance;
    }
}
?>