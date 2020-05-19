<?php

class newsModel extends Model{
    public function __construct()
    {
        parent::__construct();
    }

    public function readNews(){
        $latestNews = $this->db->runQuery("SELECT * FROM news");
        return $latestNews;
    }

    public function updateNews($arrayPost){
        $result=$this->db->insertRow("UPDATE news SET title='{$arrayPost['title']}',description='{$arrayPost['description']}' WHERE NewsID=1");
        $_SESSION['message']="Information updated";
    }
}