<?php
require_once ROOT_PATH.'/config.php';

if (!isset($_SESSION['id'])) {
    header("Location: index.php");
}


    global $con;


    $id=$_GET['id'];


    $query = "DELETE FROM orders WHERE id='$id'";

    if ($con->query($query)) {

        header("Location: index.php?controller=orders&action=index");
    }else {
        $msg = "<div class='alert alert-danger'>
                    <span class='glyphicon glyphicon-info-sign'></span> &nbsp; erreur pendant la suppression!
               </div>";
    }

?>