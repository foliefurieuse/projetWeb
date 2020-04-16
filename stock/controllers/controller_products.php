<?php


class ProductsController {

    public function __construct(){}

    public function index() {

        $product = new Product();
        $products=$product->get_all_products();
        require_once(ROOT_PATH.'/views/products/index.php');

    }

    public function show() {

        if (!isset($_GET['id'])) return routing('pages', 'error');
        $product= new Product();
        $myproduct=$product->find($_GET['id']);
        require_once(ROOT_PATH.'/views/products/show.php');

    }

    public function newProduct() {
        include_once(ROOT_PATH."/includes/addProduct.php");
    }
}
?>