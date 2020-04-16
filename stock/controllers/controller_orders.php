<?php
  class OrdersController {

    public function __construct(){}

    public function index() {
      if (isset($_SESSION['id'])) {
        $order = new Order($user_id=$_SESSION['id']);
        $orders = $order->get_all_orders();
        require_once('views/orders/index.php');
      }

    }

    public function show() {

      if (!isset($_GET['id'])) return routing('pages', 'error');      
      $order= new Order();
      $myorder=$order->find($_GET['id']);
      require_once('views/orders/show.php');

   }

    public function newCommande(){
      include_once(ROOT_PATH."/includes/addCommande.php");
    }

      public function edit()
      {
          include_once(ROOT_PATH."/includes/editCommande.php");
      }

      public function deleteCommande()
      {
        include_once(ROOT_PATH."/includes/deleteCommande.php");
      }
 }
?>
