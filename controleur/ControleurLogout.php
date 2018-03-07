<?php
/**
 * Created by PhpStorm.
 * User: max77
 * Date: 14/02/2018
 * Time: 19:32
 */
include_once $_SERVER['DOCUMENT_ROOT'] . '/configuration.php';
session_destroy();

header("location: " . SITE);