<?php

class orderModel extends Model{
    public function __construct()
    {
        parent::__construct();
    }

    public function readUsers(){
        $users_array = $this->db->runQuery("SELECT * FROM users WHERE isAdmin=0");
        return $users_array;
    }

    public function readOrdersUser($userID){
        $order_array = $this->db->runQuery("SELECT * FROM orders WHERE UserID='$userID'");
        return $order_array;
    }

    public function readOrderProducts($orderID){
        $orderProducts_array= $this->db->runQuery("SELECT o.quantity,p.description,p.image,p.price,p.ProductID FROM orderproduct o LEFT JOIN products p ON o.ProductID=p.ProductID WHERE o.OrderID='$orderID'");
        return $orderProducts_array;
    }
}