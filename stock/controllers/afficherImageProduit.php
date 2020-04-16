<?php

include_once(dirname(__FILE__,2)."/config.php");

if(isset($_GET['id']))
{
    global $con;
    $query = $con->prepare('SELECT * FROM products WHERE prodid=:id');
    $query->execute(array('id' => $_GET['id']));
    $row=$query->fetch();

    header("Content-type: image/jpeg");
    echo $row['img'];
}
