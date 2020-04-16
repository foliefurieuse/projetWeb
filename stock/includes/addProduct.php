<?php
require_once ROOT_PATH.'/config.php';

if (!isset($_SESSION['id']) or !$_SESSION['admin']) {
    header("Location: index.php");
}

if (isset($_POST['btn-ajouter-produit'])) {

    global $con;
    $price = $_POST['price'];
    $catid = $_POST['catid'];
    $name = $_POST['name'];
    $description = $_POST['description'];
    $img = $_POST['img'];

    if($price>=0){
        $query = "INSERT INTO products(description, price, catid, name, img) VALUES('$description','$price','$catid','$name', '$img')";

        if ($con->query($query)) {

            header("Location: index.php?controller=products&action=index");
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
                <input type="text" class="form-control" placeholder="name" name="name" required /> </div>
            <div class="form-group">
                <input type="text" class="form-control" placeholder="description" name="description" required /> </div>
            <div class="form-group">
                <input type="number" class="form-control" placeholder="price" name="price" min="0" required /> </div>

            <hr/>
            <select name="catid" required>
            <?php
            global $categoriesTab;
            foreach($categoriesTab as $number => $nameCategorie)
            {
                if($number!=0)
                    echo '<option value='.$number.'>'.$nameCategorie.'</option>';
            }
            ?>
            </select>
            <label for="avatar">Picture (jpeg) :</label>

            <input type="file"
                   id="avatar" name="img"
                   accept="image/jpeg">

            <div class="form-group">
                <button type="submit" class="btn btn-default" name="btn-ajouter-produit" id="btn-ajouter-produit"> <span class="glyphicon glyphicon-log-in"></span> &nbsp; Ajouter commande</button>
        </form>
    </div>
</div>