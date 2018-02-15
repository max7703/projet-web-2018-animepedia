<?php
/**
 * Created by PhpStorm.
 * User: max77
 * Date: 14/02/2018
 * Time: 19:32
 */

session_start();
session_destroy();

header("location: https://www.dev.animepedia.fr/home");