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

    public function updateCompany($arrayPost){
        $result=$this->db->insertRow("UPDATE companies SET description='{$arrayPost['description']}',Address='{$arrayPost['Address']}',phoneNumber='{$arrayPost['phoneNumber']}',openHour='{$arrayPost['openHour']}' WHERE CompanyID=1");
        $_SESSION['message']="Information updated";
    }
}