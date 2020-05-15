<?php

class News extends Controller{
    function __construct(){
        parent::__construct();
        $this->view->render('main/index');
    }


}
?>