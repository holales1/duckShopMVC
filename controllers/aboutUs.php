<?php

class AboutUs extends Controller{
    function __construct(){
        parent::__construct();
        
    }


    function render(){
        $aboutUs=$this->model->readCompany();
        $this->view->aboutUs = $aboutUs;

        $this->view->render('aboutUs/index');
    }
}
?>