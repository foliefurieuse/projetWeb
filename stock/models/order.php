<?php

class Order
{
    public $id;
    public $client_id;
    public $description;
    public $order_total;
    public $order_date;
    public $order_status;
    public $user_id;

    public function __construct(
        $user_id = -1,
        $id = false,
        $client_id = false,
        $order_total = false,
        $description = false,
        $order_status = false,
        $order_date = false
    ) {
        if($user_id!=-1)
            $this->client_id = $user_id;
        if ($id === false) return;

        $this->id = $id;
        $this->client_id = $client_id;
        $this->description = $description;
        $this->order_total = $order_total;
        $this->order_date = $order_date;
        $this->order_status = $order_status;
    } //end construct

    public function get_all_orders()
    {
        global $con;
        $list = array();
        //$con = DBConnect::getInstance(); //static method

        $orders = $con->query('SELECT * FROM orders WHERE client_id='.$this->client_id);


        //L'ADMIN VOIT TOUT
        if($_SESSION['admin'])
            $orders = $con->query('SELECT * FROM orders');

        foreach ($orders as $order)
            $list[] = new Order($this->client_id, $order['id'], $order['client_id'], NULL, $order['ord_description'], NULL, $order['order_date']);
        return $list;
    }
    public function find($id)
    {
        global $con;
        $id = intval($id);
        $req = $con->prepare('SELECT * FROM orders where id=:id');
        $req->execute(array('id' => $id));
        $order = $req->fetch();
        return new Order(
            -1,
            $order['id'],
            $order['client_id'],
            $order['ord_total'],
            $order['ord_description'],
            $order['ord_status'],
            $order['order_date']
        );
    }


}//end class Order
