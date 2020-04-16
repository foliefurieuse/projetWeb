<?php
if(isset($_POST['login_btn'])) {
    global $con;
    $username = $_POST['username'];
    $mdp = $_POST['password'];
    $query = $con->prepare('SELECT * FROM customers WHERE username=:username');
    $query->execute(array('username' => $username));
    $row=$query->fetch();




    if(strcmp($username, $row['username'])==0)
    {
        if(strcmp($mdp, $row['password'])==0)
        {
            $_SESSION['id'] = $row['customerid'];
            $_SESSION['admin'] = $row['role'] == 'Admin';
            $_SESSION['name'] = $row['firstname'].' '.$row['lastname'];
        }
    }
    else {
        $msg = "ERREUR DE CONNEXION";
    }

}