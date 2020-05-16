<?php

class shopCarModel extends Model{
    public function __construct()
    {
        parent::__construct();
    }


    public function readProduct($productID){
        $product = $this->db->runQuery("SELECT * FROM products WHERE ProductID='$productID'");
        return $product;
    }

 
}