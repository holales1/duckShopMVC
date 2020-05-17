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

    public function getMaxOrderID(){
        $result=$this->db->runQuery("SELECT MAX(OrderID) FROM orders");
        return $result;
    }

    public function insertOrder($fOrder,$date){

        $result=$this->db->insertRow("INSERT INTO orders (OrderID, orderDate,UserID) VALUES ('{$fOrder[0]}', '{$date}', '{$_SESSION["UserID"]}')");
        if($result){
            foreach ($_SESSION["cart_item"] as $item){
                $result=$this->db->insertRow("INSERT INTO orderProduct (ProductID, OrderID,quantity) VALUES ('{$item["ProductID"]}', '{$fOrder[0]}', '{$item["quantity"]}')");
                if($result){

                }else{
                    return $result;
                }
            }
        }else{
            return $result;
        }
        return $result;
    }

 
}