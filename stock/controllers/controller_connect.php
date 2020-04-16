<?php
if(isset($_POST['login_btn'])) {
    global $con;
    $username = $_POST['username'];
    $mdp = $_POST['password'];
    $query = $con->prepare('SELECT * FROM clients WHERE clientname=:username');
    $query->execute(array('username' => $username));
    $row=$query->fetch();




    if(strcmp($username, $row['clientname'])==0)
    {
        if(strcmp($mdp, $row['password'])==0)
        {
            $_SESSION['id'] = $row['id'];
            $_SESSION['admin'] = $row['role'] == 'Admin';
        }
    }
    else {
        $msg = "ERREUR DE CONNEXION";
    }

}
