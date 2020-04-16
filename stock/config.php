<?php
session_start();

define('ROOT_PATH', realpath(dirname(__FILE__)));
define('BASE_URL', 'http://localhost:3000/');
require_once(ROOT_PATH . '/database/db.php');
// connect to database
$con = DBConnect::getInstance();




