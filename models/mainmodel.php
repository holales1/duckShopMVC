<?php

class mainModel extends Model{
    public function __construct()
    {
        parent::__construct();
    }

    public function readDuck(){
        $product_array = $this->db->runQuery("SELECT * FROM products WHERE isAvaliable=0 ORDER BY ProductID ASC ");
        return $product_array;
    }

    public function readDuckCheap(){
        $product_array_cheap = $this->db->runQuery("SELECT * FROM `cheap_products` WHERE isAvaliable=0 ORDER BY ProductID ASC ");
        return $product_array_cheap;
    }

    public function readDuckAdmin(){
        $product_array = $this->db->runQuery("SELECT * FROM products");
        return $product_array;
    }

    public function readDuckOfTheDay(){
        $dayOfWeek = date("l", strtotime(date("Y-m-d")));
        $offer = $this->db->runQuery("SELECT percentage, ProductID FROM product_of_the_day WHERE dayOfWeek='$dayOfWeek'");
        $ProductID=$offer[0]["ProductID"];
        $product_of_day = $this->db->runQuery("SELECT * FROM products WHERE ProductID= $ProductID");
        $product_of_day[0]["percentage"]=$offer[0]["percentage"];
        return $product_of_day;
    }
    public function getDuckById($id){
        $product_array = $this->db->runQuery("SELECT * FROM products WHERE ProductID='$id'");
        return $product_array;
    }

    function deleteDuck($ProductID){
        $offer = $this->db->insertRow("UPDATE products SET isAvaliable='1' WHERE ProductID='$ProductID'");
        $_SESSION['message'] = "Product deleted.";
    }

    function addDuck($ProductID){
        $offer = $this->db->insertRow("UPDATE products SET isAvaliable='0' WHERE ProductID='$ProductID'");
        $_SESSION['message'] = "Product added.";
    }

    function updateDuck($productID,$description,$price){
        $result = $this->db->insertRow("UPDATE products SET description='$description',price='$price',image='{$_FILES["imgfile"]["name"]}' WHERE ProductID='$productID");
        if($result){
            $_SESSION["message"]="Product updated";
        }else{
            $_SESSION["message"]="Product not updated";
        }
    }

    function saveDuck($productID,$description,$price){
        $result = $this->db->insertRow("INSERT INTO products (price, description, image)
        VALUES ('$price', '$description', '{$_FILES["imgfile"]["name"]}')");
        if($result){
            $_SESSION["message"]="Product updated";
        }else{
            $_SESSION["message"]="Product not updated";
        }
    }

    function readDuckOferrs(){
        $product_array = $this->db->runQuery("SELECT * FROM product_of_the_day");
        return $product_array;
    }

    function saveProductDay($ProductIDSQL,$percentageSQL,$dayOfWeekSQL){
        $result=$this->db->insertRow("UPDATE product_of_the_day SET percentage='$percentageSQL',ProductID='$ProductIDSQL' WHERE dayOfWeek='$dayOfWeekSQL'");
        if($result){
            $_SESSION["message"]="Product saved";
        }else{
            $_SESSION["message"]="Product not saved";
        }
    }

    function getMaxProductID(){
        $result=$this->db->runQuery("SELECT MAX(ProductID) FROM products");
        return $result;
    }
}