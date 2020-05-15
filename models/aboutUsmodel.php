<?php

class aboutUsModel extends Model{
    public function __construct()
    {
        parent::__construct();
    }

    public function readCompany(){
        $about_us = $this->db->runQuery("SELECT * FROM companies");
        return $about_us;
    }

    public function readDuckOfTheDay(){
        $dayOfWeek = date("l", strtotime(date("Y-m-d")));
        $offer = $this->db->runQuery("SELECT percentage, ProductID FROM product_of_the_day WHERE dayOfWeek='$dayOfWeek'");
        $ProductID=$offer[0]["ProductID"];
        $product_of_day = $this->db->runQuery("SELECT * FROM products WHERE ProductID= $ProductID");
        $product_of_day[0]["percentage"]=$offer[0]["percentage"];
        return $product_of_day;
    }
}