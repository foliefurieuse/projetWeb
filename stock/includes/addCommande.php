<?php
require_once ROOT_PATH.'/config.php';

if (!isset($_SESSION['id'])) {
header("Location: index.php");
}

if (isset($_POST['btn-ajouter-produit'])) {

    global $con;
    $ord_total = $_POST['ord_total'];
    $ord_description = $_POST['ord_description'];
    $ord_status = $_POST['ord_status'];
    $slug = $_POST['slug'];
    $client_id = $_SESSION['id'];

    if($ord_total>=0){
        $query = "INSERT INTO orders(client_id,ord_total, ord_description, ord_status, slug) VALUES('$client_id','$ord_total','$ord_description','$ord_status','$slug')";

        if ($con->query($query)) {

            header("Location: index.php?controller=orders&action=index");
        }else {
            $msg = "<div class='alert alert-danger'>
						<span class='glyphicon glyphicon-info-sign'></span> &nbsp; erreur pendant l'ajout!
					</div>";
        }

    } else {


        $msg = "<div class='alert alert-danger'>
					<span class='glyphicon glyphicon-info-sign'></span> &nbsp; Le montant doit être positif
				</div>";

    }
}
?>

<div class="signin-form">
    <div class="container">
        <form class="form-signin" method="post" id="login-form">
            <h2 class="form-signin-heading">Ajout commande</h2>
            <hr />
            <?php
            if(isset($msg)){
                echo $msg;
            }
            ?>
            <div class="form-group">
                <input type="number" class="form-control" placeholder="Montant" name="ord_total" required /> </div>
            <div class="form-group">
                <input type="text" class="form-control" placeholder="description" name="ord_description" required /> </div>
            <div class="form-group">
                <input type="number" class="form-control" placeholder="Status" name="ord_status" min="0" max="3" /> </div>
            <div class="form-group">
                <input type="text" class="form-control" placeholder="slug" name="slug" required /> </div>
            <hr/>
            <div class="form-group">
                <button type="submit" class="btn btn-default" name="btn-ajouter-produit" id="btn-ajouter-produit"> <span class="glyphicon glyphicon-log-in"></span> &nbsp; Ajouter commande</button>
        </form>
    </div>
</div>

