<?php
require_once ROOT_PATH.'/config.php';

if (!isset($_SESSION['id'])) {
    header("Location: index.php");
}

global $con;
$id = $_GET['id'];
$orderEdit= $con->query("SELECT * FROM orders WHERE id='$id'");
$editorder=$orderEdit->fetch();

if (isset($_POST['btn-editer-produit'])) {

    $ord_total = $_POST['ord_total'];
    $ord_description = $_POST['ord_description'];
    $ord_status = $_POST['ord_status'];
    $slug = $_POST['slug'];
    $client_id = $_SESSION['id'];

    if($ord_total>=0){
        $query = "UPDATE orders 
                    SET client_id='$client_id',
                        ord_total='$ord_total', 
                        ord_description='$ord_description',
                        ord_status='$ord_status',
                        slug='$slug'
                     WHERE id='$id'";

        if ($con->query($query)) {
            $msg = "<div class='alert alert-success'>
						<span class='glyphicon glyphicon-info-sign'></span> &nbsp; Mise à jour réussie !
					</div>";
            header("Location: index.php?controller=orders&action=index");
        }else {
            $msg = "<div class='alert alert-danger'>
						<span class='glyphicon glyphicon-info-sign'></span> &nbsp; erreur pendant la mise à jour!
					</div>";

        }

    } else {


        $msg = "<div class='alert alert-danger'>
					<span class='glyphicon glyphicon-info-sign'> Le montant doit être positif</span> &nbsp;
				</div>";

    }
}
?>

<div class="signin-form">
    <div class="container">
        <?php
        if(isset($msg)){
            echo $msg;
        }
        ?>
        <form class="form-signin" method="post" id="edit-form">

            <h2 class="form-signin-heading">Ajout commande</h2>
            <hr />

            <div class="form-group">
                <label for="ord_total">Montant</label>
                <input type="number" class="form-control" placeholder="Montant" name="ord_total" min="0" value="<?= $editorder['ord_total']?>" /> </div>
            <div class="form-group">
                <label for="ord_description">Description</label>
                <input type="text" class="form-control" placeholder="description" name="ord_description" value="<?= $editorder['ord_description']?>"  /> </div>
            <div class="form-group">
                <label for="ord_status">Status</label>
                <input type="number" class="form-control" placeholder="Status" name="ord_status" min="0" max="3" value="<?=  $editorder['ord_status']?>" /> </div>
            <div class="form-group">
                <label for="slug">Slug</label>
                <input type="text" class="form-control" placeholder="slug" name="slug" value="<?=  $editorder['slug']?>" required /> </div>
            <hr/>
            <div class="form-group">
                <button type="submit" class="btn btn-default" name="btn-editer-produit" id="btn-editer-produit"> <span class="glyphicon glyphicon-log-in"></span> &nbsp; Ajouter commande</button>
        </form>
    </div>
</div>

