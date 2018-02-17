<?php
/**
 * Created by PhpStorm.
 * User: lyank
 * Date: 17/02/2018
 * Time: 09:31
 */
class Db {
    private static $instance = NULL;

    private function __construct() {}

    private function __clone() {}

    public static function getInstance() {
        if (!isset(self::$instance)) {
            $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
            self::$instance = new PDO('mysql:host=animepedao77.mysql.db;dbname=animepedao77;charset=utf8', 'animepedao77', 'Ccleaner77', $pdo_options);
            if(self::$instance == NULL)
                echo('Erreur de connexion');
        }
        return self::$instance;
    }
}