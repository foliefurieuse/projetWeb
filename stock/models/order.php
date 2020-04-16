<?php

class Order
{
    public $orderid;
    public $customerid;
    public $description;
    public $amount;
    public $date;
    public $order_status;
    public $ship_name;
    public $ship_adress;
    public $ship_city;
    public $ship_state;
    public $ship_zip;
    public $ship_country;



    public function __construct(
        $id = false,
        $client_id = false,
        $order_total = false,
        $description = false,
        $order_status = false,
        $order_date = false
    ) {
        if ($id === false) return;

        $this->orderid = $id;
        $this->customerid = $client_id;
        $this->description = $description;
        $this->amount = $order_total;
        $this->date = $order_date;
        $this->order_status = $order_status;
    } //end construct

    public function get_all_orders()
    {
        global $con;
        $list = array();
        //$con = DBConnect::getInstance(); //static method
        $orders = $con->query('SELECT * FROM orders');

        foreach ($orders as $order)
            $list[] = new Order($order['id'], $order['client_id'], NULL, $order['ord_description'], NULL, NULL);
        return $list;
    }
    public function find($id)
    {
        global $con;
        $id = intval($id);
        $req = $con->prepare('SELECT * FROM orders where orderid=:id');
        $req->execute(array('id' => $id));
        $order = $req->fetch();
        return new Order(
            $order['id'],
            $order['client_id'],
            $order['ord_total'],
            $order['ord_description'],
            $order['ord_status'],
            $order['order_date']
        );
    }
}//end class Order
