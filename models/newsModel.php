<?php

class newsModel extends Model{
    public function __construct()
    {
        parent::__construct();
    }

    public function readNews(){
        $latestNews = $this->db->runQuery("SELECT * FROM news ORDER BY NewsID");
        return $latestNews;
    }

    public function updateNews($arrayPost){
        $result=$this->db->insertRow("UPDATE news SET title='{$arrayPost['title']}',description='{$arrayPost['description']}' WHERE NewsID='{$arrayPost['NewsID']}'");
        return $result;
    }

    public function createNews($arrayPost){
        $result=$this->db->insertRow("INSERT INTO news (title, description) VALUES ('{$arrayPost['title']}', '{$arrayPost['description']}')");
        return $result;
    }
}