<?php

require_once(dirname(__FILE__,2).'/database/db.php');
require_once(dirname(__FILE__,2).'/config.php');

global $con;



$categoriesTab = array();
//$con = DBConnect::getInstance(); //static method
$categories = $con->query('SELECT * FROM categories');

foreach ($categories as $category)
    $categoriesTab[$category['catid']] = $category['catname'];



