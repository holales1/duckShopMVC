<?php

class Model{

    function __construct()
    {
        $this->db=new Database();
        $this->function=new Functions;
    }
}