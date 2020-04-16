<?php
if (isset($_SESSION['id'])) {
    header("Location: index.php");
}

include("config.php");

if(isset($_POST['btn-signup'])) {
    global $con;
    $uname = $_POST['username'];
    $email = $_POST['email'];
    $upass = $_POST['password'];
    $lastname = $_POST['lastname'];
    $firstname=$_POST['firstname'];
    $address=$_POST['address'];
    $city=$_POST['city'];
    $state=$_POST['state'];
    $zip=$_POST['zip'];
    $country=$_POST['country'];

    $check_email = $con->query("SELECT count(*) FROM customers WHERE email='$email'");
    $countemail=$check_email->fetchColumn();
    $check_username = $con->query("SELECT count(*) FROM customers WHERE username='$uname'");
    $countusername=$check_username->fetchColumn();

    if ($countemail==0 AND $countusername==0) {

        $query = "INSERT INTO customers(username,email, role, password, lastname,firstname,address,city,state,zip,country) VALUES
                                        ('$uname','$email','Customer','$upass','$lastname','$firstname','$address','$city','$state','$zip','$country' )";

        if ($con->query($query)) {
            $msg = "<div class='alert alert-success'>
						<span class='glyphicon glyphicon-info-sign'></span> &nbsp; inscription réussie !
					</div>";
            header("Location: index.php");
        }else {
            $msg = "<div class='alert alert-danger'>
						<span class='glyphicon glyphicon-info-sign'></span> &nbsp; erreur pendant votre inscription!
					</div>";
        }

    } else {


        $msg = "<div class='alert alert-danger'>
					<span class='glyphicon glyphicon-info-sign'></span> &nbsp; email déjà pris !
				</div>";

    }
}
?>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Login & Inscription</title>
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="bootstrap/css/bootstrap-theme.min.css" rel="stylesheet" media="screen">
    <link rel="stylesheet" href="style.css" type="text/css" /> </head>

<body>
<div class="signin-form">
    <div class="container">
        <form class="form-signin" method="post" id="register-form">
            <h2 class="form-signin-heading">M'inscrire</h2>
            <hr />
            <?php
            if (isset($msg)) {
                echo $msg;
            }
            ?>
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Username" name="username" required />
            </div>
            <div class="form-group">
                <input type="text" class="form-control" placeholder="First Name" name="firstname" required />
            </div>
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Last Name" name="lastname" required />
            </div>
            <div class="form-group">
                <input type="text" class="form-control" placeholder="address" name="address" required />
            </div>
            <div class="form-group">
                <input type="text" class="form-control" placeholder="city" name="city" required />
            </div>
            <div class="form-group">
                <input type="text" class="form-control" placeholder="state" name="state" required />
            </div>
            <div class="form-group">
                <input type="number" class="form-control" placeholder="zip" name="zip" required min="0" max="99999"/>
            </div>
            <div class="form-group">
                <input type="text" class="form-control" placeholder="country" name="country" required />
            </div>
            <div class="form-group">
                <input type="email" class="form-control" placeholder="Email address" name="email" required /> <span id="check-e"></span> </div>
            <div class="form-group">
                <input type="password" class="form-control" placeholder="Password" name="password" required /> </div>
            <hr />
            <div class="form-group">
                <button type="submit" class="btn btn-default" name="btn-signup"> <span class="glyphicon glyphicon-log-in"></span> &nbsp; Créer votre compte </button>
                <a href="index.php" class="btn btn-default" style="float:right;">Log In </a> </div>
        </form>
    </div>
</div>
</body>

</html>