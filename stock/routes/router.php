<?php

function routing($controller, $action)
{
    require_once('controllers/controller_' . $controller . '.php');
    switch ($controller) {
        case 'pages':
            $myController = new PagesController();
            break;
        case 'orders':
            require_once('models/order.php');
            $myController = new OrdersController();
            break;
    }
    $myController->{$action}();
}

$controllers = array(
    'pages' => ['home', 'error'],
    'orders' => ['index', 'show', 'newCommande', 'edit','deleteCommande']
);

// var_dump($controllers);
if (array_key_exists($controller, $controllers)) {
    if (in_array($action, $controllers[$controller])) {
        routing($controller, $action);
    } else {
        routing('pages', 'home');
    }
} else {
    routing('pages', 'error');
}
