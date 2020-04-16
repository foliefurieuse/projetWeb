<?php
class Product
{
    public $prodid;
    public $catid;
    public $name;
    public $price;
    public $description;
    public $date_added;




    public function __construct(
        $prodid = false,
        $catid = false,
        $price = false,
        $name = false,
        $date_added = false,
        $description = false
    ) {
        if ($prodid === false) return;

        $this->prodid = $prodid;
        $this->catid = $catid;
        $this->name = $name;
        $this->price = $price;
        $this->description = $description;
        $this->date_added = $date_added;
    } //end construct

    public function get_all_products()
    {
        global $con;
        $list = array();
        //$con = DBConnect::getInstance(); //static method
        if(isset($_GET['showCategory']) AND $_GET['showCategory']!=0) {
            $products = $con->query('SELECT * FROM products WHERE catid=' . $_GET['showCategory']);
        }
        else{
            $products = $con->query('SELECT * FROM products');
        }


        foreach ($products as $product)
            $list[] = new Product($product['prodid'], $product['catid'], $product['price'],$product['name'], $product['date_added'],$product['description']);
        return $list;
    }
    public function find($id)
    {
        global $con;
        $id = intval($id);
        $req = $con->prepare('SELECT * FROM products where prodid=:id');
        $req->execute(array('id' => $id));
        $product = $req->fetch();
        return new Product
        (
            $product['prodid'],
            $product['catid'],
            $product['price'],
            $product['name'],
            $product['date_added'],
            $product['description']
        );
    }
}//end class Order
